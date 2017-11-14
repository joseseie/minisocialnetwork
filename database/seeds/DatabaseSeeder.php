<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,100)->create();
        factory(App\Article::class,500)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
