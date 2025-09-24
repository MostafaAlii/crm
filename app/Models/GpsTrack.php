<?php
namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
class GpsTrack extends BaseModel {
    use SoftDeletes;
    protected $table = "gps_tracks";
    protected $fillable = ['uuid', 'vehicle_id', 'latitude', 'longitude', 'speed', 'heading', 'recorded_at', 'transport_order_id'];
    protected $casts = ['recorded_at' => 'datetime'];
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
    public function transportOrder()
    {
        return $this->belongsTo(TransportOrder::class);
    }
}