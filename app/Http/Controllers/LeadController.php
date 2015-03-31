<?php

namespace App\Http\Controllers;

use App\Lead;
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

  protected $validationRules=[
        'first_name'=>'required|min:3|max:75',
        'last_name'=>'required|min:3|max:75',
        'company'=> 'required|min:3|max:75',
        'email'=>'required|min:6|max:255',
        'lead_source_id'=>'required',
        'owner_id'=>'required',
      ];

  protected $validationMessages=[
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

     $activityList=$this->getActivityList();

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


  public function editConvert()
  {
    return redirect('/lead/'.$this->record->id)->with('pageError', 'Conversion feature has not been implemented yet!');
  }


  public function convert()
  {
    Session::flash('pageWarning', 'This feature has not been implemented yet!');

    return redirec('lead/lead-edit-owner', ['record'=>$this->record]);
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
