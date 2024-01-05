<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Blog;
use \App\Models\Category;
use \App\Models\User;

class BlogFactory extends Factory
{
    protected $model = Blog::class;
     
    public function definition(): array
    {
        return [
            'category_id'=>Category::factory(),
            'user_id'=>User::factory(),
            'title'=> $this->faker->sentence(),
            'slug'=> $this->faker->slug(),
            'intro'=> $this->faker->sentence(),
            'body'=> $this->faker->paragraph()
        ];
    }
}
