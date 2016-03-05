{{csrf_field()}}

<div class="col-md-6">

			<div class='form-group'>
				{!!Form::label('street', 'Street: ')!!}
				{!!Form::text('street', null, ['id' => 'street', 'class' => 'form-control'])!!}
			</div>

			<div class='form-group'>
				{!!Form::label('city', 'City: ')!!}
				{!!Form::text('city', null, ['id' => 'city', 'class' => 'form-control'])!!}
			</div>

			<div class='form-group'>
				{!!Form::label('zip', 'Zip: ')!!}
				{!!Form::text('zip', null, ['id' => 'zip', 'class' => 'form-control'])!!}
			</div>

			<div class='form-group'>
				{!!Form::label('country', 'Country: ')!!}
				{!!Form::select('country',$countries, null, ['id' => 'country', 'class' => 'form-control'])!!}
			</div>

			<div class='form-group'>
				{!!Form::label('state', 'State: ')!!}
				{!!Form::text('state', null, ['id' => 'state', 'class' => 'form-control'])!!}
			</div>
</div>
<div class="col-md-6">

			<div class='form-group'>
				{!!Form::label('price', 'Sale price: ')!!}
				{!!Form::text('price', null, ['id' => 'price', 'class' => 'form-control'])!!}
			</div>

			<div class='form-group'>
				{!!Form::label('description', 'Description: ')!!}
				{!!Form::textarea('description', null, ['id' => 'description', 'class' => 'form-control'])!!}
			</div>

			<!-- <div class='form-group'>
				{!!Form::label('photos', 'Photos: ')!!}
				{!!Form::file('photos', ['id' => 'photos', 'class' => 'form-control'])!!}
			</div> -->
			
</div>
<div class="col-md-12">
	<div class='form-group'>
				{!!Form::submit('submit', ['class' => 'btn btn-primary'])!!}
			</div>
</div>