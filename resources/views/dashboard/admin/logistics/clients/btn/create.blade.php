<!-- Modal Create -->
<div class="modal fade" id="createClientModal" tabindex="-1" aria-labelledby="createClientLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('admin.logistic.clients.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">إضافة عميل جديد</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                </div>
                <div class="modal-body">

                    {{-- بيانات أساسية --}}
                    <h3 class="mb-3">البيانات الأساسية</h3>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">اسم العميل</label>
                            <input type="text" name="name" class="form-control" value="">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">نوع العميل</label>
                            <select name="client_type" class="form-control">
                                <option value="">اختر</option>
                                <option value="logistics">لوجستيك</option>
                                <option value="clearance">تخليص جمركى</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">التصنيف</label>
                            <select name="client_category" id="client_category" class="form-control">
                                <option value="">اختر</option>
                                <option value="individual">فرد</option>
                                <option value="company">شركة</option>
                                <option value="government">جهة حكومية</option>
                                <option value="partner">شريك</option>
                                <option value="other">آخر</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6 d-none" id="client_category_other_wrapper">
                            <label class="form-label">تصنيف آخر (تفاصيل)</label>
                            <input type="text" name="client_category_other" class="form-control">
                        </div>
                    </div>

                    {{-- بيانات العميل --}}
                    <h3 class="mb-3">بيانات العميل</h3>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label">رقم السجل التجاري</label>
                            <input type="text" name="commercial_register_number" class="form-control" value="">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">الرقم الضريبي</label>
                            <input type="text" name="tax_number" class="form-control" value="">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">النشاط / مجال العمل</label>
                            <input type="text" name="business_activity" class="form-control" value="">
                        </div>
                    </div>

                    {{-- بيانات التواصل --}}
                    <h3 class="mb-3">بيانات التواصل</h3>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">رقم الجوال</label>
                            <input type="text" name="mobile_number" class="form-control" value="">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">الهاتف الثابت</label>
                            <input type="text" name="landline_number" class="form-control" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">العنوان الوطني</label>
                            <input type="text" name="national_address" class="form-control" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">البريد الإلكتروني</label>
                            <input type="email" name="email" class="form-control" value="">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">هاتف العميل</label>
                            <input type="text" name="phone" class="form-control" value="">
                        </div>
                    </div>

                    {{-- بيانات ضابط الاتصال --}}
                    <h3 class="mb-3">بيانات ضابط الاتصال</h3>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">الاسم الثلاثي</label>
                            <input type="text" name="contact_full_name" class="form-control" value="">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">رقم الهوية/الإقامة</label>
                            <input type="text" name="contact_national_id" class="form-control" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">رقم الجوال</label>
                            <input type="text" name="contact_mobile_number" class="form-control" value="">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">رقم جوال إضافي</label>
                            <input type="text" name="contact_alt_mobile_number" class="form-control" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">البريد الإلكتروني</label>
                            <input type="email" name="contact_email" class="form-control" value="">
                        </div>
                    </div>

                    {{-- بيانات الحساب البنكي --}}
                    <h3 class="mb-3">بيانات الحساب البنكي</h3>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">اسم البنك</label>
                            <input type="text" name="bank_name" class="form-control" value="">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">رقم الحساب البنكي</label>
                            <input type="text" name="bank_account_number" class="form-control" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">رقم الآيبان</label>
                            <input type="text" name="iban_number" class="form-control" value="">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">اسم صاحب الحساب</label>
                            <input type="text" name="account_holder_name" class="form-control" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">البريد الإلكتروني المرتبط بالحساب</label>
                            <input type="email" name="account_email" class="form-control" value="">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-success">إضافة</button>
                </div>
            </div>
        </form>
    </div>
</div>
