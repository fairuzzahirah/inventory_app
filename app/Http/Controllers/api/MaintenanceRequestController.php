<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\MaintenanceRequest;
use App\Http\Requests\StoreMaintenanceRequest;
use Illuminate\Http\Request;
use App\Http\Resources\MaintenanceRequestResource;

class MaintenanceRequestController extends Controller
{
    /**
     * GET /maintenance-requests
     * List semua maintenance request
     */
    public function index(Request $request)
    {
        $query = MaintenanceRequest::with([
            'item',
            'unit',
            'requestedBy',
            'technicians'
        ]);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $requests = $query->latest()->paginate(10);

        return MaintenanceRequestResource::collection($requests);
    }

    /**
     * GET /maintenance-requests/{id}
     * Detail satu maintenance request
     */
    public function show(MaintenanceRequest $maintenance)
    {
        return new MaintenanceRequestResource(
            $maintenance->load(['item', 'unit', 'requestedBy', 'technicians'])
        );
    }

    /**
     * POST /maintenance-requests
     * Tambah maintenance request baru
     */
    public function store(StoreMaintenanceRequest $request)
    {
        $data = $request->validated();
        $data['requested_by'] = auth()->id();
        $data['unit_id'] = auth()->user()->unit_id;
        $data['status'] = 'open';

        $maintenance = MaintenanceRequest::create($data);

        return new MaintenanceRequestResource($maintenance);
    }

    /**
     * PUT /maintenance-requests/{id}
     * Update maintenance request (priority, description, status)
     */
    public function update(Request $request, MaintenanceRequest $maintenance)
    {
        $request->validate([
            'priority' => 'nullable|in:low,medium,high',
            'description' => 'nullable|string|max:1000',
            'status' => 'nullable|in:open,in_progress,closed'
        ]);

        $maintenance->update($request->only(['priority', 'description', 'status']));

        return new MaintenanceRequestResource($maintenance);
    }

    /**
     * DELETE /maintenance-requests/{id}
     * Hapus maintenance request
     */
    public function destroy(MaintenanceRequest $maintenance)
    {
        $maintenance->delete();

        return response()->json([
            'message' => 'Maintenance request deleted'
        ]);
    }
}
