@extends('app')

@section('content')

<h3 class="pageTitle">New Activity</h3>



<div class="container rowHighlight">
  <form id="newActivityForm" method="post" action="/activity" accept-charset="UTF-8" role="form" class="form-horizontal">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="action" value="">

    @include('activity/activity-form-fields')

    <div class="form-group form-group-sm col-sm-12 text-center">
      <input type="button" value="Save" class="btn btn-primary" onClick="submitFormAction('newActivityForm', 'save')">
      <input type="button" value="Save & New" class="btn btn-primary" onClick="submitFormAction('newActivityForm', 'saveNew')">

      @if ($record->related_type)
        <a href="/{{ $record->related_type }}/{{ $record->related_id }}" class="btn btn-primary">Cancel</a>
      @else
        <a href="/activity" class="btn btn-primary">Cancel</a>
      @endif
    </div>

  </form>
</div>

@endsection
