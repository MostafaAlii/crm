<?php

namespace App\Repositories\Eloquents;

use App\Models\{Contract};
use App\Repositories\Contracts\ContractRepositoryInterface;
use Illuminate\Http\Request;

class ContractRepository extends BaseRepository implements ContractRepositoryInterface
{
    protected $rules = [

    ];

    public function __construct(Contract $model)
    {
        parent::__construct($model);
    }

    protected function extraStoreFields(Request $request): array {
        $data = $request->only([
            'first_party_name',
            'first_party_commercial_register',
            'second_party_name',
            'second_party_commercial_register',
            'second_party_type',
            'second_party_type_other',
            'contract_number',
            'signed_at',
            'start_date',
            'end_date',
            'duration_in_days',
            'contract_type',
            'contract_type_other',
            'contract_value',
            'currency',
            'currency_other',
            'first_party_approval',
            'second_party_approval',
        ]);

        return $data;

    }

    protected function extraUpdateFields(Request $request, $id): array
    {
        $data = $request->only([
            'first_party_name',
            'first_party_commercial_register',
            'second_party_name',
            'second_party_commercial_register',
            'second_party_type',
            'second_party_type_other',
            'contract_number',
            'signed_at',
            'start_date',
            'end_date',
            'duration_in_days',
            'contract_type',
            'contract_type_other',
            'contract_value',
            'currency',
            'currency_other',
            'first_party_approval',
            'second_party_approval',
        ]);
        return $data;
    }

    protected function afterStore($model, Request $request): void
    {
        if ($request->has('terms')) {
            $model->terms()->createMany(
                collect($request->terms)->map(fn($term) => ['term' => $term])->toArray()
            );
        }
    }

    protected function afterUpdate($model, Request $request): void
    {
        if ($request->has('terms')) {
            $model->terms()->delete();
            $model->terms()->createMany(
                collect($request->terms)->map(fn($term) => ['term' => $term])->toArray()
            );
        }
    }
}
