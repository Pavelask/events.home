<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FederalDistrictRequest;
use App\Models\Admin\FederalDistrictModel;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class FederalDistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.federaldistrict.index', [
            'FederalDistrict' => SpladeTable::for(FederalDistrictModel::class)
                ->column('id', label: 'ID')
                ->column('name', label: 'Тип мероприятия')
                ->column('code', label: 'CODE')
                ->column('edit', label: 'Редактировать')
                ->column('delete', label: 'Удалить')

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.federaldistrict.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FederalDistrictRequest $federaldistrict)
    {
        $defaultValue = 500;
        $validated = $federaldistrict->validated();
        $validated['sort'] = $validated['sort'] ?? $defaultValue;

        FederalDistrictModel::create($validated);

        Toast::title('Запись добавлена!')
            ->autoDismiss(7);

        return redirect()->route('federaldistrict.index');
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
    public function edit(string $federaldistrict)
    {
        $FederalFistrict = FederalDistrictModel::find($federaldistrict);

        return view('admin.federaldistrict.edit', [
            'FederalFistrict' => $FederalFistrict
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FederalDistrictRequest $request, FederalDistrictModel $federaldistrict)
    {
        $federaldistrict->update($request->all());
        Toast::title('Запись обновлена!')->autoDismiss(7);
        return redirect()->route('federaldistrict.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FederalDistrictModel $federaldistrict)
    {
        $federaldistrict->delete();
        Toast::title('Запись удалена!')->danger()->autoDismiss(7);
        return redirect()->route('federaldistrict.index');
    }
}
