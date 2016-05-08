@extends('layouts.default')

@section('content')
    <!-- Page Header -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">All Flyers
                <small>properties</small>
                {!!link_to_route('flyers.create', 'create a new flyer', null, ['class'=>'btn btn-success btn-lg'])!!}
            </h1>

        </div>
    </div>
    <!-- /.row -->

    <!-- Projects Row -->
    @foreach($flyers->chunk(3) as $chunk)
        <div class="row">
            @foreach($chunk as $flyer)
                <div class="col-md-4 portfolio-item">
                    <a href="{{url($flyer->path())}}">
                        @if($firstPhoto = $flyer->photos()->first())
                            <img class="img-responsive" src="{{url($firstPhoto->path)}}" alt="">
                        @else
                            <img class="img-responsive" src="#" alt="">
                        @endif
                    </a>
                    <h3>
                        <a href="{{url($flyer->path())}}">{{$flyer->address}}, {{$flyer->city}}</a>
                    </h3>
                    <p>{{$flyer->shortDescription()}}</p>
                </div>
            @endforeach
        </div>
        <!-- /.row -->
    @endforeach
    

    <hr>

    <!-- Pagination -->
    <div class="row text-center">
        {!!$flyers->render()!!}
    </div>
    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright Project Flyer 2016</p>
            </div>
        </div>
        <!-- /.row -->
    </footer>
@stop







