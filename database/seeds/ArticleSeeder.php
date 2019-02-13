<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\Models\User::get();

        foreach ($users as $user) {
            factory(\App\Models\Article::class, 3)->create([
               'user_id' => $user->id
            ]);
        }
    }
}
