<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $idUser = User::all()->random()->id;
        $marcas = fake()->randomElement(['Toyota', 'BMW', 'Mercedes-Benz', 'Honda', 'Nissan', 'Ford', 'Porsche', 'Hyundai', 'Renault', 'Peugeot', 'Audi', 'Chevrolet', 'Suzuki', 'Fiat', 'Land Rover' ]);
        return [
            'user_id' => $idUser,
            'mark' => $marcas,
            'version' => fake()->currencyCode(),
            'model' => fake()->userName(),
            'color' => fake()->colorName(),
            'plate' => fake()->randomNumber(6, true),
        ];
    }
}
