<?php
namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
class DriverIncentive extends BaseModel {
    use SoftDeletes;
    protected $table = "driver_incentives";
    protected $fillable = ['uuid', 'driver_id', 'amount', 'type', 'reason', 'custody', 'related_order_id'];
    protected $casts = ['custody' => 'array'];
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
