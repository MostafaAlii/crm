<?php
namespace App\Http\Requests\Dashboard\Logistics;
use Illuminate\Foundation\Http\FormRequest;
class ContractRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('id'); // عشان نستخدمه في الـ unique وقت التحديث

        return [
            'first_party_name' => 'required|string|max:255',
            'first_party_commercial_register' => 'nullable|string|max:255',
            'second_party_name' => 'required|string|max:255',
            'second_party_commercial_register' => 'nullable|string|max:255',
            'second_party_type' => 'required|in:individual,company,government,other',
            'second_party_type_other' => 'nullable|required_if:second_party_type,other|string|max:255',

            'contract_number' => 'required|string|max:255|unique:contracts,contract_number,' . $id,
            'signed_at' => 'required|date',
            'start_date' => 'required|date|after_or_equal:signed_at',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'duration_in_days' => 'nullable|integer|min:1',
            'contract_type' => 'required|in:services,supply,transport,consulting,other',
            'contract_type_other' => 'nullable|required_if:contract_type,other|string|max:255',

            'contract_value' => 'nullable|numeric|min:0',
            'currency' => 'required|in:SAR,USD,other',
            'currency_other' => 'nullable|required_if:currency,other|string|max:255',

            'first_party_approval' => 'boolean',
            'second_party_approval' => 'boolean',

            'terms' => 'nullable|array',
            'terms.*' => 'required|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'first_party_name.required' => __('dashboard/contracts.validation.first_party_name_required'),
            'second_party_name.required' => __('dashboard/contracts.validation.second_party_name_required'),
            'second_party_type.required' => __('dashboard/contracts.validation.second_party_type_required'),
            'second_party_type_other.required_if' => __('dashboard/contracts.validation.second_party_type_other_required'),
            'contract_number.required' => __('dashboard/contracts.validation.contract_number_required'),
            'contract_number.unique' => __('dashboard/contracts.validation.contract_number_unique'),
            'signed_at.required' => __('dashboard/contracts.validation.signed_at_required'),
            'start_date.required' => __('dashboard/contracts.validation.start_date_required'),
            'end_date.after_or_equal' => __('dashboard/contracts.validation.end_date_after_or_equal'),
            'contract_type.required' => __('dashboard/contracts.validation.contract_type_required'),
            'contract_type_other.required_if' => __('dashboard/contracts.validation.contract_type_other_required'),
            'currency.required' => __('dashboard/contracts.validation.currency_required'),
            'currency_other.required_if' => __('dashboard/contracts.validation.currency_other_required'),
            'terms.*.required' => __('dashboard/contracts.validation.terms_required'),
        ];
    }
}
