<?php

namespace App\Http\Controllers;

use App\Contact;
use App\AppHelper;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;


class ContactController extends Controller
{
  use \App\ControllerHelperTrait;

  protected $record=null;

  protected $rules=[
    'first_name'=>'required|min:3|max:75',
    'last_name'=>'required|min:3|max:75',
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
    $recentViews=$this->recentViews('contact');

    list($recordList, $recordListPagination)=$this->indexPageSearch('contacts', 'id, email, first_name, salutation_id, last_name, title, state, country,
(select name from accounts where id=account_id) as account,
(select value from lkp_contact_type where id=type_id) as contact_type,
(select value from lkp_lead_source where id=lead_source_id) as lead_source,
(select name from users where id=owner_id) as owner, created_at');

    return View('contact/contact-index', ['recordList'=>$recordList, 'recentViews'=>$recentViews, 'recordListPagination'=>$recordListPagination]);
  }


  public function create()
  {
    $this->record=new Contact();
    $this->record->account_id=Request::input('account_id');
    $this->record->owner_id=Auth::User()->id;

    return View('contact/contact-new', ['record'=>$this->record]);
  }


  public function store()
  {
    $this->record=new Contact(array_merge(Request::all(), ['adder_id'=>Auth::User()->id, 'modifier_id'=>Auth::User()->id]));

    try
    {
      if ($this->validated())
        $this->record->save();
    }
    catch (\Exception $e)
    {
      Session::flash('pageError', 'Error saving contact.');
      return View('contact/contact-new', ['record'=>$this->record]);
    }

    $redirectURL=Request::input('action') == 'saveNew' ? '/contact/create' : '/contact/' . $this->record->id;

    return redirect($redirectURL)->with('pageSuccess', 'Contact saved successfully.');
  }


  public function show()
  {
    $activityList=$this->record->activities()->where('status_id', '!=', 4)->get();
    $activityListCompleted=$this->record->activities()->where('status_id', '=', 4)->get();

    $opportunityList=$this->record->opportunities;

    if (count($opportunityList))
      foreach($opportunityList as $opportunity)
      {
        $activityList=$activityList->merge($opportunity->activities()->where('status_id', '!=', 4)->get());
        $activityListCompleted=$activityListCompleted->merge($opportunity->activities()->where('status_id', '=', 4)->get());
      }

    $activityList=$activityList->merge($activityListCompleted);

    return View('contact/contact-view', ['record'=>$this->record, 'activityList'=>$activityList, 'editPath'=>'contact', 'opportunityList'=>$opportunityList]);
  }


  public function edit()
  {
    return View('contact/contact-edit', ['record'=>$this->record]);
  }


  public function update()
  {
    $this->record->guard(['_token', 'action', 'account_name', 'created_at', 'adder_id']);

    try
    {
      if ($this->validated())
        $this->record->update(Request::all());
    }
    catch (\Exception $e)
    {
      Session::flash('pageError', 'Error saving contact.');
      return View('contact/contact-edit', ['record'=>new Contact(array_merge(Request::all(), ['id'=>$this->record->id]))]);
    }

    return redirect('/contact/' . $this->record->id)->with('pageSuccess', 'Contact updated successfully.');
  }


  public function destroy()
  {
    $this->record->delete();

    return redirect('/contact')->with('pageSuccess', 'Contact deleted successfully');
  }


  public function editOwner()
  {
    return View('contact/contact-edit-owner', ['record'=>$this->record]);
  }


  public function saveOwner()
  {
    $this->record->fillable(['owner_id']);

    if ($this->record->owner_id != Request::input('owner_id'))
      $this->record->update(Request::all());

    return redirect('/contact/' . $this->record->id)->with('pageSuccess', 'Contact owner updated successfully.');
  }


}
