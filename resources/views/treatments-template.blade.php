{{--
  Template Name: Treatment Detail
--}}

@extends('layouts.app')

@section('content')
    <div class="relative">
        <section class="">
            <div class="mx-auto w-full max-w-400 overflow-hidden bg-white pt-5">

                <div class="grid gap-0 lg:grid-cols-2">
                    <div class="bg-white px-8 py-10 sm:px-10 flex flex-col items-center justify-end">
                        <div class="max-w-115">
                            <p class="text-[18px] tracking-[0.28em] text-[#C7B276] uppercase">
                                {{ $treatment['hero']['kicker'] }}
                            </p>

                            <h1
                                class="mt-3 uppercase font-serif text-[32px] md:text-[48px] tracking-widest text-[#705F40] sm:text-[40px]">
                                {{ $treatment['hero']['title'] }}
                            </h1>

                            <div class="mt-5 flex gap-10 md:gap-15">
                                <div class="w-0.5 bg-[#DED6C7]"></div>
                                <p class="max-w-100 text-[18px] leading-8 text-[#705F40]">
                                    {!! $treatment['hero']['text'] !!}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <div class="min-h-full">
                            <img src="{{ $treatment['hero']['image'] }}" alt="{{ $treatment['hero']['title'] }}"
                                class="object-cover w-full h-full" loading="lazy" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if (!empty($treatment['sections'] ?? []))
            <section class="px-4 pb-12 pt-10 sm:px-6 sm:pb-14">
                <div class="mx-auto max-w-7xl space-y-10">
                    @foreach ($treatment['sections'] as $s)
                        <div class="grid items-stretch md:grid-cols-2 gap-8 md:gap-24 p-8 sm:p-10">
                            <div class="">
                                <div class="h-full overflow-hidden bg-black/5  {{ $s['image_side'] }}">
                                    <img src="{{ $s['image'] }}" alt=""
                                        class="h-full max-h-218.25 w-full object-cover" loading="lazy">
                                </div>
                            </div>

                            <div class="flex flex-col">
                                <h2 class="font-serif text-[39px] tracking-[0.06em] text-black/60 sm:text-[22px]">
                                    {{ $s['heading'] ?? '' }}
                                </h2>

                                <div class="mt-10 h-px w-full bg-black/10"></div>

                                <div class="mt-10 text-[18px] leading-6 text-black/45">
                                    @if ($s['content_type'] === 'bullets')
                                        <ul class="space-y-6">
                                            @foreach ($s['bullets'] ?? [] as $b)
                                                <li class="">
                                                    <span class="font-medium text-black/55">{{ $b['title'] ?? '' }}</span>
                                                    <span>{{ $b['text'] ?? '' }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @elseif ($s['content_type'] === 'ordered')
                                        <ol class="space-y-7 pl-5">
                                            @foreach ($s['ordered'] ?? [] as $idx => $line)
                                                <li class="list-decimal">
                                                    {!! $line !!}
                                                </li>
                                            @endforeach
                                        </ol>
                                    @else
                                        <div
                                            class="prose prose-sm max-w-none prose-p:leading-6 prose-p:text-black/45 prose-li:text-black/45 prose-strong:text-black/55">
                                            {!! $s['wysiwyg'] !!}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif
        @php
            $infoColumns = array_filter(
                $treatments['info_3col'] ?? [],
                fn($col) => !empty(trim((string) ($col['title'] ?? ''))) || !empty(trim((string) ($col['text'] ?? ''))),
            );
        @endphp
        @if (!empty($infoColumns))
            <section class="px-4 pb-12 sm:px-6 sm:pb-14">
                <div class="mx-auto max-w-400 overflow-hidden bg-[#efeae2] flex justify-center">
                    <div class="flex gap-10 px-8 py-10 sm:px-10 sm:py-12 max-w-7xl">
                        @foreach ($infoColumns as $col)
                            <div class="flex flex-col flex-1">
                                <h3 class="font-serif text-[39px] tracking-[0.06em] text-black/60 leading-[1.15] min-h-22">
                                    {{ $col['title'] ?? '' }}
                                </h3>
                                <div>
                                    <div class="mt-4 h-px w-full bg-white"></div>

                                    <div class="mt-6 whitespace-pre-line text-[18px] leading-6 text-black/45">
                                        {!! $col['text'] ?? '' !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <section class="px-4 pb-16 sm:px-6 sm:pb-20 mt-5">
            <div class="mx-auto max-w-7xl space-y-20">
                @foreach ($treatments['pricing_blocks']['blocks'] as $block)
                    @php
                        $cols = $block['columns'] ?? ['single' => 'SINGLE'];
                        $rows = $block['rows'] ?? [];
                        $colKeys = array_keys($cols);
                        $colCount = count($colKeys);

                        $colW = '9rem';
                        $rowH = '2.2rem';
                    @endphp
                    <div class="-mx-4 overflow-x-auto px-4">
                        <div class="min-w-225">
                            <div class="grid items-start gap-10"
                                style="grid-template-columns: minmax(0,1fr) repeat({{ $colCount }}, {{ $colW }});">
                                <h2 class="w-full font-serif text-[44px] tracking-[0.04em] text-black/60">
                                    {{ $block['title'] ?? '' }}
                                </h2>

                                @foreach ($cols as $label)
                                    <div
                                        class="bg-[#f2efe9] pb-10 pt-8 text-center text-[16px] tracking-[0.08em] text-black/55">
                                        {{ $label }}
                                    </div>
                                @endforeach
                            </div>

                            <div class="h-px w-full bg-black/10"></div>

                            <div class="grid gap-10"
                                style="grid-template-columns: minmax(0,1fr) repeat({{ $colCount }}, {{ $colW }});">

                                <div class="space-y-2 pt-6 text-[18px] text-black/45">
                                    @foreach ($block['rows'] as $r)
                                        <div style="min-height: 50px; line-height: 50px;">
                                            {{ $r['label'] ?? '' }}
                                        </div>
                                    @endforeach
                                </div>

                                @foreach ($colKeys as $k)
                                    <div class="bg-[#f2efe9] px-6 py-6">
                                        <div class="space-y-2 text-center text-[18px] text-black/55">
                                            @foreach ($block['rows'] as $r)
                                                <div style="min-height: 50px; line-height: 50px;">
                                                    {{ $r[$k] ?? '' }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
