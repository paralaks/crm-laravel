@extends('app')

@section('content')

<h3 class="pageTitle">Activity Details</h3>



<div class="container lightBorder rowHighlight">

  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="subject" class="text-right col-xs-4">&nbsp;Subject:</label>
        <div class="col-xs-8">{{ $record->subject }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="location" class="text-right col-xs-4">&nbsp;Location:</label>
        <div class="col-xs-8">{{ $record->location }} </div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="type" class="text-right col-xs-4">&nbsp;Type:</label>
        <div class="col-xs-8">{{ \App\AppHelper::optionValueFromDB('lkp_activity_type', $record->type_id) }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="priority" class="text-right col-xs-4">&nbsp;Priority:</label>
        <div class="col-xs-8">{{ \App\AppHelper::optionValueFromDB('lkp_activity_priority', $record->priority_id) }}</div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="start_date" class="text-right col-xs-4">&nbsp;Start Date:</label>
        <div class="col-xs-8">{{ $record->start_date }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="end_date" class="text-right col-xs-4">&nbsp;End/Due Date:</label>
        <div class="col-xs-8">{{ $record->end_date }}</div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="status_id" class="text-right col-xs-4">&nbsp;Status:</label>
        <div class="col-xs-8">{{ \App\AppHelper::optionValueFromDB('lkp_activity_status', $record->status_id) }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="relates_to" class="text-right col-xs-4">&nbsp;Relates to:</label>
        <div class="col-xs-8">{!! $relates_to !!}</div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="allday" class="text-right col-xs-4">&nbsp;Allday:</label>
        <div class="col-xs-8"><span class="glyphicon glyphicon-@if ($record->allday){{ 'ok' }}@endif"></span></div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="remind_at" class="text-right col-xs-4">&nbsp;Reminder:</label>
        <div class="col-xs-8"> {{ $record->remind_at }}</div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="description" class="text-right col-xs-4">&nbsp;Description:</label>
        <div class="col-xs-8">{{ $record->description }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="owner" class="text-right col-xs-4">&nbsp;Owner:</label>
        <div class="col-xs-8">{{ \App\AppHelper::optionValueFromDB('users', $record->owner_id) }} </div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="adder" class="text-right col-xs-4">&nbsp;Created by:</label>
        <div class="col-xs-8">{{ \App\AppHelper::optionValueFromDB('users', $record->adder_id) }} {{ $record->created_at }}</div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="modifier" class="text-right col-xs-4">&nbsp;Modified by:</label>
        <div class="col-xs-8">{{ \App\AppHelper::optionValueFromDB('users', $record->modifier_id) }} {{ $record->updated_at}}</div>
      </div>
    </div>
  </div>


  <br>

  <form id="deleteActivityForm"  method="post" action="/activity/{{ $record->id }}" accept-charset="UTF-8" role="form" class="form-horizontal">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input name="_method" type="hidden" value="DELETE">
    <div class="form-group form-group-sm">
      <div class="col-xs-12 text-center">
        <a href="/activity/{{ $record->id }}/edit" class="btn btn-primary">Edit</a>
        <input type="button" value="Delete" class="btn btn-primary" onClick="if (confirm('Are you sure you want to delete this record?')) document.getElementById('deleteActivityForm').submit()">
        <a href="{{ $relates_to_link }}" class="btn btn-primary">Cancel</a>
      </div>
    </div>
  </form>
</div>
@endsection
