<?php

namespace App\DataTables\Dashboard\Admin\Logistics;

use App\DataTables\Base\BaseDataTable;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Utilities\Request as DataTableRequest;

class VehicleDataTable extends BaseDataTable
{
    public function __construct(DataTableRequest $request)
    {
        parent::__construct(new Vehicle);
        $this->request = $request;
    }

    public function dataTable($query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (Vehicle $record) {
                return view('dashboard.admin.logistics.vehicles.btn.actions', compact('record'));
            })
            ->editColumn('insurance_type', fn(Vehicle $record) => $record->insurance_type_label)
            ->editColumn('inspection_date', fn(Vehicle $record) => $this->formatTranslatedDate($record->inspection_date))
            ->editColumn('policy_start_date', fn(Vehicle $record) => $this->formatTranslatedDate($record->policy_start_date))
            ->editColumn('policy_end_date', fn(Vehicle $record) => $this->formatTranslatedDate($record->policy_end_date))
            ->editColumn('created_at', fn(Vehicle $record) => $this->formatTranslatedDate($record->created_at))
            ->editColumn('updated_at', fn(Vehicle $record) => $this->formatTranslatedDate($record->updated_at))
            ->rawColumns(['action', 'inspection_date', 'policy_start_date', 'policy_end_date', 'created_at', 'updated_at', 'insurance_type']);
    }

    public function query(): QueryBuilder
    {
        return Vehicle::query()->latest();
    }

    public function getColumns(): array
    {
        return [
            ['name' => 'id', 'data' => 'id', 'title' => '#'],
            ['name' => 'plate_number', 'data' => 'plate_number', 'title' => 'رقم اللوحة'],
            ['name' => 'type', 'data' => 'type', 'title' => 'نوع المركبة'],
            ['name' => 'model', 'data' => 'model', 'title' => 'الموديل'],
            ['name' => 'vehicle_make', 'data' => 'vehicle_make', 'title' => 'طراز المركبة'],
            ['name' => 'manufacture_year', 'data' => 'manufacture_year', 'title' => 'سنة الصنع'],
            ['name' => 'color', 'data' => 'color', 'title' => 'اللون'],
            ['name' => 'capacity_kg', 'data' => 'capacity_kg', 'title' => 'سعة التحميل (كجم)'],
            ['name' => 'chassis_number', 'data' => 'chassis_number', 'title' => 'رقم الهيكل'],
            ['name' => 'serial_number', 'data' => 'serial_number', 'title' => 'الرقم التسلسلي'],
            ['name' => 'owner_identity', 'data' => 'owner_identity', 'title' => 'هوية المالك'],
            ['name' => 'user_identity', 'data' => 'user_identity', 'title' => 'هوية المستخدم'],
            ['name' => 'insurance_company', 'data' => 'insurance_company', 'title' => 'شركة التأمين'],
            ['name' => 'policy_number', 'data' => 'policy_number', 'title' => 'رقم الوثيقة'],
            ['name' => 'policy_start_date', 'data' => 'policy_start_date', 'title' => 'بداية الوثيقة'],
            ['name' => 'policy_end_date', 'data' => 'policy_end_date', 'title' => 'نهاية الوثيقة'],
            ['name' => 'insurance_type', 'data' => 'insurance_type', 'title' => 'نوع التأمين'],
            ['name' => 'insurance_type_other', 'data' => 'insurance_type_other', 'title' => 'تفاصيل التأمين (أخرى)'],
            ['name' => 'inspection_date', 'data' => 'inspection_date', 'title' => 'تاريخ الفحص الدوري'],
            ['name' => 'status', 'data' => 'status', 'title' => 'الحالة'],
            ['name' => 'created_at', 'data' => 'created_at', 'title' => trans('dashboard/general.created_at')],
            ['name' => 'updated_at', 'data' => 'updated_at', 'title' => trans('dashboard/general.updated_at')],
            ['name' => 'action', 'data' => 'action', 'title' => trans('dashboard/general.actions'), 'orderable' => false, 'searchable' => false],
        ];
    }
}
