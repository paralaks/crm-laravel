@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-info">
				<div class="panel-heading">Home</div>
				<div class="panel-body">
					Hello, {{ Auth::user()->name }}!
				</div>
			</div>
		</div>
	</div>
</div>

<br>
@if ($activityList!==null)
<div class="container">
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-condensed searchResults">
    <tr class="ui-state-default">
      <th colspan="10">Your open activities</th>
    </tr>
    <tr class="ui-state-default">
        <th>Subject</th>
        <th>Type</th>
        <th>Relates to</th>
        <th>Priority</th>
        <th colspan=2>Status</th>
        <th>Due/End Date</th>
        <th>Created Date/Time</th>
        <th>Modified Date/Time</th>
        <th>&nbsp;</th>
      </tr>
      @if (count($activityList))
        @foreach ($activityList as $record)
          <tr class="@if ($record->status_id!=4) text-primary @if ($record->priority_id==1) text-danger @elseif ($record->priority_id==2) text-warning @endif @endif">
            <td>{{ $record->subject }}</td>
            <td>{{ \App\AppHelper::optionValueFromDB('lkp_activity_type', $record->type_id) }}</td>
            <td>{{ str_replace('App\\', '', $record->related_type) }}</td>
            <td>{{ \App\AppHelper::optionValueFromDB('lkp_activity_priority', $record->priority_id) }}</td>
            <td>{{ \App\AppHelper::optionValueFromDB('lkp_activity_status', $record->status_id) }}</td><td>@if ($record->status_id==4)<span class="glyphicon glyphicon-ok"></span>@endif</td>
            <td>{{ $record->end_date }}</td>
            <td>{{ $record->created_at }}</td>
            <td>{{ $record->updated_at }}</td>
            <td class="text-small"><a href="/activity/{{ $record->id }}">View</a>&nbsp;&nbsp;&nbsp;<a href="/activity/{{ $record->id }}/edit">Edit</a></td>
          </tr>
        @endforeach
      @else
        <tr><td colspan="11"><strong>No records were found!</strong></td>
      @endif
    </table>
  </div>
</div>
@endif

@include('partials/index-history-list')

@endsection


