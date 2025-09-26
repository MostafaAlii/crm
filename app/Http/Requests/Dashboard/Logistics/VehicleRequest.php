<?php

namespace App\Http\Requests\Dashboard\Logistics;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('vehicle');

        return [
            'plate_number'        => 'required|string|max:255|unique:vehicles,plate_number,' . $id,
            'type'                => 'required|string|max:255',
            'model'               => 'nullable|string|max:255',
            'vehicle_make'        => 'nullable|string|max:255',
            'manufacture_year'    => 'nullable|integer|min:1900|max:' . date('Y'),
            'color'               => 'nullable|string|max:100',
            'capacity_kg'         => 'nullable|numeric|min:0',
            'chassis_number'      => 'nullable|string|max:255',
            'serial_number'       => 'nullable|string|max:255',
            'owner_identity'      => 'nullable|numeric|max:255',
            'user_identity'       => 'nullable|numeric|max:255',
            'insurance_company'   => 'nullable|string|max:255',
            'policy_number'       => 'nullable|string|max:255',
            'policy_start_date'   => 'nullable|date',
            'policy_end_date'     => 'nullable|date|after_or_equal:policy_start_date',
            'insurance_type'      => 'nullable|string|in:comprehensive,third_party,other',
            'insurance_type_other' => 'nullable|string|max:255|required_if:insurance_type,other',
            'inspection_date'     => 'nullable|date',
            'status'              => 'nullable|string|in:active,inactive,maintenance',
        ];
    }

    public function messages(): array
    {
        return [
            'plate_number.required' => __('dashboard/vehicle.plate_number_required'),
            'plate_number.unique'   => __('dashboard/vehicle.plate_number_unique'),
            'type.required'         => __('dashboard/vehicle.type_required'),
            'manufacture_year.integer' => __('dashboard/vehicle.manufacture_year_integer'),
            'manufacture_year.min'  => __('dashboard/vehicle.manufacture_year_min'),
            'manufacture_year.max'  => __('dashboard/vehicle.manufacture_year_max'),
            'capacity_kg.numeric'   => __('dashboard/vehicle.capacity_numeric'),
            'policy_end_date.after_or_equal' => __('dashboard/vehicle.policy_end_date_after'),
            'insurance_type.in'     => __('dashboard/vehicle.insurance_type_in'),
            'status.in'             => __('dashboard/vehicle.status_in'),
            'insurance_type_other.required_if' => __('dashboard/vehicle.insurance_type_other_required_if'),
            'owner_identity.numeric' => __('dashboard/vehicle.owner_identity_numeric'),
            'user_identity.numeric'  => __('dashboard/vehicle.user_identity_numeric'),
        ];
    }
}
