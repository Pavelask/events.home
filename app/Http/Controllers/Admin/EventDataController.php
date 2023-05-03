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
        $Events = EventsModel::find($event);

        return view('admin.data.add', [
            'Event' => $Events,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventDataRequest $request, EventsModel $event)
    {
        HandleSpladeFileUploads::forRequest($request);
        $path = 'data/';
//        dd($event);

        if (!$request->image_existing && !$request->hasFile('image')) {

            $existsImage = Storage::disk('public')->exists($path . $event->image);

            if ($existsImage) {
                $ExistingFileImage = ExistingFile::fromDisk('public')->get($path . $event->image);
                $image_path = public_path() . '/storage/' . $path .  $ExistingFileImage->filename;

                unlink($image_path);
                $validated['image'] = '';
            }
        }


        if (!$request->banner_existing && !$request->hasFile('banner')) {

            $existsBanner = Storage::disk('public')->exists($path . $event->banner);

            if ($existsBanner) {
                $ExistingFileBanner = ExistingFile::fromDisk('public')->get($path . $event->banner);
                $image_path = public_path() . '/storage/' . $path . $ExistingFileBanner->filename;

                unlink($image_path);
                $validated['banner'] = '';
            }
        }

        $validated = $request->validated();
        $validated['events_id'] = $request->events_id;

        if ($request->image_existing) {
            $validated['image'] = $request->image_existing->filename;
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->hashName();

            $existsImage = Storage::disk('public')->exists($path . $event->image);
            if ($existsImage) {
                $ExistingFileImage = ExistingFile::fromDisk('public')->get($path . $event->image);
                $image_path = public_path() . '/storage/' . $path .  $ExistingFileImage->filename;
                unlink($image_path);
            }

            Storage::put("public/data/", $image);
            $validated['image'] = "images/data/" . $name;

        }

        if ($request->banner_existing) {
            $validated['banner'] = $request->banner_existing->filename;
        }

        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $name = $banner->hashName();

            $existsImage = Storage::disk('public')->exists($path . $event->banner);
            if ($existsImage) {
                $ExistingFileImage = ExistingFile::fromDisk('public')->get($path . $event->banner);
                $image_path = public_path() . '/storage/' . $path . $ExistingFileImage->filename;
                unlink($image_path);
            }

            Storage::put("public/data/", $banner);
            $validated['banner'] = "data/" . $name;

        }

//        if ($request->image_existing) {
//            $validated['image'] = $request->image_existing->filename;
//        }
//
//        if ($request->hasFile('image')) {
//            $image = $request->file('image');
//            $name = $image->hashName();
//
//            $validated['image'] = "images/" . $name;
//            Storage::put("public/", $validated['image']);
//        }

        dd($validated);

        $event->update($validated);

        Toast::title('Запись обновлена!')
            ->autoDismiss(7);

//        return redirect()->route('event_data.show', $request->events_id);
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
