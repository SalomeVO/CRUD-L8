<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    public $table='estudiante';

    public $timestamps=false;
    protected $fillable=[
        'id','nombre','correo','grado', 'foto',
    ];

    protected $primaryKey='id';

}
