<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Performance Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (count($sentence_results) > 0)
                <div class="py-3 px-5 bg-gray-50">タイトル：{{ $sentence->title }}</div>
                <div class="shadow-lg rounded-lg overflow-hidden">
                    <canvas class="p-10" id="allChart"></canvas>
                </div>
                @else
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>文章を作成していません</h1>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script src="{{ mix('js/show_chart.js') }}"></script>
    <script>
        id = 'allChart';
        makeChart(id, @json($sentence_results));
    </script>

</x-app-layout>