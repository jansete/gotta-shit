<?php

namespace PokemonBuddy\Http\Controllers\Auth;

use PokemonBuddy\Entities\User;
use PokemonBuddy\Http\Controllers\Controller;
use PokemonBuddy\Mailers\AppMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function show($language, $user_id)
    {
        $this->setLanguage($language);

        $user = User::findOrFail($user_id);
        $is_user = $this->is_user($user_id);

        $title = trans('pokemonbuddy.title.user_profile',
            ['user' => $user->username]);

        return view('auth.view', compact('title', 'user', 'is_user'));
    }

    public function edit($language, $user_id)
    {
        $this->setLanguage($language);

        $user = User::findOrFail($user_id);

        if (!$this->is_user($user_id)) {
            $status_message = trans('pokemonbuddy.user.edit_user_not_allowed');

            return redirect(route('user.show', [
                'language' => $language,
                'user' => Auth::user()->id
            ]))->with('status', $status_message);
        }

        $title = trans('pokemonbuddy.title.edit_user',
            ['user' => $user->username]);

        return view('auth.edit', compact('title', 'user'));
    }

    public function update(
        Request $request,
        AppMailer $mailer,
        $language,
        $user_id
    ) {
        $this->setLanguage($language);

        $logout = false;
        $status_message = "";

        if (!$this->is_user($user_id)) {
            $status_message = trans('pokemonbuddy.user.update_user_not_allowed');

            return redirect(route('home',
                ['language' => $language]))->with('status', $status_message);
        }

        $this->validate($request, [
            'full_name' => 'required|max:255',
        ]);

        $user = User::findOrFail($user_id);

        $user->full_name = $request->input('full_name');
        if ($request->input('username') != $user->username) {
            $this->validate($request, [
                'username' => 'required|max:255|unique:users',
            ]);

            $user->username = $request->input('username');
        }

        if ($request->input('email') != $user->email) {
            $this->validate($request, [
                'email' => 'required|email|max:255|unique:users',
            ]);

            $user->email = $request->input('email');
            $user->token = str_random(30);
            $user->modified = true;
            $mailer->sendEmailConfirmationTo($user,
                trans('pokemonbuddy.email.confirm_email_new_subject'));

            $status_message = trans('auth.confirm_email') . "<br/>";
        }

        if (trim($request->input('password')) != "") {
            $this->validate($request, [
                'password' => 'confirmed|min:6',
            ]);

            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        $status_message .= trans('pokemonbuddy.user.updated_user',
            ['user' => $user->full_name]);

        if ($logout) {
            Auth::logout();

            return redirect(route('home',
                ['language' => $language]))->with('status', $status_message);
        }

        return redirect(route('user.show', [
            'language' => $language,
            'user' => Auth::user()->id
        ]))->with('status', $status_message);
    }

    public function is_user($user_id)
    {
        if (Auth::check()) {
            $current_user_id = Auth::user()->id;
            if ($current_user_id == $user_id) {
                return true;
            }
        }

        return false;
    }
}
