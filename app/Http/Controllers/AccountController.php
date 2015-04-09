<?php

namespace App\Http\Controllers;

use App\Account;
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

class AccountController extends Controller
{
  use \App\ControllerHelperTrait;

  protected $record=null;

  protected $rules=[
    'name'=> 'required|min:3|max:75',
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
    $recentViews=$this->recentViews('account');

    list($recordList, $recordListPagination)=$this->indexPageSearch('accounts', 'id, name, number, state, country,
(select value from lkp_account_type where id=type_id) as account_type,
(select value from lkp_lead_source where id=lead_source_id) as lead_source,
(select name from users where id=owner_id) as owner, created_at');

    return View('account/account-index', ['recordList'=>$recordList, 'recentViews'=>$recentViews, 'recordListPagination'=>$recordListPagination]);
  }


  public function create()
  {
    $this->record=new Account();
    $this->record->owner_id=Auth::User()->id;

    return View('account/account-new', ['record'=>$this->record]);
  }


  public function store()
  {
    $this->record=new Account(array_merge(Request::all(), ['adder_id'=>Auth::User()->id, 'modifier_id'=>Auth::User()->id]));

    try
    {
      if ($this->validated())
        $this->record->save();
    }
    catch (\Exception $e)
    {
      Session::flash('pageError', 'Error saving account.');
      return View('account/account-new', ['record'=>$this->record]);
    }

    $redirectURL=Request::input('action') == 'saveNew' ? '/account/create' : '/account/' . $this->record->id;

    return redirect($redirectURL)->with('pageSuccess', 'Account saved successfully.');
  }


  public function show()
  {
    // activities in account
    $activityList=$this->record->activities()->where('status_id', '!=', 4)->get();
    $activityListCompleted=$this->record->activities()->where('status_id', '=', 4)->get();

    // contacts
    $contactList=$this->record->contacts;


    if (count($this->record->contacts))
      foreach($this->record->contacts as $contact)
      {
        // activities in account contacts
        $activityList=$activityList->merge($contact->activities()->where('status_id', '!=', 4)->get());
        $activityListCompleted=$activityListCompleted->merge($contact->activities()->where('status_id', '=', 4)->get());

        // contact opportunities
        $opportunityList=$contact->opportunities;
        //activities in contact opportunities
        if (count($opportunityList))
          foreach($opportunityList as $opportunity)
          {
            $activityList=$activityList->merge($opportunity->activities()->where('status_id', '!=', 4)->get());
            $activityListCompleted=$activityListCompleted->merge($opportunity->activities()->where('status_id', '=', 4)->get());
          }

      }

    $activityList=$activityList->merge($activityListCompleted);

    return View('account/account-view', ['record'=>$this->record, 'activityList'=>$activityList, 'editPath'=>'account', 'contactList'=>$contactList]);
  }


  public function edit()
  {
    return View('account/account-edit', ['record'=>$this->record]);
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
      Session::flash('pageError', 'Error saving account.');
      return View('account/account-edit', ['record'=>new Account(array_merge(Request::all(), ['id'=>$this->record->id]))]);
    }

    return redirect('/account/' . $this->record->id)->with('pageSuccess', 'Account updated successfully.');
  }


  public function destroy()
  {
    $this->record->delete();

    return redirect('/account')->with('pageSuccess', 'Account deleted successfully');
  }


  public function editOwner()
  {
    return View('account/account-edit-owner', ['record'=>$this->record]);
  }


  public function saveOwner()
  {
    $this->record->fillable(['owner_id']);

    if ($this->record->owner_id != Request::input('owner_id'))
      $this->record->update(Request::all());

    return redirect('/account/' . $this->record->id)->with('pageSuccess', 'Account owner updated successfully.');
  }


  public function showChangeAccount()
  {
    $this->record=new Account();

    return View('account/account-change-helper', ['record'=>$this->record, 'accountResults'=>null, 'tooManyResults'=>false]);
  }

  public function searchChangeAccount()
  {
    $this->record=new Account();
    $this->record->name=Request::input('name', '');

    $accountResults=DB::select('select id, name from accounts where name like ? limit 26 ', ['%'.$this->record->name.'%']);

    $tooManyResults=false;
    if (count($accountResults) == 26)
    {
      $tooManyResults=true;
      unset($accountResults[25]);
    }

    return View('account/account-change-helper', ['record'=>$this->record, 'accountResults'=>$accountResults, 'tooManyResults'=>$tooManyResults]);
  }
}
