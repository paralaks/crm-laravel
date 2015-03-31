@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-info">
				<div class="panel-heading">Home</div>
				<div class="panel-body">
					Hello, {{ Auth::user()->name }}!
				</div>
			</div>
		</div>
	</div>
</div>


@include('partials/index-history-list')

@endsection


