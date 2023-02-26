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

    public function getMovieDetails($movieId, $language = "pl")
    {
        $endpoint = "movie/" . $movieId;
        $params = [
            "language" => $language
        ];
        $data = $this->getDataFromApi($endpoint, $params);
        return $data;
    }

    public function getTVSeriesDetails($tvSeriesId, $language = "pl")
    {
        $endpoint = "tv/" . $tvSeriesId;
        $params = [
            "language" => $language
        ];
        $data = $this->getDataFromApi($endpoint, $params);
        return $data;
    }

    public function getPersonDetails($personId, $language = "pl")
    {
        $endpoint = "person/" . $personId;
        $params = [
            "language" => $language
        ];
        $data = $this->getDataFromApi($endpoint, $params);
        return $data;
    }

    public function getMovieCredits($id, $language = "pl", $count = 5)
    {
        $endpoint = "movie/" . $id . "/credits";
        $data = $this->getDataFromApi($endpoint);
        return array_slice($data['cast'], 0, $count);
    }

    public function getTvCredits($id, $language = "pl", $count = 5)
    {
        $endpoint = "tv/" . $id . "/credits";
        $data = $this->getDataFromApi($endpoint);
        return array_slice($data['cast'], 0, $count);
    }

    public function getActorMovieCredits($id, $language = "pl", $count = 5)
    {
        $endpoint = "person/" . $id . "/movie_credits";
        $data = $this->getDataFromApi($endpoint);

        return array_slice($data['cast'], 0, $count);
    }

    public function getActorTvCredits($id, $language = "pl", $count = 5)
    {
        $endpoint = "person/" . $id . "/tv_credits";
        $data = $this->getDataFromApi($endpoint);

        return array_slice($data['cast'], 0, $count);
    }

    public function getRecommendations($type, $id, $language = "pl", $count = 5)
    {
        $endpoint = "$type/$id/recommendations";
        $params = [
            "language" => $language
        ];
        $data = $this->getDataFromApi($endpoint, $params);
        return array_slice($data['results'], 0, $count);
    }

    public function getTrendingMovies($language = "pl", $count = 5)
    {
        $endpoint = "trending/movie/week";
        $params = [
            "language" => $language
        ];
        $data = $this->getDataFromApi($endpoint, $params);
        return array_slice($data['results'], 0, $count);
    }

    public function getTrendingTvSeries($language = "pl", $count = 5)
    {
        $endpoint = "trending/tv/week";
        $params = [
            "language" => $language
        ];
        $data = $this->getDataFromApi($endpoint, $params);
        return array_slice($data['results'], 0, $count);
    }

    public function getTrendingPersons($language = "pl", $count = 5)
    {
        $endpoint = "trending/person/week";
        $params = [
            "language" => $language
        ];
        $data = $this->getDataFromApi($endpoint, $params);
        return array_slice($data['results'], 0, $count);
    }

    private function getDataFromApi($endpoint, $params = [])
    {
        $params = array_merge($params, [
            "api_key" => $this->apiKey
        ]);

        $client = new Client();
        $response = $client->get($this->baseUrl . $endpoint . "?" . http_build_query($params));
        $data = json_decode($response->getBody(), true);

        return $data;
    }

    public function searchMovies($query, $year, $genre, $language)
    {
        $endpoint = "search/movie";
        $params = [
            "query" => $query,
            "year" => $year,
            "with_genres" => $genre,
            "language" => $language,
        ];
        $data = $this->getDataFromApi($endpoint, $params);

        return $data['results'];
    }

    public function searchTVSeries($query, $year, $genre, $language)
    {
        $endpoint = "search/tv";
        $params = [
            "query" => $query,
            "first_air_date_year" => $year,
            "with_genres" => $genre,
            "language" => $language,
        ];
        $data = $this->getDataFromApi($endpoint, $params);

        return $data['results'];
    }

    public function searchActors($query, $country, $language)
    {
        $endpoint = "search/person";
        $params = [
            "query" => $query,
            "region" => $country,
            "language" => $language,
        ];
        $data = $this->getDataFromApi($endpoint, $params);

        return $data['results'];
    }

    public function getMovieGenres($language = "pl")
    {
        $endpoint = "genre/movie/list";
        $params = [
            "language" => $language
        ];
        $data = $this->getDataFromApi($endpoint, $params);
        return $data['genres'];
    }

    public function getCountries($language = "pl", $query = null)
    {
        $endpoint = "configuration/countries";
        $params = [
            "language" => $language
        ];
        $data = $this->getDataFromApi($endpoint, $params);

        if ($query) {
            $data = array_filter($data, function ($item) use ($query) {
                return stripos($item['english_name'], $query) !== false;
            });
        }

        return $data;
    }
}