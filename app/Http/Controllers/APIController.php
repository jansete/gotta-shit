<?php

namespace PokemonBuddy\Http\Controllers;

use Carbon\Carbon;
use PokemonBuddy\Entities\Place;

class APIController extends Controller {

  public function __construct() {}

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function getPlaces() {
    $places = Place::with('user')->where('expire_at', '>', Carbon::now())->get();

    $response = [
        'places' => $places,
    ];

    return response()->json($response, 200);
  }
}
