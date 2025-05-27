<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Compra extends Model
{
    protected $fillable = ['producto_id', 'cantidad', 'precio_total'];

    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class);
    }
}