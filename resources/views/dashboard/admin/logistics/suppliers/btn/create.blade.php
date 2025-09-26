<!-- Modal Create Supplier -->
<div class="modal fade" id="createSupplierModal" tabindex="-1" aria-labelledby="createSupplierLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('admin.logistic.suppliers.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('dashboard/supplier.create') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="{{ __('dashboard/general.close') }}"></button>
                </div>
                <div class="modal-body">

                    {{-- بيانات أساسية --}}
                    <h3 class="mb-3">{{ __('dashboard/supplier.sections.basic') }}</h3>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{ __('dashboard/supplier.fields.name') }}</label>
                            <input type="text" name="name" class="form-control" value="">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{ __('dashboard/supplier.fields.supplier_type') }}</label>
                            <select name="supplier_type" id="supplier_type" class="form-control">
                                <option value="">{{ __('dashboard/general.choose') }}</option>
                                <option value="individual">{{ __('dashboard/supplier.supplier_types.individual') }}
                                </option>
                                <option value="company">{{ __('dashboard/supplier.supplier_types.company') }}</option>
                                <option value="government">{{ __('dashboard/supplier.supplier_types.government') }}
                                </option>
                                <option value="other">{{ __('dashboard/supplier.supplier_types.other') }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="row d-none" id="supplier_type_other_wrapper">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">{{ __('dashboard/supplier.fields.supplier_type_other') }}</label>
                            <input type="text" name="supplier_type_other" class="form-control">
                        </div>
                    </div>

                    {{-- بيانات المورد --}}
                    <h3 class="mb-3">{{ __('dashboard/supplier.sections.supplier_data') }}</h3>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label">{{ __('dashboard/supplier.fields.commercial_register_number')
                                }}</label>
                            <input type="text" name="commercial_registration_number" class="form-control" value="">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">{{ __('dashboard/supplier.fields.tax_number') }}</label>
                            <input type="text" name="tax_number" class="form-control" value="">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">{{ __('dashboard/supplier.fields.business_activity') }}</label>
                            <input type="text" name="activity" class="form-control" value="">
                        </div>
                    </div>

                    {{-- بيانات التواصل --}}
                    <h3 class="mb-3">{{ __('dashboard/supplier.sections.contact_info') }}</h3>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{ __('dashboard/supplier.fields.mobile_number') }}</label>
                            <input type="text" name="mobile" class="form-control" value="">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{ __('dashboard/supplier.fields.landline_number') }}</label>
                            <input type="text" name="phone" class="form-control" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{ __('dashboard/supplier.fields.email') }}</label>
                            <input type="email" name="email" class="form-control" value="">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{ __('dashboard/supplier.fields.national_address') }}</label>
                            <input type="text" name="address" class="form-control" value="">
                        </div>
                    </div>

                    {{-- بيانات ضابط الاتصال --}}
                    <h3 class="mb-3">{{ __('dashboard/supplier.sections.contact_person') }}</h3>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{ __('dashboard/supplier.fields.contact_full_name') }}</label>
                            <input type="text" name="contact_person_name" class="form-control" value="">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{ __('dashboard/supplier.fields.contact_national_id') }}</label>
                            <input type="text" name="contact_person_identity" class="form-control" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{ __('dashboard/supplier.fields.contact_mobile_number')
                                }}</label>
                            <input type="text" name="contact_person_mobile" class="form-control" value="">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{ __('dashboard/supplier.fields.contact_alt_mobile_number')
                                }}</label>
                            <input type="text" name="contact_person_alt_mobile" class="form-control" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">{{ __('dashboard/supplier.fields.contact_email') }}</label>
                            <input type="email" name="contact_person_email" class="form-control" value="">
                        </div>
                    </div>

                    {{-- بيانات الحساب البنكي --}}
                    <h3 class="mb-3">{{ __('dashboard/supplier.sections.bank_info') }}</h3>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{ __('dashboard/supplier.fields.bank_name') }}</label>
                            <input type="text" name="bank_name" class="form-control" value="">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{ __('dashboard/supplier.fields.bank_account_number') }}</label>
                            <input type="text" name="bank_account_number" class="form-control" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{ __('dashboard/supplier.fields.account_holder_name') }}</label>
                            <input type="text" name="bank_account_owner" class="form-control" value="">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{ __('dashboard/supplier.fields.account_email') }}</label>
                            <input type="email" name="bank_email" class="form-control" value="">
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
