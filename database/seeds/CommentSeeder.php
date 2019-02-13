<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\Models\User::get();

        $articles = \App\Models\Article::get();

        foreach ($users as $user) {
            foreach ($articles as $article) {
                if ($user->id != $article->user_id) {
                    factory(\App\Models\Comment::class)->create([
                        'user_id'          => $user->id,
                        'commentable_id'   => $article->id,
                        'commentable_type' => get_class($article),
                    ]);
                }
            }
        }
    }
}
