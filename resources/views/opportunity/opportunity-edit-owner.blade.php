@extends('app')

@section('content')

<h3 class="pageTitle">Edit Opportunity Owner</h3>



<div class="container rowHighlight">
  <form id="editOpportunityForm" method="post" action="/opportunity/{{ $record->id }}/saveOwner" accept-charset="UTF-8" role="form" class="form-horizontal">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input name="_method" type="hidden" value="PATCH">

    <div class="row">
      <label for="name" class="control-label text-nowrap col-xs-6 col-sm-6">&nbsp;Transfer this record:</label>
      <span class="form-control-static col-xs-6 col-sm-3">{{ $record->name }}</span>
    </div>

    <div class="row">
      <label for="owner_id" class="control-label text-nowrap col-xs-6 col-sm-6">&nbsp;To new Owner?</label>
      <div class="col-xs-6 col-sm-3"><select id="owner_id" name="owner_id" class="form-control">{!! \App\AppHelper::optionListFromDB('users', $record->owner_id) !!}</select> </div>
    </div>

    <br>
    <div class="form-group col-sm-12 text-center">
      <input type="submit" value="Save" class="btn btn-primary">
      <a href="/opportunity/{{ $record->id }}" class="btn btn-primary">Cancel</a>
    </div>

  </form>
</div>

@endsection
