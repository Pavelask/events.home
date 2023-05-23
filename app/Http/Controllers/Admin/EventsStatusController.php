<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventsStatusRequest;
use App\Models\Admin\EventStatusModel;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class EventsStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.eventstatus.index', [
            'EventsStatus' => SpladeTable::for(EventStatusModel::class)
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
        return view('admin.eventstatus.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventsStatusRequest $request)
    {
        $defaultValue = 500;
        $validated = $request->validated();
        $validated['sort'] = $validated['sort'] ?? $defaultValue;

        EventStatusModel::create($validated);

        Toast::title('Запись добавлена!')
            ->autoDismiss(7);
        return redirect()->route('eventsstatus.index');
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
    public function edit(string $eventsstatus)
    {
        $eventsstatus = EventStatusModel::find($eventsstatus);

        return view('admin.eventstatus.edit', [
            'eventsstatus' => $eventsstatus
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventsStatusRequest $request, EventStatusModel $eventsstatus)
    {
        $eventsstatus->update($request->all());
        Toast::title('Запись обновлена!')->autoDismiss(7);
        return redirect()->route('eventsstatus.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventStatusModel $eventsstatus)
    {
        $eventsstatus->delete();
        Toast::title('Запись удалена!')->danger()->autoDismiss(7);
        return redirect()->route('eventsstatus.index');
    }
}
