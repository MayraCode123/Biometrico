<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;
    protected $table = 'unidad';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'name',
    ];
}
