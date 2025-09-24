<div class="d-flex justify-content-center">
    <!-- زرار تعديل -->
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
        data-bs-target="#editOfficeModal{{ $record->id }}">
        <i class="fas fa-edit"></i>
    </button>

    <!-- Modal Edit -->
    <div class="modal fade" id="editOfficeModal{{ $record->id }}" tabindex="-1"
        aria-labelledby="editOfficeLabel{{ $record->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('admin.logistic.drivers.update', $record->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editOfficeLabel{{ $record->id }}">تعديل بيانات سائق </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">الاسم</label>
                            <input type="text" name="name" class="form-control" value="{{ $record?->name }}">
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">رقم الهوية / الرقم القومي</label>
                                <input type="text" name="identity_number" class="form-control"
                                    value="{{ $record?->identity_number }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">رقم رخصة القيادة</label>
                                <input type="text" name="license_number" class="form-control"
                                    value="{{ $record?->license_number }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">تاريخ انتهاء الرخصة</label>
                            <input type="date" name="license_expires_at" class="form-control"
                                value="{{ $record?->license_expires_at }}">
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">رقم الهاتف</label>
                                <input type="text" name="phone" class="form-control" value="{{ $record?->phone }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="form-label">المرتب الأساسي</label>
                                <input type="text" name="salary" class="form-control" value="{{ $record?->salary }}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">بدل ثابت إن وجد</label>
                                <input type="text" name="fixed_allowance" class="form-control"
                                    value="{{ $record?->fixed_allowance }}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">رصيد الحوافز/المستحقات المؤقتة</label>
                                <input type="text" name="bonus_balance" class="form-control"
                                    value="{{ $record?->bonus_balance }}">
                            </div>
                        </div>

                        <!-- Start Images -->
                        <div class="container p-4 mt-2 bg-white rounded shadow">
                            <div class="row">
                                <!-- صورة شخصية -->
                                <div class="col-md-4">
                                    <div class="p-3 mb-3 text-center border rounded">
                                        <label for="avatar{{ $record->id }}" class="form-label fw-bold">الصوره
                                            الشخصيه</label>
                                        <input class="form-control" type="file" name="avatar"
                                            id="avatar{{ $record->id }}" accept="image/*">
                                        <img src="{{ $record?->getMediaUrl('driver', $record, null, 'media', 'avatar') }}"
                                            class="img-fluid preview-img" style="max-height: 60px; cursor:pointer;"
                                            data-bs-toggle="modal" data-bs-target="#imageModal{{ $record->id }}"
                                            data-src="{{ $record?->getMediaUrl('driver', $record, null, 'media', 'avatar') }}" />
                                    </div>
                                </div>
                                <!-- رخصة -->
                                <div class="col-md-4">
                                    <div class="p-3 mb-3 text-center border rounded">
                                        <label for="license{{ $record->id }}" class="form-label fw-bold">رخصه
                                            القياده</label>
                                        <input class="form-control" type="file" name="license"
                                            id="license{{ $record->id }}" accept="image/*">
                                        <img src="{{ $record?->getMediaUrl('driver', $record, null, 'media', 'license') }}"
                                            class="img-fluid preview-img" style="max-height: 60px; cursor:pointer;"
                                            data-bs-toggle="modal" data-bs-target="#imageModal{{ $record->id }}"
                                            data-src="{{ $record?->getMediaUrl('driver', $record, null, 'media', 'license') }}" />
                                    </div>
                                </div>
                                <!-- الهوية -->
                                <div class="col-md-4">
                                    <div class="p-3 mb-3 text-center border rounded">
                                        <label for="identity{{ $record->id }}" class="form-label fw-bold">الهويه</label>
                                        <input class="form-control" type="file" name="identity"
                                            id="identity{{ $record->id }}" accept="image/*">
                                        <img src="{{ $record?->getMediaUrl('driver', $record, null, 'media', 'identity') }}"
                                            class="img-fluid preview-img" style="max-height: 60px; cursor:pointer;"
                                            data-bs-toggle="modal" data-bs-target="#imageModal{{ $record->id }}"
                                            data-src="{{ $record?->getMediaUrl('driver', $record, null, 'media', 'identity') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Images -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-success">تحديث</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Image Modal (عام لكل الصور داخل نفس record) -->
    <div class="modal fade" id="imageModal{{ $record->id }}" tabindex="-1"
        aria-labelledby="imageModalLabel{{ $record->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel{{ $record->id }}">عرض الصورة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                </div>
                <div class="text-center modal-body">
                    <img id="popupImage{{ $record->id }}" src="" class="rounded img-fluid"
                        style="max-width: 100%; max-height: 80vh;">
                </div>
            </div>
        </div>
    </div>

    <!-- زرار الحذف -->
    <button type="button" class="mx-1 btn btn-danger btn-sm" data-bs-toggle="modal"
        data-bs-target="#deleteModal{{ $record->id }}">
        <i class="fas fa-trash"></i>
    </button>

    <!-- Modal Delete -->
    <div class="modal fade" id="deleteModal{{ $record->id }}" tabindex="-1"
        aria-labelledby="deleteModalLabel{{ $record->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تأكيد الحذف</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                </div>
                <div class="text-center modal-body">
                    <p>هل أنت متأكد من حذف "<strong>{{ $record->name }}</strong>"؟</p>
                    <p class="text-danger">هذا الإجراء لا يمكن التراجع عنه.</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <form action="{{ route('admin.logistic.drivers.destroy', $record->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">نعم، حذف</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".preview-img").forEach(img => {
        img.addEventListener("click", function() {
            let modalId = this.getAttribute("data-bs-target");
            let targetImg = document.querySelector(modalId + " img");
            targetImg.src = this.getAttribute("data-src");
        });
    });
});
</script>
