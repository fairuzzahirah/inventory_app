<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MaintenanceRequest extends Model  
{
    use HasFactory;
    
    protected $fillable = [
        'item_id',
        'requested_by',
        'unit_id',
        'priority',
        'status',
        'description',
    ];

// MaintenanceRequest.php
    public function item() {
        return $this->belongsTo(Item::class);
    }

    public function requestedBy() {
        return $this->belongsTo(User::class, 'requested_by');
    }

    public function unit() {
        return $this->belongsTo(Unit::class);
    }

    public function technicians() {
        return $this->belongsToMany(User::class, 'maintenance_request_user')
                    ->withPivot('role')
                    ->withTimestamps();
    }


}

