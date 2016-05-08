@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in!
                    </div>
                    <br><br>
                    <p>
                        {!!link_to_route('flyers.index', 'view latest flyers', null, ['class' => 'btn btn-success btn-lg'])!!}
                        <a href="{{url('users/profile/my-flyers')}}" class="btn btn-success btn-lg">your own flyers</a>
                        {!!link_to_route('flyers.create', 'create a new flyer', null, ['class' => 'btn btn-success btn-lg'])!!}
                    </p>

            </div>
        </div>
    </div>
</div>
@endsection
