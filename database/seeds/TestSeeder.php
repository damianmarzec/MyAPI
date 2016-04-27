<?php

use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\User::class, 10)
            ->create()
            ->each(function($u) {
                $u->itemsTaken()->save(factory(App\Item::class)->make());
                $u->itemsGiven()->save(factory(App\Item::class)->make());
            });
    }
}
