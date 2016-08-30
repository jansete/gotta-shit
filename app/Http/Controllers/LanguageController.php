<?php

namespace PokemonBuddy\Http\Controllers;

use PokemonBuddy\Entities\Place;
use PokemonBuddy\Entities\PlaceComment;
use PokemonBuddy\Entities\PlaceStar;
use PokemonBuddy\Entities\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Language Controller
    |--------------------------------------------------------------------------
    |
    | This controller changes your application language
    |
    */

    /**
     * Change the language
     *
     * @return Response
     */
    public function change($language)
    {
        App::setLocale($language);

        Session::put('language', $language);

        if (Auth::check()) {
            Auth::user()->setLanguage($language);
        }

        return redirect()->back();
    }
}
