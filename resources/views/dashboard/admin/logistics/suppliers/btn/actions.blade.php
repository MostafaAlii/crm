<div class="d-flex justify-content-center">
    <!-- زرار تعديل -->
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
        data-bs-target="#editSupplierModal{{ $record->id }}">
        <i class="fas fa-edit"></i>
    </button>
    <!-- Modal Edit Supplier -->
    <!-- Modal Edit Supplier -->
    <div class="modal fade" id="editSupplierModal{{ $record->id }}" tabindex="-1"
        aria-labelledby="editSupplierLabel{{ $record->id }}" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <form action="{{ route('admin.logistic.suppliers.update', $record->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('dashboard/supplier.edit') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="{{ __('dashboard/general.close') }}"></button>
                    </div>
                    <div class="modal-body">

                        {{-- بيانات أساسية --}}
                        <h3 class="mb-3">{{ __('dashboard/supplier.sections.basic') }}</h3>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">{{ __('dashboard/supplier.fields.name') }}</label>
                                <input type="text" name="name" class="form-control" value="{{ $record->name }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">{{ __('dashboard/supplier.fields.supplier_type') }}</label>
                                <select name="supplier_type" id="supplier_type" class="form-control">
                                    <option value="">{{ __('dashboard/general.choose') }}</option>
                                    <option value="individual" {{ $record->supplier_type == 'individual' ? 'selected' : ''
                                        }}>
                                        {{ __('dashboard/supplier.supplier_types.individual') }}</option>
                                    <option value="company" {{ $record->supplier_type == 'company' ? 'selected' : '' }}>
                                        {{ __('dashboard/supplier.supplier_types.company') }}</option>
                                    <option value="government" {{ $record->supplier_type == 'government' ? 'selected' : ''
                                        }}>
                                        {{ __('dashboard/supplier.supplier_types.government') }}</option>
                                    <option value="other" {{ $record->supplier_type == 'other' ? 'selected' : '' }}>
                                        {{ __('dashboard/supplier.supplier_types.other') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row {{ $record->supplier_type == 'other' ? '' : 'd-none' }}"
                            id="supplier_type_other_wrapper">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">{{ __('dashboard/supplier.fields.supplier_type_other') }}</label>
                                <input type="text" name="supplier_type_other" class="form-control"
                                    value="{{ $record->supplier_type_other }}">
                            </div>
                        </div>

                        {{-- بيانات المورد --}}
                        <h3 class="mb-3">{{ __('dashboard/supplier.sections.supplier_data') }}</h3>
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="form-label">{{ __('dashboard/supplier.fields.commercial_register_number')
                                    }}</label>
                                <input type="text" name="commercial_registration_number" class="form-control"
                                    value="{{ $record->commercial_registration_number }}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">{{ __('dashboard/supplier.fields.tax_number') }}</label>
                                <input type="text" name="tax_number" class="form-control" value="{{ $record->tax_number }}">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">{{ __('dashboard/supplier.fields.business_activity') }}</label>
                                <input type="text" name="activity" class="form-control" value="{{ $record->activity }}">
                            </div>
                        </div>

                        {{-- بيانات التواصل --}}
                        <h3 class="mb-3">{{ __('dashboard/supplier.sections.contact_info') }}</h3>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">{{ __('dashboard/supplier.fields.mobile_number') }}</label>
                                <input type="text" name="mobile" class="form-control" value="{{ $record->mobile }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">{{ __('dashboard/supplier.fields.landline_number') }}</label>
                                <input type="text" name="phone" class="form-control" value="{{ $record->phone }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">{{ __('dashboard/supplier.fields.email') }}</label>
                                <input type="email" name="email" class="form-control" value="{{ $record->email }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">{{ __('dashboard/supplier.fields.national_address') }}</label>
                                <input type="text" name="address" class="form-control" value="{{ $record->address }}">
                            </div>
                        </div>

                        {{-- بيانات ضابط الاتصال --}}
                        <h3 class="mb-3">{{ __('dashboard/supplier.sections.contact_person') }}</h3>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">{{ __('dashboard/supplier.fields.contact_full_name') }}</label>
                                <input type="text" name="contact_person_name" class="form-control"
                                    value="{{ $record->contact_person_name }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">{{ __('dashboard/supplier.fields.contact_national_id') }}</label>
                                <input type="text" name="contact_person_identity" class="form-control"
                                    value="{{ $record->contact_person_identity }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">{{ __('dashboard/supplier.fields.contact_mobile_number')
                                    }}</label>
                                <input type="text" name="contact_person_mobile" class="form-control"
                                    value="{{ $record->contact_person_mobile }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">{{ __('dashboard/supplier.fields.contact_alt_mobile_number')
                                    }}</label>
                                <input type="text" name="contact_person_alt_mobile" class="form-control"
                                    value="{{ $record->contact_person_alt_mobile }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">{{ __('dashboard/supplier.fields.contact_email') }}</label>
                                <input type="email" name="contact_person_email" class="form-control"
                                    value="{{ $record->contact_person_email }}">
                            </div>
                        </div>

                        {{-- بيانات الحساب البنكي --}}
                        <h3 class="mb-3">{{ __('dashboard/supplier.sections.bank_info') }}</h3>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">{{ __('dashboard/supplier.fields.bank_name') }}</label>
                                <input type="text" name="bank_name" class="form-control" value="{{ $record->bank_name }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">{{ __('dashboard/supplier.fields.bank_account_number') }}</label>
                                <input type="text" name="bank_account_number" class="form-control"
                                    value="{{ $record->bank_account_number }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">{{ __('dashboard/supplier.fields.account_holder_name') }}</label>
                                <input type="text" name="bank_account_owner" class="form-control"
                                    value="{{ $record->bank_account_owner }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">{{ __('dashboard/supplier.fields.account_email') }}</label>
                                <input type="email" name="bank_email" class="form-control"
                                    value="{{ $record->bank_email }}">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            {{ __('dashboard/general.closed') }}
                        </button>
                        <button type="submit" class="btn btn-success">
                            {{ __('dashboard/general.save') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Modal Edit Supplier -->

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
