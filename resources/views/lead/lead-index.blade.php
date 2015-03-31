@extends('app')

@section('content')



<div class="container text-center">
  <form method="get" action="/lead/" role="form" class="form-inline" id="searchLeadForm">

    @include('partials/index-search-form-fields')

    <div class="form-group text-center">
      <input type="submit" name="searchLeads" id="searchLeads" value="Search" class="btn btn-primary btn-sm">
    </div>
    <div class="form-group text-center">
      <a href="/lead/create" class="btn btn-primary btn-sm">New Lead</a>
    </div>
  </form>
</div>

@include('partials/index-history-list')

<div class="container">
@if ($recordList!==null)
  <br>
  @if (count($recordList))
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-condensed searchResults">
      <tr class="ui-state-default">
        <th>Name</th>
        <th>Email</th>
        <th>Title</th>
        <th>Company</th>
        <th>State</th>
        <th>Country</th>
        <th>Status</th>
        <th>Lead Source</th>
        <th>Owner</th>
        <th>Created Date/Time</th>
        <th>Owner Read?</th>
        <th>&nbsp;</th>
      </tr>
    @foreach ($recordList as $record)
      <tr>
        <td>{{ \App\AppHelper::optionValueFromDB('lkp_salutation', $record->salutation_id) }} {{ $record->first_name }} {{ $record->last_name }}</td>
        <td>{{ $record->email }}</td>
        <td>{{ $record->title }}</td>
        <td>{{ $record->company }}</td>
        <td>{{ $record->state }}</td>
        <td>{{ \App\AppHelper::optionValueCountry($record->country) }}</td>
        <td>{{ $record->lead_status }}</td>
        <td>{{ $record->lead_source }}</td>
        <td>{{ $record->owner }}</td>
        <td>{{ $record->created_at }}</td>
        <td class="text-center">@if ($record->read_by_owner==1) <span class="glyphicon glyphicon-ok"></span> @endif</td>
        <td class="text-small"><a href="/lead/{{ $record->id }}">View</a>&nbsp;&nbsp;&nbsp;<a href="/lead/{{ $record->id }}/edit">Edit</a></td>
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