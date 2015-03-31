<br>
<br>
<a name="accountOpportunityRelatedList"></a>
<div class="container">
  <div class="row relatedListStart">
    <div>Opportunities</div><a href="/opportunity/create?account_id={{ $record->id }}" class="btn btn-primary btn-xs">Add New Opportunity</a>
  </div>

@if ($opportunityList!==null)
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-condensed searchResults">
      <tr class="ui-state-default">
        <th>Name</th>
        <th>Probability</th>
        <th>Stage</th>
        <th>Next Stage</th>
        <th>Close Date</th>
        <th>Lead Source</th>
        <th>Owner</th>
        <th>Created Date/Time</th>
        <th>&nbsp;</th>
      </tr>
      @if (count($opportunityList))
        @foreach ($opportunityList as $record)
        <tr>
          <td>{{ $record->name }}</td>
          <td>{{ $record->probability }}</td>
          <td>{{ \App\AppHelper::optionValueFromDB('lkp_opportunity_stage', $record->stage_id) }}</td>
          <td>{{ $record->next_step }}</td>
          <td>{{ $record->close_date }}</td>
          <td>{{ \App\AppHelper::optionValueFromDB('lkp_lead_source', $record->lead_source_id) }}</td>
          <td>{{ $record->owner->name }}</td>
          <td>{{ $record->created_at }}</td>
          <td class="text-small"><a href="/opportunity/{{ $record->id }}">View</a>&nbsp;&nbsp;&nbsp;<a href="/opportunity/{{ $record->id }}/edit">Edit</a></td>
        </tr>
        @endforeach
      @else
        <tr><td colspan="11">No records were found!</td>
      @endif
    </table>
  </div>
@endif
</div>