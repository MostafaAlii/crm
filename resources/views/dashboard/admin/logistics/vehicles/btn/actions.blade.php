<div class="d-flex justify-content-center">
    <!-- زرار تعديل -->
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
        data-bs-target="#editVehicleModal{{ $record->id }}">
        <i class="fas fa-edit"></i>
    </button>

    <!-- Modal Edit -->
    <div class="modal fade" id="editVehicleModal{{ $record->id }}" tabindex="-1"
        aria-labelledby="editVehicleLabel{{ $record->id }}" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <form action="{{ route('admin.logistic.vehicles.update', $record->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">تعديل بيانات مركبة</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="form-label">رقم اللوحة</label>
                                <input type="text" name="plate_number" class="form-control"
                                    value="{{ $record?->plate_number }}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">نوع المركبة</label>
                                <input type="text" name="type" class="form-control" value="{{ $record?->type }}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">موديل المركبة</label>
                                <input type="text" name="model" class="form-control" value="{{ $record?->model }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="form-label">سعة التحميل (كجم)</label>
                                <input type="number" name="capacity_kg" class="form-control"
                                    value="{{ $record?->capacity_kg }}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">تاريخ الفحص الدوري</label>
                                <input type="date" name="inspection_date" class="form-control"
                                    value="{{ $record?->inspection_date ? \Carbon\Carbon::parse($record->inspection_date)->format('Y-m-d') : '' }}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">الحالة</label>
                                <select name="status" class="form-control">
                                    <option value="active" {{ $record?->status == 'active' ? 'selected' : '' }}>نشط
                                    </option>
                                    <option value="inactive" {{ $record?->status == 'inactive' ? 'selected' : '' }}>غير
                                        نشط</option>
                                    <option value="maintenance" {{ $record?->status == 'maintenance' ? 'selected' : ''
                                        }}>صيانة</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">هوية المالك</label>
                                <input type="text" name="owner_identity" class="form-control"
                                    value="{{ $record?->owner_identity }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">هوية المستخدم</label>
                                <input type="text" name="user_identity" class="form-control"
                                    value="{{ $record?->user_identity }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="form-label">رقم الهيكل</label>
                                <input type="text" name="chassis_number" class="form-control"
                                    value="{{ $record?->chassis_number }}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">الرقم التسلسلي</label>
                                <input type="text" name="serial_number" class="form-control"
                                    value="{{ $record?->serial_number }}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">الماركة</label>
                                <input type="text" name="vehicle_make" class="form-control"
                                    value="{{ $record?->vehicle_make }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="form-label">سنة الصنع</label>
                                <input type="number" name="manufacture_year" class="form-control"
                                    value="{{ $record?->manufacture_year }}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">لون المركبة</label>
                                <input type="text" name="color" class="form-control" value="{{ $record?->color }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">شركة التأمين</label>
                                <input type="text" name="insurance_company" class="form-control"
                                    value="{{ $record?->insurance_company }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">رقم الوثيقة</label>
                                <input type="text" name="policy_number" class="form-control"
                                    value="{{ $record?->policy_number }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">تاريخ بدء الوثيقة</label>
                                <input type="date" name="policy_start_date" class="form-control"
                                    value="{{ $record?->policy_start_date ? \Carbon\Carbon::parse($record->policy_start_date)->format('Y-m-d') : '' }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">تاريخ انتهاء الوثيقة</label>
                                <input type="date" name="policy_end_date" class="form-control"
                                    value="{{ $record?->policy_end_date ? \Carbon\Carbon::parse($record->policy_end_date)->format('Y-m-d') : '' }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">نوع التأمين</label>
                                <select name="insurance_type" class="form-control">
                                    <option value="">اختر نوع التأمين</option>
                                    <option value="comprehensive" {{ $record?->insurance_type == 'comprehensive' ?
                                        'selected' : '' }}>شامل</option>
                                    <option value="third_party" {{ $record?->insurance_type == 'third_party' ?
                                        'selected' : '' }}>ضد الغير</option>
                                    <option value="other" {{ $record?->insurance_type == 'other' ? 'selected' : ''
                                        }}>آخر</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">نوع التأمين (آخر)</label>
                                <input type="text" name="insurance_type_other" class="form-control"
                                    value="{{ $record?->insurance_type_other }}">
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
        data-bs-target="#deleteVehicleModal{{ $record->id }}">
        <i class="fas fa-trash"></i>
    </button>

    <!-- Modal Delete -->
    <div class="modal fade" id="deleteVehicleModal{{ $record->id }}" tabindex="-1"
        aria-labelledby="deleteVehicleModalLabel{{ $record->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تأكيد الحذف</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                </div>
                <div class="text-center modal-body">
                    <p>هل أنت متأكد من حذف "<strong>{{ $record->plate_number }}</strong>"؟</p>
                    <p class="text-danger">هذا الإجراء لا يمكن التراجع عنه.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <form action="{{ route('admin.logistic.vehicles.destroy', $record->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">نعم، حذف</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
