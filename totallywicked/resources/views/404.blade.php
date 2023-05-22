@extends('layout.app')

<title>404 - Page Not Found</title>

@section('content')
    <h1>404 - Page Not Found</h1>
    <p>Page could not be found.</p>
    <a href="{{ route('home') }}">Go back </a>
@endsection
