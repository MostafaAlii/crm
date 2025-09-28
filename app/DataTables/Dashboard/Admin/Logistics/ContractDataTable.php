<?php

namespace App\DataTables\Dashboard\Admin\Logistics;

use App\DataTables\Base\BaseDataTable;
use App\Models\Contract;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Utilities\Request as DataTableRequest;

class ContractDataTable extends BaseDataTable
{
    public function __construct(DataTableRequest $request)
    {
        parent::__construct(new Contract);
        $this->request = $request;
    }

    public function dataTable($query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (Contract $record) {
                return view('dashboard.admin.logistics.contracts.btn.actions', compact('record'));
            })
            ->editColumn('contract_type', function ($record) {
            return trans('dashboard/contracts.' . $record->contract_type);
            })
            ->editColumn('created_at', fn(Contract $record) => $this->formatTranslatedDate($record->created_at))
            ->editColumn('updated_at', fn(Contract $record) => $this->formatTranslatedDate($record->updated_at))
            ->rawColumns(['action','created_at', 'updated_at', 'contract_type']);
    }

    public function query(): QueryBuilder
    {
        return Contract::query()->latest();
    }

    public function getColumns(): array
    {
        return [
            ['name' => 'id', 'data' => 'id', 'title' => '#'],

            ['name' => 'contract_number', 'data' => 'contract_number', 'title' => trans('dashboard/contracts.contract_number')],
            ['name' => 'first_party_name', 'data' => 'first_party_name', 'title' => trans('dashboard/contracts.first_party_name')],
            ['name' => 'second_party_name', 'data' => 'second_party_name', 'title' => trans('dashboard/contracts.second_party_name')],
            ['name' => 'contract_type', 'data' => 'contract_type', 'title' => trans('dashboard/contracts.contract_type')],
            ['name' => 'contract_value', 'data' => 'contract_value', 'title' => trans('dashboard/contracts.contract_value')],
            ['name' => 'start_date', 'data' => 'start_date', 'title' => trans('dashboard/contracts.start_date')],

            ['name' => 'created_at', 'data' => 'created_at', 'title' => trans('dashboard/general.created_at')],
            ['name' => 'updated_at', 'data' => 'updated_at', 'title' => trans('dashboard/general.updated_at')],
            ['name' => 'action', 'data' => 'action', 'title' => trans('dashboard/general.actions'), 'orderable' => false, 'searchable' => false],
        ];
    }
}
