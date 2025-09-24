<?php
namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
class Inspection extends BaseModel {
    use SoftDeletes;
    protected $table = "inspections";
    protected $fillable = ['uuid', 'vehicle_id', 'date', 'result', 'alerts'];
    protected $casts = ['date' => 'date'];
    public function vehicle() {
        return $this->belongsTo(Vehicle::class);
    }
}
