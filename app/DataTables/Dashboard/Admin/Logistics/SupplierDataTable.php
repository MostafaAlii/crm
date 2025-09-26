<?php

namespace App\DataTables\Dashboard\Admin\Logistics;

use App\DataTables\Base\BaseDataTable;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Utilities\Request as DataTableRequest;

class SupplierDataTable extends BaseDataTable
{
    public function __construct(DataTableRequest $request)
    {
        parent::__construct(new Supplier);
        $this->request = $request;
    }

    public function dataTable($query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (Supplier $record) {
                return view('dashboard.admin.logistics.suppliers.btn.actions', compact('record'));
            })
            ->addColumn('supplier_type_label', fn($row) => $row->supplier_type_label)
            ->editColumn('created_at', fn(Supplier $record) => $this->formatTranslatedDate($record->created_at))
            ->editColumn('updated_at', fn(Supplier $record) => $this->formatTranslatedDate($record->updated_at))
            ->rawColumns(['action', 'created_at', 'updated_at', 'supplier_type_label']);
    }

    public function query(): QueryBuilder
    {
        return Supplier::query()->latest();
    }

    public function getColumns(): array
    {
        return [
            ['name' => 'id', 'data' => 'id', 'title' => '#'],
            ['name' => 'name', 'data' => 'name', 'title' => trans('dashboard/supplier.fields.name')],
            ['name' => 'supplier_type_label', 'data' => 'supplier_type_label', 'title' => trans('dashboard/supplier.fields.supplier_type')],
            ['name' => 'supplier_type_other', 'data' => 'supplier_type_other', 'title' => trans('dashboard/supplier.fields.supplier_type_other')],
            ['name' => 'commercial_registration_number', 'data' => 'commercial_registration_number', 'title' => trans('dashboard/supplier.fields.commercial_register_number')],
            ['name' => 'tax_number', 'data' => 'tax_number', 'title' => trans('dashboard/supplier.fields.tax_number')],
            ['name' => 'activity', 'data' => 'activity', 'title' => trans('dashboard/supplier.fields.business_activity')],
            ['name' => 'mobile', 'data' => 'mobile', 'title' => trans('dashboard/supplier.fields.mobile_number')],
            ['name' => 'phone', 'data' => 'phone', 'title' => trans('dashboard/supplier.fields.landline_number')],
            ['name' => 'email', 'data' => 'email', 'title' => trans('dashboard/supplier.fields.email')],
            ['name' => 'address', 'data' => 'address', 'title' => trans('dashboard/supplier.fields.national_address')],
            ['name' => 'contact_person_name', 'data' => 'contact_person_name', 'title' => trans('dashboard/supplier.fields.contact_full_name')],
            ['name' => 'contact_person_identity', 'data' => 'contact_person_identity', 'title' => trans('dashboard/supplier.fields.contact_national_id')],
            ['name' => 'contact_person_mobile', 'data' => 'contact_person_mobile', 'title' => trans('dashboard/supplier.fields.contact_mobile_number')],
            ['name' => 'contact_person_alt_mobile', 'data' => 'contact_person_alt_mobile', 'title' => trans('dashboard/supplier.fields.contact_alt_mobile_number')],
            ['name' => 'contact_person_email', 'data' => 'contact_person_email', 'title' => trans('dashboard/supplier.fields.contact_email')],
            ['name' => 'bank_name', 'data' => 'bank_name', 'title' => trans('dashboard/supplier.fields.bank_name')],
            ['name' => 'bank_account_number', 'data' => 'bank_account_number', 'title' => trans('dashboard/supplier.fields.bank_account_number')],
            ['name' => 'bank_account_owner', 'data' => 'bank_account_owner', 'title' => trans('dashboard/supplier.fields.account_holder_name')],
            ['name' => 'bank_email', 'data' => 'bank_email', 'title' => trans('dashboard/supplier.fields.account_email')],
            ['name' => 'created_at', 'data' => 'created_at', 'title' => trans('dashboard/general.created_at')],
            ['name' => 'updated_at', 'data' => 'updated_at', 'title' => trans('dashboard/general.updated_at')],
            ['name' => 'action', 'data' => 'action', 'title' => trans('dashboard/general.actions'), 'orderable' => false, 'searchable' => false],
        ];
    }
}
