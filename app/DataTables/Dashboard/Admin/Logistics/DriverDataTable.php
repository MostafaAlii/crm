<?php

namespace App\DataTables\Dashboard\Admin\Logistics;

use App\DataTables\Base\BaseDataTable;
use App\Models\Driver;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Utilities\Request as DataTableRequest;

class DriverDataTable extends BaseDataTable {
    public function __construct(DataTableRequest $request)
    {
        parent::__construct(new Driver);
        $this->request = $request;
    }

    public function dataTable($query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (Driver $record) {
                return view('dashboard.admin.logistics.drivers.btn.actions', compact('record'));
            })
            ->addColumn('avatar', function (Driver $record) {
                $url = $record?->getMediaUrl('driver', $record, null, 'media', 'avatar');
                return '<img src="' . $url . '" class="img-thumbnail" style="max-height:60px; max-width:60px;" />';
            })
            ->editColumn('license_expires_at', fn(Driver $record) => $this->formatTranslatedDate($record->license_expires_at))
            ->editColumn('created_at', fn(Driver $record) => $this->formatTranslatedDate($record->created_at))
            ->editColumn('updated_at', fn(Driver $record) => $this->formatTranslatedDate($record->updated_at))
            ->rawColumns(['action', 'created_at', 'updated_at', 'avatar', 'license_expires_at']);
    }

    public function query(): QueryBuilder
    {
        return Driver::with(['media'])->latest();
    }

    public function getColumns(): array
    {
        return [
            ['name' => 'id', 'data' => 'id', 'title' => '#'],
            ['name' => 'avatar', 'data' => 'avatar', 'title' => 'الصورة', 'orderable' => false, 'searchable' => false],
            ['name' => 'name', 'data' => 'name', 'title' => 'الاسم'],
            ['name' => 'phone', 'data' => 'phone', 'title' => 'رقم الجوال'],
            ['name' => 'identity_number', 'data' => 'identity_number', 'title' => 'رقم الهوية'],
            ['name' => 'license_number', 'data' => 'license_number', 'title' => 'رقم الرخصة'],
            ['name' => 'license_expires_at', 'data' => 'license_expires_at', 'title' => 'تاريخ إنتهاء الرخصة'],
            ['name' => 'salary', 'data' => 'salary', 'title' => 'الراتب الشهري'],
            ['name' => 'fixed_allowance', 'data' => 'fixed_allowance', 'title' => 'البدل الثابت'],
            ['name' => 'bonus_balance', 'data' => 'bonus_balance', 'title' => 'رصيد الحوافز/المستحقات المؤقتة'],
            ['name' => 'created_at', 'data' => 'created_at', 'title' => trans('dashboard/general.created_at')],
            ['name' => 'updated_at', 'data' => 'updated_at', 'title' => trans('dashboard/general.updated_at')],
            ['name' => 'action', 'data' => 'action', 'title' => trans('dashboard/general.actions'), 'orderable' => false, 'searchable' => false],
        ];
    }
}
