@extends('appguest')
@section('content')

<div class="container">
  <div class="jumbotron">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        @if (session('status'))
          <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @if (count($errors) > 0)
        <div class="alert alert-danger">
          <strong>There were some problems with your input.</strong>
          <br><br>
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        <br>
        @endif

        <form class="form-horizontal" role="form" method="POST" action="/password/email">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label class="col-md-4 control-label">E-Mail Address</label>
            <div class="col-md-6">
              <input type="email" class="form-control" name="email" value="{{ old('email') }}">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

@endsection
