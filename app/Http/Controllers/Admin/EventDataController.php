<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventDataRequest;
use App\Models\Admin\EventsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\FileUploads\ExistingFile;
use ProtoneMedia\Splade\FileUploads\HandleSpladeFileUploads;

class EventDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $event)
    {
        $Events = EventsModel::find($event);
        $Data = $Events->data;
        if(!$Data) {
            return redirect()->route('data.create', [
                'event' => $Events->id
            ]);
        }

        if($Data) {
            return redirect()->route('data.edit', [
                'event' => $Events->id
            ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $event)
    {
        $Event = EventsModel::query()->select('id', 'name', 'date_start', 'date_end')
            ->where('id', $event)
            ->first();

        return view('admin.data.add', [
            'Event' => $Event,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventDataRequest $request, EventsModel $event)
    {
        $validated = $request->validated();
        $validated['image'] = '';
        $validated['banner'] = '';

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->hashName();

            Storage::put("public/data/", $image);
            $validated['image'] = $name;
        }

        if ($request->hasFile('banner')) {
            $image = $request->file('banner');
            $name = $image->hashName();

            Storage::put("public/data/", $image);
            $validated['banner'] = $name;
        }

        $event->eventData()->create($validated);

        Toast::title('Запись добавлена!')
            ->autoDismiss(7);

        return redirect()->route('data.index', ['event' => $event->id]);

    }

    /**
     * Display the specified resource.
     */
    public function show(EventsModel $event, string $id)
    {
        $Event = EventsModel::query()->select('id', 'name', 'date_start', 'date_end')
            ->where('id', $event)
            ->first();

        return view('admin.data.add', [
            'Event' => $Event,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

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
