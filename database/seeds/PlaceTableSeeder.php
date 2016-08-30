<?php

use Illuminate\Database\Seeder;

class PlaceTableSeeder extends Seeder
{
    private $databaseSeeder;

    public function __construct(DatabaseSeeder $databaseSeeder)
    {
        $this->databaseSeeder = new DatabaseSeeder();
    }

    public function run()
    {
        $placesAmount = $this->databaseSeeder->getPlacesAmount();

        factory('PokemonBuddy\Entities\Place', $placesAmount)->create();
    }
}
