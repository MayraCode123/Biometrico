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
}
