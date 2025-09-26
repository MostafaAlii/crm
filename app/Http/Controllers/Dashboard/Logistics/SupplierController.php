<?php

namespace App\Http\Controllers\Dashboard\Logistics;

use App\DataTables\Dashboard\Admin\Logistics\SupplierDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\SupplierRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\Logistics\SupplierRequest;

class SupplierController extends Controller
{
    public function __construct(protected SupplierRepositoryInterface $repository) {}

    public function index(SupplierDataTable $dataTable)
    {
        return $this->repository->index($dataTable, 'dashboard.admin.logistics.suppliers.index', __('dashboard/supplier.actions.index'));
    }

    public function create()
    {
        return $this->repository->create('dashboard.admin.logistics.suppliers.create', __('dashboard/supplier.actions.create'));
    }

    public function store(SupplierRequest $request)
    {
        return $this->repository->store($request);
    }

    public function edit($id)
    {
        return $this->repository->edit($id, 'dashboard.admin.logistics.suppliers.edit', __('dashboard/supplier.actions.edit'));
    }

    public function update(SupplierRequest $request, $id)
    {
        return $this->repository->update($request, $id);
    }

    public function destroy($id)
    {
        $record = $this->repository->find($id);
        return $this->repository->destroy($record);
    }
}
