<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

trait ControllerHelperTrait
{
  public function loadFromDB()
  {
    if (php_sapi_name() != 'cli') // php artisan route:list gets broken otherwise
      $this->beforeFilter(function ()
      {
        $uri=explode('/', Route::getCurrentRoute()->uri());

        if (count($uri)<2)
          return;

        $routeName=$uri[0];

        $routeParameters=Route::getCurrentRoute()->parameters();
        $routeValue=array_shift($routeParameters);

        if($routeValue)
          try
          {
            $this->record=call_user_func(array('\App\\'.ucfirst($routeName), 'withTrashed'))->find($routeValue);

            if ($this->record===null)
              throw new \Exception('Record could not be found for given id in database');

            if ($this->record->trashed())
              return redirect($routeName)->with('pageWarning', 'You tried to access a '.$routeName.' which was deleted on ' . str_ireplace(' ', ' at ', $this->record->deleted_at));

            if ($routeName=='lead' && $this->record->converted_at)
              return redirect($routeName)->with('pageWarning', 'You tried to access a '.$routeName.' which was converted on ' . str_ireplace(' ', ' at ', $this->record->converted_at));

            $user=User::find(Auth::User()->id);
            $history= empty($user->recent_items) ? [] :  unserialize($user->recent_items);

            if (!in_array($routeName.'-'.$routeValue, $history))
              array_unshift($history, $routeName.'-'.$routeValue);

            if (count($history) > 30)
              array_pop($history);

            $user->recent_items=serialize($history);
            $user->update();
          }
          catch (\Exception $e)
          {
            return redirect($routeName)->with('pageError', $routeName.' record could not be found in database.'.$e->getTraceAsString());
          }
      });
  }

  public function recentViews($pRouteName=null)
  {
    $history=[];

    if (Request::has('searchLeads') || Request::has('searchContacts') || Request::has('searchAccounts') || Request::has('searchOpportunities'))
      return null;

    $user=User::find(Auth::User()->id);

    if (empty($user->recent_items))
      return $history;

    $recent_items=unserialize($user->recent_items);

    foreach($recent_items as $item)
    {
      list($routeName, $id)=explode('-', $item);

      if ( !empty($pRouteName) && ($pRouteName!=$routeName))
        continue;

      $dbItem=call_user_func(array('\App\\'.ucfirst($routeName), 'withTrashed'))->find($id);

      if ($dbItem==null || $dbItem->trashed() || ($routeName=='lead' && $dbItem->converted_at))
        continue;

      switch($routeName)
      {
        case 'lead':
        case 'contact':
          $history[]=['route'=>$routeName, 'id'=>$id, 'name'=>$dbItem->first_name.' '.$dbItem->last_name];
        break;
        case 'activity':
          $history[]=['route'=>$routeName, 'id'=>$id, 'name'=>$dbItem->subject];
        break;
        default:
          $history[]=['route'=>$routeName, 'id'=>$id, 'name'=>$dbItem->name];
      }
    }

    return $history;
  }

  public function indexPageSearch($pTable, $pSelects)
  {
    $recordList=DB::table($pTable)->select(DB::raw($pSelects));

    $from=null;
    $to=null;
    $owner=null;

    $submitName='search'.ucfirst($pTable);

    if (Request::has($submitName))
    {
      if (Request::has('searchName'))
      {
        switch ($pTable)
        {
          case 'leads':
          case 'contacts':
            $recordList=$recordList->where(function ($query)
              {
                $query->where('first_name', 'like', '%'.Request::input('searchName').'%')->orWhere('first_name', 'like', '%'.Request::input('searchName').'%');
              }
            );
            break;

          case 'tasks':
            $recordList=$recordList->where('subject', 'like', '%'.Request::input('searchName').'%');
          default:
            $recordList=$recordList->where('name', 'like', '%'.Request::input('searchName').'%');
        }
      }

      $from=Request::input('dateFrom');
      $to=Request::input('dateTo');

      if (empty($from))
        $from=null;
      if (empty($to))
        $to=null;

      if (in_array(Request::input('intervalDate'), ['createdThisWeek','modifiedThisWeek']))
      {
        $from=date('Y-m-d', mktime(0, 0, 0, date('m'), date('j') - date('w'), date('Y')));
        $to=date('Y-m-d');
      }

      if ($from !== null)
        $recordList=$recordList->where('created_at', '>=', "$from 00:00:00");

      if ($to !== null)
        $recordList=$recordList->where('created_at', '<=', "$to 23:59:59");

      if (Request::input('ownerId') == 1)
        $owner=Auth::User()->id;

      if ($owner !== null)
        $recordList=$recordList->where('owner_id', '=', $owner);
    }
    else
      $recordList=$recordList->where('created_at', '>=', date('Y-m-d').' 00:00:00')->where('created_at', '<=', date('Y-m-d').' 00:00:00')->where('owner_id', '=', Auth::User()->id);

    $appendList=[
      'searchName'=>Request::input('searchName'),
      'dateFrom'=>Request::input('dateFrom'),
      'dateTo'=>Request::input('dateTo'),
      'intervalDate'=>Request::input('intervalDate'),
      'ownerId'=>Request::input('ownerId'),
      $submitName=>'Search'
    ];

    $path='';
    switch($pTable)
    {
      case 'opportunities' : $path='opportunity'; break;
      case 'activities' : $path='activity'; break;
      default:
        $path='/'.substr($pTable,0,strlen($pTable)-1);
    }

    if ($pTable=='leads')
      $recordList=$recordList->whereNull('deleted_at')->whereNull('converted_at')->simplePaginate(30);
    else
      $recordList=$recordList->whereNull('deleted_at')->simplePaginate(30);

    $recordList->setPath($path);
    $recordListPagination=$recordList->appends($appendList)->render();

    if (!Request::has($submitName) && count($recordList) == 0)
      $recordList=null;

    return [$recordList, $recordListPagination];
  }


  public function validated()
  {
    $v=Validator::make(Request::all(), $this->rules, $this->messages);

    if ($v->fails())
    {
      Session::flash('errors', $v->errors());
      throw new \Exception('Save error');
    }

    return true;
  }


  function relatedActivityList()
  {
    $activityList=$this->record->activities()->where('status_id', '!=', 4)->get();
    $activityList=$activityList->merge($this->record->activities()->where('status_id', '=', 4)->get());

    return $activityList;
  }


  function accountSearchResult($pName, $pLimit=25)
  {
    if (empty($pName))
      return [[], false];

    $pLimit=intVal($pLimit);
    $pLimit++;

    $accountList=DB::select('select id, name from accounts where name like ? limit '.$pLimit, ['%'.$pName.'%']);

    $tooManyResults=false;
    if (count($accountList) == $pLimit)
    {
      $tooManyResults=true;
      unset($accountList[$pLimit-1]);
    }

    return [$accountList, $tooManyResults];
  }
}
