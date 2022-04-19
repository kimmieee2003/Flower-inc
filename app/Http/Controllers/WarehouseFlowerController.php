<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use App\Models\Warehouse;
use App\Models\WarehouseFlower;
use Illuminate\Http\Request;

class WarehouseFlowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock = WarehouseFlower::find($id);
        $flowers = Flower::all();
        return view('warehouses.editStock', compact('stock', 'flowers'));
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
        $stock = WarehouseFlower::find($id);
        $stock->flower_id = $request->flower_id;
        $stock->amount = $request->amount;
        $stock->save();
        return redirect()->back()->with('success', 'Stock updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getStock($id)
    {
        $stocks = WarehouseFlower::where('warehouse_id', $id)->get();
        $warehouse = Warehouse::find($id);

        return view('warehouses.stock', compact('stocks', 'warehouse'));
    }

    public function goToAddStock($id)
    {
        $warehouse = Warehouse::find($id);
        $flowers = Flower::all();

        return view('warehouses.addStock', compact('warehouse', 'flowers'));
    }

    public function addStock(Request $request, $id)
    {
        $stock = new WarehouseFlower([
            'warehouse_id' => $id,
            'flower_id' => $request->flower_id,
            'amount' => $request->amount
        ]);
        $stock->save();

        return redirect()->route('get-stock', $id) ->with('success', 'Stock added successfully');
    }
}
