<?php
namespace App\Models;
class Vehicle extends BaseModel {
    protected $table = "vehicles";
    protected $fillable = ['uuid','plate_number', 'type', 'model', 'capacity_kg', 'inspection_date', 'status', 'documents',
        'owner_identity',
        'user_identity',
        'chassis_number',
        'serial_number',
        'vehicle_make',
        'manufacture_year',
        'color',
        'insurance_company',
        'policy_number',
        'policy_start_date',
        'policy_end_date',
        'insurance_type',
        'insurance_type_other'];

    protected $casts = [
        'inspection_date' => 'date',
        'policy_start_date' => 'date',
        'policy_end_date' => 'date',
        'manufacture_year' => 'integer',
    ];
    public function getInsuranceTypeLabelAttribute(): string
    {
        return match ($this->insurance_type) {
            'comprehensive' => 'شامل',
            'third_party'   => 'ضد الغير',
            'other'         => 'آخر',
            default         => '-',
        };
    }
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
