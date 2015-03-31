<div class="form-group">
  <div class="col-sm-6">
    <label for="name" class="control-label ui-state-default text-nowrap col-xs-4">Name:</label>
    <div class="col-xs-8"><input type="text" id="name" name="name" class="form-control" value="{{ $record->name }}"></div>
  </div>

  <div class="col-sm-6">
    <label for="account_id" class="control-label ui-state-default text-nowrap col-xs-4">Account:</label>
    <div class="col-xs-6">
      <div id="account_name" style="margin-top:5px">{{ \App\AppHelper::valueFromDB('accounts', $record->account_id) }}</div>
      <input type="hidden" id="account_id" name="account_id" class="form-control" value="{{ $record->account_id }}">
    </div>
    <div class="col-xs-2" style="margin-top:4px"> [<a href="javascript:void(0)" onclick="showChangeAccountWindow()">Change</a>]</div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-6">
    <label for="amount" class="control-label ui-state-default text-nowrap col-xs-4">Amount:</label>
    <div class="col-xs-8"><input type="text" id="amount" name="amount" class="form-control" value="{{ $record->amount}}"></div>
  </div>

  <div class="col-sm-6">
    <label for="expected_revenue" class="control-label ui-state-default text-nowrap col-xs-4">Expected Revenue:</label>
    <div class="col-xs-8"><input type="text" id="expected_revenue" name="expected_revenue" class="form-control" value="{{ $record->expected_revenue }}"></div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-6">
    <label for="stage_id" class="control-label ui-state-default text-nowrap col-xs-4">Stage:</label>
    <div class="col-xs-8"><select id="stage_id" name="stage_id" class="form-control">{!! \App\AppHelper::optionListFromDB('lkp_opportunity_stage', $record->stage_id) !!}</select></div>
  </div>

  <div class="col-sm-6">
    <label for="probability" class="control-label ui-state-default text-nowrap col-xs-4">Probability:</label>
    <div class="col-xs-8"><input type="text" id="probability" name="probability" class="form-control" value="{{ $record->probability }}"></div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-6">
    <label for="type_id" class="control-label ui-state-default text-nowrap col-xs-4">Type:</label>
    <div class="col-xs-8"><select id="type_id" name="type_id" class="form-control">{!! \App\AppHelper::optionListFromDB('lkp_opportunity_type', $record->type_id) !!}</select></div>
  </div>
  <div class="col-sm-6">
    <label for="next_step" class="control-label ui-state-default text-nowrap col-xs-4">Next Step:</label>
    <div class="col-xs-8"><input type="text" id="next_step" name="next_step" class="form-control" value="{{ $record->next_step }}"></div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-6">
    <label for="close_date" class="control-label ui-state-default text-nowrap col-xs-4">Close Date:</label>
    <div class="col-xs-8"><input type="text" id="close_date" name="close_date" class="form-control" value="{{ $record->close_date }}"></div>
  </div>

  <div class="col-sm-6">
    <label for="lead_source_id" class="control-label ui-state-default text-nowrap col-xs-4">Lead Source:</label>
    <div class="col-xs-8"><select id="lead_source_id" name="lead_source_id" class="form-control">{!! \App\AppHelper::optionListFromDB('lkp_lead_source', $record->lead_source_id) !!}</select></div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-12">
    <label for="competitors" class="control-label ui-state-default text-nowrap col-xs-4 col-sm-2">Competitors:</label>
    <div class="col-xs-8 col-sm-10"><input type="text" id="competitors" name="competitors" class="form-control" value="{{ $record->competitors }}"></div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-6">
    <label for="description" class="control-label ui-state-default text-nowrap col-xs-4">Description:</label>
    <div class="col-xs-8"><textarea id="description" name="description" class="form-control">{{ $record->description }}</textarea></div>
  </div>

  <div class="col-sm-6">
    <label for="owner_id" class="control-label ui-state-default text-nowrap col-xs-4">Owner:</label>
    <div class="col-xs-8"><select id="owner_id" name="owner_id" class="form-control">{!! \App\AppHelper::optionListFromDB('users', $record->owner_id) !!}</select> </div>
  </div>
</div>

