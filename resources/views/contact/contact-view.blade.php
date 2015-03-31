@extends('app')

@section('content')

<h3 class="pageTitle">Contact Details</h3>



<div class="container lightBorder rowHighlight">

  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="name" class="text-right col-xs-4">&nbsp;Name:</label>
        <div class="col-xs-8">{{ \App\AppHelper::optionValueFromDB('lkp_salutation', $record->salutation_id) }} {{ $record->first_name.' '.$record->last_name }}</div>
      </div>
    </div>

    <div class="col-sm-6">
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="account_id" class="text-right col-xs-4">&nbsp;Account:</label>
        <div class="col-xs-8"><a href="/account/{{ $record->account_id }}">{{ \App\AppHelper::valueFromDB('accounts', $record->account_id) }}</a></div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="type_id" class="text-right col-xs-4">&nbsp;Contact Type:</label>
        <div class="col-xs-8">{{ \App\AppHelper::optionValueFromDB('lkp_contact_type', $record->type_id) }}</div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="title" class="text-right col-xs-4">&nbsp;Title:</label>
        <div class="col-xs-8">{{ $record->title }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="department" class="text-right col-xs-4">&nbsp;Department:</label>
        <div class="col-xs-8">{{ $record->department }}</div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="email" class="text-right col-xs-4">&nbsp;Email:</label>
        <div class="col-xs-8">{{ $record->email }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="phone" class="text-right col-xs-4">&nbsp;Phone:</label>
        <div class="col-xs-8">{{ $record->phone }}</div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="mobile_phone" class="text-right col-xs-4">&nbsp;Mobile Phone:</label>
        <div class="col-xs-8">{{ $record->mobile_phone }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="home_phone" class="text-right col-xs-4">&nbsp;Home Phone:</label>
        <div class="col-xs-8">{{ $record->home_phone }}</div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="other_phone" class="text-right col-xs-4">&nbsp;Other Phone:</label>
        <div class="col-xs-8">{{ $record->other_phone }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="fax" class="text-right col-xs-4">&nbsp;Fax:</label>
        <div class="col-xs-8">{{ $record->fax }}</div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="assistant" class="text-right col-xs-4">&nbsp;Assistant :</label>
        <div class="col-xs-8">{{ $record->assistant }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="assistant_phone" class="text-right col-xs-4">&nbsp;Assist. Phone:</label>
        <div class="col-xs-8">{{ $record->assistant_phone }}</div>
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
    <div class="col-sm-6">
      <div class="row">
        <label for="address" class="text-right col-xs-4">&nbsp;Mailing Address:</label>
        <div class="col-xs-8">{{ $record->street }} <br> {{ $record->city }}, {{ $record->state }}, {{ $record->zip }} <br> {{ \App\AppHelper::optionValueCountry($record->country) }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="address_other" class="text-right col-xs-4">&nbsp;Other Address:</label>
        <div class="col-xs-8">{{ $record->street_other }} <br> {{ $record->city_other }}, {{ $record->state_other }}, {{ $record->zip_other }} <br> {{ \App\AppHelper::optionValueCountry($record->country_other) }}</div>
      </div>
    </div>
  </div>


  @include('partials/desc-owner-timestamps')


  <div class="row">
    <form id="deleteContactForm"  method="post" action="/contact/{{ $record->id }}" accept-charset="UTF-8" role="form" class="form-horizontal">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input name="_method" type="hidden" value="DELETE">
      <div class="form-group form-group-sm">
        <div class="col-xs-12 text-center">
          <a href="/contact/{{ $record->id }}/edit" class="btn btn-primary">Edit</a>
          <input type="button" value="Delete" class="btn btn-primary" onClick="if (confirm('Are you sure you want to delete this record?')) document.getElementById('deleteContactForm').submit()">
        </div>
      </div>
    </form>
  </div>
</div>


@include('activity/activity-related-list')


@endsection
