<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    protected $table = 'data';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id_biometrico',
        'name',
        'time',
        'state',
        'type',
        'type_register'
    ];

    // Relación muchos a muchos con Horario a través de DataHorario
    public function horarios()
    {
        return $this->belongsToMany(Horario::class, 'data_horario', 'data_id_biometrico', 'horario_id');
    }
    public function personal()
    {
        return $this->belongsToMany(Personal::class, 'data_personal');
    }
}
