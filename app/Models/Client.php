<?php
namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
class Client extends BaseModel {
    use SoftDeletes;
    protected $table = 'clients';
    protected $fillable = ['uuid', 'name', 'client_type', 'type', 'contact_name', 'phone', 'email', 'address', 'meta'];
    protected $casts = ['meta' => 'array'];


    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}