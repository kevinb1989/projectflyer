@extends('layouts.default')

@section('title')
    <title>Your flyers</title>
@stop

@section('content')
<!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Your Flyers
                    <small>created by {{$user->name}}</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        @foreach($flyers as $flyer)
            <div class="row">
                <div class="col-md-7">
                    <a href="{{url($flyer->path())}}">
                        @if($firstPhoto = $flyer->photos()->first())
                            <img class="img-responsive" src="{{url($firstPhoto->path)}}" alt="photo">
                        @else
                            <img class="img-responsive" src="http://placehold.it/500x300" alt="photo">
                        @endif
                    </a>
                </div>
                <div class="col-md-5">
                    <h3>{{$flyer->address}}, {{$flyer->city}}, {{$flyer->state}}</h3>
                    <h4>Published at {{date('F d, Y', strtotime($flyer->created_at))}}</h4>
                    <p>{{$flyer->description}}</p>
                    <a class="btn btn-success" href="{{url($flyer->path())}}">View Flyer</a>
                </div>
            </div>
            <hr>
        @endforeach
        
        <hr>

        <!-- Pagination -->
        <div class="row text-center">
            {!!$flyers->render()!!}
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Project Flyer 2016</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>
@stop

        

    
