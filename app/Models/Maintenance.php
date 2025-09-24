<?php
namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
class Maintenance extends BaseModel {
    use SoftDeletes;
    protected $table = "maintenances";
    protected $fillable = ['uuid', 'vehicle_id', 'maintenance_type', 'date', 'cost', 'supplier', 'notes'];
    protected $casts = ['date' => 'date'];
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}