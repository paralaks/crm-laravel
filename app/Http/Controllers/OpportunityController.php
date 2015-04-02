<?php

namespace App\Http\Controllers;

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

class OpportunityController extends Controller
{
  use \App\ControllerHelperTrait;

  protected $record=null;

  protected $rules=[
    'name'=>'required|min:3|max:75',
    'stage_id'=>'required',
    'close_date'=> 'required',
    'lead_source_id'=>'required',
    'owner_id'=>'required',
  ];

  protected $messages=[
    'stage_id.required' => 'The stage field is required',
    'close_date.required' => 'The close date field is required',
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
    $recentViews=$this->recentViews('opportunity');

    list($recordList, $recordListPagination)=$this->indexPageSearch('opportunities', 'id, name, close_date, probability, next_step,
(select value from lkp_opportunity_stage where id=stage_id) as stage,
(select value from lkp_lead_source where id=lead_source_id) as lead_source,
(select name from accounts where id=account_id) as account,
(select name from users where id=owner_id) as owner, created_at');

    return View('opportunity/opportunity-index', ['recordList'=>$recordList, 'recentViews'=>$recentViews, 'recordListPagination'=>$recordListPagination]);
  }


  public function create()
  {
    $this->record=new Opportunity();
    $this->record->account_id=Request::input('account_id');
    $this->record->owner_id=Auth::User()->id;

    return View('opportunity/opportunity-new', ['record'=>$this->record]);
  }


  public function store()
  {
    $this->record=new Opportunity(array_merge(Request::all(), ['adder_id'=>Auth::User()->id, 'modifier_id'=>Auth::User()->id]));

    try
    {
      if ($this->validated())
        $this->record->save();
    }
    catch (\Exception $e)
    {
      Session::flash('pageError', 'Error saving opportunity.');
      return View('opportunity/opportunity-new', ['record'=>$this->record]);
    }

    $redirectURL=Request::input('action') == 'saveNew' ? '/opportunity/create' : '/opportunity/' . $this->record->id;

    return redirect($redirectURL)->with('pageSuccess', 'Opportunity saved successfully.');
  }


  public function show()
  {
    $activityList=$this->relatedActivityList();

    return View('opportunity/opportunity-view', ['record'=>$this->record, 'activityList'=>$activityList, 'editPath'=>'opportunity']);
  }


  public function edit()
  {
    return View('opportunity/opportunity-edit', ['record'=>$this->record]);
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
      Session::flash('pageError', 'Error saving opportunity.');
      return View('opportunity/opportunity-edit', ['record'=>new Opportunity(array_merge(Request::all(), ['id'=>$this->record->id]))]);
    }

    return redirect('/opportunity/' . $this->record->id)->with('pageSuccess', 'Opportunity updated successfully.');
  }


  public function destroy()
  {
    $this->record->delete();

    return redirect('/opportunity')->with('pageSuccess', 'Opportunity deleted successfully');
  }


  public function editOwner()
  {
    return View('opportunity/opportunity-edit-owner', ['record'=>$this->record]);
  }


  public function saveOwner()
  {
    $this->record->fillable(['owner_id']);

    if ($this->record->owner_id != Request::input('owner_id'))
      $this->record->update(Request::all());

    return redirect('/opportunity/' . $this->record->id)->with('pageSuccess', 'Opportunity owner updated successfully.');
  }
}
