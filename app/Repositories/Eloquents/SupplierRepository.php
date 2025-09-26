<?php

namespace App\Repositories\Eloquents;

use App\Models\Supplier;
use App\Repositories\Contracts\SupplierRepositoryInterface;
use Illuminate\Http\Request;

class SupplierRepository extends BaseRepository implements SupplierRepositoryInterface
{
    protected $rules = [

    ];

    public function __construct(Supplier $model)
    {
        parent::__construct($model);
    }

    protected function extraStoreFields(Request $request): array
    {
        return [
            'supplier_type'             => $request->supplier_type,
            'supplier_type_other'       => $request->supplier_type_other,
            'name'                      => $request->name,
            'commercial_registration_number' => $request->commercial_registration_number,
            'tax_number'                => $request->tax_number,
            'activity'                  => $request->activity,
            'mobile'                    => $request->mobile,
            'phone'                     => $request->phone,
            'email'                     => $request->email,
            'address'                   => $request->address,

            // جهة الاتصال
            'contact_person_name'       => $request->contact_person_name,
            'contact_person_identity'   => $request->contact_person_identity,
            'contact_person_mobile'     => $request->contact_person_mobile,
            'contact_person_alt_mobile' => $request->contact_person_alt_mobile,
            'contact_person_email'      => $request->contact_person_email,

            // البنك
            'bank_name'                 => $request->bank_name,
            'bank_account_number'       => $request->bank_account_number,
            'bank_account_owner'        => $request->bank_account_owner,
            'bank_email'                => $request->bank_email,
        ];
    }

    protected function extraUpdateFields(Request $request, $id): array
    {
        $record = $this->model->findOrFail($id);

        return [
            'supplier_type'             => $request->supplier_type,
            'supplier_type_other'       => $request->supplier_type_other,
            'name'                      => $request->name,
            'commercial_registration_number' => $request->commercial_registration_number,
            'tax_number'                => $request->tax_number,
            'activity'                  => $request->activity,
            'mobile'                    => $request->mobile,
            'phone'                     => $request->phone,
            'email'                     => $request->email,
            'address'                   => $request->address,

            // جهة الاتصال
            'contact_person_name'       => $request->contact_person_name,
            'contact_person_identity'   => $request->contact_person_identity,
            'contact_person_mobile'     => $request->contact_person_mobile,
            'contact_person_alt_mobile' => $request->contact_person_alt_mobile,
            'contact_person_email'      => $request->contact_person_email,

            // البنك
            'bank_name'                 => $request->bank_name,
            'bank_account_number'       => $request->bank_account_number,
            'bank_account_owner'        => $request->bank_account_owner,
            'bank_email'                => $request->bank_email,
        ];
    }
}
