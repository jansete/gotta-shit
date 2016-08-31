<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {
    private $databaseSeeder;

    public function __construct(DatabaseSeeder $databaseSeeder) {
        $this->databaseSeeder = new DatabaseSeeder();
    }

    public function run() {
        $usersAmount = $this->databaseSeeder->getUsersAmount();

        factory('PokemonBuddy\Entities\User', $usersAmount - 2)->create();
        factory('PokemonBuddy\Entities\User', 'admin')->create();
        factory('PokemonBuddy\Entities\User', 'admin_jansete')->create();
    }
}
