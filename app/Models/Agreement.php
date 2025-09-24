<?php
namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
class Agreement extends BaseModel {
    use SoftDeletes;
    protected $table = 'agreements';
    protected $fillable = ['uuid','agreement_number', 'party_name', 'party_type', 'start_date', 'end_date', 'financial_terms', 'notes'];
    protected $casts = ['start_date' => 'date', 'end_date' => 'date'];
}
