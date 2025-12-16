<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Http\Resources\ItemResource;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with(['category','unit'])->latest()->paginate(10);
        return ItemResource::collection($items);
    }

    public function store(StoreItemRequest $request)
    {
        $data = $request->validated();

        $item = Item::create($data);

        return (new ItemResource($item->load(['category','unit'])))
                ->response()
                ->setStatusCode(201);
    }

    public function show(Item $item)
    {
        return new ItemResource($item->load(['category','unit']));
    }

    public function update(UpdateItemRequest $request, Item $item)
    {
        $item->update($request->validated());

        return new ItemResource($item->load(['category','unit']));
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return response()->json(['message' => 'Item deleted']);
    }
}
