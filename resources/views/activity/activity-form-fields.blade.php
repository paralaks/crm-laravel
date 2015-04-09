<div class="form-group">
  <div class="col-sm-6">
    <label for="subject" class="control-label ui-state-default text-nowrap col-xs-4">Subject:</label>
    <div class="col-xs-8"><input type="text" id="subject" name="subject" class="form-control" value="{{ $record->subject }}"></div>
  </div>

  <div class="col-sm-6">
    <label for="location" class="control-label ui-state-default text-nowrap col-xs-4">Location:</label>
    <div class="col-xs-8"><input type="text" id="location" name="location" class="form-control" value="{{ $record->location }}"></div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-6">
    <label for="type_id" class="control-label ui-state-default text-nowrap col-xs-4">Type:</label>
    <div class="col-xs-8"><select id="type_id" name="type_id" class="form-control">{!! \App\AppHelper::optionListFromDB('lkp_activity_type', $record->type_id) !!}</select></div>
  </div>

  <div class="col-sm-6">
    <label for="priority_id" class="control-label ui-state-default text-nowrap col-xs-4">Priority:</label>
    <div class="col-xs-8"><select id="priority_id" name="priority_id" class="form-control">{!! \App\AppHelper::optionListFromDB('lkp_activity_priority', $record->priority_id) !!}</select></div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-6">
    <label for="start_date" class="control-label ui-state-default text-nowrap col-xs-4">Start Date:</label>
    <div class="col-xs-8"><input type="text" id="start_date" name="start_date" class="form-control" value="{{ $record->start_date }}"></div>
  </div>

  <div class="col-sm-6">
    <label for="end_date" class="control-label ui-state-default text-nowrap col-xs-4">End/Due Date:</label>
    <div class="col-xs-8"><input type="text" id="end_date" name="end_date" class="form-control" value="{{ $record->end_date }}"></div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-6">
    <label for="status_id" class="control-label ui-state-default text-nowrap col-xs-4">Status:</label>
    <div class="col-xs-8"><select id="status_id" name="status_id" class="form-control">{!! \App\AppHelper::optionListFromDB('lkp_activity_status', $record->status_id) !!}</select></div>
  </div>

  <div class="col-sm-6">
    <label for="account_id" class="control-label ui-state-default text-nowrap col-xs-4">Relates to:</label>
    <div class="col-xs-8">
      <div id="relates_to" style="margin-top:5px"><strong>{{ $relates_to }}</strong></div>
      <input type="hidden" id="related_type" name="related_type" class="form-control" value="{{ $record->related_type }}">
      <input type="hidden" id="related_id" name="related_id" class="form-control" value="{{ $record->related_id }}">
    </div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-6">
    <label for="allday" class="control-label ui-state-default text-nowrap col-xs-4">All Day:</label>
    <div class="col-xs-8"><input type="checkbox" id="allday" name="allday"  value="1" @if ($record->allday) {{ 'checked' }} @endif ></div>
  </div>

  <div class="col-sm-6">
    <label for="remind_at" class="control-label ui-state-default text-nowrap col-xs-4">Reminder:</label>
    <div class="col-xs-8"><input type="text" id="remind_at" name="remind_at" class="form-control" value="{{ $record->remind_at }}"></div>
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



