<?php

namespace App\Repositories\Eloquents;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
abstract class BaseRepository {
    protected $model;
    protected $rules = [
        'name'   => 'nullable|string|max:255',
    ];

    public function __construct(Model $model) {
        $this->model = $model;
    }

    protected function extraData(string $context): array {
        return [];
    }

    public function index($dataTable, $view, $title) {
        return $dataTable->render($view, array_merge(
            ['title' => $title],
            $this->extraData('index')
        ));
    }

    public function create($view, $title) {
        return view($view, array_merge(
            ['title' => $title],
            $this->extraData('create')
        ));
    }

    protected function extraStoreFields(Request $request): array {
        return [];
    }
    protected function extraUpdateFields(Request $request, $id): array {
        return [];
    }

    protected function afterStore($model, Request $request): void {}
    protected function afterUpdate($model, Request $request): void {}

    public function store(Request $request) {
        //$validated = $request->validate($this->rules);
        $data = [];
        $data = array_merge($data, $this->extraStoreFields($request));
        $record = $this->model->create($data);
        $this->afterStore($record, $request);
        return redirect()->back()->with('success', 'تم الحفظ بنجاح!');
    }

    public function edit($id, $view, $title) {
        $record = $this->model->findOrFail($id);
        return view($view, array_merge(
            ['title' => $title, 'record' => $record],
            $this->extraData('edit')
        ));
    }

    /*public function update(Request $request, $id) {
        $validated = $request->validate($this->rules);
        $record = $this->model->findOrFail($id);
        $data = [
            'name'   => $request['name'] ?? null,
        ];
        $data = array_merge($data, $this->extraUpdateFields($request, $id));
        $record->update($data);
        $this->afterUpdate($record, $request);
        return redirect()->back()->with('success', 'تم التحديث بنجاح!');
    }*/
    public function update(Request $request, $id) {
        if (!($request instanceof \Illuminate\Foundation\Http\FormRequest)) {
            if (!empty($this->rules)) {
                $request->validate($this->rules);
            }
        }
        $record = $this->model->findOrFail($id);
        $data = $this->extraUpdateFields($request, $id);
        $record->update($data);
        $this->afterUpdate($record, $request);
        return redirect()->back()->with('success', 'تم التحديث بنجاح!');
    }


    public function show($id, $view, $title)
    {
        $record = $this->model->findOrFail($id);
        return view($view, array_merge(
            ['title' => $title, 'record' => $record],
            $this->extraData('show')
        ));
    }
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function destroy($model) {
        $model->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح!');
    }
}
