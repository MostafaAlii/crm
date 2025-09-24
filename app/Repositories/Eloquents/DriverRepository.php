<?php

namespace App\Repositories\Eloquents;

use App\Models\Driver;
use App\Repositories\Contracts\DriverRepositoryInterface;
use Illuminate\Http\Request;

class DriverRepository extends BaseRepository implements DriverRepositoryInterface
{
    protected $rules = [
        'name'   => 'nullable|string|max:255',
        'salary' => 'nullable|numeric'
    ];

    public function __construct(Driver $model)
    {
        parent::__construct($model);
    }

    /*protected function extraStoreFields(Request $request): array
    {
        return [
            'identity_number'     => $request->identity_number,
            'license_number'     => $request->license_number,
            'license_expires_at'     => $request->license_expires_at,
            'phone'     => $request->phone,
            'salary'     => $request->salary,
            'fixed_allowance'     => $request->fixed_allowance,
            'bonus_balance'     => $request->bonus_balance,
        ];
        if ($request->hasFile('avatar')) {
            $fileName = $record->updateSingleMedia('driver', $request->file('avatar'), $record, null, 'media', true, false, 'avatar');
            return $fileName;
        }
        if ($request->hasFile('license')) {
            $fileName = $record->updateSingleMedia('driver', $request->file('license'), $record, null, 'media', true, false, 'license');
            return $fileName;
        }
        if ($request->hasFile('identity')) {
            $fileName = $record->updateSingleMedia('driver', $request->file('avatar'), $record, null, 'media', true, false, 'identity');
            return $fileName;
        }

    }*/
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