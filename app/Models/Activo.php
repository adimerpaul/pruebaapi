<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activo extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'codigo', 'descripcion', 'cantidad_inicial'];

    protected $appends = ['stock'];

    public function getStockAttribute()
    {
        return $this->cantidad_inicial;
    }
    protected $hidden = ['created_at', 'updated_at'];
}
