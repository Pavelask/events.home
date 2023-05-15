<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleRequest;
use App\Models\Admin\EventsModel;
use App\Models\Admin\ScheduleModel;
use App\Models\Admin\TimetableModel;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(EventsModel $event)
    {

        $Schedule = $event->schedule()->get();

        return view('admin.schedule.index', [
            'Event' => $event,
            'Schedule' => $Schedule,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($event)
    {
        return view('admin.schedule.add', ['event' => $event]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ScheduleRequest $request, EventsModel $event)
    {
        $defaultValue = 500;
        $validated = $request->validated();
        $validated['sort'] = $validated['sort'] ?? $defaultValue;

        $event->schedule()->create($validated);

        Toast::title('Запись добавлена!')
            ->autoDismiss(7);

        return redirect()->route('schedule.index', ['event' => $event->id]);
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
    public function edit(EventsModel $event, string $schedule)
    {
        $Schedule = $event->schedule()->find($schedule);
        return view('admin.schedule.edit', [
            'Schedule' => $Schedule,
            'Event' => $event->id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ScheduleRequest $request, EventsModel $event, string $schedule)
    {
        $data = $event->schedule()->find($schedule);
        $validated = $request->validated();

        $data->update($validated);

        Toast::title('Запись обновлена!')
            ->autoDismiss(7);

        return redirect()->route('schedule.index', [
//            'Schedule' => $Schedule,
            'event' => $event->id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventsModel $event, string $schedule)
    {
        $data = $event->schedule()->find($schedule);

        $data->delete();

        Toast::title('Запись удалена!')
            ->danger()
            ->autoDismiss(7);

        return redirect()->route('schedule.index', $event);
    }
}
