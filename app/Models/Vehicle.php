<?php
namespace App\Models;
class Vehicle extends BaseModel {
    protected $table = "vehicles";
    protected $fillable = ['uuid','plate_number', 'type', 'model', 'capacity_kg', 'inspection_date', 'status', 'documents'];
    protected $casts = ['inspection_date' => 'date'];
    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }
    public function inspections()
    {
        return $this->hasMany(Inspection::class);
    }
    public function fuelLogs()
    {
        return $this->hasMany(FuelLog::class);
    }
    public function gpsTracks()
    {
        return $this->hasMany(GpsTrack::class);
    }
}
