@extends('layout.app')

@section('header')
    <h1 style="margin:10rem;">Rick and Morty Api</h1>

    @include('components.search')
@endsection

@section('content')

    <div class="row">
        @foreach ($characters as $character)
            <div class="col-md-4 mb-4">
                <div class="media">
                    <img src="{{ $character['image'] }}" class="mr-3 character-img" alt="{{ $character['name'] }}">
                    <div class="media-body">
                        <h5 class="card-title mt-4">{{ $character['name'] }}</h5>
                        <p class="card-text"><strong>Species:</strong> {{ $character['species'] }}</p>
                        <p class="card-text"><strong>Origin:</strong> {{ $character['origin']['name'] }}</p>
                        <div class="info">
                            @php
                                $firstEpisodeResponse = Http::get($character['episode'][0]);
                                $firstEpisodeName = $firstEpisodeResponse->json()['name'];
                            @endphp
                            <a><strong>Movies:</strong> {{ $firstEpisodeName }}</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $characters->appends(request()->except('page'))->links('pagination.links') }}
@endsection
