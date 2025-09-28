<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ContractTerm extends Model {
    protected $fillable = [
        'contract_id',
        'term',
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
