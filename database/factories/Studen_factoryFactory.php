<?php

namespace Database\Factories;

use App\Models\Estudiante;
use Illuminate\Database\Eloquent\Factories\Factory;

class Studen_factoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $user = Estudiante::class;
    public function definition()
    {
        return [
            'nombre'=>$this->faker->name,
            'correo'=>$this->faker->unique()->safeEmail,
            'grado'=>$this->faker->name,
            'foto'=>$this->faker->name,

        ];
    }
}
