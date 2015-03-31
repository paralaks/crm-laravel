@extends('app')

@section('content')

<h3 class="pageTitle">Opportunity Details</h3>



<div class="container lightBorder rowHighlight">

  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="name" class="text-right col-xs-4">&nbsp;Name:</label>
        <div class="col-xs-8">{{ $record->name }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="account_id" class="text-right col-xs-4">&nbsp;Account:</label>
        <div class="col-xs-8"><a href="/account/{{ $record->account_id }}">{{ \App\AppHelper::valueFromDB('accounts', $record->account_id) }}</a></div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="amount" class="text-right col-xs-4">&nbsp;Amount:</label>
        <div class="col-xs-8">{{ $record->amount }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="expected_revenue" class="text-right col-xs-4">&nbsp;Expected Revenue:</label>
        <div class="col-xs-8">{{ $record->expected_revenue }}</div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="stage_id" class="text-right col-xs-4">&nbsp;Stage:</label>
        <div class="col-xs-8">{{ \App\AppHelper::optionValueFromDB('lkp_opportunity_stage', $record->stage_id) }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="probability" class="text-right col-xs-4">&nbsp;Probability:</label>
        <div class="col-xs-8">{{ $record->probability }}</div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="type_id" class="text-right col-xs-4">&nbsp;Type:</label>
        <div class="col-xs-8">{{ \App\AppHelper::optionValueFromDB('lkp_opportunity_type', $record->type_id) }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="next_step" class="text-right col-xs-4">&nbsp;Next Step:</label>
        <div class="col-xs-8">{{ $record->next_step }}</div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="close_date" class="text-right col-xs-4">&nbsp;Close Date:</label>
        <div class="col-xs-8">{{ $record->close_date }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="lead_source_id" class="text-right col-xs-4">&nbsp;Lead Source:</label>
        <div class="col-xs-8">{{ \App\AppHelper::optionValueFromDB('lkp_lead_source', $record->lead_source_id) }}</div>
      </div>
    </div>
  </div>


  <div class="row">
    <label for="competitors" class="text-right col-xs-4 col-sm-2">&nbsp;Competitors:</label>
    <div class="col-xs-8 col-sm-10">{{ $record->competitors }}</div>
  </div>


  @include('partials/desc-owner-timestamps')


  <div class="row">
    <form id="deleteOpportunityForm"  method="post" action="/opportunity/{{ $record->id }}" accept-charset="UTF-8" role="form" class="form-horizontal">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input name="_method" type="hidden" value="DELETE">
      <div class="form-group form-group-sm">
        <div class="col-xs-12 text-center">
          <a href="/opportunity/{{ $record->id }}/edit" class="btn btn-primary">Edit</a>
          <input type="button" value="Delete" class="btn btn-primary" onClick="if (confirm('Are you sure you want to delete this record?')) document.getElementById('deleteOpportunityForm').submit()">
        </div>
      </div>
    </form>
  </div>
</div>


@include('activity/activity-related-list')


@endsection
