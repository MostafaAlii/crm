<!-- Modal Create -->
<div class="modal fade" id="createInsuranceOfficeModal" tabindex="-1" aria-labelledby="createInsuranceOfficeLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('admin.logistic.drivers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createInsuranceOfficeLabel">إضافة سائق جديد</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">الاسم</label>
                        <input type="text" name="name" class="form-control" value="">
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">رقم الهوية / الرقم القومي</label>
                            <input type="text" name="identity_number" class="form-control" value="">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">رقم رخصة القيادة</label>
                            <input type="text" name="license_number" class="form-control" value="">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">تاريخ انتهاء الرخصة</label>
                        <input type="date" name="license_expires_at" class="form-control" value="">
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">رقم الهاتف</label>
                            <input type="text" name="phone" class="form-control" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">رقم الهاتف الإضافي</label>
                            <input type="text" name="second_phone" class="form-control" value="">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">البريد الإلكتروني</label>
                            <input type="email" name="email" class="form-control" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">رقم الإقامة</label>
                            <input type="text" name="residence_number" class="form-control" value="">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">تاريخ التوظيف</label>
                            <input type="date" name="hire_date" class="form-control" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label">الجنسية</label>
                            <select name="nationality_id" class="form-control">
                                <option value="">اختر الجنسية</option>
                                @foreach($nationalities as $nationality)
                                <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">نوع العقد</label>
                            <select name="contract_type_id" class="form-control">
                                <option value="">اختر نوع العقد</option>
                                @foreach($contractTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">القسم / الإدارة</label>
                            <select name="department_id" class="form-control">
                                <option value="">اختر القسم</option>
                                @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label">المرتب الأساسي</label>
                            <input type="float" name="salary" class="form-control" value="">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">بدل ثابت إن وجد</label>
                            <input type="float" name="fixed_allowance" class="form-control" value="">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">رصيد الحوافز/المستحقات المؤقتة</label>
                            <input type="float" name="bonus_balance" class="form-control" value="">
                        </div>
                    </div>
                    <!-- Start Logo & Favicon -->
                    <div class="container p-4 mt-2 bg-white rounded shadow">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="p-3 mb-3 text-center border rounded">
                                    <label for="avatar" class="form-label fw-bold">الصوره الشخصيه</label>
                                    <input class="form-control" type="file" name="avatar" id="avatarInput" accept="image/*">
                                    <img src="" id="avatarPreview"
                                        class="img-fluid" style="max-height: 60px;" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 mb-3 text-center border rounded">
                                    <label for="license" class="form-label fw-bold">رخصه القياده</label>
                                    <input class="form-control" type="file" name="license" id="licenseInput" accept="image/*">
                                    <img src=""
                                        id="licensePreview" class="img-fluid" style="max-height: 60px;" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 mb-3 text-center border rounded">
                                    <label for="identity" class="form-label fw-bold">الهويه</label>
                                    <input class="form-control" type="file" name="identity" id="identityInput" accept="image/*">
                                    <img src=""
                                        id="identityPreview" class="img-fluid" style="max-height: 60px;" />
                                </div>
                            </div>
                            <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imageModalLabel">عرض الصورة</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="text-center modal-body">
                                            <img id="popupImage" src="" class="rounded img-fluid"
                                                style="max-width: 100%; max-height: 80vh;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <!-- End Logo & Favicon -->
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-success">حفظ</button>
                </div>
            </div>
        </form>
    </div>
</div>
