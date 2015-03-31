<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lite CMS</title>

	@include('partials/css')
  @include('partials/js')

</head>
<body>

  <nav class="navbar navbar-default ui-state-default">
  	<div class="container-fluid">
  		<div class="navbar-header">
  			<a class="navbar-brand" href="/">Lite CRM</a>
  		</div>
    </div>
  </nav>

  @yield('content')

</body>
</html>
