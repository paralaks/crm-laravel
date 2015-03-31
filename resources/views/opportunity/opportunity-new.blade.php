@extends('app')

@section('content')

<h3 class="pageTitle">New Opportunity</h3>



<div class="container rowHighlight">
  <form id="newOpportunityForm" method="post" action="/opportunity" accept-charset="UTF-8" role="form" class="form-horizontal">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="action" value="">

    @include('opportunity/opportunity-form-fields')

    <div class="form-group form-group-sm col-sm-12 text-center">
      <input type="button" value="Save" class="btn btn-primary" onClick="submitFormAction('newOpportunityForm', 'save')">
      <input type="button" value="Save & New" class="btn btn-primary" onClick="submitFormAction('newOpportunityForm', 'saveNew')">
      <a href="/opportunity" class="btn btn-primary">Cancel</a>
    </div>

  </form>
</div>

@endsection
