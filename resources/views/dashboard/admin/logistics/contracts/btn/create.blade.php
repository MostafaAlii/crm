<!-- مودال إنشاء عقد -->
{{--<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{ route('admin.logistic.contracts.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">إضافة عقد جديد</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">

                        <!-- الطرف الأول -->
                        <div class="col-md-6">
                            <label class="form-label">الطرف الأول (الشركة)</label>
                            <input type="text" name="first_party_name" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">السجل التجاري (الطرف الأول)</label>
                            <input type="text" name="first_party_commercial_register" class="form-control">
                        </div>

                        <!-- الطرف الثاني -->
                        <div class="col-md-6">
                            <label class="form-label">الطرف الثاني</label>
                            <input type="text" name="second_party_name" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">السجل التجاري (الطرف الثاني)</label>
                            <input type="text" name="second_party_commercial_register" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">نوع الطرف الثاني</label>
                            <select name="second_party_type" class="form-select" required>
                                <option value="individual">فرد</option>
                                <option value="company">شركة</option>
                                <option value="government">جهة حكومية</option>
                                <option value="other">آخر</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">نوع الطرف الثاني (آخر)</label>
                            <input type="text" name="second_party_type_other" class="form-control">
                        </div>

                        <!-- بيانات العقد -->
                        <div class="col-md-6">
                            <label class="form-label">رقم العقد</label>
                            <input type="text" name="contract_number" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">تاريخ توقيع العقد</label>
                            <input type="date" name="signed_at" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">تاريخ بداية العقد</label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">تاريخ نهاية العقد</label>
                            <input type="date" name="end_date" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">مدة العقد (بالأيام)</label>
                            <input type="number" name="duration_in_days" class="form-control" min="1">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">نوع العقد</label>
                            <select name="contract_type" class="form-select" required>
                                <option value="services">خدمات</option>
                                <option value="supply">توريد</option>
                                <option value="transport">نقل</option>
                                <option value="consulting">استشارة</option>
                                <option value="other">آخر</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">نوع العقد (آخر)</label>
                            <input type="text" name="contract_type_other" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">قيمة العقد</label>
                            <input type="number" step="0.01" name="contract_value" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">العملة</label>
                            <select name="currency" class="form-select" required>
                                <option value="SAR">ريال</option>
                                <option value="USD">دولار</option>
                                <option value="other">آخر</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">عملة أخرى</label>
                            <input type="text" name="currency_other" class="form-control">
                        </div>

                        <!-- موافقة الأطراف -->
                        <div class="col-md-6">
                            <div class="mt-4 form-check">
                                <input class="form-check-input" type="checkbox" name="first_party_approval" value="1"
                                    id="firstPartyApproval">
                                <label class="form-check-label" for="firstPartyApproval">موافقة الطرف الأول</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mt-4 form-check">
                                <input class="form-check-input" type="checkbox" name="second_party_approval" value="1"
                                    id="secondPartyApproval">
                                <label class="form-check-label" for="secondPartyApproval">موافقة الطرف الثاني</label>
                            </div>
                        </div>

                        <!-- بنود العقد -->
                        <div class="col-12">
                            <label class="form-label">بنود العقد</label>
                            <textarea name="terms[]" class="mb-2 form-control" rows="2"
                                placeholder="اكتب البند هنا..."></textarea>
                            <button type="button" class="btn btn-sm btn-outline-primary" onclick="addTerm()">+ إضافة بند
                                آخر</button>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">إغلاق</button>
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>--}}

<!-- مودال إنشاء عقد -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{ route('admin.logistic.contracts.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">{{ trans('dashboard/contracts.create_contract') }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="{{ trans('dashboard/contracts.close') }}"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">

                        <!-- الطرف الأول -->
                        <div class="col-md-6">
                            <label class="form-label">{{ trans('dashboard/contracts.first_party_name') }}</label>
                            <input type="text" name="first_party_name" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">{{ trans('dashboard/contracts.first_party_commercial_register')
                                }}</label>
                            <input type="text" name="first_party_commercial_register" class="form-control">
                        </div>

                        <!-- الطرف الثاني -->
                        <div class="col-md-6">
                            <label class="form-label">{{ trans('dashboard/contracts.second_party_name') }}</label>
                            <input type="text" name="second_party_name" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">{{ trans('dashboard/contracts.second_party_commercial_register')
                                }}</label>
                            <input type="text" name="second_party_commercial_register" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">{{ trans('dashboard/contracts.second_party_type') }}</label>
                            <select name="second_party_type" class="form-select" required>
                                @foreach(trans('dashboard/contracts.second_party_types') as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">{{ trans('dashboard/contracts.second_party_type_other') }}</label>
                            <input type="text" name="second_party_type_other" class="form-control">
                        </div>

                        <!-- بيانات العقد -->
                        <div class="col-md-6">
                            <label class="form-label">{{ trans('dashboard/contracts.contract_number') }}</label>
                            <input type="text" name="contract_number" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">{{ trans('dashboard/contracts.signed_at') }}</label>
                            <input type="date" name="signed_at" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">{{ trans('dashboard/contracts.start_date') }}</label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">{{ trans('dashboard/contracts.end_date') }}</label>
                            <input type="date" name="end_date" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">{{ trans('dashboard/contracts.duration_in_days') }}</label>
                            <input type="number" name="duration_in_days" class="form-control" min="1">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">{{ trans('dashboard/contracts.contract_type') }}</label>
                            <select name="contract_type" class="form-select" required>
                                @foreach(trans('dashboard/contracts.contract_type_options') as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">{{ trans('dashboard/contracts.contract_type_other') }}</label>
                            <input type="text" name="contract_type_other" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">{{ trans('dashboard/contracts.contract_value') }}</label>
                            <input type="number" step="0.01" name="contract_value" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">{{ trans('dashboard/contracts.currency') }}</label>
                            <select name="currency" class="form-select" required>
                                @foreach(trans('dashboard/contracts.currency_options') as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">{{ trans('dashboard/contracts.currency_other') }}</label>
                            <input type="text" name="currency_other" class="form-control">
                        </div>

                        <!-- موافقة الأطراف -->
                        <div class="col-md-6">
                            <div class="mt-4 form-check">
                                <input class="form-check-input" type="checkbox" name="first_party_approval" value="1"
                                    id="firstPartyApproval">
                                <label class="form-check-label" for="firstPartyApproval">{{
                                    trans('dashboard/contracts.first_party_approval') }}</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mt-4 form-check">
                                <input class="form-check-input" type="checkbox" name="second_party_approval" value="1"
                                    id="secondPartyApproval">
                                <label class="form-check-label" for="secondPartyApproval">{{
                                    trans('dashboard/contracts.second_party_approval') }}</label>
                            </div>
                        </div>

                        <!-- بنود العقد -->
                        <div class="col-12">
                            <label class="form-label">{{ trans('dashboard/contracts.terms') }}</label>
                            <textarea name="terms[]" class="mb-2 form-control" rows="2"
                                placeholder="{{ trans('dashboard/contracts.term_placeholder') }}"></textarea>
                            <button type="button" class="btn btn-sm btn-outline-primary" onclick="addTerm()">{{
                                trans('dashboard/contracts.add_term') }}</button>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{
                        trans('dashboard/contracts.close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ trans('dashboard/contracts.save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Script لإضافة حقول البنود -->

