<?php

use Illuminate\Database\Seeder;

class AvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idention = new \Identicon\Identicon();

        $users = \App\Models\User::withoutGlobalScopes()->get();

        foreach ($users as $user) {
            $user->avatar = $idention->getImageDataUri($user->name);
            $user->save();
        }
    }
}
