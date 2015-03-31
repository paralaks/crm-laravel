@extends('app')

@section('content')



<div class="container text-center">
  <form method="get" action="/opportunity/" role="form" class="form-inline" id="searchOpportunityForm">

    @include('partials/index-search-form-fields')

    <div class="form-group text-center">
      <input type="submit" name="searchOpportunities" id="searchOpportunities" value="Search" class="btn btn-primary btn-sm">
    </div>
    <div class="form-group text-center">
      <a href="/opportunity/create" class="btn btn-primary btn-sm">New Opportunity</a>
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
        <th>Account</th>
        <th>Probability</th>
        <th>Stage</th>
        <th>Next Stage</th>
        <th>Close Date</th>
        <th>Lead Source</th>
        <th>Owner</th>
        <th>Created Date/Time</th>
        <th>&nbsp;</th>
      </tr>
    @foreach ($recordList as $record)
      <tr>
        <td>{{ $record->name }}</td>
        <td>{{ $record->account }}</td>
        <td>{{ $record->probability }}</td>
        <td>{{ $record->stage }}</td>
        <td>{{ $record->next_step }}</td>
        <td>{{ $record->close_date }}</td>
        <td>{{ $record->lead_source }}</td>
        <td>{{ $record->owner }}</td>
        <td>{{ $record->created_at }}</td>
        <td class="text-small"><a href="/opportunity/{{ $record->id }}">View</a>&nbsp;&nbsp;&nbsp;<a href="/opportunity/{{ $record->id }}/edit">Edit</a></td>
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