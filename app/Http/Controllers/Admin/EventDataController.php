<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventDataRequest;
use App\Models\Admin\EventDataModel;
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
        $Data = $Events->eventData;

        if (!$Data) {
            return redirect()->route('data.create', [
                'event' => $Events->id
            ]);
        }

        if ($Data) {
            return redirect()->route('data.edit', [
                'event' => $Events->id,
                'data' => $Data->id
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
    public function edit(EventsModel $event, string $data)
    {

        $Data = $event->eventData()->find($data);
        $image = '';
        $banner = '';
        $path = 'data/';

        if (!$Data) {
            return redirect()->route('data.index');
        }

        if ($Data->image) {
            $existsImage = Storage::disk('public')->exists($path . $Data->image);
            if ($existsImage) {
                $image = ExistingFile::fromDisk('public')->get($path . $Data->image);
            }
            $Data->image = $image;
        }

        if ($Data->banner) {
            $existsImage = Storage::disk('public')->exists($path . $Data->banner);
            if ($existsImage) {
                $banner = ExistingFile::fromDisk('public')->get($path . $Data->banner);
            }
            $Data->banner = $banner;
        }

//         dd($Data);
        return view('admin.data.edit', [
            'Event' => $event,
            'Data' => $Data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventDataRequest $request, EventsModel $event, string $data)
    {
        HandleSpladeFileUploads::forRequest($request);
        $data = $event->eventData()->find($data);
        $validated = $request->validated();
        $image_tmp = $data->image;
        $banner_tmp = $data->banner;
        $path = 'data/';

        if (!$data) {
            return redirect()->route('data.index');
        }

        // Обработка картинки
        if ($image_tmp &&!$request->image_existing && !$request->hasFile('image')) {

            $existsImage = Storage::disk('public')->exists($path . $image_tmp);

            if ($existsImage) {
                $ExistingFileImage = ExistingFile::fromDisk('public')->get($path . $image_tmp);
                $image_path = public_path() . '/storage/' . $ExistingFileImage->filename;

                unlink($image_path);
                $validated['image'] = '';
            }
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->hashName();

            // dd('File in DB is - '.$data->image);
            if ($data->image) {
                $image_path = public_path() . '/storage/data/' . $data->image;

                if (Storage::exists($image_path)) {
                    unlink($image_path);
                }
            }

            Storage::put('public/data/', $image);
            $validated['image'] = $name;
        }

        if ($request->image_existing) {
            $validated['image'] = $request->image_existing->name;
        }

        // Обработка банера
        if (!$request->banner_existing && !$request->hasFile('banner')) {

            $existsImage = Storage::disk('public')->exists($path . $banner_tmp);

            if ($existsImage) {
                $ExistingFileImage = ExistingFile::fromDisk('public')->get($path . $banner_tmp);
                $image_path = public_path() . '/storage/' . $ExistingFileImage->filename;

                unlink($image_path);
                $validated['banner'] = '';
            }
        }

        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $name = $banner->hashName();

            // dd('File in DB is - '.$data->image);
            if ($data->image) {
                $banner_path = public_path() . '/storage/data/' . $data->banner;

                if (Storage::exists($banner_path)) {
                    unlink($banner_path);
                }
            }

            Storage::put('public/data/', $banner);
            $validated['banner'] = $name;
        }

        if ($request->banner_existing) {
            $validated['banner'] = $request->banner_existing->name;
        }


        $data->update($validated);

        Toast::title('Запись обновлена!')
            ->autoDismiss(7);

        return redirect()->route('data.index', $event);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
