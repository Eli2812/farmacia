<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'cantidad', 'precio'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }


}