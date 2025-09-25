<?php

namespace App\Repositories\Eloquents;

use App\Models\{Vehicle};
use App\Repositories\Contracts\VehicleRepositoryInterface;
use Illuminate\Http\Request;

class VehicleRepository extends BaseRepository implements VehicleRepositoryInterface {
    protected $rules = [
        'plate_number' => 'required|string|max:255|unique:vehicles,plate_number',
        'type'         => 'required|string|max:255',
        'status'       => 'nullable|string|in:active,inactive,maintenance',
        'capacity_kg'  => 'nullable|numeric',
        'manufacture_year' => 'nullable|integer|min:1900',
    ];

    public function __construct(Vehicle $model) {
        parent::__construct($model);
    }

    protected function extraStoreFields(Request $request): array {
        return [
            'plate_number'       => $request->plate_number,
            'type'               => $request->type,
            'model'              => $request->model,
            'vehicle_make'       => $request->vehicle_make,
            'manufacture_year'   => $request->manufacture_year,
            'color'              => $request->color,
            'capacity_kg'        => $request->capacity_kg,
            'chassis_number'     => $request->chassis_number,
            'serial_number'      => $request->serial_number,
            'owner_identity'     => $request->owner_identity,
            'user_identity'      => $request->user_identity,
            'insurance_company'  => $request->insurance_company,
            'policy_number'      => $request->policy_number,
            'policy_start_date'  => $request->policy_start_date,
            'policy_end_date'    => $request->policy_end_date,
            'insurance_type'     => $request->insurance_type,
            'insurance_type_other' => $request->insurance_type_other,
            'inspection_date'    => $request->inspection_date,
            'status'             => $request->status,
        ];
    }

    protected function extraUpdateFields(Request $request, $id): array {
        $record = $this->model->findOrFail($id);
        $data = [
            'plate_number'       => $request->plate_number,
            'type'               => $request->type,
            'model'              => $request->model,
            'vehicle_make'       => $request->vehicle_make,
            'manufacture_year'   => $request->manufacture_year,
            'color'              => $request->color,
            'capacity_kg'        => $request->capacity_kg,
            'chassis_number'     => $request->chassis_number,
            'serial_number'      => $request->serial_number,
            'owner_identity'     => $request->owner_identity,
            'user_identity'      => $request->user_identity,
            'insurance_company'  => $request->insurance_company,
            'policy_number'      => $request->policy_number,
            'policy_start_date'  => $request->policy_start_date,
            'policy_end_date'    => $request->policy_end_date,
            'insurance_type'     => $request->insurance_type,
            'insurance_type_other' => $request->insurance_type_other,
            'inspection_date'    => $request->inspection_date,
            'status'             => $request->status,
        ];
        return $data;
    }
}
