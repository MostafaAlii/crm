<?php

namespace App\Repositories\Eloquents;

use App\Models\Client;
use App\Repositories\Contracts\ClientRepositoryInterface;
use Illuminate\Http\Request;

class ClientRepository extends BaseRepository implements ClientRepositoryInterface
{
    protected $rules = [
        'name'                          => 'required|string|max:255',
        'client_type'                   => 'nullable|string|in:logistics,clearance',
        'type'                          => 'nullable|string|in:individual,company,government,partner,other',
        'client_category'               => 'nullable|string|in:individual,company,government,partner,other',
        'email'                         => 'nullable|email|max:255',
        'phone'                         => 'nullable|string|max:20',
        'mobile_number'                 => 'nullable|string|max:20',
        'landline_number'               => 'nullable|string|max:20',
        'commercial_register_number'    => 'nullable|string|max:255',
        'tax_number'                    => 'nullable|string|max:255',
        'business_activity'             => 'nullable|string|max:255',
        'national_address'              => 'nullable|string|max:255',
        'contact_full_name'             => 'nullable|string|max:255',
        'contact_national_id'           => 'nullable|string|max:255',
        'contact_mobile_number'         => 'nullable|string|max:20',
        'contact_alt_mobile_number'     => 'nullable|string|max:20',
        'contact_email'                 => 'nullable|email|max:255',
        'bank_name'                     => 'nullable|string|max:255',
        'bank_account_number'           => 'nullable|string|max:255',
        'iban_number'                   => 'nullable|string|max:255',
        'account_holder_name'           => 'nullable|string|max:255',
        'account_email'                 => 'nullable|email|max:255',
    ];

    public function __construct(Client $model)
    {
        parent::__construct($model);
    }

    protected function extraStoreFields(Request $request): array
    {
        return [
            'name'                        => $request->name,
            'client_type'                 => $request->client_type,
            'type'                        => $request->type,
            'client_category'             => $request->client_category,
            'client_category_other'       => $request->client_category_other,
            'commercial_register_number'  => $request->commercial_register_number,
            'tax_number'                  => $request->tax_number,
            'business_activity'           => $request->business_activity,
            'phone'                       => $request->phone,
            'email'                       => $request->email,
            'mobile_number'               => $request->mobile_number,
            'landline_number'             => $request->landline_number,
            'national_address'            => $request->national_address,
            'contact_full_name'           => $request->contact_full_name,
            'contact_national_id'         => $request->contact_national_id,
            'contact_mobile_number'       => $request->contact_mobile_number,
            'contact_alt_mobile_number'   => $request->contact_alt_mobile_number,
            'contact_email'               => $request->contact_email,
            'bank_name'                   => $request->bank_name,
            'bank_account_number'         => $request->bank_account_number,
            'iban_number'                 => $request->iban_number,
            'account_holder_name'         => $request->account_holder_name,
            'account_email'               => $request->account_email,
            'address'                     => $request->address,
            'meta'                        => $request->meta,
        ];
    }

    protected function extraUpdateFields(Request $request, $id): array
    {
        $record = $this->model->findOrFail($id);
        return [
            'name'                        => $request->name,
            'client_type'                 => $request->client_type,
            'type'                        => $request->type,
            'client_category'             => $request->client_category,
            'client_category_other'       => $request->client_category_other,
            'commercial_register_number'  => $request->commercial_register_number,
            'tax_number'                  => $request->tax_number,
            'business_activity'           => $request->business_activity,
            'phone'                       => $request->phone,
            'email'                       => $request->email,
            'mobile_number'               => $request->mobile_number,
            'landline_number'             => $request->landline_number,
            'national_address'            => $request->national_address,
            'contact_full_name'           => $request->contact_full_name,
            'contact_national_id'         => $request->contact_national_id,
            'contact_mobile_number'       => $request->contact_mobile_number,
            'contact_alt_mobile_number'   => $request->contact_alt_mobile_number,
            'contact_email'               => $request->contact_email,
            'bank_name'                   => $request->bank_name,
            'bank_account_number'         => $request->bank_account_number,
            'iban_number'                 => $request->iban_number,
            'account_holder_name'         => $request->account_holder_name,
            'account_email'               => $request->account_email,
            'address'                     => $request->address,
            'meta'                        => $request->meta,
        ];
    }
}
