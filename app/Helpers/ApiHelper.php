<?php

use GuzzleHttp\Client;

/**
 * Helper function for fetching data from TMDB API
 * 
 * @param string $endpoint Endpoint for the API request
 * @param array $params Additional parameters for the API request
 * @return array Decoded response from the API
 */
function getDataFromApi($endpoint, $params = [])
{
    $baseUrl = "https://api.themoviedb.org/3/";
    $apiKey = env('API_TMDB_KEY');
    $language = "pl";

    $params = array_merge($params, [
        "api_key" => $apiKey,
        "language" => $language
    ]);

    $client = new Client();
    $response = $client->get($baseUrl . $endpoint . "?" . http_build_query($params));
    $data = json_decode($response->getBody(), true);

    return $data;
}