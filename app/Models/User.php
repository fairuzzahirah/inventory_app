<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens,HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'unit_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function maintenanceRequests()
    {
        // requested_by
        return $this->hasMany(MaintenanceRequest::class, 'requested_by');
    }

    public function assignedMaintenance()
    {
        // many to many helper/leader
        return $this->belongsToMany(MaintenanceRequest::class, 'maintenance_request_user')
                    ->withPivot('role')
                    ->withTimestamps();
    }
}
