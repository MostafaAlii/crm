<?php
namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
class Waybill extends BaseModel {
    use SoftDeletes;
    protected $table = "waybills";
    protected $fillable = ['uuid', 'waybill_number','issued_at','client_id','driver_id','vehicle_id','cost','details'];
    protected $casts = ['issued_at'=>'date','details'=>'array'];
    public function client() {
        return $this->belongsTo(Client::class);
    }
}
