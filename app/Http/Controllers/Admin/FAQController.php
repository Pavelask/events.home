<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FAQRequest;
use App\Models\Admin\FaqModel;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.faq.index', [
            'FAQ' => SpladeTable::for(FaqModel::class)
//                ->withGlobalSearch(columns: ['name'])
                ->column('id', label: 'ID')
                ->column('question', label: 'Вопрос')
//                ->column('answer', label: 'Ответ')
                ->column('sort', label: 'Сортировка')
                ->column('edit', label: 'Редактировать')
                ->column('delete', label: 'Удалить')
//                ->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faq.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FAQRequest $faq)
    {
        $defaultValue = 500;
        $validated = $faq->validated();
        $validated['sort'] = $validated['sort'] ?? $defaultValue;

        FaqModel::create($validated);

        Toast::title('Запись добавлена!')
            ->autoDismiss(7);

        return redirect()->route('faq.index');
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
    public function edit(string $faq)
    {
        $FAQ = FaqModel::find($faq);
        return view('admin.faq.edit', [
            'faq' => $FAQ
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FAQRequest $request, FaqModel $faq)
    {
        $faq->update($request->all());
        Toast::title('Запись обновлена!')->autoDismiss(7);
        return redirect()->route('faq.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FaqModel $faq)
    {
        $faq->delete();
        Toast::title('Запись удалена!')->danger()->autoDismiss(7);
        return redirect()->route('faq.index');
    }
}
