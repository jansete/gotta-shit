<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\App;

class CommentTest extends TestCase
{
    use DatabaseTransactions;

    public function test_comment_lang()
    {
        $this->assertTrue(lang::has('pokemonbuddy.comment.create_comment_label'));
        $this->assertTrue(lang::has('pokemonbuddy.comment.create_comment'));
        $this->assertTrue(lang::has('pokemonbuddy.comment.comments'));
        $this->assertTrue(lang::has('pokemonbuddy.comment.created_comment'));
        $this->assertTrue(lang::has('pokemonbuddy.comment.edit_comment'));
        $this->assertTrue(lang::has('pokemonbuddy.comment.update_comment'));
        $this->assertTrue(lang::has('pokemonbuddy.comment.updated_comment'));
        $this->assertTrue(lang::has('pokemonbuddy.comment.delete_comment'));
        $this->assertTrue(lang::has('pokemonbuddy.comment.deleted_comment'));
    }

    public function test_comment_create()
    {
        $user = factory('PokemonBuddy\Entities\User')->create();

        $this->actingAs($user)
            ->visit('/en/place/create')
            ->type('Bar Pepe', 'name')
            ->type('40.5', 'geo_lat')
            ->type('-3.4', 'geo_lng')
            ->select('3', 'stars')
            ->press(trans('pokemonbuddy.place.create_place'))
            ->see(trans('pokemonbuddy.comment.create_comment_label'))
            ->see(trans_choice('pokemonbuddy.comment.comments', 0,
                ['number_of_comments' => 0]))
            ->type('Hello! Great Site', 'comment')
            ->press(trans('pokemonbuddy.comment.create_comment'))
            ->see(trans('pokemonbuddy.comment.created_comment',
                ['place' => 'Bar Pepe']))
            ->see(trans_choice('pokemonbuddy.comment.comments', 1,
                ['number_of_comments' => 1]))
            ->see('3.00')
            ->see('Hello! Great Site');
    }

    public function test_comment_edit()
    {
        $user = factory('PokemonBuddy\Entities\User')->create();

        $this->actingAs($user)
            ->visit('/en/place/create')
            ->type('Bar Pepe', 'name')
            ->type('40.5', 'geo_lat')
            ->type('-3.4', 'geo_lng')
            ->select('3', 'stars')
            ->press(trans('pokemonbuddy.place.create_place'))
            ->type('Hello! Great Site', 'comment')
            ->press(trans('pokemonbuddy.comment.create_comment'))
            ->see('3.00')
            ->see('Hello! Great Site')
            ->click(trans('pokemonbuddy.comment.edit_comment'))
            ->dontSee('3.00')
            ->type('Adios', 'comment')
            ->press(trans('pokemonbuddy.comment.update_comment'))
            ->see(trans('pokemonbuddy.comment.updated_comment',
                ['place' => 'Bar Pepe']))
            ->see('3.00')
            ->see('Adios');
    }

    public function test_comment_delete()
    {
        $user = factory('PokemonBuddy\Entities\User')->create();

        $this->actingAs($user)
            ->visit('/en/place/create')
            ->type('Bar Pepe', 'name')
            ->type('40.5', 'geo_lat')
            ->type('-3.4', 'geo_lng')
            ->select('3', 'stars')
            ->press(trans('pokemonbuddy.place.create_place'))
            ->type('Hello! Great Site', 'comment')
            ->press(trans('pokemonbuddy.comment.create_comment'))
            ->see('3.00')
            ->see('Hello! Great Site')
            ->press(trans('pokemonbuddy.comment.delete_comment'))
            ->see(trans('pokemonbuddy.comment.deleted_comment',
                ['place' => 'Bar Pepe']))
            ->see('3.00')
            ->dontSee('Hello! Great Site');
    }
}
