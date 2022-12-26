<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\maintenance>
 */
class MaintenanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $idVehicle = Vehicle::all()->random()->id;
        $typeMaintenance = fake()->randomElement(['Preventiva', 'Corretiva', 'Revisão', 'Reparo', 'Reforma', 'Troca']);

        return [
            'vehicle_id'=> $idVehicle,
            'maintenance'=> $typeMaintenance,
            'description'=> fake()->text(),
            'scheduling'=> fake()->dateTimeBetween('now', '+14 day')->format('Y-m-d'),
        ];
    }
}
