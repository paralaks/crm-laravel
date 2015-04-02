@extends('app')

@section('content')

<h3 class="pageTitle">Convert Lead</h3>


<div class="container">
<form id="convertLeadForm" method="post" action="/lead/{{ $record->id }}/showConvert" accept-charset="UTF-8" role="form" class="form-horizontal">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="form-group">
    <label for="account_name" class="control-label col-xs-4 text-right">&nbsp;New account Name:</label>
    <div class="col-xs-4"><input type="text" id="account_name" name="account_name" class="form-control" value="{{ $account_name}}"></div>
  </div>

  @if (count($accountResults))
  <div class="row">
    <div class="col-xs-12 text-center">
      There are similar/matching accounts in the system. If you want to add the lead to an existing account please select it from the option list below. Otherwise an account with the company name will be created.
    </div>
  </div>
  <div class="row">
    <div class="col-xs-4"></div>
    <div class="col-xs-4">
      <select name="account_id" value="account_id" class="form-control">
        <option value=""></options>
        @foreach ($accountResults as $result)
        <option value="{{ $result->id }}">{{ $result->name }}</option>
        @endforeach
      </select>
      @if ($tooManyResults===true)
        <br>(There were too many results to be included in the list.)
      @endif
    </div>
  </div>
  @endif

  <div class="row">
    <label class="form-contol col-xs-4 text-right">Do you want to create a new opportunity?</label>
    <div class="col-xs-4 text-center">
      <input id="newOpportunityYes" name="newOpportunity" type="radio" value="1" onchange="showHideBlock('newOpportunityFields', 1)" @if ($newOpportunity) {{ 'checked' }} @endif> Yes
      <input id="newOpportunityNo" name="newOpportunity" type="radio" value="0" onchange="showHideBlock('newOpportunityFields', 0)" @unless ($newOpportunity) {{ 'checked' }} @endunless> No
    </div>
  </div>

  <div id="newOpportunityFields" style="display: @if ($newOpportunity==1) {{ 'block' }} @else {{ 'none' }} @endif">
    <div class="row">
      <label for="opportunity_name" class="control-label ui-state-default text-nowrap col-xs-4 col-sm-2 col-sm-offset-2 text-right">Opportunity Name:</label>
      <div class="col-xs-7 col-sm-4"><input type="text" id="opportunity_name" name="opportunity_name" class="form-control" value="{{ $opportunity_name }}"></div>
      <div class="col-xs-1 col-sm-4"></div>
    </div>

    <div class="row">
      <label for="stage_id" class="control-label ui-state-default text-nowrap col-xs-4 col-sm-2 col-sm-offset-2 text-right" text-right>Stage:</label>
      <div class="col-xs-7 col-sm-4"><select id="stage_id" name="stage_id" class="form-control">{!! \App\AppHelper::optionListFromDB('lkp_opportunity_stage', $stage_id) !!}</select></div>
      <div class="col-xs-1 col-sm-4"></div>
    </div>

    <div class="row">
      <label for="close_date" class="control-label ui-state-default text-nowrap col-xs-4 col-sm-2 col-sm-offset-2 text-right">Close Date:</label>
      <div class="col-xs-7 col-sm-4"><input type="text" id="close_date" name="close_date" class="form-control" value="{{ $close_date }}"></div>
      <div class="col-xs-1 col-sm-4"></div>
    </div>

  </div>

  <div class="row">
    <div class="col-xs-12 text-center"><input id="convertLead" name="convertLead" type="submit" value="Convert Lead" class="btn btn-primary"></div>
  </div>
</form>
</div>

@endsection

