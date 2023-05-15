<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TimetableRequest;
use App\Models\Admin\EventsModel;
use App\Models\Admin\ScheduleModel;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(EventsModel $event, ScheduleModel $schedule)
    {
        // $Schedule = $event->schedule()->get();
        $data = $schedule->timeTable()->get();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $event, string $schedule)
    {
        return view('admin.timetable.add', ['event' => $event, 'schedule'=> $schedule]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TimetableRequest $request, string $event, ScheduleModel $schedule)
    {
        $defaultValue = 500;
        $validated = $request->validated();
        $validated['sort'] = $validated['sort'] ?? $defaultValue;

//        dd($validated);
        $schedule->timeTable()->create($validated);

        Toast::title('Запись добавлена!')
            ->autoDismiss(7);

        return redirect()->route('schedule.index', ['event' => $event]);
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
    public function edit(string $event, ScheduleModel $schedule, string $timetable)
    {
        $Timetable = $schedule->timeTable()->find($timetable);
        return view('admin.timetable.edit', [
            'Event' => $event,
            'Schedule' => $schedule,
            'Timetable' => $Timetable,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TimetableRequest $request, string $event, ScheduleModel $schedule, string $timetable)
    {
        $Timetable = $schedule->timeTable()->find($timetable);
        $validated = $request->validated();

        $Timetable->update($validated);

        Toast::title('Запись обновлена!')
            ->autoDismiss(7);

        return redirect()->route('schedule.index', [
            'event' => $event,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $event, ScheduleModel $schedule, string $timetable)
    {
        $Timetable = $schedule->timeTable()->find($timetable);

        $Timetable->delete();

        Toast::title('Запись удалена!')
            ->danger()
            ->autoDismiss(7);

        return redirect()->route('schedule.index', $event);
    }
}
