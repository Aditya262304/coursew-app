<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_ids = DB::table('users')->select('id')->get();
        $user_id = fake()->unique()->randomElement($user_ids)->id;
        return [
            //
            'user_id'=> $user_id,
            'nametag'=> fake()->regexify('[@]{1}[0-9A-Za-z]{8}')
        ];
    }
}
