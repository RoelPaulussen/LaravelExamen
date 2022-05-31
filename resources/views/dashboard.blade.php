<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        <form action="/random" method="post">
            @csrf
            <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Random</button>
        </form>
    <form method="post" action="/dashboardsearch">
        @csrf
            <div class="form-group">
       
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="" name="wanted">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Search</button>
                </div>
            </div>
        </form> 
        <div class="row" id="content">
        @foreach ($movies as $movie)
        <div class="col-6">
            <form action="/favorite" method="post">
            @csrf
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{$movie->Poster}}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                
                                <input type="hidden" id="custId" name="Title" value="{{$movie->Title}}">
                                <input type="hidden" id="custId" name="Year" value="{{$movie->Year}}">
                                <input type="hidden" id="custId" name="Poster" value="{{$movie->Poster}}">

                                <h5 class="card-title">{{$movie->Title}}</h5>
                                <p class="card-text">This movie came out in {{$movie->Year}}</p>
                                <p class="card-text"><small class="text-muted"></small></p>
                                <button type="submit" class="btn btn-outline-danger active" data-bs-toggle="button" autocomplete="off" aria-pressed="true">Favorite</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @endforeach
        </div>
        <div class="row" id="footer">

        </div>
    </div>
</x-app-layout>
