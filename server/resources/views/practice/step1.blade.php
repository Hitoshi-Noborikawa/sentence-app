<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Step1') }}
        </h2>
    </x-slot>

    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="max-w-screen-md px-4 md:px-8 mx-auto flex justify-center">
            {{-- <h1>step1</h1>
            <p>{{ $user->name }}</p> --}}

            <div class="w-full max-w-xs">
                <h1>Step1</h1>
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('practice.create.sentence', ['user_id' => $user->id]) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">タイトル</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="title" type="text" placeholder="title">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="text_ja">日本語で文章を作成しましょう！</label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="text_ja" cols="30" rows="10" placeholder="日本語で文章を作成しましょう！"></textarea>
                    </div>
                    <div class="flex items-center justify-between">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            記録する
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</x-app-layout>