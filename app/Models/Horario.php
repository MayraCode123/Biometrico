<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    protected $table = 'horario';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'min_hr_entrada',
        'hr_entrada',
        'hr_entrada_min_tolerancia',
        'hr_entrada_min_retraso',
        'hr_salida',
        'hr_min_salida'
    ];
}
