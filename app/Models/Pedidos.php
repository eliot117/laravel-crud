<?php

namespace App\Models;

use App\Models\Clientes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pedidos extends Model
{
    use HasFactory;

    protected $table = "pedidos";

    protected $fillable = ["cliente_id", "codigo", "fecha"];

    public function cliente()
    {
        return $this->belongsTo(Clientes::class, "cliente_id");
    }
}
