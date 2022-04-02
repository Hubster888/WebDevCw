<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Comment;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            "content" => $this->faker->realText($maxNbChars = 500),
            "title" => $this->faker->name(),
            "user_id" => $this->faker->randomDigitNotNull(),
            "post_id" => $this->faker->randomDigitNotNull(),
        ];
    }
}
