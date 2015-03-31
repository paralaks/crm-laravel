@extends('app')

@section('content')



<div class="container text-center">
  <form method="get" action="/contact/" role="form" class="form-inline" id="searchContactForm">

    @include('partials/index-search-form-fields')

    <div class="form-group text-center">
      <input type="submit" name="searchContacts" id="searchContacts" value="Search" class="btn btn-primary btn-sm">
    </div>
    <div class="form-group text-center">
      <a href="/contact/create" class="btn btn-primary btn-sm">New Contact</a>
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
        <th>Account</th>
        <th>State</th>
        <th>Country</th>
        <th>Contact Type</th>
        <th>Lead Source</th>
        <th>Owner</th>
        <th>Created Date/Time</th>
        <th>&nbsp;</th>
      </tr>
    @foreach ($recordList as $record)
      <tr>
        <td>{{ \App\AppHelper::optionValueFromDB('lkp_salutation', $record->salutation_id) }} {{ $record->first_name }} {{ $record->last_name }}</td>
        <td>{{ $record->email }}</td>
        <td>{{ $record->title }}</td>
        <td>{{ $record->account }}</td>
        <td>{{ $record->state }}</td>
        <td>{{ \App\AppHelper::optionValueCountry($record->country) }}</td>
        <td>{{ $record->contact_type }}</td>
        <td>{{ $record->lead_source }}</td>
        <td>{{ $record->owner }}</td>
        <td>{{ $record->created_at }}</td>
        <td class="text-small"><a href="/contact/{{ $record->id }}">View</a>&nbsp;&nbsp;&nbsp;<a href="/contact/{{ $record->id }}/edit">Edit</a></td>
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