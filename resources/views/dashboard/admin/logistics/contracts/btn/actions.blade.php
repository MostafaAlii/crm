<div class="d-flex justify-content-center">
    <!-- زرار تعديل -->
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
        data-bs-target="#editModal{{ $record->id }}">
        <i class="fas fa-edit"></i>
    </button>
    <!-- Modal Edit Supplier -->
    <!-- Modal Edit Contract -->
    <!-- مودال تعديل عقد -->
    <div class="modal fade" id="editModal{{ $record->id }}" tabindex="-1"
        aria-labelledby="editModalLabel{{ $record->id }}" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form action="{{ route('admin.logistic.contracts.update', $record->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $record->id }}">تعديل العقد</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row g-3">

                            <!-- الطرف الأول -->
                            <div class="col-md-6">
                                <label class="form-label">الطرف الأول (الشركة)</label>
                                <input type="text" name="first_party_name" class="form-control"
                                    value="{{ $record->first_party_name }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">السجل التجاري (الطرف الأول)</label>
                                <input type="text" name="first_party_commercial_register" class="form-control"
                                    value="{{ $record->first_party_commercial_register }}">
                            </div>

                            <!-- الطرف الثاني -->
                            <div class="col-md-6">
                                <label class="form-label">الطرف الثاني</label>
                                <input type="text" name="second_party_name" class="form-control"
                                    value="{{ $record->second_party_name }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">السجل التجاري (الطرف الثاني)</label>
                                <input type="text" name="second_party_commercial_register" class="form-control"
                                    value="{{ $record->second_party_commercial_register }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">نوع الطرف الثاني</label>
                                <select name="second_party_type" class="form-select" required>
                                    <option value="individual" {{ $record->second_party_type == 'individual' ? 'selected'
                                        : '' }}>فرد</option>
                                    <option value="company" {{ $record->second_party_type == 'company' ? 'selected' : ''
                                        }}>شركة</option>
                                    <option value="government" {{ $record->second_party_type == 'government' ? 'selected'
                                        : '' }}>جهة حكومية</option>
                                    <option value="other" {{ $record->second_party_type == 'other' ? 'selected' : ''
                                        }}>آخر</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">نوع الطرف الثاني (آخر)</label>
                                <input type="text" name="second_party_type_other" class="form-control"
                                    value="{{ $record->second_party_type_other }}">
                            </div>

                            <!-- بيانات العقد -->
                            <div class="col-md-6">
                                <label class="form-label">رقم العقد</label>
                                <input type="text" name="contract_number" class="form-control"
                                    value="{{ $record->contract_number }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">تاريخ توقيع العقد</label>
                                <input type="date" name="signed_at" class="form-control"
                                    value="{{ $record->signed_at }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">تاريخ بداية العقد</label>
                                <input type="date" name="start_date" class="form-control"
                                    value="{{ $record->start_date }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">تاريخ نهاية العقد</label>
                                <input type="date" name="end_date" class="form-control"
                                    value="{{ $record->end_date ? $record->end_date : '' }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">مدة العقد (بالأيام)</label>
                                <input type="number" name="duration_in_days" class="form-control"
                                    value="{{ $record->duration_in_days }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">نوع العقد</label>
                                <select name="contract_type" class="form-select" required>
                                    <option value="services" {{ $record->contract_type == 'services' ? 'selected' : ''
                                        }}>خدمات</option>
                                    <option value="supply" {{ $record->contract_type == 'supply' ? 'selected' : ''
                                        }}>توريد</option>
                                    <option value="transport" {{ $record->contract_type == 'transport' ? 'selected' : ''
                                        }}>نقل</option>
                                    <option value="consulting" {{ $record->contract_type == 'consulting' ? 'selected' : ''
                                        }}>استشارة</option>
                                    <option value="other" {{ $record->contract_type == 'other' ? 'selected' : '' }}>آخر
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">نوع العقد (آخر)</label>
                                <input type="text" name="contract_type_other" class="form-control"
                                    value="{{ $record->contract_type_other }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">قيمة العقد</label>
                                <input type="number" step="0.01" name="contract_value" class="form-control"
                                    value="{{ $record->contract_value }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">العملة</label>
                                <select name="currency" class="form-select" required>
                                    <option value="SAR" {{ $record->currency == 'SAR' ? 'selected' : '' }}>ريال</option>
                                    <option value="USD" {{ $record->currency == 'USD' ? 'selected' : '' }}>دولار</option>
                                    <option value="other" {{ $record->currency == 'other' ? 'selected' : '' }}>آخر
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">عملة أخرى</label>
                                <input type="text" name="currency_other" class="form-control"
                                    value="{{ $record->currency_other }}">
                            </div>

                            <!-- موافقة الأطراف -->
                            <div class="col-md-6">
                                <div class="mt-4 form-check">
                                    <input class="form-check-input" type="checkbox" name="first_party_approval" value="1"
                                        id="firstPartyApproval{{ $record->id }}" {{ $record->first_party_approval ?
                                    'checked' : '' }}>
                                    <label class="form-check-label" for="firstPartyApproval{{ $record->id }}">موافقة الطرف
                                        الأول</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mt-4 form-check">
                                    <input class="form-check-input" type="checkbox" name="second_party_approval" value="1"
                                        id="secondPartyApproval{{ $record->id }}" {{ $record->second_party_approval ?
                                    'checked' : '' }}>
                                    <label class="form-check-label" for="secondPartyApproval{{ $record->id }}">موافقة
                                        الطرف الثاني</label>
                                </div>
                            </div>

                            <!-- بنود العقد -->
                            <div class="col-12">
                                <label class="form-label">بنود العقد</label>
                                @foreach($record->terms as $term)
                                <textarea name="terms[]" class="mb-2 form-control" rows="2">{{ $term->text }}</textarea>
                                @endforeach
                                <button type="button" class="btn btn-sm btn-outline-primary" onclick="addTerm()">+ إضافة بند
                                    آخر</button>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">إغلاق</button>
                        <button type="submit" class="btn btn-primary">تحديث</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Edit Contract -->

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
                    <p>هل أنت متأكد من حذف "<strong>{{ $record->contract_number }}</strong>"؟</p>
                    <p class="text-danger">هذا الإجراء لا يمكن التراجع عنه.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <form action="{{ route('admin.logistic.contracts.destroy', $record->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">نعم، حذف</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
