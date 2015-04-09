<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class ActivityController extends Controller
{
  use \App\ControllerHelperTrait;

  protected $record=null;

  protected $rules=[
        'subject'=>'required|min:3|max:75',
        'type_id'=>'required',
        'priority_id'=> 'required',
        'status_id'=>'required',
        'owner_id'=>'required',
      ];

  protected $messages=[
          'type_id.required' => 'The type field is required',
          'priority_id.required' => 'The priority field is required',
          'status_id.required' => 'The status field is required',
          'owner_id.required' => 'The owner field is required',
  ];

  public function __construct()
  {
    $this->middleware('auth');

    $this->loadFromDB();

    $this->relatedObj=null;
    $this->relates_to='';
    $this->related_type=strtolower(Request::input('related_type'));
    $this->related_id=Request::input('related_id');

    if (!empty($this->related_id))
      switch($this->related_type)
      {
        case 'lead': $this->relatedObj=DB::select('select concat(first_name, " ", last_name) as name from leads where id = ? limit 1', [$this->related_id]); break;
        case 'contact': $this->relatedObj=DB::select('select concat(first_name, " ", last_name) as name from contacts where id = ? limit 1', [$this->related_id]); break;
        case 'account': $this->relatedObj=DB::select('select name from accounts where id = ? limit 1', [$this->related_id]); break;
        case 'opportunity': $this->relatedObj=DB::select('select name from opportunities where id = ? limit 1', [$this->related_id]); break;
        default:
      }

    if (count($this->relatedObj))
    {
      $this->relatedObj=$this->relatedObj[0];

      $this->relates_to=ucfirst($this->related_type).' - '.$this->relatedObj->name;
    }
    else
    {
      $this->related_type='';
      $this->relates_to='';
      $this->related_id='';
    }
  }


  public function index()
  {
    list($recordList, $recordListPagination)=$this->indexPageSearch('activities', 'id, subject, related_type, end_date,
       (select value from lkp_activity_type where id=type_id) as type,
       (select value from lkp_activity_priority where id=priority_id) as priority,
       (select value from lkp_activity_status where id=status_id) as status,
      (select name from users where id=owner_id) as owner, created_at, updated_at');

    return View('activity/activity-index', ['recordList'=>$recordList, 'recordListPagination'=>$recordListPagination]);
  }


  public function create()
  {
    $this->record=new Activity();
    $this->record->owner_id=Auth::User()->id;

    $this->record->related_id=$this->related_id;
    $this->record->related_type=$this->related_type;

    return View('activity/activity-new', ['record'=>$this->record, 'relates_to'=>$this->relates_to]);
  }


  public function store()
  {
    $this->record=new Activity(array_merge(Request::all(), ['adder_id'=>Auth::User()->id, 'modifier_id'=>Auth::User()->id]));

    try
    {
      switch($this->related_type)
      {
        case 'lead': $this->relatedObj=new \App\Lead(); break;
        case 'contact': $this->relatedObj=new \App\Contact(); break;
        case 'account': $this->relatedObj=new \App\Account(); break;
        case 'opportunity': $this->relatedObj=new \App\Opportunity(); break;
        default:
      }

      $obj=$this->relatedObj->find($this->related_id);

      if ($this->validated())
        $obj->activities()->save($this->record);
    }
    catch (\Exception $e)
    {
      Session::flash('pageError', 'Error saving activity.'.$e->getMessage());
      return View('activity/activity-new', ['record'=>$this->record, 'relates_to'=>$this->relates_to]);
    }

    $redirectURL=Request::input('action') == 'saveNew' ? '/activity/create?related_type='.$this->related_type.'&related_id='.$this->related_id
                                                       : '/'.$this->related_type.'/' . $this->related_id;

    return redirect($redirectURL)->with('pageSuccess', 'Activity saved successfully.');
  }


  public function show()
  {
    $relates_to=str_replace('App\\','', $this->record->related_type);
    $relates_to_link='/'.strtolower($relates_to).'/'.$this->record->related_id;
    $this->relates_to='<a href="'.$relates_to_link.'">'.$relates_to. ' - '.
                       ($this->record->related->name ? $this->record->related->name : $this->record->related->first_name.' '.$this->record->related->last_name).'</a>';

    return View('activity/activity-view', ['record'=>$this->record, 'relates_to'=>$this->relates_to, 'relates_to_link'=>$relates_to_link]);
  }


  public function edit()
  {
    $this->relates_to=str_replace('App\\','', $this->record->related_type). ' - '.($this->record->related->name ? $this->record->related->name : $this->record->related->first_name.' '.$this->record->related->last_name);

    return View('activity/activity-edit', ['record'=>$this->record, 'relates_to'=>$this->relates_to]);
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
      Session::flash('pageError', 'Error saving activity.');
      return View('activity/activity-edit', ['record'=>new Activity(array_merge(Request::all(), ['id'=>$this->record->id]))]);
    }

    return redirect('/activity/' . $this->record->id)->with('pageSuccess', 'Activity updated successfully.');
  }


  public function destroy()
  {
    $retales_to_link='/'.strtolower(str_replace('App\\','', $this->record->related_type)).'/'.$this->record->related_id;

    $this->record->delete();

    return redirect($retales_to_link)->with('pageSuccess', 'Activity deleted successfully');
  }

}
