<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Item::orderBy('created_at', 'DESC')->get();
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
        $newItem = new Item;
        $newItem->name = $request->item["name"];
        $newItem->save();

        return $newItem;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $editItem = Item::findOrFail($id);
        // return $editItem->completed;
        if ($editItem->completed == 1) {
            $editItem->completed = 0;
            $editItem->completed_at = null;
            $editItem->save();
        } else {
            $editItem->completed = 1;
            $editItem->completed_at = Carbon::now();
            $editItem->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteItem = Item::find($id);

        if ($deleteItem) {
            $deleteItem->delete();
            return "Item succesfully Deleted";
        }

        return "Item Not Found";
    }

    public function destroyComplete()
    {
        $deleteItem = Item::where('completed', '=', true);

        if ($deleteItem) {
            $deleteItem->delete();
            return "Item succesfully Deleted";
        }

        return "Item Not Found";
    }

    public function completed()
    {
        return Item::where('completed', '=', true)->orderBy('created_at', 'DESC')->get();
    }

    public function active()
    {
        return Item::where('completed', '=', false)->orderBy('created_at', 'DESC')->get();
    }

    public function count()
    {
        return Item::all()->count();
    }

    public function completedAll()
    {
        $items = Item::all();
        foreach ($items as $item) {
            if ($item->completed == false) {
                $id = $item->id;
                $Change = Item::find($id);
                $Change->completed = true;
                $Change->completed_at = Carbon::now();
                $Change->save();
            }
        }
    }

    public function activeAll()
    {
        $items = Item::all();
        foreach ($items as $item) {
            if ($item->completed == true) {
                $id = $item->id;
                $Change = Item::find($id);
                $Change->completed = false;
                $Change->completed_at = null;
                $Change->save();
            }
        }
    }
}
