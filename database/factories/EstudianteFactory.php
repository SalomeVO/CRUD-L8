<?php

namespace Database\Factories;

use App\Models\Estudiante;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstudianteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $studen = Estudiante::class;

    public function definition()
    {
        return [
            //los campos para llenar
            'nombre'=>$this->faker->name,
            'correo'=>$this->faker->email ,
            'grado'=>$this->faker->randomDigit,
            'foto'=>$this->faker->imageUrl($width = "100px", $height = "100px"),
        ];
    }
}
