@extends('layouts.skeleton')
@section('title', 'Profil')
@section('content')
    <div class="container">
        <h1>Rekomendacje filmów i seriali</h1>

        <table class="table">
            <thead>
            <tr>
                <th>Tytuł</th>
                <th>Rok produkcji</th>
                <th>Gatunek</th>
                <th>Obsada</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $recommendations->id }}</td>
                    <td>{{ $recommendation['overview'] }}</td>
                    <img src="https://image.tmdb.org/t/p/w400{{ $recommendation['poster_path'] }}" alt=""
                         class="h-full w-full object-cover object-center">
                    </p>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
