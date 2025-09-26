<?php
return [
    'title' => 'الموردين',
    'single' => 'مورد',
    'create' => 'إضافة مورد',
    'edit' => 'تعديل مورد',
    'delete' => 'حذف مورد',
    'list' => 'قائمة الموردين',
    'sections' => [
        'basic'          => 'البيانات الأساسية',
        'supplier_data'  => 'بيانات المورد',
        'contact_info'   => 'بيانات التواصل',
        'contact_person' => 'بيانات ضابط الاتصال',
        'bank_info'      => 'بيانات الحساب البنكي',
    ],
    'actions' => [
        'index'  => 'الموردين',
        'create' => 'إنشاء مورد جديد',
        'edit'   => 'تعديل مورد',
    ],
    'supplier_types' => [
        'individual' => 'فرد',
        'company'    => 'شركة',
        'government' => 'جهة حكومية',
        'other'      => 'آخر',
    ],
    'fields' => [
        'name'                   => 'اسم المورد',
        'supplier_type'          => 'نوع المورد',
        'supplier_type_other'    => 'تفاصيل أخرى',
        'commercial_register_number' => 'رقم السجل التجاري',
        'tax_number'             => 'الرقم الضريبي',
        'business_activity'      => 'النشاط / مجال العمل',

        'mobile_number'          => 'رقم الجوال',
        'landline_number'        => 'الهاتف الثابت',
        'email'                  => 'البريد الإلكتروني',
        'national_address'       => 'العنوان الوطني',

        'contact_full_name'      => 'اسم ضابط الاتصال',
        'contact_national_id'    => 'رقم الهوية/الإقامة',
        'contact_mobile_number'  => 'جوال ضابط الاتصال',
        'contact_alt_mobile_number' => 'جوال إضافي',
        'contact_email'          => 'بريد ضابط الاتصال',

        'bank_name'              => 'اسم البنك',
        'bank_account_number'    => 'رقم الحساب البنكي',
        'account_holder_name'    => 'صاحب الحساب',
        'account_email'          => 'البريد الإلكتروني للحساب',
    ],

    'validation' => [
        'name_required'        => 'اسم المورد مطلوب',
        'supplier_type_required' => 'نوع المورد مطلوب',
        'supplier_type_other_required_if'  => 'يجب إدخال النوع الآخر عند اختيار (آخر).',

        'email_invalid'        => 'البريد الإلكتروني غير صحيح',
        'email_unique'         => 'هذا البريد الإلكتروني مسجل بالفعل',

        'commercial_registration_number_numeric' => 'رقم السجل التجاري يجب أن يكون أرقام فقط',
        'tax_number_numeric'   => 'الرقم الضريبي يجب أن يكون أرقام فقط',
        'contact_person_identity_numeric' => 'رقم هوية جهة الاتصال يجب أن يكون أرقام فقط',
        'bank_account_number_numeric'     => 'رقم الحساب البنكي يجب أن يكون أرقام فقط',

        'contact_person_mobile_numeric'    => 'رقم جوال الشخص المسؤول يجب أن يكون رقمًا.',
        'contact_person_alt_mobile_numeric' => 'رقم الجوال البديل للشخص المسؤول يجب أن يكون رقمًا.',
        'mobile_numeric'                   => 'رقم الجوال يجب أن يكون رقمًا.',
        'phone_numeric'                    => 'رقم الهاتف يجب أن يكون رقمًا.',
    ],
];
