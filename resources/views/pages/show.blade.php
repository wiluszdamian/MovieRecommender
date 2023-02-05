@extends('layouts.nav')
@section('title', 'test')

@section('content')
@if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
<div class="bg-gray-800">
    <div class="pt-6">
      <!-- Image gallery -->
      <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">
        <div class="aspect-w-3 aspect-h-4 hidden overflow-hidden rounded-lg lg:block">
          <img src="https://image.tmdb.org/t/p/w300{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" class="h-full w-full object-cover object-center">
        </div>
        <div class="">
            <iframe width="500px" height="100%" src="https://www.youtube.com/embed/{{ $movie['video'] }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
      <br />
  
      <!-- Product info -->
        <div class="lg:col-span-2 lg:pr-8" style="margin-left: 20;">
          <h1 class="text-2xl font-bold tracking-tight text-gray-200 sm:text-3xl">{{ $movie['title'] }} ({{ date("Y", strtotime($movie['release_date'])) }})</h1><br />
          <h3 class="text-sm font-medium text-gray-200"><b>Description:</b>
            <p>{{ $movie['overview'] }}</p>
          </h3><br/>
          <h3 class="text-sm font-medium text-gray-200"><b>Release date:</b>
            <span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $movie['release_date'] }}</span>
          </h3><br />
          <h3 class="text-sm font-medium text-gray-200"><b>Genres:</b>
            @foreach($movie['genres'] as $genre)
            <span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $genre['name'] }}</span>
            @endforeach
          </h3><br />
          <h3 class="text-sm font-medium text-gray-200"><b>Budget:</b>
            <span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $movie['budget'] }} USD</span>
          </h3><br />
          <h3 class="text-sm font-medium text-gray-200"><b>Tagline:</b>
            <span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $movie['tagline'] }}</span>
          </h3>
        </div><br />
        <h2 class="text-2xl font-bold tracking-tight text-gray-200">Cast</h2>

        <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-9">
              <div>
                <h3 class="text-sm text-gray-300">
                  <a href="#">
                    <div style="display: flex;">
                    @foreach ($actors as $actor)
                    <div style="text-align: center; margin: 5px;">
                        <img src="https://image.tmdb.org/t/p/w300{{ $actor['profile_path'] }}" alt="{{ $movie['title'] }}" class="h-full w-full object-cover object-center">
                        <p style="margin: 8px 0;"><b>{{ $actor['name'] }}</b> ({{ $actor['character'] }})</p>
                    </div>
                    @endforeach
                    </div>
                  </a>
                </h3>
              </div>
        </div>
    </div>
</div>
@endsection