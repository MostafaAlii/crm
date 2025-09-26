<?php

namespace App\Http\Requests\Dashboard\Logistics;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'                   => 'required|string|max:255',
            'client_type'            => 'required|in:logistics,clearance',
            'client_category'        => 'required|in:individual,company,government,partner,other',
            'client_category_other'  => 'nullable|string|max:255',

            'commercial_register_number' => 'nullable|string|max:255',
            'tax_number'                 => 'nullable|string|max:255',
            'business_activity'          => 'nullable|string|max:255',

            'mobile_number'      => 'nullable|string|max:20',
            'landline_number'    => 'nullable|string|max:20',
            'national_address'   => 'nullable|string|max:255',
            'email'              => 'nullable|email|max:255|unique:clients,email',
            'phone'              => 'nullable|string|max:20',

            'contact_full_name'        => 'nullable|string|max:255',
            'contact_national_id'      => 'nullable|string|max:50',
            'contact_mobile_number'    => 'nullable|string|max:20',
            'contact_alt_mobile_number' => 'nullable|string|max:20',
            'contact_email'            => 'nullable|email|max:255',

            'bank_name'            => 'nullable|string|max:255',
            'bank_account_number'  => 'nullable|string|max:255',
            'iban_number'          => 'nullable|string|max:255',
            'account_holder_name'  => 'nullable|string|max:255',
            'account_email'        => 'nullable|email|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'          => __('dashboard/clients.validation.name_required'),
            'client_type.required'   => __('dashboard/clients.validation.client_type_required'),
            'client_category.required' => __('dashboard/clients.validation.client_category_required'),
            'email.email'            => __('dashboard/clients.validation.email_invalid'),
            'email.unique'           => __('dashboard/clients.validation.email_unique'),
        ];
    }
}
