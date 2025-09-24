<?php
namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
class Invoice extends BaseModel {
    use SoftDeletes;
    protected $table = "invoices";
    protected $fillable = ['uuid', 'invoice_number', 'client_id', 'amount', 'due_date', 'status', 'related'];
    protected $casts = ['due_date' => 'date', 'related' => 'array'];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
