<?php

namespace App\Http\Controllers\Dashboard\Logistics;

use App\DataTables\Dashboard\Admin\Logistics\DriverDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\DriverRepositoryInterface;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function __construct(protected DriverRepositoryInterface $repository) {}

    public function index(DriverDataTable $dataTable)
    {
        return $this->repository->index($dataTable, 'dashboard.admin.logistics.drivers.index', 'السائقين');
    }

    public function create()
    {
        return $this->repository->create('dashboard.admin.logistics.drivers.create', trans('dashboard/driver.create'));
    }

    public function store(Request $request)
    {
        return $this->repository->store($request);
    }

    public function edit($id)
    {
        return $this->repository->edit($id, 'dashboard.admin.logistics.drivers.edit', trans('dashboard/driver.edit'));
    }

    public function update(Request $request, $id)
    {
        return $this->repository->update($request, $id);
    }

    public function destroy($id)
    {
        $record = $this->repository->find($id);
        return $this->repository->destroy($record);
    }
}