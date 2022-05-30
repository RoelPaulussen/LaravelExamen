@extends('layouts.customlayout')

@section('content')

    @foreach ($movies as $movie)
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{$movie->Poster}}" class="img-fluid rounded-start" alt="..." name = "Poster" value="{{$movie->Poster}}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title" name = "Title" value="{{$movie->Title}}">{{$movie->Title}}</h5>
                    <p class="card-text" name = "Year" value="{{$movie->Year}}">This movie came out in {{$movie->Year}}</p>
                    <p class="card-text"><small class="text-muted"></small></p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection