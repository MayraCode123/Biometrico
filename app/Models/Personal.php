<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    protected $table = 'personal';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'nombre',
        'data_id',
        'area_id',
        'unidad_id',
        'data_personal_id'
    ];
    public function data()
    {
        return $this->belongsToMany(Data::class, 'data_personal');
    }
}
