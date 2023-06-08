<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $latitude = $request->input('lat') ?? 37.7749;
        $longitude = $request->input('long') ?? -122.4194;
        $radius = 5000;
        $apiKey = env('MAP_API');

        $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location={$latitude},{$longitude}&radius={$radius}&key={$apiKey}";
        // Fetches nearby places based on the provided coordinates.
        $response = Http::get($url)->json();

        return $response;
    }
}
