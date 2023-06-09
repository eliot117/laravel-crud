<?php

namespace App\Http\Controllers\Api;

use App\Models\Pedidos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\PedidosItems;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedidos::with(["cliente", "pedidosItems", "pedidosItems.articulos"])->get();
        return response()->json($pedidos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $pedidos = Pedidos::create($request->all());

        $pedidosItems = PedidosItems::create([
            'pedido_id' => $pedidos->id,
            'articulo_id' => $request->articulo_id,
            'cantidad' => $request->cantidad,
        ]);

        DB::commit();
        return response()->json($pedidos);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedidos = Pedidos::with("pedidosItems")->where('id',$id)->first();
        return response()->json($pedidos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        $pedidos = Pedidos::findOrFail($id);
        $pedidos->update($request->all());
        $pedidos->pedidosItems()->update([
            'pedido_id' => $pedidos->id,
            'articulo_id' => $request->articulo_id,
            'cantidad' => $request->cantidad,
        ]);
        DB::commit();
        return response()->json($pedidos);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedidos = Pedidos::findOrFail($id);
        $pedidos->delete();
        return response()->json("Pedido eliminado correctamente");
    }
}
