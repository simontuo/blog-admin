<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Php', 'Laravel', 'Mysql', 'Linux', 'Nginx'
        ];

        foreach ($tags as $tag) {
            factory(\App\Models\Tag::class)->create(['name' => $tag]);
        }
    }
}
