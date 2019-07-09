<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Category;
use App\Task;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create()->categories()
        ->saveMany(
            factory(Category::class, 5)->make())
        ->each(function ($c) {
            $c->tasks()->saveMany(
                factory(Task::class, 3)->make()
            );
        });
    }
}
