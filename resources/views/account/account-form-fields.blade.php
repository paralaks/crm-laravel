<div class="form-group">
  <div class="col-sm-6">
    <label for="name" class="control-label ui-state-default text-nowrap col-xs-4">Account Name:</label>
    <div class="col-xs-8"><input type="text" id="name" name="name" class="form-control" value="{{ $record->name }}"></div>
  </div>

  <div class="col-sm-6">
    <label for="number" class="control-label ui-state-default text-nowrap col-xs-4">Account Number:</label>
    <div class="col-xs-8"><input type="text" id="number" name="number" class="form-control" value="{{ $record->number }}"></div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-6">
    <label for="type_id" class="control-label ui-state-default text-nowrap col-xs-4">Account Type:</label>
    <div class="col-xs-8"><select id="type_id" name="type_id" class="form-control">{!! \App\AppHelper::optionListFromDB('lkp_account_type', $record->type_id) !!}</select></div>
  </div>

  <div class="col-sm-6">
    <label for="rating_id" class="control-label ui-state-default text-nowrap col-xs-4">Rating:</label>
    <div class="col-xs-8"><select id="rating_id" name="rating_id" class="form-control">{!! \App\AppHelper::optionListFromDB('lkp_rating', $record->rating_id) !!}</select></div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-6">
    <label for="phone" class="control-label ui-state-default text-nowrap col-xs-4">Phone:</label>
    <div class="col-xs-8"><input type="text" id="phone" name="phone" class="form-control" value="{{ $record->phone }}"></div>
  </div>

  <div class="col-sm-6">
    <label for="fax" class="control-label ui-state-default text-nowrap col-xs-4">Fax:</label>
    <div class="col-xs-8"><input type="text" id="fax" name="fax" class="form-control" value="{{ $record->fax }}"></div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-6">
    <label for="annual_revenue" class="control-label ui-state-default text-nowrap col-xs-4">Annual Rev.:</label>
    <div class="col-xs-8"><input type="text" id="annual_revenue" name="annual_revenue" class="form-control" value="{{ $record->annual_revenue }}"></div>
  </div>

  <div class="col-sm-6">
    <label for="num_of_employees" class="control-label ui-state-default text-nowrap col-xs-4">Num. of Employees:</label>
    <div class="col-xs-8"><input type="text" id="num_of_employees" name="num_of_employees" class="form-control" value="{{ $record->num_of_employees }}"></div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-6">
    <label for="industry_id" class="control-label ui-state-default text-nowrap col-xs-4">Industry:</label>
    <div class="col-xs-8"><select id="industry_id" name="industry_id" class="form-control">{!! \App\AppHelper::optionListFromDB('lkp_industry', $record->industry_id) !!}</select></div>
  </div>

  <div class="col-sm-6">
    <label for="ownership_id" class="control-label ui-state-default text-nowrap col-xs-4">Ownership:</label>
    <div class="col-xs-8"><select id="ownership_id" name="ownership_id" class="form-control">{!! \App\AppHelper::optionListFromDB('lkp_account_ownership', $record->ownership_id) !!}</select></div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-6">
    <label for="website" class="control-label ui-state-default text-nowrap col-xs-4">Website:</label>
    <div class="col-xs-8"><input type="text" id="website" name="website" class="form-control" value="{{ $record->website }}"></div>
  </div>

  <div class="col-sm-6">
    <label for="lead_source_id" class="control-label ui-state-default text-nowrap col-xs-4">Lead Source:</label>
    <div class="col-xs-8"><select id="lead_source_id" name="lead_source_id" class="form-control">{!! \App\AppHelper::optionListFromDB('lkp_lead_source', $record->lead_source_id) !!}</select></div>
  </div>
</div>



<hr class="soften" />


<h4>Billing Address :</h4>
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



<h4>Shipping Address :</h4>
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


<hr class="soften" />


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




