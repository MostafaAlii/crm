<?php

namespace App\Http\Controllers\Dashboard\Logistics;

use App\DataTables\Dashboard\Admin\Logistics\VehicleDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\VehicleRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\Logistics\VehicleRequest;

class VehicleController extends Controller
{
    public function __construct(protected VehicleRepositoryInterface $repository) {}

    public function index(VehicleDataTable $dataTable)
    {
        return $this->repository->index($dataTable, 'dashboard.admin.logistics.vehicles.index', 'المركبات');
    }

    public function create()
    {
        return $this->repository->create('dashboard.admin.logistics.vehicles.create', 'انشاء مركبه جديدة');
    }

    public function store(VehicleRequest $request)
    {
        return $this->repository->store($request);
    }

    public function edit($id)
    {
        return $this->repository->edit($id, 'dashboard.admin.logistics.vehicles.edit', 'تعديل المركبة');
    }

    public function update(VehicleRequest $request, $id)
    {
        return $this->repository->update($request, $id);
    }

    public function destroy($id)
    {
        $record = $this->repository->find($id);
        return $this->repository->destroy($record);
    }
}
