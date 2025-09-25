<?php
namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
class Client extends BaseModel {
    use SoftDeletes;
    protected $table = 'clients';
    protected $fillable = [
        'uuid',
        'name',
        'client_type',
        'type',
        'contact_name',
        'phone',
        'email',
        'address',
        'meta',
        'client_category',
        'client_category_other',
        'commercial_register_number',
        'tax_number',
        'business_activity',
        'mobile_number',
        'landline_number',
        'national_address',
        'contact_full_name',
        'contact_national_id',
        'contact_mobile_number',
        'contact_alt_mobile_number',
        'contact_email',
        'bank_name',
        'bank_account_number',
        'iban_number',
        'account_holder_name',
        'account_email'
    ];
    protected $casts = ['meta' => 'array'];

    public function getClientCategoryLabelAttribute()
    {
        return match ($this->client_category) {
            'individual' => 'فرد',
            'company'    => 'شركة',
            'government' => 'جهة حكومية',
            'partner'    => 'شريك',
            'other'      => 'آخر',
            default      => '-',
        };
    }

    public function getClientTypeLabelAttribute()
    {
        return match ($this->client_type) {
            'logistics' => 'لوجستيك',
            'customs'   => 'تخليص جمركي',
            default     => '-',
        };
    }


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