<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lite CRM</title>

	@include('partials/css')
  @include('partials/js')

<script>
  function windowOpen(pUrl, pName, pWidth, pHeight)
  {
    left=(screen.width-pWidth)/2;
    top=(screen.height-pHeight)/2;

    newWindow=window.open(pUrl, pName, "toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width="+pWidth+", height="+pHeight+",screenX=0,screenY=0,top="+top+",left="+left);
    newWindow.focus();

    return newWindow;
  }

  function showChangeAccountWindow()
  {
    var changeAccountWindow;

    if (changeAccountWindow && !changeAccountWindow.closed)
      changeAccountWindow.focus();

    changeAccountWindow=windowOpen("{{ URL::to('/') }}/account/showChangeAccount", "changeAccountWindow", 450, 400);
  }
</script>
</head>

<body>
  <nav class="navbar navbar-default ui-state-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-top-menu">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Lite CRM</a>
      </div>

      <div class="collapse navbar-collapse" id="navbar-collapse-top-menu">

      <ul class="nav navbar-nav">
        @unless (Auth::guest())
          @unless (Auth::user()->userGroup->id==\App\UserGroup::COMMUNITY_USER)
          <li @if (Request::is('lead') || Request::is('lead/*')) class="ui-state-default" @endif><a href="/lead">Leads</a></li>
          @endunless
          <li @if (Request::is('contact') || Request::is('contact/*')) class="ui-state-default" @endif><a href="/contact">Contacts</a></li>
          <li @if (Request::is('account') || Request::is('account/*')) class="ui-state-default" @endif><a href="/account">Accounts</a></li>
          <li @if (Request::is('opportunity') || Request::is('opportunity/*')) class="ui-state-default" @endif><a href="/opportunity">Opportunities</a></li>
          <li @if (Request::is('report') || Request::is('report/*')) class="ui-state-default" @endif><a href="/report">Reports</a></li>
        @endunless
        </ul>

        <ul class="nav navbar-nav navbar-right">
        @unless (Auth::guest())
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              @if (Auth::user()->userGroup->id==\App\UserGroup::SUPER_USER)
               <li><a href="/setting">Settings</a></li>
              @endif
              <li><a href="/user/profile">Profile</a></li>
              <li><a href="/auth/logout">Logout</a></li>
            </ul>
          </li>
        @endunless
        </ul>
      </div>
    </div>
  </nav>

  @include('partials/page-messages')


  @yield('content')

</body>
</html>
