<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->unique()->regexify('tt[0-9]{9}'),
            'nama' => $this->faker->sentence,
            'nip' => $this->faker->unique()->randomNumber(6),
            'category_id' => $this->faker->randomElement([1, 2, 3]),
            'ttl' => $this->faker->sentence,
            'jabatan' => $this->faker->sentence,
            'pendidikan' => $this->faker->paragraph,
            'prestasi' => $this->faker->paragraph,
            'foto_sampul' => 'default.jpg',
        ];
    }
}
