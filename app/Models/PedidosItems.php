<?php

namespace App\Models;

use App\Models\Articulos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PedidosItems extends Model
{
    use HasFactory;

    protected $table = "pedidos_items";

    protected $fillable = ["pedido_id", "articulo_id", "cantidad"];

    public function articulos(): BelongsTo
    {
        return $this->belongsTo(Articulos::class, 'articulo_id');
    }
}
