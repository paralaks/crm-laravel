<div class="form-group">
  <div class="col-sm-6">
    <label for="first_name" class="control-label ui-state-default text-nowrap col-xs-4">First Name:</label>
    <div class="col-xs-3"><select id="salutation_id" name="salutation_id" class="form-control">{!! \App\AppHelper::optionListFromDB('lkp_salutation', $record->salutation_id) !!}</select></div>
    <div class="col-xs-5"><input type="text" id="first_name" name="first_name" class="form-control" value="{{ $record->first_name }}"></div>
  </div>

  <div class="col-sm-6">
    <label for="last_name" class="control-label ui-state-default text-nowrap col-xs-4">Last Name:</label>
    <div class="col-xs-8"><input type="text" id="last_name" name="last_name" class="form-control" value="{{ $record->last_name }}"></div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-6">
    <label for="account_id" class="control-label ui-state-default text-nowrap col-xs-4">Account:</label>
    <div class="col-xs-6">
      <div id="account_name" style="margin-top:5px">{{ \App\AppHelper::valueFromDB('accounts', $record->account_id) }}</div>
      <input type="hidden" id="account_id" name="account_id" class="form-control" value="{{ $record->account_id }}">
    </div>
    <div class="col-xs-2" style="margin-top:4px"> [<a href="javascript:void(0)" onclick="showChangeAccountWindow()">Change</a>]</div>
  </div>

  <div class="col-sm-6">
    <label for="type_id" class="control-label ui-state-default text-nowrap col-xs-4">Contact Type:</label>
    <div class="col-xs-8"><select id="type_id" name="type_id" class="form-control">{!! \App\AppHelper::optionListFromDB('lkp_contact_type', $record->type_id) !!}</select></div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-6">
    <label for="title" class="control-label ui-state-default text-nowrap col-xs-4">Title:</label>
    <div class="col-xs-8"><input type="text" id="title" name="title" class="form-control" value="{{ $record->title }}"></div>
  </div>

  <div class="col-sm-6">
    <label for="department" class="control-label ui-state-default text-nowrap col-xs-4">Department:</label>
    <div class="col-xs-8"><input type="text" id="department" name="department" class="form-control" value="{{ $record->department }}"></div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-6">
    <label for="email" class="control-label ui-state-default text-nowrap col-xs-4">Email:</label>
    <div class="col-xs-8"><input type="text" id="email" name="email" class="form-control" value="{{ $record->email }}"></div>
  </div>

  <div class="col-sm-6">
    <label for="phone" class="control-label ui-state-default text-nowrap col-xs-4">Phone:</label>
    <div class="col-xs-8"><input type="text" id="phone" name="phone" class="form-control" value="{{ $record->phone }}"></div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-6">
    <label for="mobile_phone" class="control-label ui-state-default text-nowrap col-xs-4">Mobile Phone:</label>
    <div class="col-xs-8"><input type="text" id="mobile_phone" name="mobile_phone" class="form-control" value="{{ $record->mobile_phone }}"></div>
  </div>

  <div class="col-sm-6">
    <label for="home_phone" class="control-label ui-state-default text-nowrap col-xs-4">Home Phone:</label>
    <div class="col-xs-8"><input type="text" id="home_phone" name="home_phone" class="form-control" value="{{ $record->home_phone }}"></div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-6">
    <label for="other_phone" class="control-label ui-state-default text-nowrap col-xs-4">Other Phone:</label>
    <div class="col-xs-8"><input type="text" id="other_phone" name="other_phone" class="form-control" value="{{ $record->other_phone }}"></div>
  </div>

  <div class="col-sm-6">
    <label for="fax" class="control-label ui-state-default text-nowrap col-xs-4">Fax:</label>
    <div class="col-xs-8"><input type="text" id="fax" name="fax" class="form-control" value="{{ $record->fax }}"></div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-6">
    <label for="assistant" class="control-label ui-state-default text-nowrap col-xs-4">Assistant:</label>
    <div class="col-xs-8"><input type="text" id="assistant" name="assistant" class="form-control" value="{{ $record->assistant }}"></div>
  </div>

  <div class="col-sm-6">
    <label for="assistant_phone" class="control-label ui-state-default text-nowrap col-xs-4">Assist. Phone:</label>
    <div class="col-xs-8"><input type="text" id="assistant_phone" name="assistant_phone" class="form-control" value="{{ $record->assistant_phone }}"></div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-6">
    <label for="birthdate" class="control-label ui-state-default text-nowrap col-xs-4">Birth date:</label>
    <div class="col-xs-8"><input type="text" id="birthdate" name="birthdate" class="form-control" value="{{ $record->birthdate }}"></div>
  </div>

  <div class="col-sm-6">
    <label for="interests" class="control-label ui-state-default text-nowrap col-xs-4">Interests:</label>
    <div class="col-xs-8"><input type="text" id="interests" name="interests" class="form-control" value="{{ $record->interests }}"></select></div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-6">
    <label for="lead_source_id" class="control-label ui-state-default text-nowrap col-xs-4">Lead Source:</label>
    <div class="col-xs-8"><select id="lead_source_id" name="lead_source_id" class="form-control">{!! \App\AppHelper::optionListFromDB('lkp_lead_source', $record->lead_source_id) !!}</select></div>
  </div>

