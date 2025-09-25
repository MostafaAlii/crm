<?php

namespace App\Repositories\Eloquents;

use App\Models\{Driver, Nationality, Department, ContractType};
use App\Repositories\Contracts\DriverRepositoryInterface;
use Illuminate\Http\Request;

class DriverRepository extends BaseRepository implements DriverRepositoryInterface {
    protected $rules = [
        'name'   => 'nullable|string|max:255',
        'salary' => 'nullable|numeric'
    ];

    protected function extraData(string $context): array
    {
        return [
            'nationalities'   => Nationality::get(['id', 'name']),
            'departments'     => Department::get(['id', 'name']),
            'contractTypes'   => ContractType::get(['id', 'name']),
        ];
    }

    public function __construct(Driver $model)
    {
        parent::__construct($model);
    }

    protected function extraStoreFields(Request $request): array
    {
        return [
            'identity_number'     => $request->identity_number,
            'license_number'      => $request->license_number,
            'license_expires_at'  => $request->license_expires_at,
            'phone'               => $request->phone,
            'salary'              => $request->salary,
            'fixed_allowance'     => $request->fixed_allowance,
            'bonus_balance'       => $request->bonus_balance,
            'nationality_id'      => $request->nationality_id,
            'contract_type_id'    => $request->contract_type_id,
            'department_id'       => $request->department_id,
            'second_phone'        => $request->second_phone,
            'email'               => $request->email,
            'residence_number'    => $request->residence_number,
            'hire_date'           => $request->hire_date,
        ];
    }

    protected function afterStore($record, Request $request): void {
        if ($request->hasFile('avatar')) {
            $record->updateSingleMedia('driver', $request->file('avatar'), $record, null, 'media', true, false, 'avatar');
        }
        if ($request->hasFile('license')) {
            $record->updateSingleMedia('driver', $request->file('license'), $record, null, 'media', true, false, 'license');
        }
        if ($request->hasFile('identity')) {
            $record->updateSingleMedia('driver', $request->file('avatar'), $record, null, 'media', true, false, 'identity');
        }
    }

    protected function extraUpdateFields(Request $request, $id): array
    {
        $record = $this->model->findOrFail($id);
        $data = [
            'identity_number'     => $request->identity_number,
            'license_number'     => $request->license_number,
            'license_expires_at'     => $request->license_expires_at,
            'phone'     => $request->phone,
            'salary'     => $request->salary,
            'fixed_allowance'     => $request->fixed_allowance,
            'bonus_balance'     => $request->bonus_balance,
            'nationality_id'      => $request->nationality_id,
            'contract_type_id'    => $request->contract_type_id,
            'department_id'       => $request->department_id,
            'second_phone'        => $request->second_phone,
            'email'               => $request->email,
            'residence_number'    => $request->residence_number,
            'hire_date'           => $request->hire_date,
        ];
        if ($request->hasFile('avatar')) {
            $fileName = $record->updateSingleMedia('driver', $request->file('avatar'), $record, null, 'media', true, false, 'avatar');
            $data['avatar'] = $fileName;
        }
        if ($request->hasFile('license')) {
            $fileName = $record->updateSingleMedia('driver', $request->file('license'), $record, null, 'media', true, false, 'license');
            $data['license'] = $fileName;
        }
        if ($request->hasFile('identity')) {
            $fileName = $record->updateSingleMedia('driver', $request->file('avatar'), $record, null, 'media', true, false, 'identity');
            $data['identity'] = $fileName;
        }
        return $data;
    }
}
