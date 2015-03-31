@extends('app')

@section('content')

<h3 class="pageTitle">New Lead</h3>



<div class="container rowHighlight">
  <form id="newLeadForm" method="post" action="/lead" accept-charset="UTF-8" role="form" class="form-horizontal">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="action" value="">

    @include('lead/lead-form-fields')

    <div class="form-group form-group-sm col-sm-12 text-center">
      <input type="button" value="Save" class="btn btn-primary" onClick="submitFormAction('newLeadForm', 'save')">
      <input type="button" value="Save & New" class="btn btn-primary" onClick="submitFormAction('newLeadForm', 'saveNew')">
      <a href="/lead" class="btn btn-primary">Cancel</a>
    </div>

  </form>
</div>

@endsection
