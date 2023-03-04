<?php

namespace App\Services;

use GuzzleHttp\Client;

class TmdbApiService
{
    protected $apiKey;
    protected $client;
    protected $baseUrl;
    protected $language;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->baseUrl = "https://api.themoviedb.org/3/";
        $this->apiKey = config('app.tmdb_api_key');
        $this->language = "pl";
    }

    public function getMovieDetails(int $movieId, string $language = "pl"): array
    {
        return $this->getDataFromApi("movie/{$movieId}", ['language' => $language]);
    }

    public function getTVSeriesDetails(int $tvSeriesId, string $language = "pl"): array
    {
        return $this->getDataFromApi("tv/{$tvSeriesId}", ['language' => $language]);
    }

    public function getPersonDetails(int $personId, string $language = "pl"): array
    {
        return $this->getDataFromApi("person/{$personId}", ['language' => $language]);
    }

    public function getMovieCredits(int $id, int $count = 5): array
    {
        $data = $this->getDataFromApi("movie/{$id}/credits");
        return array_slice($data['cast'], 0, $count);
    }

    public function getTvCredits(int $id, int $count = 5): array
    {
        $data = $this->getDataFromApi("tv/{$id}/credits");
        return array_slice($data['cast'], 0, $count);
    }

    public function getActorMovieCredits(int $id, int $count = 5): array
    {
        $data = $this->getDataFromApi("person/{$id}/movie_credits");
        return array_slice($data['cast'], 0, $count);
    }

    public function getActorTvCredits(int $id, int $count = 5): array
    {
        $data = $this->getDataFromApi("person/{$id}/tv_credits");
        return array_slice($data['cast'], 0, $count);
    }

    public function getRecommendations(string $type, int $id, string $language = "pl", int $count = 5): array
    {
        return $this->getDataFromApi("{$type}/{$id}/recommendations", ['language' => $language])['results'];
    }

    public function getMovies(int $page = 1, array $userPreferencesIds = [], string $language = "pl", array $followedActorsIds = []): array
    {
        $params = [
            "page" => $page,
            "language" => $language,
            "with_cast" => $followedActorsIds,
            "with_genres" => $userPreferencesIds,
        ];
        return $this->getDataFromApi("discover/movie", $params);
    }

    public function getTVSeries(int $page = 1, array $userPreferencesIds = [], string $language = "pl"): array
    {
        $params = [
            "page" => $page,
            "language" => $language,
            "with_genres" => $userPreferencesIds,
        ];
        return $this->getDataFromApi("discover/tv", $params);
    }

    public function getTrendingMovies(string $language = "pl", int $count = 5): array
    {
        return $this->getDataFromApi("trending/movie/week", ['language' => $language])['results'];
    }

    public function getTrendingTvSeries(string $language = "pl", int $count = 5): array
    {
        return $this->getDataFromApi("trending/tv/week", ['language' => $language])['results'];
    }

    public function getTrendingPersons(string $language = "pl", int $count = 5): array
    {
        return $this->getDataFromApi("trending/person/week", ['language' => $language])['results'];
    }

    public function searchMovies(string $query, int $year, int $genre, string $language): array
    {
        $params = [
            "query" => $query,
            "year" => $year,
            "with_genres" => $genre,
            "language" => $language,
        ];
        return $this->getDataFromApi("search/movie", $params)['results'];
    }

    public function searchTVSeries(string $query, int $year, int $genre, string $language): array
    {
        $params = [
            "query" => $query,
            "first_air_date_year" => $year,
            "with_genres" => $genre,
            "language" => $language,
        ];
        return $this->getDataFromApi("search/tv", $params)['results'];
    }

    public function searchActors(string $query, string $country, string $language): array
    {
        $params = [
            "query" => $query,
            "region" => $country,
            "language" => $language,
        ];
        return $this->getDataFromApi("search/person", $params)['results'];
    }

    public function getMovieGenres(string $language = "pl"): array
    {
        return $this->getDataFromApi("genre/movie/list", ['language' => $language])['genres'];
    }

    public function getTVGenres(string $language = "pl"): array
    {
        return $this->getDataFromApi("genre/tv/list", ['language' => $language])['genres'];
    }

    public function getCountries(string $language = "pl", string $query = null): array
    {
        $data = $this->getDataFromApi("configuration/countries", ['language' => $language]);

        if ($query) {
            $data = array_filter($data, function ($item) use ($query) {
                return stripos($item['english_name'], $query) !== false;
            });
        }

        return $data;
    }

    public function getMovieOrTVSeriesDetails(int $movieOrTVSeriesId): array
    {
        $params = [
            'api_key' => $this->apiKey,
            'language' => $this->language,
            'append_to_response' => 'videos,images,credits,recommendations,similar',
        ];

        $response = $this->client->get($this->baseUrl . "movie/{$movieOrTVSeriesId}", ['query' => $params]);
        return json_decode($response->getBody(), true);
    }

    private function getDataFromApi(string $endpoint, array $params = []): array
    {
        $params = array_merge($params, [
            "api_key" => $this->apiKey
        ]);

        $response = $this->client->get($this->baseUrl . $endpoint . "?" . http_build_query($params));
        $data = json_decode($response->getBody(), true);

        return $data;
    }
}
