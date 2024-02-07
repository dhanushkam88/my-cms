<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;
class PageFactory extends Factory
{
    protected $model = Page::class;

    public function definition()
    {
        return [
            'parent_id' => null, // You can adjust this as needed
            'slug' => $this->faker->slug,
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
