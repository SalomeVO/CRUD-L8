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
        $foto=('uploads/photo5127491190038571555 (2).jpg');
        return [
            //los campos para llenar
            'nombre'=>$this->faker->name,
            'correo'=>$this->faker->email ,
            'grado'=>$this->faker->randomDigit,
            'foto'=>$foto,
            'id_profer' => $this->faker->numberBetween(1,4) //el rango que quiero que me llene
        ];
    }
}
