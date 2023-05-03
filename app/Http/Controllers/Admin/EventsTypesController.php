<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventTypesRequest;
use App\Models\Admin\EventTypesModel;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class EventsTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.eventstypes.index', [
            'EventTypes' => SpladeTable::for(EventTypesModel::class)
                ->column('id', label: 'ID')
                ->column('name', label: 'Тип мероприятия')
                ->column('slug', label: 'SLUG')
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
        return view('admin.eventstypes.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventTypesRequest $eventstype)
    {
        $defaultValue = 500;
        $validated = $eventstype->validated();
        $validated['sort'] = $validated['sort'] ?? $defaultValue;

        EventTypesModel::create($validated);

        Toast::title('Запись добавлена!')
            ->autoDismiss(7);

        return redirect()->route('eventstypes.index');
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
    public function edit(string $eventstype)
    {
        $EventsType = EventTypesModel::find($eventstype);

        return view('admin.eventstypes.edit', [
            'EventsType' => $EventsType
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventTypesRequest $request, EventTypesModel $eventstype)
    {
        $eventstype->update($request->all());
        Toast::title('Запись обновлена!')->autoDismiss(7);
        return redirect()->route('eventstypes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventTypesModel $eventstype)
    {
        $eventstype->delete();
        Toast::title('Запись удалена!')->danger()->autoDismiss(7);
        return redirect()->route('eventstypes.index');
    }
}
