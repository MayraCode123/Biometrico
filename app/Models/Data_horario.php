<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_horario extends Model
{
    use HasFactory;
    protected $table = 'data_horario';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'personal_id',
        'horario_id',
        'data_id'
    ];
}
