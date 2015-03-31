<br>
<br>
<a name="accountActivityRelatedList"></a>
<div class="container">
  <div class="row relatedListStart">
    <div>Activity List</div><a href="/activity/create?related_type={{ $editPath }}&related_id={{ $record->id }}" class="btn btn-primary btn-xs">Add New Activity</a>
  </div>

@if ($activityList!==null)
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-condensed searchResults">
      <tr class="ui-state-default">
        <th>Subject</th>
        <th>Type</th>
        <th>Relates to</th>
        <th>Priority</th>
        <th colspan=2>Status</th>
        <th>Due/End Date</th>
        <th>Owner</th>
        <th>Created Date/Time</th>
        <th>Modified Date/Time</th>
        <th>&nbsp;</th>
      </tr>
      @if (count($activityList))
        @foreach ($activityList as $record)
          <tr class="@if ($record->status_id!=4) text-primary @if ($record->priority_id==1) danger text-info @elseif ($record->priority_id==2) warning @else success @endif @endif">
            <td>{{ $record->subject }}</td>
            <td>{{ \App\AppHelper::optionValueFromDB('lkp_activity_type', $record->type_id) }}</td>
            <td>{{ str_replace('App\\', '', $record->related_type) }}</td>
            <td>{{ \App\AppHelper::optionValueFromDB('lkp_activity_priority', $record->priority_id) }}</td>
            <td>{{ \App\AppHelper::optionValueFromDB('lkp_activity_status', $record->status_id) }}</td><td>@if ($record->status_id==4)<span class="glyphicon glyphicon-ok"></span>@endif</td>
            <td>{{ $record->end_date }}</td>
            <td>{{ \App\AppHelper::valueFromDB('users', $record->owner_id) }}</td>
            <td>{{ $record->created_at }}</td>
            <td>{{ $record->updated_at }}</td>
            <td class="text-small"><a href="/activity/{{ $record->id }}">View</a>&nbsp;&nbsp;&nbsp;<a href="/activity/{{ $record->id }}/edit">Edit</a></td>
          </tr>
        @endforeach
      @else
        <tr><td colspan="11">No records were found!</td>
      @endif
    </table>
  </div>
@endif
</div>