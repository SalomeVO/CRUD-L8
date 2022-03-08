<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profer extends Model
{
    protected $table='profers';
    public $timestamps=false;
    protected $fillable=[
        'id_profer', 'nombre_profe',
    ];

    protected $primaryKey = 'id_profer';
}
