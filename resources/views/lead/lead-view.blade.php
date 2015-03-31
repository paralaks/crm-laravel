@extends('app')

@section('content')

<h3 class="pageTitle">Lead Details</h3>



<div class="container lightBorder rowHighlight">

  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="name" class="text-right col-xs-4">&nbsp;Name:</label>
        <div class="col-xs-8">{{ \App\AppHelper::optionValueFromDB('lkp_salutation', $record->salutation_id) }} {{ $record->first_name.' '.$record->last_name }}</div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="company" class="text-right col-xs-4">&nbsp;Company:</label>
        <div class="col-xs-8">{{ $record->company }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="title" class="text-right col-xs-4">&nbsp;Title:</label>
        <div class="col-xs-8">{{ $record->title }}</div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="industy" class="text-right col-xs-4">&nbsp;Industry:</label>
        <div class="col-xs-8">{{ \App\AppHelper::optionValueFromDB('lkp_industry', $record->industry_id) }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="email" class="text-right col-xs-4">&nbsp;Email:</label>
        <div class="col-xs-8">{{ $record->email }}</div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="phone" class="text-right col-xs-4">&nbsp;Phone:</label>
        <div class="col-xs-8">{{ $record->phone }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="mobile_phone" class="text-right col-xs-4">&nbsp;Mobile Phone:</label>
        <div class="col-xs-8">{{ $record->mobile_phone }}</div>
      </div>
    </div>
  </div>



  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="fax" class="text-right col-xs-4">&nbsp;Fax:</label>
        <div class="col-xs-8">{{ $record->fax }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="rating" class="text-right col-xs-4">&nbsp;Rating:</label>
        <div class="col-xs-8">{{ \App\AppHelper::optionValueFromDB('lkp_rating', $record->rating_id) }}</div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="annual_revenue" class="text-right col-xs-4">&nbsp;Annual Rev.:</label>
        <div class="col-xs-8">{{ $record->annual_revenue }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="num_of_employees" class="text-right col-xs-4">&nbsp;Num. of Employees:</label>
        <div class="col-xs-8">{{ $record->num_of_employees }}</div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="website" class="text-right col-xs-4">&nbsp;Website:</label>
        <div class="col-xs-8">{{ $record->website }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="birthdate" class="text-right col-xs-4">&nbsp;Birth date:</label>
        <div class="col-xs-8">{{ $record->birthdate }}</div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="lead_source_id" class="text-right col-xs-4">&nbsp;Lead Source:</label>
        <div class="col-xs-8">{{ \App\AppHelper::optionValueFromDB('lkp_lead_source', $record->lead_source_id) }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="status_id" class="text-right col-xs-4">&nbsp;Lead Status:</label>
        <div class="col-xs-8">{{ \App\AppHelper::optionValueFromDB('lkp_lead_status', $record->status_id) }}</div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-xs-6 col-sm-3 col-md-2 col-md-offset-1 text-nowrap">
      <label for="do_not_call" class="text-right">&nbsp;Do Not Call:</label>&nbsp;&nbsp;<span class="glyphicon glyphicon-@if ($record->do_not_call){{ 'ok' }}@endif"></span>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-2 text-nowrap">
      <label for="do_not_email" class="text-right">&nbsp;Do Not Email:</label>&nbsp;&nbsp;<span class="glyphicon glyphicon-@if ($record->do_not_email){{ 'ok' }}@endif"></span>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-2 text-nowrap">
      <label for="do_not_fax" class="text-right">&nbsp;Do Not Fax:</label>&nbsp;&nbsp;<span class="glyphicon glyphicon-@if ($record->do_not_fax){{ 'ok' }}@endif"></span>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-2 text-nowrap">
      <label for="email_opt_out" class="text-right">&nbsp;Email Opt Out:</label>&nbsp;&nbsp;<span class="glyphicon glyphicon-@if ($record->email_opt_out){{ 'ok' }}@endif"></span>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-2 text-nowrap">
      <label for="do_not_call" class="text-right">&nbsp;Fax Opt Out:</label>&nbsp;&nbsp;<span class="glyphicon glyphicon-@if ($record->fax_opt_out){{ 'ok' }}@endif"></span>
    </div>
  </div>



  <div class="row">
    <label for="address" class="text-right col-xs-4 col-sm-2">&nbsp;Address:</label>
    <div class="col-xs-8 col-sm-10">{{ $record->street }} <br> {{ $record->city }}, {{ $record->state }}, {{ $record->zip }} <br> {{ \App\AppHelper::optionValueCountry($record->country) }}</div>
  </div>


  @include('partials/desc-owner-timestamps')


  <div class="row">
    <form id="deleteLeadForm"  method="post" action="/lead/{{ $record->id }}" accept-charset="UTF-8" role="form" class="form-horizontal">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input name="_method" type="hidden" value="DELETE">
      <div class="form-group form-group-sm">
        <div class="col-xs-12 text-center">
          <a href="/lead/{{ $record->id }}/edit" class="btn btn-primary">Edit</a>
          <input type="button" value="Delete" class="btn btn-primary" onClick="if (confirm('Are you sure you want to delete this record?')) document.getElementById('deleteLeadForm').submit()">
          <a href="/lead/{{ $record->id }}/editConvert" class="btn btn-primary">Convert</a>
        </div>
      </div>
    </form>
  </div>
</div>


@include('activity/activity-related-list')


@endsection
