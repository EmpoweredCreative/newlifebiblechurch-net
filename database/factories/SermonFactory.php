<?php

namespace Database\Factories;

use App\Models\Sermon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Sermon>
 */
class SermonFactory extends Factory
{
    protected $model = Sermon::class;

    public function definition(): array
    {
        return [
            'title' => 'Test sermon '.fake()->unique()->numerify('####'),
            'description' => fake()->paragraph(),
            'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'published_at' => now(),
        ];
    }
}
