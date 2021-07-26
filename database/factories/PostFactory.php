<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory() ,
            'title' => $this->faker->sentence,
            'post_image' => $this->faker->imageUrl('900', '300'),
            'body' => $this->faker->paragraph,
        ];
    }

}
