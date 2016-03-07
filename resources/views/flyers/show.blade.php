@extends('layout')

@section('content')
	<div class="row">
		<div class="col-md-3">
			<h1> {{$flyer->street}} </h1>
			<h2>{!!$flyer->price!!}</h2>

			<div class='description'>{{$flyer->description}}</div>
		</div>

		<div class="col-md-8 gallery">
			@foreach($flyer->photos()->get()->chunk(4) as $set)
				<div class="row">
					@foreach ($set as $photo)
						<div class="col-md-3 gallery__image">
							<img src="{{url($photo->thumbnail_path)}}">
						</div>
					@endforeach
				</div>
			@endforeach
		</div>
	</div>

	<hr>

	<h2>Add your photo</h2>

	
	{!!Form::open(['method'=>'POST', 'url'=> $flyer->zip . '/' . $flyer->street . '/' . 'photos', 'class'=>'dropzone', 'id'=>'addPhotosForm'])!!}
	{!!Form::close()!!}
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
@stop