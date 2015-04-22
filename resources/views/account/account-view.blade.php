@extends('app')

@section('content')

<h3 class="pageTitle">Account Details</h3>

<div class="container relatedListLinks">
  <a href="#relatedListContacts">Contacts</a>
  <a href="#relatedListActivities">Activities</a>
</div>

<div class="container lightBorder rowHighlight">

  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="name" class="text-right col-xs-5">&nbsp;Name:</label>
        <div class="col-xs-7">{{ $record->name }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="number" class="text-right col-xs-5">&nbsp;Account Number:</label>
        <div class="col-xs-7">{{ $record->number }}</div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="type_id" class="text-right col-xs-5">&nbsp;Account Type:</label>
        <div class="col-xs-7">{{ \App\AppHelper::optionValueFromDB('lkp_account_type', $record->type_id) }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="rating_id" class="text-right col-xs-5">&nbsp;Rating:</label>
        <div class="col-xs-7">{{ \App\AppHelper::optionValueFromDB('lkp_rating', $record->rating_id) }}</div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="industry_id" class="text-right col-xs-5">&nbsp;Phone:</label>
        <div class="col-xs-7">{{ $record->phone }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="industry_id" class="text-right col-xs-5">&nbsp;Fax:</label>
        <div class="col-xs-7">{{ $record->fax }}</div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="industry_id" class="text-right col-xs-5">&nbsp;Annual Revenue:</label>
        <div class="col-xs-7">{{ $record->annual_revenue }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="industry_id" class="text-right col-xs-5">&nbsp;Num. of Employees:</label>
        <div class="col-xs-7">{{ $record->num_of_employees }}</div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="industry" class="text-right col-xs-5">&nbsp;Industry:</label>
        <div class="col-xs-7">{{ \App\AppHelper::optionValueFromDB('lkp_industry', $record->industry_id) }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="ownership" class="text-right col-xs-5">&nbsp;Ownership:</label>
        <div class="col-xs-7">{{ \App\AppHelper::optionValueFromDB('lkp_account_ownership', $record->ownership_id) }}</div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="industry_id" class="text-right col-xs-5">&nbsp;Website:</label>
        <div class="col-xs-7">{{ $record->website }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="lead_source_id" class="text-right col-xs-5">&nbsp;Lead Source:</label>
        <div class="col-xs-7">{{ \App\AppHelper::optionValueFromDB('lkp_lead_source', $record->lead_source_id) }}</div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="address" class="text-right col-xs-5">&nbsp;Billing Address:</label>
        <div class="col-xs-7">{{ $record->street }} <br> {{ $record->city }}, {{ $record->state }}, {{ $record->zip }} <br> {{ \App\AppHelper::optionValueCountry($record->country) }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="address_other" class="text-right col-xs-5">&nbsp;Shipping Address:</label>
        <div class="col-xs-7">{{ $record->street_other }} <br> {{ $record->city_other }}, {{ $record->state_other }}, {{ $record->zip_other }} <br> {{ \App\AppHelper::optionValueCountry($record->country_other) }}</div>
      </div>
    </div>
  </div>


  @include('partials/desc-owner-timestamps')


  <div class="row">
    <form id="deleteAccountForm"  method="post" action="/account/{{ $record->id }}" accept-charset="UTF-8" role="form" class="form-horizontal">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input name="_method" type="hidden" value="DELETE">
      <div class="form-group form-group-sm">
        <div class="col-xs-12 text-center">
          <a href="/account/{{ $record->id }}/edit" class="btn btn-primary">Edit</a>
          <input type="button" value="Delete" class="btn btn-primary" onClick="if (confirm('Are you sure you want to delete this record?')) document.getElementById('deleteAccountForm').submit()">
        </div>
      </div>
    </form>
  </div>
</div>

<br>
<br>


@include('contact/contact-related-list')

@include('activity/activity-related-list')

@endsection
