@extends('layout')

@section('title')
	<title>create a new flyer</title>
@stop

@section('content')
	<h3>Selling Your home</h3>
	<div class="row">

		{!!Form::open(['method'=>'POST', 'url'=>'flyers',  'enctype'=>'multipart/form-data'])!!}
			@include('flyers.form')

		{!!Form::close()!!}

		
	</div>
	@if($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
		@endif
	
@stop

@section('customscript.footer')
	@include('flash')
@stop

