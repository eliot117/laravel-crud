<?php

namespace App\Models;

use App\Models\Clientes;
use App\Models\PedidosItems;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pedidos extends Model
{
    use HasFactory;

    protected $table = "pedidos";

    protected $fillable = ["cliente_id", "codigo", "fecha"];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Clientes::class, "cliente_id");
    }

    public function pedidosItems(): HasMany
    {
        return $this->hasMany(PedidosItems::class, 'pedido_id');
    }
}
