@extends('dashboard.layouts.master')
@section('css')
<style>
    #branches_datatable tbody td,
    #branches_datatable thead th {
        text-align: center !important;
    }

    #branches_datatable .dt-left,
    #branches_datatable .dt-right {
        text-align: center !important;
    }
</style>
@endsection

@section('title')
{{ $title }}
@endsection
@section('content')
<div class="page-content">
    <div class="content-header">
        <h1 class="mb-0">بيانات السائقين</h1>
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin.dashboard')}}">{{trans('dashboard/header.main_dashboard') }}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('admin.logistic.drivers.index')}}">السائقين</a>
            </li>
        </ul>
    </div>
    <!-- Start Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <span class="nav-icon">
                        <i class="ti ti-award"></i>
                    </span>
                    السائقين
                    <button data-pc-animate="3d-sign" type="button" class="btn btn-sm btn-light btn-active-primary"
                        data-bs-toggle="modal" data-bs-target="#createInsuranceOfficeModal">
                        <i class="fa fa-plus"></i>
                        اضافه سائق
                    </button>
                    @include('dashboard.admin.logistics.drivers.btn.create')
                </div>
                <div class="card-body">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-row-bordered gy-5 gs-7">
                            {!! $dataTable->table() !!}
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
</div>
@endsection

@push('js')
{!! $dataTable->scripts() !!}
<script>
    function previewImage(inputId, previewId) {
            let input = document.getElementById(inputId);
            let preview = document.getElementById(previewId);
            input.addEventListener("change", function() {
                let file = input.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = "block";
                    };
                    reader.readAsDataURL(file);
                } else {
                    preview.src = "";
                    preview.style.display = "none";
                }
            });
        }
    function openImageModal(src, title) {
        if (src) {
            let popupImage = document.getElementById("popupImage");
            let modalTitle = document.getElementById("imageModalLabel");
            popupImage.src = src;
            modalTitle.innerText = title;
            let imageModal = new bootstrap.Modal(document.getElementById("imageModal"));
            imageModal.show();
        }
    }
    previewImage("avatarInput", "avatarPreview");
    previewImage("licenseInput", "licensePreview");
    previewImage("identityInput", "identityPreview");
</script>
@endpush
