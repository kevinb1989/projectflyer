@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to Project Flyer</div>

                <div class="panel-body">
                    <h3>This website displays the latest advertisements (or flyers) of Real Estates for Sale.</h3>
                    <h3>And you may post flyers on this website yourself!</h3>
                    <br><br>
                    <p>
                        {!!link_to_route('flyers.index', 'view all flyers', null, ['class' => 'btn btn-success btn-lg'])!!}
                        @unless($signedIn)
                            <a href="{{url('register')}}" class="btn btn-success btn-lg">Become a member</a>
                        @endunless
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
