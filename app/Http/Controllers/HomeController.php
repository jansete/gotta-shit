<?php

namespace PokemonBuddy\Http\Controllers;

use PokemonBuddy\Entities\Place;
use PokemonBuddy\Entities\PlaceComment;
use PokemonBuddy\Entities\PlaceStar;
use PokemonBuddy\Entities\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's principal screen.
    |
    */

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        $this->setLanguage();

        $places = Place::paginate(1);

        $title = trans('pokemonbuddy.title.welcome');

        return view('home', compact('title', 'places'));
    }

    /**
     * Show the application dashboard to the user.
     *
     * @param $language
     * @return \PokemonBuddy\Http\Controllers\Response
     */
    public function index_locale($language)
    {
        $this->setLanguage($language);

        $places = Place::paginate(1);

        $title = trans('pokemonbuddy.title.welcome');

        return view('home', compact('title', 'places'));
    }
}
