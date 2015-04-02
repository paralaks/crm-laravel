@extends('appnonav')

@section('content')

<h3 class="pageTitle">Select Account</h3>

<div class="container">
  <form id="editAccountForm" method="post" action="/account/searchChangeAccount" accept-charset="UTF-8" role="form" class="form-horizontal">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input name="_method" type="hidden" value="PATCH">

    <div class="form-group">
      <label for="name" class="control-label col-xs-4 text-right">&nbsp;Account Name:</label>
      <div class="col-xs-5"><input type="text" id="name" name="name" class="form-control" value="{{ $record->name }}"></div>
      <span class="col-xs-3 text-left"><input type="submit" value="Search" class="btn btn-primary btn-xs"></span>
    </div>
  </form>
  @if ($accountResults!==null)
  <div class="table-responsive">
    <table class="table table-bordered table-hover table-condensed searchResults">
    <tr><th>Searh Results:</th></tr>
      @if (count($accountResults))
        @foreach ($accountResults as $result)
          <tr><td><a href="javascript:void(0)" onclick="updateAccountParentWindow('{{ $result->id }}', '{{ $result->name }}')"> {{ $result->name }}</a></td></tr>
        @endforeach

        @if ($tooManyResults===true)
          <tr class="text-danger"><td><br>There were too many results. Please narrow your search to see all matching results.</td></tr>
        @endif
      @else
        <tr><td>No matching accounts were found.</td></tr>
      @endif
    </table>
  </div>
  @endif
</div>

@endsection
