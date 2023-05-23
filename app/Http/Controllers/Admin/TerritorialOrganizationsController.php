<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\TerritorialOrganizations;
use App\Models\Admin\TerritorialOrganizationsModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class TerritorialOrganizationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $count = count(TerritorialOrganizationsModel::all());
//        dd(TerritorialOrganizationsModel::all());
        return view('admin.territorialorganizations.index', [
            'TerritorialOrganizations' => SpladeTable::for(TerritorialOrganizationsModel::class)
                ->withGlobalSearch(columns: ['name_to'])
                ->perPageOptions([15, 20, 30])
//                ->column('id', label: 'ID')
                ->column('name_to', label: 'Организация',
                    canBeHidden: false,
                    hidden: false,
                    sortable: true)
                ->column('code', label: 'Код',
                    canBeHidden: false,
                    hidden: false)
//                ->column('edit', label: 'Редактировать')
//                ->column('delete', label: 'Удалить')
                ->paginate(15)
        ], ['count' => $count]);
    }

    public function upload(Request $request) {
        $csv = $request->file('csv');

        if(empty($csv)){
            Toast::title('ВНИМАНИЕ!')
                ->message('Не выбран файл для загрузки! ')
                ->warning()
                ->center()
                ->backdrop()
                ->autoDismiss(5);
            return redirect()->route('territorial_organizations.index');
        }
        $name = $csv->hashName();

        Excel::import(new TerritorialOrganizations, $csv);

        Toast::title('Что-то загрузили ...!')
            ->autoDismiss(7);
        return redirect()->route('territorial_organizations.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
