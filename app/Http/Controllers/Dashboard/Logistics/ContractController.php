<?php
namespace App\Http\Controllers\Dashboard\Logistics;
use App\DataTables\Dashboard\Admin\Logistics\ContractDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ContractRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\Logistics\ContractRequest;

class ContractController extends Controller {
    public function __construct(protected ContractRepositoryInterface $repository) {}

    public function index(ContractDataTable $dataTable)
    {
        return $this->repository->index($dataTable, 'dashboard.admin.logistics.contracts.index', 'العقود');
    }

    public function create()
    {
        return $this->repository->create('dashboard.admin.logistics.contracts.create', 'انشاء عقد جديد جديدة');
    }

    public function store(ContractRequest $request)
    {
        return $this->repository->store($request);
    }

    public function edit($id)
    {
        return $this->repository->edit($id, 'dashboard.admin.logistics.contracts.edit', 'تعديل العقود');
    }

    public function update(ContractRequest $request, $id)
    {
        return $this->repository->update($request, $id);
    }

    public function destroy($id)
    {
        $record = $this->repository->find($id);
        return $this->repository->destroy($record);
    }
}
