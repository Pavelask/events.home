<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventsRequest;
use App\Models\Admin\EventsModel;
use App\Models\Admin\EventStatusModel;
use App\Models\Admin\EventTypesModel;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Events = EventsModel::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.events.index', [
            'Events' => SpladeTable::for(EventsModel::class)
                //->column('id', label: 'ID', sortable: true)
                ->column('name', label: 'Название', sortable: true)
//                ->column('date_start', label: 'date_start')
//                ->column('date_end', label: 'date_end')
                ->column('sort', label: 'SORT', sortable: true)
//                ->column('status', label: 'Статус')
                ->column('show')
                ->column('edit')
                ->column('delete')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Status = EventStatusModel::all();
        $EventType = EventTypesModel::all();

        return view('admin.events.add', [
            'Status' => $Status,
            'EventType' => $EventType,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventsRequest $event)
    {
        $defaultValue = 500;
        $validated = $event->validated();
        $validated['sort'] = $validated['sort'] ?? $defaultValue;
//        dd($request);

        EventsModel::create($validated);

        Toast::title('Мероприятие успешно создано!')
            ->autoDismiss(7);

        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(EventsModel $event)
    {
        return view('admin.events.show', [
            'Event' => $event,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $event)
    {
        $Event = EventsModel::find($event);

        if (!$Event) {
            return view('admin.events.index');
        }

        $Status = EventStatusModel::all();
        $EventType = EventTypesModel::all();

        return view('admin.events.edit', [
            'Event' => $Event,
            'Status' => $Status,
            'EventType' => $EventType
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventsRequest $request, EventsModel $event)
    {
        $validator = $request->validated();
        $event->update($validator);

        Toast::title('Мероприятие успешно обновлено!')
            ->autoDismiss(5);

        return redirect()->route('events.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventsModel $event)
    {
        $event->delete();
        Toast::title('Запись удалена!')->danger()->autoDismiss(7);
        return redirect()->route('events.index');
    }
}
