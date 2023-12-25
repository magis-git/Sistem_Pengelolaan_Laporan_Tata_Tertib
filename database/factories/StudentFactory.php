<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $number = $this->faker->numberBetween(7, 9);
        $letter = chr(rand(97, 101)); 
        return [
            'name' => $this->faker->name(),
            'nis' => Str::random(17),
            'kelas' => $number . $letter
        ];
    }
}
