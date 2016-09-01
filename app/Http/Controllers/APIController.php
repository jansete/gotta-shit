<?php

namespace PokemonBuddy\Http\Controllers;

use PokemonBuddy\Entities\Place;

class APIController extends Controller {

  public function __construct() {}

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function getPlaces() {
    $places = Place::with('user')->get();

    $response = [
        'places' => $places,
    ];

    return response()->json($response, 200);
  }
}
