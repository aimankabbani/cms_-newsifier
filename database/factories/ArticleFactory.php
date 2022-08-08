<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
      return [
          'title_ar' => fake()->name(),
          'title_en' => fake()->name(),
          'content_ar' => fake()->regexify('[A-Za-z0-9]{100}'),
          'content_en' => fake()->regexify('[A-Za-z0-9]{100}'),
          'user_id' => User::where('user_group_id','=',User::GROUP_ADMIN)->get()->random()->id
      ];
    }
}
