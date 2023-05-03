<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MemberStatusRequest;
use App\Models\Admin\MemberStatusModel;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class MemberStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.memberstatus.index', [
            'MemberStatus' => SpladeTable::for(MemberStatusModel::class)
                ->column('id', label: 'ID')
                ->column('name', label: 'Статус')
                ->column('sort', label: 'SORT')
                ->column('edit', label: 'Редактировать')
                ->column('delete', label: 'Удалить')

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.memberstatus.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberStatusRequest $memberstatus)
    {
        $defaultValue = 500;
        $validated = $memberstatus->validated();
        $validated['sort'] = $validated['sort'] ?? $defaultValue;

        MemberStatusModel::create($validated);

        Toast::title('Запись добавлена!')
            ->autoDismiss(7);
        return redirect()->route('memberstatus.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $memberstatus)
    {
        $memberstatus = MemberStatusModel::find($memberstatus);

        return view('admin.memberstatus.edit', [
            'memberstatus' => $memberstatus
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MemberStatusRequest $request, MemberStatusModel $memberstatus)
    {
        $memberstatus->update($request->all());
        Toast::title('Запись обновлена!')->autoDismiss(7);
        return redirect()->route('memberstatus.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MemberStatusModel $memberstatus)
    {
        $memberstatus->delete();
        Toast::title('Запись удалена!')->danger()->autoDismiss(7);
        return redirect()->route('memberstatus.index');
    }
}
