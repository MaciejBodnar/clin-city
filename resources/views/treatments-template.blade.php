{{--
  Template Name: Treatment Detail
--}}

@extends('layouts.app')

@section('content')
    @php
        /**
         * Reusable structure:
         * - Hero (split: text + image)
         * - Repeated split sections (image/text)
         * - 3-column info block (How it works / Safety / Difference)
         * - Pricing blocks (table-ish with price columns)
         *
         * If ACF exists, it uses fields. If not, it falls back to demo arrays.
         */

        // ---------- ACF fields (recommended) ----------
        $hero = function_exists('get_field') ? get_field('hero') : null;
        $sections = function_exists('get_field') ? get_field('sections') : null;
        $info_3col = function_exists('get_field') ? get_field('info_3col') : null;
        $pricing_blocks = function_exists('get_field') ? get_field('pricing_blocks') : null;

        // ---------- Fallback demo data ----------
        if (!$hero) {
            $hero = [
                'kicker' => 'TREATMENTS',
                'title' => "MESOTHERAPY\nAND\nPOLYNUCLEOTIDE\nINJECTIONS",
                'text' =>
                    "Mesotherapy is a minimally invasive cosmetic procedure used in aesthetic practice to rejuvenate and tighten the skin...\n\nPolynucleotides, derived from salmon DNA, rejuvenate skin, repair depressed scars, minimize pores...",
                'image' => 'images/treatments/mesotherapy/hero.jpg',
            ];
        }

        if (!$sections) {
            $sections = [
                [
                    'layout' => 'split',
                    'heading' => 'Mesotherapy Benefits',
                    'image' => 'images/treatments/mesotherapy/benefit-1.jpg',
                    'image_side' => 'left', // left|right
                    'content_type' => 'bullets', // bullets|ordered|wysiwyg
                    'bullets' => [
                        [
                            'title' => 'Skin Rejuvenation',
                            'text' => 'Helps improve skin texture, reduce fine lines, and enhance overall appearance.',
                        ],
                        [
                            'title' => 'Cellulite Reduction',
                            'text' =>
                                'May assist in breaking down fat deposits and improving the look of dimpled skin.',
                        ],
                        [
                            'title' => 'Hair Restoration',
                            'text' => 'Can support hair growth by delivering nutrients to the scalp.',
                        ],
                        [
                            'title' => 'Hydration and Radiance',
                            'text' => 'Hydrates skin from within, improving plumpness and glow.',
                        ],
                    ],
                ],
                [
                    'layout' => 'split',
                    'heading' => 'Polynucleotide Benefits',
                    'image' => 'images/treatments/mesotherapy/benefit-2.jpg',
                    'image_side' => 'right',
                    'content_type' => 'ordered',
                    'ordered' => [
                        'Skin Rejuvenation: supports renewal and healthier turnover.',
                        'Anti-Aging Effects: promotes collagen and elastin support.',
                        'Improved Hydration: enhances moisture retention.',
                        'Scar and Stretch Mark Treatment: supports repair and regeneration.',
                        'Hair Restoration: may improve scalp conditions and growth.',
                        'Improved Skin Tone and Elasticity: supports radiance and texture.',
                    ],
                ],
            ];
        }

        if (!$info_3col) {
            $info_3col = [
                'columns' => [
                    [
                        'title' => 'How it works:',
                        'text' =>
                            'Mesotherapy involves micro-injections at the treatment site...\n\nPolynucleotides promote cellular regeneration...',
                    ],
                    [
                        'title' => 'Safety and side effects:',
                        'text' =>
                            'At our clinic, your safety is our top priority...\n\nYou may notice temporary side effects such as bruising...',
                    ],
                    [
                        'title' => 'The Clincity Difference',
                        'text' =>
                            'Your well-being is at the heart of our practice...\n\nWe use only safe, reliable, and regulated products...',
                    ],
                ],
            ];
        }

        if (!$pricing_blocks) {
            $pricing_blocks = [
                [
                    'title' => 'Mesotherapy/PRP',
                    'rows' => [
                        ['label' => 'Teoxane', 'single' => '£450', 'course_3' => '£1215', 'course_5' => '£1800'],
                        ['label' => 'Fillmed', 'single' => '£350', 'course_3' => '£945', 'course_5' => '£1400'],
                        [
                            'label' => 'Teoxane and Skin Pen Microneedling',
                            'single' => '£600',
                            'course_3' => '',
                            'course_5' => '',
                        ],
                        [
                            'label' => 'Fillmed and Skin Pen Microneedling',
                            'single' => '£500',
                            'course_3' => '',
                            'course_5' => '',
                        ],
                    ],
                    'columns' => ['single' => 'SINGLE', 'course_3' => 'COURSE OF 3', 'course_5' => 'COURSE OF 5'],
                ],
                [
                    'title' => 'Polynucleotides',
                    'rows' => [
                        ['label' => 'Plinest (eyes)', 'single' => '£320', 'course_3' => '£864'],
                        ['label' => 'Plinest (face)', 'single' => '£350', 'course_3' => '£945'],
                        ['label' => 'REJURAN I (eyes) 1ml', 'single' => '£380', 'course_3' => ''],
                        ['label' => 'REJURAN I (eyes) 2ml', 'single' => '£580', 'course_3' => ''],
                        ['label' => 'REJURAN S (face) 1ml', 'single' => '£320', 'course_3' => ''],
                        ['label' => 'REJURAN S (face) 2ml', 'single' => '£560', 'course_3' => ''],
                        ['label' => 'REJURAN Healer PN 2ml', 'single' => '£620', 'course_3' => ''],
                    ],
                    'columns' => ['single' => 'SINGLE', 'course_3' => 'COURSE OF 3'],
                ],
            ];
        }

        // helpers
        $splitClasses = function ($image_side) {
            // same layout, only swap columns on lg+
            return $image_side === 'right'
                ? 'lg:grid-cols-2 lg:[&>div:first-child]:order-2 lg:[&>div:last-child]:order-1'
                : 'lg:grid-cols-2';
        };
    @endphp

    <div class="relative">
        {{-- ========= HERO (split text + image) ========= --}}
        <section class="px-4 sm:px-6 ">
            <div class="mx-auto w-full max-w-6xl overflow-hidden bg-white">
                {{-- HERO split --}}
                <div class="grid items-stretch gap-0 lg:grid-cols-2">
                    <div class="bg-white px-8 py-10 sm:px-10">
                        @if (!empty($hero['kicker']))
                            <p class="text-[10px] tracking-[0.28em] text-[#bda66a]">
                                {{ $hero['kicker'] }}
                            </p>
                        @endif

                        <h1 class="mt-3 font-serif text-[34px] tracking-widest text-black/70 sm:text-[42px]">
                            {!! nl2br(e($hero['title'] ?? '')) !!}
                        </h1>

                        <div class="mt-6 flex gap-6">
                            <div class="w-px bg-black/10"></div>
                            <div class="max-w-[46ch] whitespace-pre-line text-[12px] leading-6 text-black/45">
                                {{ $hero['text'] ?? '' }}
                            </div>
                        </div>
                    </div>

                    {{-- Key idea for “images respond to amount of text”:
               The grid uses items-stretch, and the image wrapper uses h-full so it grows with the text column height.
               On mobile, we use a safe aspect ratio so it doesn't become too tall. --}}
                    <div class="bg-white">
                        <div class="h-full min-h-65 sm:min-h-80 lg:min-h-0">
                            <div class="h-full overflow-hidden">
                                @php
                                    $heroImg = $hero['image'] ?? null;
                                    // If ACF returns array for image, handle it.
                                    if (is_array($heroImg)) {
                                        $heroImg = $heroImg['url'] ?? null;
                                    }
                                @endphp

                                {{-- <img src="{{ $heroImg ? (str_starts_with($heroImg, 'http') ? $heroImg : \Roots\asset($heroImg)->uri()) : '' }}"
                                    alt="" class="h-full w-full object-cover" loading="lazy" /> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ========= SPLIT SECTIONS (repeatable) ========= --}}
        <section class="px-4 pb-12 pt-10 sm:px-6 sm:pb-14">
            <div class="mx-auto max-w-6xl space-y-10">
                @foreach ($sections as $s)
                    @php
                        $layout = $s['layout'] ?? 'split';
                        if ($layout !== 'split') {
                            continue;
                        }

                        $imageSide = $s['image_side'] ?? 'left';
                        $contentType = $s['content_type'] ?? 'wysiwyg';

                        $img = $s['image'] ?? null;
                        if (is_array($img)) {
                            $img = $img['url'] ?? null;
                        }
                        $imgSrc = $img ? (str_starts_with($img, 'http') ? $img : \Roots\asset($img)->uri()) : '';
                    @endphp

                    <div
                        class="grid items-stretch gap-8 bg-white p-8 shadow-[0_10px_30px_rgba(0,0,0,0.06)] sm:p-10 {{ $splitClasses($imageSide) }}">
                        {{-- Image --}}
                        <div class="h-full">
                            <div class="h-full min-h-55 overflow-hidden bg-black/5 sm:min-h-65">
                                {{-- <img src="{{ $imgSrc }}" alt="" class="h-full w-full object-cover"
                                    loading="lazy"> --}}
                            </div>
                        </div>

                        {{-- Content --}}
                        <div class="flex flex-col">
                            <h2 class="font-serif text-[20px] tracking-[0.06em] text-black/60 sm:text-[22px]">
                                {{ $s['heading'] ?? '' }}
                            </h2>

                            <div class="mt-4 h-px w-full bg-black/10"></div>

                            <div class="mt-6 text-[11px] leading-6 text-black/45">
                                @if ($contentType === 'bullets')
                                    <ul class="space-y-4">
                                        @foreach ($s['bullets'] ?? [] as $b)
                                            <li>
                                                <span class="font-medium text-black/55">{{ $b['title'] ?? '' }}:</span>
                                                <span>{{ $b['text'] ?? '' }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                @elseif ($contentType === 'ordered')
                                    <ol class="space-y-3 pl-5">
                                        @foreach ($s['ordered'] ?? [] as $idx => $line)
                                            <li class="list-decimal">
                                                {{ $line }}
                                            </li>
                                        @endforeach
                                    </ol>
                                @else
                                    {{-- WYSIWYG (ACF) --}}
                                    <div
                                        class="prose prose-sm max-w-none prose-p:leading-6 prose-p:text-black/45 prose-li:text-black/45 prose-strong:text-black/55">
                                        {!! $s['wysiwyg'] ?? '' !!}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- ========= 3 COLUMN INFO BLOCK ========= --}}
        <section class="px-4 pb-12 sm:px-6 sm:pb-14">
            <div class="mx-auto max-w-6xl overflow-hidden bg-[#efeae2] shadow-[0_10px_30px_rgba(0,0,0,0.06)]">
                <div class="grid gap-10 px-8 py-10 sm:px-10 sm:py-12 lg:grid-cols-3">
                    @foreach ($info_3col['columns'] ?? [] as $col)
                        <div>
                            <h3 class="font-serif text-[18px] tracking-[0.06em] text-black/60">
                                {{ $col['title'] ?? '' }}
                            </h3>
                            <div class="mt-4 h-px w-full bg-black/10"></div>

                            <div class="mt-6 whitespace-pre-line text-[11px] leading-6 text-black/45">
                                {{ $col['text'] ?? '' }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ========= PRICING (repeatable blocks) ========= --}}
        <section class="px-4 pb-16 sm:px-6 sm:pb-20">
            <div class="mx-auto max-w-6xl space-y-12">
                @foreach ($pricing_blocks as $block)
                    @php
                        $cols = $block['columns'] ?? ['single' => 'SINGLE'];
                        $rows = $block['rows'] ?? [];
                    @endphp

                    <div class="bg-white p-8 shadow-[0_10px_30px_rgba(0,0,0,0.06)] sm:p-10">
                        <h2 class="font-serif text-[22px] tracking-[0.06em] text-black/60 sm:text-[26px]">
                            {{ $block['title'] ?? '' }}
                        </h2>

                        <div class="mt-5 h-px w-full bg-black/10"></div>

                        <div class="mt-8 grid gap-8 lg:grid-cols-[1fr_auto]">
                            {{-- Left: treatment names --}}
                            <div class="space-y-3 text-[11px] text-black/45">
                                @foreach ($rows as $r)
                                    <div class="min-h-4.5">
                                        {{ $r['label'] ?? '' }}
                                    </div>
                                @endforeach
                            </div>

                            {{-- Right: price columns (like screenshot boxes) --}}
                            <div class="flex flex-wrap gap-6">
                                @foreach ($cols as $key => $label)
                                    <div class="w-35 bg-[#faf8f4] px-4 py-4">
                                        <div class="text-center text-[9px] tracking-[0.22em] text-black/45">
                                            {{ $label }}
                                        </div>
                                        <div class="mt-6 space-y-3 text-center text-[11px] text-black/55">
                                            @foreach ($rows as $r)
                                                <div class="min-h-4.5">
                                                    {{ $r[$key] ?? '' }}
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
