<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
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
    public function definition(): array
    {
        $user_ids = DB::table('users')->select('id')->get();
        $user_id = fake()->randomElement($user_ids)->id;

        $post_ids = DB::table('posts')->select('id')->get();
        $post_id =fake()->randomElement($post_ids)->id;
        return [
            //
            'user_id'=> $user_id,
            'post_id'=> $post_id,
            'comment'=> fake()->paragraph()
        ];
    }
}
