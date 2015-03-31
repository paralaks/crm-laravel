@extends('app')

@section('content')



<div class="container text-center">
  <form method="get" action="/account/" role="form" class="form-inline" id="searchAccountForm">

    @include('partials/index-search-form-fields')

    <div class="form-group text-center">
      <input type="submit" name="searchAccounts" id="searchAccounts" value="Search" class="btn btn-primary btn-sm">
    </div>
    <div class="form-group text-center">
      <a href="/account/create" class="btn btn-primary btn-sm">New Account</a>
    </div>
  </form>
</div>

@include('partials/index-history-list')

<div class="container">
@if ($recordList!==null)
  @if (count($recordList))
  <br>
  <div class="table-responsive">

    <table class="table table-striped table-bordered table-hover table-condensed searchResults">
      <tr class="ui-state-default">
        <th>Name</th>
        <th>Account Number</th>
        <th>State</th>
        <th>Country</th>
        <th>Account Type</th>
        <th>Lead Source</th>
        <th>Owner</th>
        <th>Created Date/Time</th>
        <th>&nbsp;</th>
      </tr>
    @foreach ($recordList as $record)
      <tr>
        <td>{{ $record->name }}</td>
        <td>{{ $record->number }}</td>
        <td>{{ $record->state }}</td>
        <td>{{ \App\AppHelper::optionValueCountry($record->country) }}</td>
        <td>{{ $record->account_type }}</td>
        <td>{{ $record->lead_source }}</td>
        <td>{{ $record->owner }}</td>
        <td>{{ $record->created_at }}</td>
        <td class="text-small"><a href="/account/{{ $record->id }}">View</a>&nbsp;&nbsp;&nbsp;<a href="/account/{{ $record->id }}/edit">Edit</a></td>
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