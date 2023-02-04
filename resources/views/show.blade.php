@extends('layouts.nav')

@section('content')
<h1>{{ $movie['title'] }}</h1>
<p>{{ $movie['overview'] }}</p>
@endsection