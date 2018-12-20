<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'gattsu',
            'email' => 'gattsu@gmail.com',
            'password' => '$2a$10$04Jj5lK9QUzKlcGxybIsRuZfBjyv8WY6lqHivyxSxNZ73KkrDw0O6'
        ]);
        $this->call(UsersTableSeeder::class);

        DB::table('categories')->insert([
            'title' => 'Arts & Marketing',
            'user_id' => 2
        ]);
        DB::table('categories')->insert([
            'title' => 'Business Services',
            'user_id' => 3
        ]);
        DB::table('categories')->insert([
            'title' => 'Event Planning',
            'user_id' => 4
        ]);
        DB::table('categories')->insert([
            'title' => 'Home Improvement',
            'user_id' => 5
        ]);
        DB::table('categories')->insert([
            'title' => 'Uncategorised',
            'user_id' => 1
        ]);
        $this->call(CategoriesTableSeeder::class);

        $this->call(ArticlesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
    }
}
