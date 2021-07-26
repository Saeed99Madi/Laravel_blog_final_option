<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
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
//         \App\Models\User::factory(10)->create()->each(function($user){
//             $user = (new \App\Models\User)->posts()->save(\App\Models\Post::factory()->make());
//
//         });
//        $user = User::factory()
//            ->has(Post::factory()->count(3))
//            ->create();
        $posts = Post::factory()
            ->count(3)
            ->for(User::factory()->state([
                'name' => 'Jessica Archer',
            ]))
            ->create();

    }
}
