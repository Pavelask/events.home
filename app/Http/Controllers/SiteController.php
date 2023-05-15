<?php

namespace App\Http\Controllers;

use App\Models\Admin\EventsModel;
use App\Models\Admin\ScheduleModel;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Event = EventsModel::where('status', 1)->orderBy('created_at', 'asc')->first();
        $Data = $Event->eventData()->first();
        $Moderators = $Event->moderators()->get();
        $Guests = $Event->guests()->get();
        $Schedule = $Event->schedule()->get();

        // dd($Data);

        return view('welcome', [
            'Event' => $Event,
            'Data' => $Data,
            'Moderators' => $Moderators,
            'Guests' => $Guests,
            'Schedule' => $Schedule
        ]);
    }

    public function schedule(EventsModel $event, ScheduleModel $schedule)
    {
        // $Schedule = $event->schedule()->get();
        $data = $schedule->timeTable()->get();
        return $data;
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
