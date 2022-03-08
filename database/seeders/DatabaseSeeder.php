<?php

namespace Database\Seeders;

use App\Models\Estudiante;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema; //importamos la clase para funcione el escema


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //desactivar orden de construccion de llaves foraneas
        Schema::disableForeignKeyConstraints();
           Estudiante::truncate(); //llamamos al modelo
        Schema::enableForeignKeyConstraints(); //volvemos a activar el orden de las llaves foraneas

        $this->call(studenSeeder::class); //llamo a la clase seeder que cree

    }
}
