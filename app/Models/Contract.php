<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Contract extends Model {
    use HasFactory;
    protected $fillable = [
        'first_party_name',
        'first_party_commercial_register',
        'second_party_name',
        'second_party_commercial_register',
        'second_party_type',
        'second_party_type_other',
        'contract_number',
        'signed_at',
        'start_date',
        'end_date',
        'duration_in_days',
        'contract_type',
        'contract_type_other',
        'contract_value',
        'currency',
        'currency_other',
        'first_party_approval',
        'second_party_approval',
    ];

    protected $casts = [
        'contract_type' => 'string',
    ];

    public function getContractTypeLabelAttribute(): string
    {
        $type = $this->contract_type;

        if (is_array($type)) {
            $type = $type[0] ?? 'other';
        }

        $translationKey = 'contracts.contract_type.' . $type;
        $translated = trans($translationKey);
        return $translationKey === $translated ? $type : $translated;
    }




    public function terms()
    {
        return $this->hasMany(ContractTerm::class);
    }
}
