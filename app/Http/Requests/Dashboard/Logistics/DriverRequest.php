<?php

namespace App\Http\Requests\Dashboard\Logistics;

use Illuminate\Foundation\Http\FormRequest;

class DriverRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'               => 'required|string|max:255',
            'identity_number'    => 'required|string|max:50|unique:drivers,identity_number,' . $this->driver,
            'license_number'     => 'required|string|max:50|unique:drivers,license_number,' . $this->driver,
            'license_expires_at' => 'required|date|after:today',
            'phone'              => 'required|string|max:20|unique:drivers,phone,' . $this->driver,
            'second_phone'       => 'nullable|string|max:20',
            'email'              => 'nullable|email|max:255|unique:drivers,email,' . $this->driver,
            'residence_number'   => 'nullable|string|max:50',
            'hire_date'          => 'required|date',
            'nationality_id'     => 'required|exists:nationalities,id',
            'contract_type_id'   => 'required|exists:contract_types,id',
            'department_id'      => 'required|exists:departments,id',
            'salary'             => 'required|numeric|min:0',
            'fixed_allowance'    => 'nullable|numeric|min:0',
            'bonus_balance'      => 'nullable|numeric|min:0',
            'avatar'             => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'license'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'identity'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'               => __('dashboard/driver.name_required'),
            'name.string'                 => __('dashboard/driver.name_string'),
            'name.max'                    => __('dashboard/driver.name_max'),

            'identity_number.required'    => __('dashboard/driver.identity_number_required'),
            'identity_number.string'      => __('dashboard/driver.identity_number_string'),
            'identity_number.max'         => __('dashboard/driver.identity_number_max'),
            'identity_number.unique'      => __('dashboard/driver.identity_number_unique'),

            'license_number.required'     => __('dashboard/driver.license_number_required'),
            'license_number.string'       => __('dashboard/driver.license_number_string'),
            'license_number.max'          => __('dashboard/driver.license_number_max'),
            'license_number.unique'       => __('dashboard/driver.license_number_unique'),

            'license_expires_at.required' => __('dashboard/driver.license_expires_at_required'),
            'license_expires_at.date'     => __('dashboard/driver.license_expires_at_date'),
            'license_expires_at.after'    => __('dashboard/driver.license_expires_at_after'),

            'phone.required'              => __('dashboard/driver.phone_required'),
            'phone.string'                => __('dashboard/driver.phone_string'),
            'phone.max'                   => __('dashboard/driver.phone_max'),
            'phone.unique'                => __('dashboard/driver.phone_unique'),

            'second_phone.string'         => __('dashboard/driver.second_phone_string'),
            'second_phone.max'            => __('dashboard/driver.second_phone_max'),

            'email.email'                 => __('dashboard/driver.email_email'),
            'email.max'                   => __('dashboard/driver.email_max'),
            'email.unique'                => __('dashboard/driver.email_unique'),

            'residence_number.string'     => __('dashboard/driver.residence_number_string'),
            'residence_number.max'        => __('dashboard/driver.residence_number_max'),

            'hire_date.required'          => __('dashboard/driver.hire_date_required'),
            'hire_date.date'              => __('dashboard/driver.hire_date_date'),

            'nationality_id.required'     => __('dashboard/driver.nationality_id_required'),
            'nationality_id.exists'       => __('dashboard/driver.nationality_id_exists'),

            'contract_type_id.required'   => __('dashboard/driver.contract_type_id_required'),
            'contract_type_id.exists'     => __('dashboard/driver.contract_type_id_exists'),

            'department_id.required'      => __('dashboard/driver.department_id_required'),
            'department_id.exists'        => __('dashboard/driver.department_id_exists'),

            'salary.required'             => __('dashboard/driver.salary_required'),
            'salary.numeric'              => __('dashboard/driver.salary_numeric'),
            'salary.min'                  => __('dashboard/driver.salary_min'),

            'fixed_allowance.numeric'     => __('dashboard/driver.fixed_allowance_numeric'),
            'fixed_allowance.min'         => __('dashboard/driver.fixed_allowance_min'),

            'bonus_balance.numeric'       => __('dashboard/driver.bonus_balance_numeric'),
            'bonus_balance.min'           => __('dashboard/driver.bonus_balance_min'),

            'avatar.image'                => __('dashboard/driver.avatar_image'),
            'avatar.mimes'                => __('dashboard/driver.avatar_mimes'),
            'avatar.max'                  => __('dashboard/driver.avatar_max'),

            'license.image'               => __('dashboard/driver.license_image'),
            'license.mimes'               => __('dashboard/driver.license_mimes'),
            'license.max'                 => __('dashboard/driver.license_max'),

            'identity.image'              => __('dashboard/driver.identity_image'),
            'identity.mimes'              => __('dashboard/driver.identity_mimes'),
            'identity.max'                => __('dashboard/driver.identity_max'),
        ];
    }
}
