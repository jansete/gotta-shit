<?php

namespace PokemonBuddy\Http\Controllers;

use PokemonBuddy\Entities\Place;
use PokemonBuddy\Entities\PlaceComment;
use PokemonBuddy\Entities\PlaceStar;
use PokemonBuddy\Entities\Subscription;
use PokemonBuddy\Entities\User;
use PokemonBuddy\Http\Requests;
use PokemonBuddy\Http\Controllers\Controller;
use PokemonBuddy\Mailers\AppMailer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class APIController extends Controller {

  public function __construct() {}

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function getPlaces() {
    $places = Place::all();

    if (!empty($places)) {
      return response()->json($places);
    }
    else {
      return response()->json([
        'message' => 'Record not found',
      ], 404);
    }
  }
}
