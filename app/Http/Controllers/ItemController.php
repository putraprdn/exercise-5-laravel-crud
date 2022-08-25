<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ItemController extends Controller
{
    // Index
    public function index()
    {
        $items = Item::get();

        return view('items.index', compact('items'));
    }

    // Create
    public function create()
    {
        return view("items.create");
    }
    public function store(Request $request)
    {
        $items = Item::create([
            "name" => $request->name,
            "quantity" => $request->quantity,
            "price" => $request->price,
            "status" => $request->status,
        ]);

        return redirect('/');
    }

    // Edit
    public function edit($id)
    {
        $item = Item::findOrFail($id);

        return view('items.edit', compact('item'));
    }
    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->update([
            "name" => $request->name ?? $item->name,
            "quantity" => $request->quantity ?? $item->quantity,
            "price" => $request->price ?? $item->price,
            "status" => $request->status ?? $item->status,
        ]);

        return redirect('/');
    }

    // Destroy
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect('/');
    }
}
