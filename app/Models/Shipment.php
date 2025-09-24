<?php
namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
class Shipment extends BaseModel {
    use SoftDeletes;
    protected $table = 'shipments';
    protected $fillable = ['uuid', 'shipment_number', 'expected_arrival_date', 'client_id', 'status', 'total_cost', 'attachments'];
    protected $casts = ['expected_arrival_date' => 'date', 'attachments' => 'array'];


    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function customsDeclaration()
    {
        return $this->hasOne(CustomDeclaration::class);
    }
}
