<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\GoogleMapsHelper; // Import GoogleMapsHelper

class GeneralController extends Controller
{
    /**
     * Show the index page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('general.index'); // blade file is named index.blade.php and is located in the views/general directory
    }

    /**
     * Geocode the given address using Google Maps API.
     *
     * @param string $address The address to geocode.
     * @return \Illuminate\Http\JsonResponse
     */
    public function geocode($address)
    {
        // Call the geocodeAddress function from GoogleMapsHelper
        $result = GoogleMapsHelper::geocodeAddress($address);

        // Return the geocoding result as JSON response
        return response()->json($result);
    }

    /**
     * Show the Google Maps view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showMap()
    {
        return view('general.googlemaps');
    }
}
