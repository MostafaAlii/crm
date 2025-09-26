<?php

namespace App\Http\Controllers\Dashboard\Logistics;

use App\DataTables\Dashboard\Admin\Logistics\ClientDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ClientRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\Logistics\ClientRequest;

class ClientController extends Controller {
    public function __construct(protected ClientRepositoryInterface $repository) {}

    public function index(ClientDataTable $dataTable)
    {
        return $this->repository->index($dataTable, 'dashboard.admin.logistics.clients.index', 'العملاء');
    }

    public function create()
    {
        return $this->repository->create('dashboard.admin.logistics.clients.create', 'انشاء عميل جديدة');
    }

    public function store(ClientRequest $request)
    {
        return $this->repository->store($request);
    }

    public function edit($id)
    {
        return $this->repository->edit($id, 'dashboard.admin.logistics.clients.edit', 'تعديل عميل');
    }

    public function update(ClientRequest $request, $id)
    {
        return $this->repository->update($request, $id);
    }

    public function destroy($id)
    {
        $record = $this->repository->find($id);
        return $this->repository->destroy($record);
    }
}
