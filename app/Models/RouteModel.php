<?php
namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
class RouteModel extends BaseModel {
    use SoftDeletes;
    protected $table = 'routes';
    use SoftDeletes;
    protected $fillable = ['origin_city_id', 'destination_city_id', 'distance_km', 'expected_duration_minutes', 'price', 'active'];


    public function originCity()
    {
        return $this->belongsTo(City::class, 'origin_city_id');
    }
    public function destinationCity()
    {
        return $this->belongsTo(City::class, 'destination_city_id');
    }
}
