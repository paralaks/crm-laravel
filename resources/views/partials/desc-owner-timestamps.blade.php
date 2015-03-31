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
        <div class="col-xs-4">{{ $record->owner->name }} </div>
        <div class="col-xs-4">[<a href="/{{ $editPath }}/{{ $record->id }}/editOwner">Change</a>]</div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <label for="adder" class="text-right col-xs-4">&nbsp;Created by:</label>
        <div class="col-xs-4">{{ $record->adder->name }} </div>
        <div class="col-xs-4">{{ $record->created_at}} </div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <label for="modifier" class="text-right col-xs-4">&nbsp;Modified by:</label>
        <div class="col-xs-4">{{ $record->modifier->name }} </div>
        <div class="col-xs-4">{{ $record->updated_at}} </div>
      </div>
    </div>
  </div>
