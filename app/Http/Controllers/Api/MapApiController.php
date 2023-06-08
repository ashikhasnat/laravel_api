<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MapApiController extends Controller
{
    public function __invoke(Request $request)
    {
        $latitude = $request->input('lat');
        $longitude = $request->input('long');
        $radius = 5000;
        $apiKey = env('MAP_API_KEY');

        $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location={$latitude},{$longitude}&radius={$radius}&key={$apiKey}";
        // Fetches nearby places based on the provided coordinates.
        $response = Http::get($url)->json();

        return $response;
    }
}
