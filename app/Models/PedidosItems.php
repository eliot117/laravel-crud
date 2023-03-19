<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidosItems extends Model
{
    use HasFactory;

    protected $table = "pedidos_items";

    protected $fillable = ["pedido_id", "articulo_id", "cantidad"];
}
