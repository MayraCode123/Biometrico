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
        'tipo',
        'time-i',
        'time-f',
        'state',
        'date_id'
    ];
}
