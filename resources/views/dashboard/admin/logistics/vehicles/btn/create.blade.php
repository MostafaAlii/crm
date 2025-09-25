<!-- Modal Create -->
<div class="modal fade" id="createVehicleModal" tabindex="-1" aria-labelledby="createVehicleLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('admin.logistic.vehicles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">إضافة مركبة جديدة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label">رقم اللوحة</label>
                            <input type="text" name="plate_number" class="form-control">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">نوع المركبة</label>
                            <input type="text" name="type" class="form-control">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">موديل المركبة</label>
                            <input type="text" name="model" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label">سعة التحميل (كجم)</label>
                            <input type="number" name="capacity_kg" class="form-control">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">تاريخ الفحص الدوري</label>
                            <input type="date" name="inspection_date" class="form-control">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">الحالة</label>
                            <select name="status" class="form-control">
                                <option value="active">نشط</option>
                                <option value="inactive">غير نشط</option>
                                <option value="maintenance">صيانة</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">هوية المالك</label>
                            <input type="text" name="owner_identity" class="form-control">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">هوية المستخدم</label>
                            <input type="text" name="user_identity" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label">رقم الهيكل</label>
                            <input type="text" name="chassis_number" class="form-control">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">الرقم التسلسلي</label>
                            <input type="text" name="serial_number" class="form-control">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">الماركة</label>
                            <input type="text" name="vehicle_make" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label">سنة الصنع</label>
                            <input type="number" name="manufacture_year" class="form-control">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">لون المركبة</label>
                            <input type="text" name="color" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">شركة التأمين</label>
                            <input type="text" name="insurance_company" class="form-control">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">رقم الوثيقة</label>
                            <input type="text" name="policy_number" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">تاريخ بدء الوثيقة</label>
                            <input type="date" name="policy_start_date" class="form-control">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">تاريخ انتهاء الوثيقة</label>
                            <input type="date" name="policy_end_date" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">نوع التأمين</label>
                            <select name="insurance_type" class="form-control">
                                <option value="">اختر نوع التأمين</option>
                                <option value="comprehensive">شامل</option>
                                <option value="third_party">ضد الغير</option>
                                <option value="other">آخر</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">نوع التأمين (آخر)</label>
                            <input type="text" name="insurance_type_other" class="form-control">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-success">حفظ</button>
                </div>
            </div>
        </form>
    </div>
</div>
