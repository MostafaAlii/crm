<?php

namespace App\Http\Requests\Dashboard\Logistics;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $supplier = $this->route('supplier');
        $supplierId = $supplier instanceof \App\Models\Supplier ? $supplier->id : $supplier;
        return [
            'supplier_type'        => 'required|in:individual,company,government,other',
            'supplier_type_other'     => 'required_if:supplier_type,other|string|max:255',

            'name'                         => 'required|string|max:255',
            'commercial_registration_number' => 'nullable|numeric',
            'tax_number'                   => 'nullable|numeric',
            'activity'                     => 'nullable|string|max:255',

            'mobile'           => 'nullable|numeric',
            'phone'            => 'nullable|numeric',
            'email'            => 'nullable|email|max:255|unique:suppliers,email,' . $supplierId,
            'address'          => 'nullable|string|max:255',

            'contact_person_name'      => 'nullable|string|max:255',
            'contact_person_identity'  => 'nullable|numeric',
            'contact_person_mobile'    => 'nullable|numeric',
            'contact_person_alt_mobile' => 'nullable|numeric',
            'contact_person_email'     => 'nullable|email|max:255',

            'bank_name'             => 'nullable|string|max:255',
            'bank_account_number'   => 'nullable|numeric',
            'bank_account_owner'    => 'nullable|string|max:255',
            'bank_email'            => 'nullable|email|max:255|unique:suppliers,bank_email,' . $supplierId,
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'                   => __('dashboard/supplier.validation.name_required'),
            'supplier_type.required'          => __('dashboard/supplier.validation.supplier_type_required'),
            'supplier_type.required'                => __('dashboard/supplier.validation.supplier_type_required'),
            'email.email'                     => __('dashboard/supplier.validation.email_invalid'),
            'email.unique'                    => __('dashboard/supplier.validation.email_unique'),
            'commercial_registration_number.numeric' => __('dashboard/supplier.validation.commercial_registration_number_numeric'),
            'tax_number.numeric'              => __('dashboard/supplier.validation.tax_number_numeric'),
            'contact_person_identity.numeric' => __('dashboard/supplier.validation.contact_person_identity_numeric'),
            'bank_account_number.numeric'     => __('dashboard/supplier.validation.bank_account_number_numeric'),


            'contact_person_mobile.numeric'         => __('dashboard/supplier.validation.contact_person_mobile_numeric'),
            'contact_person_alt_mobile.numeric'     => __('dashboard/supplier.validation.contact_person_alt_mobile_numeric'),
            'mobile.numeric'                        => __('dashboard/supplier.validation.mobile_numeric'),
            'phone.numeric'                         => __('dashboard/supplier.validation.phone_numeric'),
        ];
    }
}
