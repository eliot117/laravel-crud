<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturasItems extends Model
{
    use HasFactory;

    protected $table = "facturas_items";

    protected $fillable = ["factura_id", 'articulo_id', 'cantidad'];
}
