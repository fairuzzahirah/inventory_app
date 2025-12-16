<?php

namespace App\Http\Controllers\api;

use App\Models\Unit;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use App\Http\Resources\UnitResource;
use App\Http\Controllers\Controller;


class UnitController extends Controller
{
    public function index()
    {
        return UnitResource::collection(Unit::latest()->paginate(10));
    }

    public function store(StoreUnitRequest $request)
    {
        $unit = Unit::create($request->validated());
        return new UnitResource($unit);
    }

    public function show(Unit $unit)
    {
        return new UnitResource($unit);
    }

    public function update(UpdateUnitRequest $request, Unit $unit)
    {
        $unit->update($request->validated());
        return new UnitResource($unit);
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();
        return response()->json(['message' => 'Unit deleted']);
    }
}
