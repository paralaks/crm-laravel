<a name="relatedListContacts"></a>
<div class="container">
  <div class="row relatedListStart">
    <div>Contacts</div><a href="/contact/create?account_id={{ $record->id }}" class="btn btn-primary btn-xs">Add New Contact</a>
  </div>

@if ($contactList!==null)
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-condensed searchResults">
      <tr class="ui-state-default">
        <th>Name</th>
        <th>Email</th>
        <th>Title</th>
        <th>State</th>
        <th>Country</th>
        <th>Contact Type</th>
        <th>Lead Source</th>
        <th>Owner</th>
        <th>Created Date/Time</th>
        <th>&nbsp;</th>
      </tr>
      @if (count($contactList))
        @foreach ($contactList as $record)
        <tr>
          <td>{{ \App\AppHelper::optionValueFromDB('lkp_salutation', $record->salutation_id) }} {{ $record->first_name }} {{ $record->last_name }}</td>
          <td>{{ $record->email }}</td>
          <td>{{ $record->title }}</td>
          <td>{{ $record->state }}</td>
          <td>{{ \App\AppHelper::optionValueCountry($record->country) }}</td>
          <td>{{ \App\AppHelper::optionValueFromDB('lkp_contact_type', $record->type_id) }}</td>
          <td>{{ \App\AppHelper::optionValueFromDB('lkp_lead_source', $record->lead_source_id) }}</td>
          <td>{{ $record->owner->name }}</td>
          <td>{{ $record->created_at }}</td>
          <td class="text-small"><a href="/contact/{{ $record->id }}">View</a>&nbsp;&nbsp;&nbsp;<a href="/contact/{{ $record->id }}/edit">Edit</a></td>
        </tr>
        @endforeach
      @else
        <tr><td colspan="11">No records were found!</td>
      @endif
    </table>
  </div>
@endif
</div>