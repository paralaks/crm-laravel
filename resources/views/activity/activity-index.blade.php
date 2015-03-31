@extends('app')

@section('content')



<div class="container text-center">
  <form method="get" action="/activity/" role="form" class="form-inline" id="searchActivityForm">
    <div class="form-group">
      <div class="input-group input-group-sm">
        <span class="input-group-addon ui-state-default">From</span>
        <input type="text" id="dateFrom" name="dateFrom" class="form-control" value="{{ Request::input('dateFrom') }}">
      </div>
    </div>
    <div class="form-group">
      <div class="input-group input-group-sm">
        <span class="input-group-addon ui-state-default">To</span>
        <input type="text" id="dateTo" name="dateTo" class="form-control" value="{{ Request::input('dateTo') }}">
      </div>
    </div>
    <div class="form-group">
      <div class="input-group input-group-sm">
        <span class="input-group-addon ui-state-default">Interval</span>
        <select id="intervalDate" name="intervalDate" class="form-control">
          {!! \App\AppHelper::optionListFrom('<option value=""></option>
          <option value="createdToday">Created Today</option>
          <option value="modifiedToday">Modified Today</option>
          <option value="createdThisWeek">Created This Week</option>
          <option value="modifiedThisWeek">Modified This Week</option>', Request::input('intervalDate')) !!}
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="input-group input-group-sm">
        <span class="input-group-addon ui-state-default">Owner</span>
        <select id="ownerId" name="ownerId" class="form-control">
          {!! \App\AppHelper::optionListFrom('<option value=""></option>
          <option value="1">Me</option>
          <option value="2">Anyone</option>', Request::input('ownerId')) !!}
        </select>
      </div>
    </div>
    <div class="form-group text-center">
      <input type="submit" name="searchActivitys" id="searchActivitys" value="Search" class="btn btn-primary btn-sm">
    </div>
    <div class="form-group text-center">
      <a href="/activity/create" class="btn btn-primary btn-sm">New Activity</a>
    </div>
  </form>
</div>


<div class="container">
@if ($recordList!==null)
  <br>
  @if (count($recordList))
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-condensed searchResults">
      <tr class="ui-state-default">
        <th>Subject</th>
        <th>Type</th>
        <th>Relates to</th>
        <th>Priority</th>
        <th>Status</th>
        <th>Due/End Date</th>
        <th>Owner</th>
        <th>Created Date/Time</th>
        <th>Modified Date/Time</th>
        <th>&nbsp;</th>
      </tr>
    @foreach ($recordList as $record)
      <tr>
        <td>{{ $record->subject }}</td>
        <td>{{ $record->type }}</td>
        <td>{{ str_replace('App\\', '', $record->related_type) }}</td>
        <td>{{ $record->priority }}</td>
        <td>{{ $record->status }}</td>
        <td>{{ $record->end_date }}</td>
        <td>{{ $record->owner }}</td>
        <td>{{ $record->created_at }}</td>
        <td>{{ $record->updated_at }}</td>
        <td class="text-small"><a href="/activity/{{ $record->id }}">View</a>&nbsp;&nbsp;&nbsp;<a href="/activity/{{ $record->id }}/edit">Edit</a></td>
      </tr>
    @endforeach
    </table>

    {!! $recordListPagination !!}

  </div>
  @else
  <div class="alert alert-warning alert-dismissable text-center">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    No records were found!
  </div>
  @endif
@endif
</div>

@endsection