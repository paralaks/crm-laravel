    <div class="form-group">
      <div class="input-group input-group-sm">
        <span class="input-group-addon ui-state-default">Name</span>
        <input type="text" id="searchName" name="searchName" class="form-control" value="{{ Request::input('searchName') }}">
      </div>
    </div>

    <div class="form-group">
      <div class="input-group input-group-sm">
        <span class="input-group-addon ui-state-default">From</span>
        <input type="text" id="dateFrom" name="dateFrom" class="form-control" value="{{ Request::input('dateFrom') }}">
      </div>
    </div>

    <div class="form-group">
      <div class="input-group input-group-sm">
        <span class="input-group-addon ui-state-default">To</span>
        <input type="text" id="dateTo" name="dateTo" class="form-control" value="{{ Request::input('dateTo') }}">
      </div>
    </div>

    <div class="form-group">
      <div class="input-group input-group-sm">
        <span class="input-group-addon ui-state-default">Interval</span>
        <select id="intervalDate" name="intervalDate" class="form-control">
          {!! \App\AppHelper::optionListFrom('<option value=""></option>
          <option value="createdToday">Created Today</option>
          <option value="modifiedToday">Modified Today</option>
          <option value="createdThisWeek">Created This Week</option>
          <option value="modifiedThisWeek">Modified This Week</option>', Request::input('intervalDate')) !!}
        </select>
      </div>
    </div>

    <div class="form-group">
      <div class="input-group input-group-sm">
        <span class="input-group-addon ui-state-default">Owner</span>
        <select id="ownerId" name="ownerId" class="form-control">
          {!! \App\AppHelper::optionListFrom('<option value=""></option>
          <option value="1">Me</option>
          <option value="2">Anyone</option>', Request::input('ownerId')) !!}
        </select>
      </div>
    </div>
