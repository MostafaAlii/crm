<?php
namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
class Part extends BaseModel {
    use SoftDeletes;
    protected $table = "parts";
    protected $fillable = ['uuid', 'name', 'sku', 'quantity', 'price', 'supplier_id', 'location', 'min_stock'];
    public function supplier() {
        return $this->belongsTo(Client::class, 'supplier_id');
    }
}
