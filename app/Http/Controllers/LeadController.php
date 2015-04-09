<?php

namespace App\Http\Controllers;

use App\Lead;
use App\Contact;
use App\Account;
use App\Opportunity;
use App\AppHelper;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class LeadController extends Controller
{
  use \App\ControllerHelperTrait;

  protected $record=null;

  protected $rules=[
        'first_name'=>'required|min:3|max:75',
        'last_name'=>'required|min:3|max:75',
        'company'=> 'required|min:3|max:75',
        'email'=>'required|min:6|max:255',
        'lead_source_id'=>'required',
        'owner_id'=>'required',
      ];

  protected $messages=[
          'lead_source_id.required' => 'The lead source field is required',
          'owner_id.required' => 'The owner field is required',
        ];

  public function __construct()
  {
    $this->middleware('auth');

    $this->loadFromDB();
  }


  public function index()
  {
    $recentViews=$this->recentViews('lead');

    list($recordList, $recordListPagination)=$this->indexPageSearch('leads', 'id, email, salutation_id, first_name, last_name, title, company, state, country,
(select value from lkp_lead_status where id=status_id) as lead_status,
(select value from lkp_lead_source where id=lead_source_id) as lead_source,
(select name from users where id=owner_id) as owner, read_by_owner, created_at');

    return View('lead/lead-index', ['recordList'=>$recordList, 'recentViews'=>$recentViews, 'recordListPagination'=>$recordListPagination]);
  }


  public function create()
  {
    $this->record=new Lead();
    $this->record->owner_id=Auth::User()->id;

    return View('lead/lead-new', ['record'=>$this->record]);
  }


  public function store()
  {
    $this->record=new Lead(array_merge(Request::all(), ['adder_id'=>Auth::User()->id, 'modifier_id'=>Auth::User()->id]));

    try
    {
      if ($this->validated())
        $this->record->save();
    }
    catch (\Exception $e)
    {
      Session::flash('pageError', 'Error saving lead.');
      return View('lead/lead-new', ['record'=>$this->record]);
    }

    $redirectURL=Request::input('action') == 'saveNew' ? '/lead/create' : '/lead/' . $this->record->id;

    return redirect($redirectURL)->with('pageSuccess', 'Lead saved successfully.');
  }


  public function show()
  {
    if ($this->record->owner_id == Auth::User()->id && empty($this->record->read_by_owner))
      DB::update('update leads set read_by_owner=1 where id="' . $this->record->id . '"');

     $activityList=$this->relatedActivityList();

    return View('lead/lead-view', ['record'=>$this->record, 'activityList'=>$activityList, 'editPath'=>'lead']);
  }


  public function edit()
  {
    return View('lead/lead-edit', ['record'=>$this->record]);
  }


  public function update()
  {
    $this->record->guard(['_token', 'action', 'created_at', 'adder_id']);

    try
    {
      if ($this->validated())
        $this->record->update(Request::all());
    }
    catch (\Exception $e)
    {
      Session::flash('pageError', 'Error saving lead.');
      return View('lead/lead-edit', ['record'=>new Lead(array_merge(Request::all(), ['id'=>$this->record->id]))]);
    }

    return redirect('/lead/' . $this->record->id)->with('pageSuccess', 'Lead updated successfully.');
  }


  public function destroy()
  {
    $this->record->delete();

    return redirect('/lead')->with('pageSuccess', 'Lead deleted successfully');
  }


  public function showConvert()
  {
    $contact=null;
    $account=null;
    $opportunity=null;

    $newOpportunity=Request::input('newOpportunity', 0);
    $account_name=Request::input('account_name', $this->record->company);
    $account_id=Request::input('account_id', '');
    $opportunity_name=Request::input('opportunity_name', '');
    $stage_id=Request::input('stage_id', '');
    $close_date=Request::input('close_date', '');

    list($accountResults, $tooManyResults)=$this->accountSearchResult($account_name, 100);

    $messageType='pageError';
    $message='';

    $viewData=['record'=>$this->record, 'accountResults'=>$accountResults, 'tooManyResults'=>$tooManyResults, 'newOpportunity'=>$newOpportunity,
        'account_name'=>$account_name, 'account_id'=>$account_id, 'opportunity_name'=>$opportunity_name, 'stage_id'=>$stage_id, 'close_date'=>$close_date];

    if (Request::has('convertLead'))
    {
      // let's make sure we have all the data we need!
      if (empty($account_name) && empty($account_id))
      {
        $message='Account name or, if available, an existing account must be provided for conversion';

        Session::flash($messageType, $message);
        return View('lead/lead-conversion-form', $viewData);
      }


      if ($newOpportunity==1)
      {
        if (empty($opportunity_name))
          $message.='<li>Opportunity name field can not be blank';
        if (empty($stage_id))
          $message.='<li>Stage field can not be blank';
        if (empty($close_date))
          $message.='<li>Close date field can not be blank';

        if (!empty($message))
        {
          $message="There are some errors with your input: <ul>$message</ul>";
          Session::flash($messageType, $message);

          return View('lead/lead-conversion-form', $viewData);
        }
      }

      DB::beginTransaction();

      try
      {
        // create a new account
        if (empty($account_id)) // new account
        {
          $fields=$this->record->toArray();
          unset($fields['id']);
          unset($fields['email']);
          unset($fields['title']);
          unset($fields['first_name']);
          unset($fields['last_name']);
          unset($fields['company']);
          unset($fields['mobile_phone']);
          unset($fields['do_not_call']);
          unset($fields['do_not_email']);
          unset($fields['do_not_fax']);
          unset($fields['email_opt_out']);
          unset($fields['fax_opt_out']);
          unset($fields['birthdate']);
          unset($fields['salutation_id']);
          unset($fields['converted_at']);
          unset($fields['read_by_owner']);
          unset($fields['status_id']);

          unset($fields['created_at']);
          unset($fields['updated_at']);

          $fields['name']=$account_name;
          $fields['owner_id']=Auth::User()->id;
          $fields['adder_id']=Auth::User()->id;
          $fields['modifier_id']=Auth::User()->id;

          $account=Account::create($fields);
          $account_id=$account->id;
        }

        // create a new opportunity if requested
        if ($newOpportunity==1)
          $opportunity=Opportunity::create(['name'=>$opportunity_name, 'account_id'=>$account_id, 'stage_id'=>$stage_id, 'close_date'=>$close_date,
             'lead_source_id'=>$this->record->lead_source_id, 'owner_id'=>Auth::User()->id, 'adder_id'=>Auth::User()->id, 'modifier_id'=>Auth::User()->id]);

        // create contact
        $fields=$this->record->toArray();
        unset($fields['id']);
        unset($fields['company']);
        unset($fields['num_of_employees']);
        unset($fields['website']);
        unset($fields['annual_revenue']);
        unset($fields['birthdate']);
        unset($fields['status_id']);
        unset($fields['industry_id']);
        unset($fields['rating_id']);
        unset($fields['converted_at']);
        unset($fields['read_by_owner']);

        $fields['converted_lead_id']=$this->record->id;
        $fields['account_id']=$account_id;
        $fields['owner_id']=Auth::User()->id;
        $fields['adder_id']=Auth::User()->id;
        $fields['modifier_id']=Auth::User()->id;

        $contact=Contact::create($fields);

        // mark lead as converted
        $this->record->converted_at=date('Y-m-d H:i:s');
        $this->record->update();
      }
      catch (\Exception $e)
      {
        DB::rollback();
        return redirect('/lead/' . $this->record->id)->with('pageError', 'Lead conversion failed.');
      }

      if ( (empty($account_id) && empty($account)) || ($newOpportunity==1 && empty($opportunity)) || empty($contact) )
      {
        DB::rollback();
        return redirect('/lead/' . $this->record->id)->with('pageError', 'Lead conversion failed.');
      }
      else
      {
        DB::commit();
        return redirect('/contact/' . $contact->id)->with('pageSuccess', 'Lead converted successfully. Contact details are below.');
      }
    }

    return View('lead/lead-conversion-form', $viewData);
  }


  public function editOwner()
  {
    return View('lead/lead-edit-owner', ['record'=>$this->record]);
  }


  public function saveOwner()
  {
    $this->record->fillable(['owner_id', 'read_by_owner']);

    if ($this->record->owner_id != Request::input('owner_id'))
      $this->record->update(array_merge(Request::all(), ['read_by_owner'=>0]));

    return redirect('/lead/' . $this->record->id)->with('pageSuccess', 'Lead owner updated successfully.');
  }
}
