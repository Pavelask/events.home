<x-splade-modal>
    <div class="col-span-6 sm:col-span-6">
        <h1 class="text-gray-500 font-bold text-lg">
            FAQ - Задайте новый "Вопрос и ответ"
        </h1>
    </div>
    <x-splade-form method="post" :action="route('faq.store')" preserve-scroll>
        <div class="bg-white px-1 pt-2 pb-2 sm:p-2 sm:pb-2">
            <div class="md:grid md:grid-cols-6 md:gap-6">

                <div class="col-span-6 sm:col-span-6">
                    <x-splade-input id="question" name="question" type="text" :label="__('Вопрос ')"
                                    autofocus
                                    autocomplete="question"/>
                </div>
                <div class="col-span-6 sm:col-span-6">
                    <x-splade-textarea name="answer" :label="__('Ответ')"
                                       autosize/>
                </div>
                <div class="col-span-3 sm:col-span-3">
                    <x-splade-input name="sort" type="text" placeholder="500" :label="__('Сортировка')"
                                    autocomplete="status"/>
                </div>
                <div class="col-span-6 sm:col-span-6">
                    <div class="flex items-center gap-4">
                        <x-splade-submit :label="__('Добавить')"/>
                    </div>
                </div>
            </div>
        </div>
    </x-splade-form>
</x-splade-modal>
