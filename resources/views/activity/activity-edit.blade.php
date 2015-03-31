@extends('app')

@section('content')

<h3 class="pageTitle">Edit Activity</h3>



<div class="container rowHighlight">
  <form id="editActivityForm" method="post" action="/activity/{{ $record->id }}" accept-charset="UTF-8" role="form" class="form-horizontal">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input name="_method" type="hidden" value="PATCH">

    @include('activity/activity-form-fields')

    <hr class="soften" />
      <div class="form-group form-group-sm col-sm-12 text-center">
      <input type="submit" value="Save" class="btn btn-primary">
      <a href="/activity/{{ $record->id }}" class="btn btn-primary">Cancel</a>
    </div>

  </form>
</div>

@endsection
