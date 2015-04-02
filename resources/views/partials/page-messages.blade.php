<div class="container">
@if (Session::has('pageSuccess') || Session::has('pageError') || Session::has('pageWarning') || Session::has('errors'))

  @if (Session::has('pageError') || Session::has('errors'))
  <div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <span class="glyphicon glyphicon-remove-sign"></span>&nbsp;&nbsp; {!! Session::remove('pageError') !!}

    @if (Session::has('errors'))
    <br>
    <ul>
      @foreach (Session::remove('errors')->all() as $error)
      <li>{{ $error }}
      @endforeach
    </ul>
    @endif

  </div>
  @endif

  @if (Session::has('pageWarning'))
  <div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;&nbsp; {!! Session::remove('pageWarning') !!}
  </div>
  @endif

  @if (Session::has('pageSuccess'))
  <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <span class="glyphicon glyphicon-ok-sign"></span>&nbsp;&nbsp; {!! Session::remove('pageSuccess') !!}
  </div>
  @endif
@endif

</div>
