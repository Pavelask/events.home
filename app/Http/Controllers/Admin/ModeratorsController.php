<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModeratorsRequest;
use App\Models\Admin\EventsModel;
use App\Models\Admin\ModeratorsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\FileUploads\ExistingFile;
use ProtoneMedia\Splade\FileUploads\HandleSpladeFileUploads;
use ProtoneMedia\Splade\SpladeTable;

class ModeratorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($event)
    {
        $Event = EventsModel::find($event);

        if (!$Event) {
            return redirect('404');
        }

        return view('admin.moderators.index', [
            'Event' => $Event->id,
            'Moderators' => SpladeTable::for(ModeratorsModel::class)
                ->column('id', label: 'ID', sortable: true)
                ->column('name', label: 'Имя', sortable: true)
                ->column('image', label: 'Фото')
                ->column('sort', label: 'SORT', sortable: true)
                ->column('active', label: 'Статус')
                ->column('edit', label: 'Редактировать')
                ->column('delete', label: 'Удалить')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($event)
    {
        $Event = EventsModel::find($event);
        if (!$Event) {
            return redirect('404');
        }
        return view('admin.moderators.add', ['Event' => $event]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ModeratorsRequest $request, EventsModel $event)
    {
        $defaultValueSort = 500;

        $validated = $request->validated();
        $validated['sort'] = $validated['sort'] ?? $defaultValueSort;
        $validated['image'] = '';

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->hashName();

            Storage::put("public/moderators/", $image);
            $validated['image'] = $name;
        }

        // dd($validated, $request);
        $event->moderators()->create($validated);

        Toast::title('Запись добавлена!')
            ->autoDismiss(7);

        return redirect()->route('moderator.index', ['event' => $event->id]);
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
    public function edit(EventsModel $event, string $moderator)
    {
        $Moderator = $event->moderators()->find($moderator);
        $image = '';
        $path = 'moderators/';

        if ($Moderator->image) {

            $existsImage = Storage::disk('public')->exists($path . $Moderator->image);
            if ($existsImage) {
                $image = ExistingFile::fromDisk('public')->get($path . $Moderator->image);
            }
            $Moderator->image = $image;
        }

        return view('admin.moderators.edit', [
            'Moderator' => $Moderator,
            'Event' => $event->id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ModeratorsRequest $request, EventsModel $event, string $moderator)
    {

        HandleSpladeFileUploads::forRequest($request);
        $data = $event->moderators()->find($moderator);
        $validated = $request->validated();

        // dd($request);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->hashName();

            // dd('File in DB is - '.$data->image);
            if ($data->image) {
                $image_path = public_path() . '/storage/moderators/' . $data->image;

                if (Storage::exists($image_path)) {
                    unlink($image_path);
                }
            }

            Storage::put('public/moderators/', $image);
            $validated['image'] = $name;
            // dd('Alabama!', $data->image, $image);
        }

        if ($request->image_existing) {
            $validated['image'] = $request->image_existing->name;
            // dd('Alabama! Alabama! Alabama ...', $request->image_existing->name, $request);
        }

        if (!$request->image_existing && !$request->hasFile('image')) {

            if ($data->image) {
                $image_path = public_path() . '/storage/moderators/' . $data->image;
                unlink($image_path);
            }
            $validated['image'] = '';
        }

        $data->update($validated);

        Toast::title('Запись обновлена!')
            ->autoDismiss(7);

        return redirect()->route('moderator.index', $event);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventsModel $event, string $moderator)
    {
        $data = $event->moderators()->find($moderator);

        if ($data->image) {
            $image_path = public_path() . '/storage/moderators/' . $data->image;

            if(Storage::exists($image_path)){
                unlink($image_path);
            }
        }

        $data->delete();

        Toast::title('Запись удалена!')
            ->danger()
            ->leftTop()
            ->autoDismiss(7);

        return redirect()->route('moderator.index', $event);

    }
}
