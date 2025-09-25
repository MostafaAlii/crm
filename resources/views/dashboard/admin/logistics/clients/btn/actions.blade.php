<div class="d-flex justify-content-center">
    <!-- زرار تعديل -->
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
        data-bs-target="#editClientModal{{ $record->id }}">
        <i class="fas fa-edit"></i>
    </button>

    <!-- Modal Edit -->
    <div class="modal fade" id="editClientModal{{ $record->id }}" tabindex="-1"
        aria-labelledby="editClientLabel{{ $record->id }}" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <form action="{{ route('admin.logistic.clients.update', $record->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">تعديل بيانات العميل</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                    </div>
                    <div class="modal-body">

                        {{-- بيانات أساسية --}}
                        <h3 class="mb-3">البيانات الأساسية</h3>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">اسم العميل</label>
                                <input type="text" name="name" class="form-control" value="{{ $record?->name }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">نوع العميل</label>
                                <select name="client_type" class="form-control">
                                    <option value="">اختر</option>
                                    <option value="logistics" {{ $record?->client_type == 'logistics' ? 'selected' : ''
                                        }}>لوجستيك</option>
                                    <option value="clearance" {{ $record?->client_type == 'clearance' ? 'selected' : ''
                                        }}>تخليص جمركى</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">التصنيف</label>
                                <select name="client_category" id="client_category_{{ $record->id }}" class="form-control">
                                    <option value="">اختر</option>
                                    <option value="individual" {{ $record?->client_category == 'individual' ? 'selected' : '' }}>فرد</option>
                                    <option value="company" {{ $record?->client_category == 'company' ? 'selected' : '' }}>شركة</option>
                                    <option value="government" {{ $record?->client_category == 'government' ? 'selected' : '' }}>جهة حكومية</option>
                                    <option value="partner" {{ $record?->client_category == 'partner' ? 'selected' : '' }}>شريك</option>
                                    <option value="other" {{ $record?->client_category == 'other' ? 'selected' : '' }}>آخر</option>
                                </select>
                            </div>

                            <div class="mb-3 col-md-6 {{ $record?->client_category == 'other' ? '' : 'd-none' }}"
                                id="client_category_other_wrapper_{{ $record->id }}">
                                <label class="form-label">تصنيف آخر (تفاصيل)</label>
                                <input type="text" name="client_category_other" class="form-control" value="{{ $record?->client_category_other }}">
                            </div>
                        </div>

                        {{-- بيانات العميل --}}
                        <h3 class="mb-3">بيانات العميل</h3>
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="form-label">رقم السجل التجاري</label>
                                <input type="text" name="commercial_register_number" class="form-control"
                                    value="{{ $record?->commercial_register_number }}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">الرقم الضريبي</label>
                                <input type="text" name="tax_number" class="form-control"
                                    value="{{ $record?->tax_number }}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">النشاط / مجال العمل</label>
                                <input type="text" name="business_activity" class="form-control"
                                    value="{{ $record?->business_activity }}">
                            </div>
                        </div>

                        {{-- بيانات التواصل --}}
                        <h3 class="mb-3">بيانات التواصل</h3>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">رقم الجوال</label>
                                <input type="text" name="mobile_number" class="form-control"
                                    value="{{ $record?->mobile_number }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">الهاتف الثابت</label>
                                <input type="text" name="landline_number" class="form-control"
                                    value="{{ $record?->landline_number }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">العنوان الوطني</label>
                                <input type="text" name="national_address" class="form-control"
                                    value="{{ $record?->national_address }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">البريد الإلكتروني</label>
                                <input type="email" name="email" class="form-control" value="{{ $record?->email }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">هاتف العميل</label>
                                <input type="text" name="phone" class="form-control" value="{{ $record?->phone }}">
                            </div>
                        </div>

                        {{-- بيانات ضابط الاتصال --}}
                        <h3 class="mb-3">بيانات ضابط الاتصال</h3>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">الاسم الثلاثي</label>
                                <input type="text" name="contact_full_name" class="form-control"
                                    value="{{ $record?->contact_full_name }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">رقم الهوية/الإقامة</label>
                                <input type="text" name="contact_national_id" class="form-control"
                                    value="{{ $record?->contact_national_id }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">رقم الجوال</label>
                                <input type="text" name="contact_mobile_number" class="form-control"
                                    value="{{ $record?->contact_mobile_number }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">رقم جوال إضافي</label>
                                <input type="text" name="contact_alt_mobile_number" class="form-control"
                                    value="{{ $record?->contact_alt_mobile_number }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">البريد الإلكتروني</label>
                                <input type="email" name="contact_email" class="form-control"
                                    value="{{ $record?->contact_email }}">
                            </div>
                        </div>

                        {{-- بيانات الحساب البنكي --}}
                        <h3 class="mb-3">بيانات الحساب البنكي</h3>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">اسم البنك</label>
                                <input type="text" name="bank_name" class="form-control"
                                    value="{{ $record?->bank_name }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">رقم الحساب البنكي</label>
                                <input type="text" name="bank_account_number" class="form-control"
                                    value="{{ $record?->bank_account_number }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">رقم الآيبان</label>
                                <input type="text" name="iban_number" class="form-control"
                                    value="{{ $record?->iban_number }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">اسم صاحب الحساب</label>
                                <input type="text" name="account_holder_name" class="form-control"
                                    value="{{ $record?->account_holder_name }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">البريد الإلكتروني المرتبط بالحساب</label>
                                <input type="email" name="account_email" class="form-control"
                                    value="{{ $record?->account_email }}">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-success">تحديث</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- زرار الحذف -->
    <button type="button" class="mx-1 btn btn-danger btn-sm" data-bs-toggle="modal"
        data-bs-target="#deleteClientModal{{ $record->id }}">
        <i class="fas fa-trash"></i>
    </button>

    <!-- Modal Delete -->
    <div class="modal fade" id="deleteClientModal{{ $record->id }}" tabindex="-1"
        aria-labelledby="deleteClientModalLabel{{ $record->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تأكيد الحذف</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                </div>
                <div class="text-center modal-body">
                    <p>هل أنت متأكد من حذف "<strong>{{ $record->name }}</strong>"؟</p>
                    <p class="text-danger">هذا الإجراء لا يمكن التراجع عنه.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <form action="{{ route('admin.logistic.clients.destroy', $record->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">نعم، حذف</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
