<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()

    {
        User::create([
            'name' => 'Mohamad Arif',
            'username' => 'arif',
            'email' => 'Lunix.arif@gmail.com',
            'password' => bcrypt('0099'),
            'is_admin' => '1'

        ]);

        // User::Factory(1)->create();

        Category::create([
            'name' => 'Mechanic',
            'slug' => 'mechanic'
        ]);

        Category::create([
            'name' => 'Electric',
            'slug' => 'electric'
        ]);

        Category::create([
            'name' => 'Instruments',
            'slug' => 'instruments'
        ]);

        Category::create([
            'name' => 'Safety',
            'slug' => 'safety'
        ]);

        Category::create([
            'name' => 'Operation',
            'slug' => 'operation'
        ]);

        // Post::Factory(30)->create();

    }
}
