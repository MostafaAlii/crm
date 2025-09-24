<?php
namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
class Contract extends BaseModel {
    use SoftDeletes;
    protected $table = 'contracts';
    protected $fillable = ['uuid', 'contract_type', 'contract_number', 'client_id', 'start_date', 'end_date', 'value', 'terms'];
    protected $casts = ['start_date' => 'date', 'end_date' => 'date'];
    public function client() {
        return $this->belongsTo(Client::class);
    }
}