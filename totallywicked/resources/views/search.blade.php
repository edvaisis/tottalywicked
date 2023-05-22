@extends('layout.app')

@section('content')
    <h1>Search Results</h1>

    <form action="{{ route('search') }}" method="GET">
        <input type="text" name="query" placeholder="Enter character name">
        <button type="submit">Search</button>
    </form>

    <ul>
        @foreach ($characters as $character)
            <li>{{ $character['name'] }}</li>
        @endforeach
    </ul>
@endsection
