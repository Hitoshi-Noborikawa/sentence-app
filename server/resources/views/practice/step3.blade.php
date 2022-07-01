<script src="{{ mix('js/calc.js') }}" defer></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Step3') }}
        </h2>
    </x-slot>

    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="max-w-screen-md px-4 md:px-8 mx-auto flex justify-center">
            <div class="w-full max-w-xs">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="text_ja">作成した日本語の文章</label>
                    <div class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="text_ja" cols="30" rows="10" placeholder="日本語で文章を作成しましょう！">{{ $sentence->text_ja }}</div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="answer_en">作成した英語の文章</label>
                    <div id="answer-en" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="text_ja" cols="30" rows="10" placeholder="日本語で文章を作成しましょう！">{{ $sentence_result->answer_en }}</div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="answer_en">添削した英語の文章</label>
                    <div id="correct-en" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="text_ja" cols="30" rows="10" placeholder="日本語で文章を作成しましょう！">{{ $sentence_result->correct_en }}</div>
                </div>
                <div class="flex items-center justify-between">
                    <button id="calc-score" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        scoreを計算する
                    </button>
                </div>
                <div id="score"></div>
                {{-- <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('practice.update.sentence', ['user_id' => $user->id]) }}" method="POST">
                    @csrf --}}
                    {{-- <div class="flex items-center justify-between">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            scoreを計算する
                        </button>
                    </div> --}}
                {{-- </form> --}}
            </div>

        </div>
    </div>

<script>
    const sentenceResultId = @json($sentence_result_id);
</script>

</x-app-layout>