</div>


<hr class="soften" />


<div class="form-group">
  <div class="col-xs-4 col-sm-3 col-md-2 col-md-offset-1 text-nowrap">
    <label for="do_not_call" class="control-label ui-state-default text-nowrap">&nbsp;Do Not Call :&nbsp;</label>
    <input type="checkbox" id="do_not_call" name="do_not_call" value="1" @if ($record->do_not_call) {{ 'checked' }} @endif>
  </div>
  <div class="col-xs-4 col-sm-3 col-md-2 text-nowrap">
    <label for="do_not_email" class="control-label ui-state-default text-nowrap">&nbsp;Do Not Email :&nbsp;</label>
    <input type="checkbox" id="do_not_email" name="do_not_email" value="1" @if ($record->do_not_email) {{ 'checked' }} @endif>
  </div>
  <div class="col-xs-4 col-sm-3 col-md-2 text-nowrap">
    <label for="do_not_fax" class="control-label ui-state-default text-nowrap">&nbsp;Do Not Fax :&nbsp;</label>
    <input type="checkbox" id="do_not_fax" name="do_not_fax" value="1" @if ($record->do_not_fax) {{ 'checked' }} @endif>
  </div>
  <div class="col-xs-6 col-sm-3 col-md-2 text-nowrap">
    <label for="email_opt_out" class="control-label ui-state-default text-nowrap">&nbsp;Email Opt Out :&nbsp;</label>
    <input type="checkbox" id="email_opt_out" name="email_opt_out" value="1" @if ($record->email_opt_out) {{ 'checked' }} @endif>
  </div>
  <div class="col-xs-6 col-sm-3 col-md-2 text-nowrap">
    <label for="do_not_call" class="control-label ui-state-default text-nowrap">&nbsp;Fax Opt Out :&nbsp;</label>
    <input type="checkbox" id="fax_opt_out" name="fax_opt_out" value="1" @if ($record->fax_opt_out) {{ 'checked' }} @endif>
  </div>
</div>


<hr class="soften" />


<h4>Mailing Address :</h4>
<div class="form-group">
  <div class="col-sm-12">
    <label for="street" class="control-label ui-state-default text-nowrap col-xs-4 col-sm-2">Street:</label>
    <div class="col-xs-8 col-sm-10"><input type="text" id="street" name="street" class="form-control" value="{{ $record->street }}"></div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-6">
    <label for="city" class="control-label ui-state-default text-nowrap col-xs-4">City:</label>
    <div class="col-xs-8"><input type="text" id="city" name="city" class="form-control" value="{{ $record->city }}"></div>
  </div>

  <div class="col-sm-6">
    <label for="state" class="control-label ui-state-default text-nowrap col-xs-4">State:</label>
    <div class="col-xs-8"><input type="text" id="state" name="state" class="form-control" value="{{ $record->state }}"></div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-6">
    <label for="zip" class="control-label ui-state-default text-nowrap col-xs-4">Zip:</label>
    <div class="col-xs-8"><input type="text" id="zip" name="zip" class="form-control" value="{{ $record->zip }}"></div>
  </div>

  <div class="col-sm-6">
    <label for="country" class="control-label ui-state-default text-nowrap col-xs-4">Country:</label>
    <div class="col-xs-8"><select id="country" name="country" class="form-control">{!! \App\AppHelper::optionListCountry($record->country) !!}</select></div>
  </div>
</div>



<h4>Other Address :</h4>
<div class="form-group">
  <div class="col-sm-12">
    <label for="street_other" class="control-label ui-state-default text-nowrap col-xs-4 col-sm-2">Street:</label>
    <div class="col-xs-8 col-sm-10"><input type="text" id="street_other" name="street_other" class="form-control" value="{{ $record->street_other }}"></div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-6">
    <label for="city_other" class="control-label ui-state-default text-nowrap col-xs-4">City:</label>
    <div class="col-xs-8"><input type="text" id="city_other" name="city_other" class="form-control" value="{{ $record->city_other }}"></div>
  </div>

  <div class="col-sm-6">
    <label for="state_other" class="control-label ui-state-default text-nowrap col-xs-4">State:</label>
    <div class="col-xs-8"><input type="text" id="state_other" name="state_other" class="form-control" value="{{ $record->state_other }}"></div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-6">
    <label for="zip_other" class="control-label ui-state-default text-nowrap col-xs-4">Zip:</label>
    <div class="col-xs-8"><input type="text" id="zip_other" name="zip_other" class="form-control" value="{{ $record->zip_other }}"></div>
  </div>

  <div class="col-sm-6">
    <label for="country_other" class="control-label ui-state-default text-nowrap col-xs-4">Country:</label>
    <div class="col-xs-8"><select id="country_other" name="country_other" class="form-control">{!! \App\AppHelper::optionListCountry($record->country_other) !!}</select></div>
  </div>
</div>


<hr class="soften">


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
