<?php

return [
    'title' => 'العقود',
    'contract_number' => 'رقم العقد',
    'first_party_name' => 'الطرف الاول',
    'second_party_name' => 'الطرف الثانى',
    'contract_type' => 'نوع العقد',
    'contract_value' => 'قيمه العقد',
    'start_date' => 'بدايه العقد',
    'services'   => 'خدمات',
    'supply'     => 'توريد',
    'transport'  => 'نقل',
    'consulting' => 'استشارة',
    'other'      => 'آخر',
    'validation' => [
        'first_party_name_required' => 'اسم الطرف الأول مطلوب.',
        'second_party_name_required' => 'اسم الطرف الثاني مطلوب.',
        'second_party_type_required' => 'نوع الطرف الثاني مطلوب.',
        'second_party_type_other_required' => 'يجب إدخال النوع الآخر للطرف الثاني.',
        'contract_number_required' => 'رقم العقد مطلوب.',
        'contract_number_unique' => 'رقم العقد مستخدم من قبل.',
        'signed_at_required' => 'تاريخ توقيع العقد مطلوب.',
        'start_date_required' => 'تاريخ بداية العقد مطلوب.',
        'end_date_after_or_equal' => 'تاريخ نهاية العقد يجب أن يكون بعد أو يساوي تاريخ البداية.',
        'contract_type_required' => 'نوع العقد مطلوب.',
        'contract_type_other_required' => 'يجب إدخال النوع الآخر للعقد.',
        'currency_required' => 'العملة مطلوبة.',
        'currency_other_required' => 'يجب إدخال العملة الأخرى.',
        'terms_required' => 'كل بند من بنود العقد مطلوب.',
    ],

    // العناوين الرئيسية
    'contracts' => 'العقود',
    'create_contract' => 'إضافة عقد جديد',
    'edit_contract' => 'تعديل العقد',

    // حقول النموذج
    'first_party_name' => 'الطرف الأول (الشركة)',
    'first_party_commercial_register' => 'السجل التجاري (الطرف الأول)',
    'second_party_name' => 'الطرف الثاني',
    'second_party_commercial_register' => 'السجل التجاري (الطرف الثاني)',
    'second_party_type' => 'نوع الطرف الثاني',
    'second_party_type_other' => 'نوع الطرف الثاني (آخر)',
    'contract_number' => 'رقم العقد',
    'signed_at' => 'تاريخ توقيع العقد',
    'start_date' => 'تاريخ بداية العقد',
    'end_date' => 'تاريخ نهاية العقد',
    'duration_in_days' => 'مدة العقد (بالأيام)',
    'contract_type' => 'نوع العقد',
    'contract_type_other' => 'نوع العقد (آخر)',
    'contract_value' => 'قيمة العقد',
    'currency' => 'العملة',
    'currency_other' => 'عملة أخرى',

    // أنواع الطرف الثاني
    'second_party_types' => [
        'individual' => 'فرد',
        'company' => 'شركة',
        'government' => 'جهة حكومية',
        'other' => 'آخر',
    ],

    // أنواع العقود
    'contract_type_options' => [
        'services' => 'خدمات',
        'supply' => 'توريد',
        'transport' => 'نقل',
        'consulting' => 'استشارة',
        'other' => 'آخر',
    ],

    // العملات
    'currency_options' => [
        'SAR' => 'ريال سعودي',
        'USD' => 'دولار أمريكي',
        'other' => 'آخر',
    ],

    // موافقة الأطراف
    'first_party_approval' => 'موافقة الطرف الأول',
    'second_party_approval' => 'موافقة الطرف الثاني',

    // البنود
    'terms' => 'بنود العقد',
    'add_term' => '+ إضافة بند آخر',
    'term_placeholder' => 'اكتب البند هنا...',

    // أزرار
    'save' => 'حفظ',
    'close' => 'إغلاق',

    // رسائل
    'created_successfully' => 'تم إنشاء العقد بنجاح',
    'updated_successfully' => 'تم تحديث العقد بنجاح',
    'deleted_successfully' => 'تم حذف العقد بنجاح',

    // عناوين الأقسام
    'first_party_section' => 'الطرف الأول',
    'second_party_section' => 'الطرف الثاني',
    'contract_details_section' => 'بيانات العقد',
    'financial_section' => 'القيمة المالية',
    'approval_section' => 'موافقة الأطراف',
    'terms_section' => 'بنود العقد',

];
