<?php
namespace App\Models;
class Supplier extends BaseModel {
    protected $fillable = [
        'uuid',
        'supplier_type',
        'supplier_type_other',
        'name',
        'commercial_registration_number',
        'tax_number',
        'activity',
        'mobile',
        'phone',
        'email',
        'address',
        'contact_person_name',
        'contact_person_identity',
        'contact_person_mobile',
        'contact_person_alt_mobile',
        'contact_person_email',
        'bank_name',
        'bank_account_number',
        'bank_account_owner',
        'bank_email',
    ];

    public function getSupplierTypeLabelAttribute() {
        if ($this->supplier_type === 'other') {
            return $this->supplier_type_other ?? __('dashboard/supplier.supplier_types.other');
        }

        return __('dashboard/supplier.supplier_types.' . $this->supplier_type);
    }
}
