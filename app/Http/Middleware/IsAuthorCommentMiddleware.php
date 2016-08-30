<?php

namespace PokemonBuddy\Http\Middleware;

use PokemonBuddy\Entities\Place;
use PokemonBuddy\Entities\PlaceComment;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth as Auth;
use Closure;

class IsAuthorCommentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $place = Place::findOrFail($request->place);
        $comment = PlaceComment::findOrFail($request->comment);

        $author_comment_id = $comment->user_id;

        if (Auth::check()) {
            $user_id = Auth::user()->id;
            if ($user_id != $author_comment_id) {
                $status_message = trans('pokemonbuddy.comment.edit_comment_not_allowed',
                    ['place' => $place->name]);

                return redirect(route('place.show', [
                    'language' => $request->language,
                    'place' => $request->place
                ]))->with('status', $status_message);
            }
        } else {
            $status_message = trans('pokemonbuddy.comment.edit_comment_not_allowed',
                ['place' => $place->name]);

            return redirect(route('place.show', [
                'language' => $request->language,
                'place' => $request->place
            ]))->with('status', $status_message);
        }

        return $next($request);
    }
}
