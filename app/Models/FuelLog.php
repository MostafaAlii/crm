<?php
namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
class FuelLog extends BaseModel {
    use SoftDeletes;
    protected $table = "fuel_logs";
    protected $fillable = ['uuid','vehicle_id', 'driver_id', 'amount', 'liters', 'station', 'odometer', 'filled_at'];
    protected $casts = ['filled_at' => 'datetime'];
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
