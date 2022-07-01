<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Performance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (count($sentences) !== 0)
                <div class="px-2">
                    <div class="flex -mx-2">
                        @foreach ($sentences as $sentence)
                        <div class="w-1/3 px-2">
                            <a href="{{ route('performance.detail', ['user_id' => $user->id, 'sentence_id' => $sentence->id]) }}">
                                <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                    <div class="px-6 py-4">
                                        <div class="font-bold text-xl mb-2">{{ $sentence->title }}</div>
                                        <p class="text-gray-700 text-base">{{ $sentence->text_ja }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>文章が作成されていません。</h1>
                </div>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>