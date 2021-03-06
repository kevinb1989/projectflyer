@extends('layouts.default')

@section('content')
	<div class="row">
		<div class="col-md-3">
			<h1> {{$flyer->address}} </h1>
			<h2>{!!$flyer->price!!}</h2>

			<div class='description'>{{$flyer->description}}</div>
		</div>

		<div class="col-md-8 gallery">
			@foreach($flyer->photos()->get()->chunk(4) as $set)
				<div class="row">
					@foreach ($set as $photo)
						<div class="col-md-3 gallery__image">
							<a href="{{url($photo->path)}}" data-lity>
								<img src="{{url($photo->thumbnail_path)}}">
							</a>
						</div>
					@endforeach
				</div>
			@endforeach
			@if($user && $user->owns($flyer))
				<h2>Add your photo</h2>
				<!--{!!Form::open(['method'=>'POST', 'url'=> $flyer->zip . '/' . $flyer->address . '/' . 'photos', 'class'=>'dropzone', 'id'=>'addPhotosForm'])!!}
				{!!Form::close()!!} -->
				{!!Form::open(['method'=>'POST', 'url'=> $flyer->id . '/' . 'photos', 'class'=>'dropzone', 'id'=>'addPhotosForm'])!!}
				{!!Form::close()!!}
			@endif
			
		</div>
	</div>

	<hr>

	

	
	
@stop

@section('customscript.footer')
	<script src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js'></script>
	<script type="text/javascript">
		Dropzone.options.addPhotosForm = {

			paramName: "photo",
			maxFilesize: 3,
			acceptedFiles: ".jpg, .jpeg, .png, .bmp"

		};
	</script>
	@include('flash')
@stop