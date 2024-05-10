<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPersonal extends Model
{
    use HasFactory;
    protected $table = 'data_personal';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'data_id'
    ];

}
