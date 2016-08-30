<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Lang;

class PlaceTest extends TestCase
{
    use DatabaseTransactions;

    public function test_comment_lang()
    {
        $this->assertTrue(lang::has('pokemonbuddy.place.create_place'));
        $this->assertTrue(lang::has('pokemonbuddy.place.created_place'));
        $this->assertTrue(lang::has('pokemonbuddy.place.edit_place'));
        $this->assertTrue(lang::has('pokemonbuddy.place.update_place'));
        $this->assertTrue(lang::has('pokemonbuddy.place.updated_place'));
        $this->assertTrue(lang::has('pokemonbuddy.place.delete_place'));
        $this->assertTrue(lang::has('pokemonbuddy.place.deleted_place'));
    }

    public function test_place_create()
    {
        $user = factory('PokemonBuddy\Entities\User')->create();

        $this->actingAs($user)
            ->visit('/en/place/create')
            ->type('Bar Pepe', 'name')
            ->type('40.5', 'geo_lat')
            ->type('-3.4', 'geo_lng')
            ->select('4', 'stars')
            ->press(trans('pokemonbuddy.place.create_place'))
            ->see(trans('pokemonbuddy.place.created_place',
                ['place' => 'Bar Pepe']))
            ->see('4.00');
    }

    public function test_place_edit()
    {
        $user = factory('PokemonBuddy\Entities\User')->create();

        $this->actingAs($user)
            ->visit('/en/place/create')
            ->type('Bar Pepe', 'name')
            ->type('40.5', 'geo_lat')
            ->type('-3.4', 'geo_lng')
            ->select('4', 'stars')
            ->press(trans('pokemonbuddy.place.create_place'))
            ->click(trans('pokemonbuddy.place.edit_place'))
            ->type('Bar Pepe 2', 'name')
            ->type('40.5', 'geo_lat')
            ->type('-3.4', 'geo_lng')
            ->select('5', 'stars')
            ->press(trans('pokemonbuddy.place.update_place'))
            ->see(trans('pokemonbuddy.place.updated_place',
                ['place' => 'Bar Pepe 2']));
    }

    public function test_place_delete()
    {
        $user = factory('PokemonBuddy\Entities\User')->create();

        $this->actingAs($user)
            ->visit('/en/place/create')
            ->type('Bar Pepe', 'name')
            ->type('40.5', 'geo_lat')
            ->type('-3.4', 'geo_lng')
            ->select('4', 'stars')
            ->press(trans('pokemonbuddy.place.create_place'))
            ->see(trans('pokemonbuddy.place.created_place',
                ['place' => 'Bar Pepe']))
            ->see('4.00')
            ->press(trans('pokemonbuddy.place.delete_place'))
            ->see(trans('pokemonbuddy.place.deleted_place',
                ['place' => 'Bar Pepe']))
            ->seePageIs('/en/place/user');
    }
}
