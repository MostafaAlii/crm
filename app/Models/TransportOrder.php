<?php
namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
class TransportOrder extends BaseModel {
    use SoftDeletes;
    protected $table = 'transport_orders';
    protected $fillable = ['uuid', 'order_number', 'shipment_id', 'driver_id', 'vehicle_id', 'route_id', 'assigned_at', 'status', 'fuel_estimate'];
    protected $casts = ['assigned_at' => 'datetime'];


    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
    public function route()
    {
        return $this->belongsTo(RouteModel::class);
    }
    public function gpsTracks()
    {
        return $this->hasMany(GpsTrack::class);
    }
}
