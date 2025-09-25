<?php

namespace App\DataTables\Dashboard\Admin\Logistics;

use App\DataTables\Base\BaseDataTable;
use App\Models\Client;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Utilities\Request as DataTableRequest;

class ClientDataTable extends BaseDataTable
{
    public function __construct(DataTableRequest $request)
    {
        parent::__construct(new Client);
        $this->request = $request;
    }

    public function dataTable($query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (Client $record) {
                return view('dashboard.admin.logistics.clients.btn.actions', compact('record'));
            })
            ->addColumn('client_category_label', fn($row) => $row->client_category_label)
            ->addColumn('client_type_label', fn($row) => $row->client_type_label)
            ->editColumn('created_at', fn(Client $record) => $this->formatTranslatedDate($record->created_at))
            ->editColumn('updated_at', fn(Client $record) => $this->formatTranslatedDate($record->updated_at))
            ->rawColumns(['action', 'created_at', 'updated_at', 'client_category_label', 'client_type_label']);
    }

    public function query(): QueryBuilder
    {
        return Client::query()->latest();
    }

    public function getColumns(): array
    {
        return [
            ['name' => 'id', 'data' => 'id', 'title' => '#'],
            ['name' => 'name', 'data' => 'name', 'title' => 'اسم العميل'],

            ['name' => 'client_type_label', 'data' => 'client_type_label', 'title' => 'نوع العميل (لوجستيك / تخليص جمركى)'],
            ['name' => 'client_category_label', 'data' => 'client_category_label', 'title' => 'تصنيف العميل'],
            ['name' => 'client_category_other', 'data' => 'client_category_other', 'title' => 'تفاصيل أخرى'],

            // بيانات العميل
            ['name' => 'commercial_register_number', 'data' => 'commercial_register_number', 'title' => 'رقم السجل التجاري'],
            ['name' => 'tax_number', 'data' => 'tax_number', 'title' => 'الرقم الضريبي'],
            ['name' => 'business_activity', 'data' => 'business_activity', 'title' => 'النشاط / مجال العمل'],

            // بيانات التواصل
            ['name' => 'mobile_number', 'data' => 'mobile_number', 'title' => 'رقم الجوال'],
            ['name' => 'landline_number', 'data' => 'landline_number', 'title' => 'الهاتف الثابت'],
            ['name' => 'phone', 'data' => 'phone', 'title' => 'هاتف العميل'],
            ['name' => 'email', 'data' => 'email', 'title' => 'البريد الإلكتروني'],
            ['name' => 'national_address', 'data' => 'national_address', 'title' => 'العنوان الوطني'],

            // بيانات ضابط الاتصال
            ['name' => 'contact_full_name', 'data' => 'contact_full_name', 'title' => 'اسم ضابط الاتصال'],
            ['name' => 'contact_national_id', 'data' => 'contact_national_id', 'title' => 'رقم الهوية/الإقامة'],
            ['name' => 'contact_mobile_number', 'data' => 'contact_mobile_number', 'title' => 'جوال ضابط الاتصال'],
            ['name' => 'contact_alt_mobile_number', 'data' => 'contact_alt_mobile_number', 'title' => 'جوال إضافي'],
            ['name' => 'contact_email', 'data' => 'contact_email', 'title' => 'بريد ضابط الاتصال'],

            // بيانات الحساب البنكي
            ['name' => 'bank_name', 'data' => 'bank_name', 'title' => 'اسم البنك'],
            ['name' => 'bank_account_number', 'data' => 'bank_account_number', 'title' => 'رقم الحساب البنكي'],
            ['name' => 'iban_number', 'data' => 'iban_number', 'title' => 'رقم الآيبان'],
            ['name' => 'account_holder_name', 'data' => 'account_holder_name', 'title' => 'صاحب الحساب'],
            ['name' => 'account_email', 'data' => 'account_email', 'title' => 'البريد الإلكتروني للحساب'],

            // التواريخ
            ['name' => 'created_at', 'data' => 'created_at', 'title' => trans('dashboard/general.created_at')],
            ['name' => 'updated_at', 'data' => 'updated_at', 'title' => trans('dashboard/general.updated_at')],

            // الأكشن
            ['name' => 'action', 'data' => 'action', 'title' => trans('dashboard/general.actions'), 'orderable' => false, 'searchable' => false],
        ];
    }
}