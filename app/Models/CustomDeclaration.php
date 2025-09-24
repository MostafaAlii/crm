<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
class CustomDeclaration extends BaseModel {
    use SoftDeletes;
    protected $table = 'custom_declarations';
    protected $fillable = ['uuid', 'shipment_id', 'declaration_number', 'goods_details', 'hs_code', 'port', 'attachments'];
    protected $casts = ['attachments' => 'array'];
    public function shipment() {
        return $this->belongsTo(Shipment::class);
    }
}