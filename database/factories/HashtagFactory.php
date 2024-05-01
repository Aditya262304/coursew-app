<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hashtag>
 */
class HashtagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $post_ids = DB::table('posts')->select('id')->get();
        // $post_id =fake()->randomElement($post_ids)->id;
        return [
            //
            //'post_id'=> $post_id,
            'hashtag'=> fake()->regexify('[#]{1}[0-9A-Za-z]{6}')
        ];
    }
}
