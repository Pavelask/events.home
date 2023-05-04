<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\MembersModel;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;

class MemberAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.members.index', [
            'Members' => SpladeTable::for(MembersModel::class)
                ->withGlobalSearch(columns: ['surName'])
                ->perPageOptions([15, 20, 25])
                ->column('id', label: 'ID')
                ->column('surName', label: 'ФИО', sortable: true)
                ->column('confirmation', label: 'Статус')
                ->column('edit', label: 'Редактировать')
                ->column('delete', label: 'Удалить')
                ->paginate(20)

        ]);
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
