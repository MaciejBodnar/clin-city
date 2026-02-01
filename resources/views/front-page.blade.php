{{--
  Template Name: Front Page
--}}

@extends('layouts.app')

@section('header')
@endsection

@section('content')
    @php
        $heroImage = 'images/home-hero.jpg';
        $aboutImage = 'images/home/about.jpg';

        $reviews = [
            [
                'name' => 'GABRIEL ALIN SEICA',
                'text' =>
                    'Great experience with the skin analysis although did not have any major breakthroughs about my skin. The followup treatment was fab and left my skin super smooth and clean so definitely recommend it. The staff is also really friendly.',
                'stars' => 5,
            ],
            [
                'name' => 'SASHA ALLAIN',
                'text' =>
                    'I had a Sunday appointment with Egle, who was very professional informative and honest about the condition of my skin. She gave good advice and recommended care options, but did not try to oversell any unnecessary product or treatment. Nice clinic experience with the spa like feel.',
                'stars' => 5,
            ],
            [
                'name' => 'ROSABEL PARK',
                'text' =>
                    'My therapist Egle was very professional. She was very helpful in analysing my skin and patiently explained my current skin condition. I enjoyed my treatment with good result!',
                'stars' => 5,
            ],
        ];

        $brandLogos = [
            ['alt' => 'Clear + Brilliant', 'src' => 'images/brands/clear-brilliant.png'],
            ['alt' => 'PCA Skin', 'src' => 'images/brands/pca-skin.png'],
            ['alt' => 'Thermage', 'src' => 'images/brands/thermage.png'],
            ['alt' => 'SkinCeuticals', 'src' => 'images/brands/skinceuticals.png'],
            ['alt' => 'SkinPen', 'src' => 'images/brands/skinpen.png'],
            ['alt' => 'Profhilo', 'src' => 'images/brands/profhilo.png'],
        ];

        $treatments = [
            [
                'title' => 'ULTHERAPY PRIME',
                'image' => 'images/treatments/ultherapy.jpg',
                'text' =>
                    'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.',
                'url' => '/treatments/ultherapy-prime',
            ],
            [
                'title' => 'THERMAGE FLX',
                'image' => 'images/treatments/thermage.jpg',
                'text' =>
                    'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.',
                'url' => '/treatments/thermage-flx',
            ],
            [
                'title' => 'BBL LASER',
                'image' => 'images/treatments/bbl.jpg',
                'text' =>
                    'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.',
                'url' => '/treatments/bbl-laser',
            ],
            [
                'title' => 'ANTI WRINKLE INJECTIONS',
                'image' => 'images/treatments/anti-wrinkle.jpg',
                'text' =>
                    'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.',
                'url' => '/treatments/anti-wrinkle-injections',
            ],
            [
                'title' => 'SKINPEN MICRONEEDLING',
                'image' => 'images/treatments/skinpen.jpg',
                'text' =>
                    'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.',
                'url' => '/treatments/skinpen-microneedling',
            ],
            [
                'title' => 'SKIN BOOSTER',
                'image' => 'images/treatments/skin-booster.jpg',
                'text' =>
                    'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.',
                'url' => '/treatments/skin-booster',
            ],
            [
                'title' => 'CLEAR & BRILLIANT LASER',
                'image' => 'images/treatments/clear-brilliant.jpg',
                'text' =>
                    'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.',
                'url' => '/treatments/clear-brilliant',
            ],
            [
                'title' => 'CHEMICAL PEELS',
                'image' => 'images/treatments/chemical-peels.jpg',
                'text' =>
                    'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.',
                'url' => '/treatments/chemical-peels',
            ],
            [
                'title' => 'HYDRO2 FACIAL',
                'image' => 'images/treatments/hydro2.jpg',
                'text' =>
                    'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.',
                'url' => '/treatments/hydro2-facial',
            ],
        ];

        $nav = [
            ['label' => 'HOME', 'url' => '/home/'],
            ['label' => 'TREATMENTS', 'url' => '#treatments'],
            ['label' => 'TEAM', 'url' => '/team/'],
            ['label' => 'COLLABORATE', 'url' => '/collaborate/'],
            ['label' => 'GALLERY', 'url' => '/gallery/'],
            ['label' => 'CONTACT', 'url' => '/contact/'],
        ];
        $locations = get_nav_menu_locations();
        $menuId = $locations['primary_navigation'] ?? null;
        $menuItems = $menuId ? wp_get_nav_menu_items($menuId) : [];

        if (empty($menuItems)) {
            $mk = function ($id, $title, $url, $parent = 0, $desc = '') {
                return (object) [
                    'ID' => $id,
                    'title' => $title,
                    'url' => $url,
                    'menu_item_parent' => $parent,
                    'description' => $desc,
                    'current' => false,
                    'current_item_parent' => false,
                    'current_item_ancestor' => false,
                ];
            };
            $menuItems = [
                $mk(1, 'HOME', '/home/'),
                $mk(10, 'TREATMENTS', '/treatments/'),

                $mk(11, 'FACE', '#', 10),
                $mk(111, 'Hydro2 Facial', '/treatments/hydro2-facial/', 11),
                $mk(112, 'Skin Booster', '/treatments/skin-booster/', 11),
                $mk(113, 'Mesotherapy + Polynucleotides', '/treatments/mesotherapy-polynucleotides/', 11),
                $mk(114, 'Chemical Peels', '/treatments/chemical-peels/', 11),
                $mk(115, 'Anti-wrinkle injection', '/treatments/anti-wrinkle/', 11),
                $mk(116, 'Dermal filler', '/treatments/dermal-filler/', 11),
                $mk(117, 'Dermalux Led', '/treatments/dermalux-led/', 11),
                $mk(118, 'Visia Skin Analysis', '/treatments/visia-skin-analysis/', 11),

                $mk(12, 'FACE AND BODY', '#', 10),
                $mk(121, 'Ultherapy Prime', '/treatments/ultherapy-prime/', 12),
                $mk(122, 'Thermage FLX', '/treatments/thermage-flx/', 12),
                $mk(123, 'BBL Laser', '/treatments/bbl-laser/', 12),
                $mk(124, 'Halo laser', '/treatments/halo-laser/', 12),
                $mk(125, 'Clear + Brilliant Laser', '/treatments/clear-brilliant/', 12),
                $mk(126, 'SkinPen Microneedling + exosomes', '/treatments/skinpen-exosomes/', 12),
                $mk(127, 'PRP', '/treatments/prp/', 12),
                $mk(128, 'HIFU', '/treatments/hifu/', 12),

                $mk(13, 'BODY', '#', 10),
                $mk(131, 'Lipolysis injection', '/treatments/lipolysis-injection/', 13),
                $mk(132, 'BBL Hair Reduction', '/treatments/bbl-hair-reduction/', 13),
                $mk(133, '3D Lipo', '/treatments/3d-lipo/', 13),
                $mk(134, 'IV Drip Therapy', '/treatments/iv-drip-therapy/', 13),

                $mk(2, 'TEAM', '/team/'),

                $mk(20, 'COLLABORATE', '/collaborate/'),
                $mk(
                    21,
                    'BASIC ROOM',
                    '/basic-room/',
                    20,
                    'Our Basic Room offers a functional and comfortable setting.',
                ),
                $mk(22, 'ESSENTIAL ROOM', '/essential-room/', 20, 'The Essential Room provides all the core elements.'),
                $mk(23, 'PRIMARY ROOM', '/primary-room/', 20, 'Our Primary Room offers a fully equipped environment.'),
                $mk(24, 'BOOK THE ROOM', '/book-the-room/', 20, 'Fill out the form to book your room.'),

                $mk(3, 'GALLERY', '/gallery/'),
                $mk(4, 'CONTACT', '/contact/'),
            ];
        }

        $children = [];
        $itemsById = [];

        foreach ($menuItems as $it) {
            $itemsById[$it->ID] = $it;
            $parent = (int) $it->menu_item_parent;
            if (!isset($children[$parent])) {
                $children[$parent] = [];
            }
            $children[$parent][] = $it;
        }

        $top = $children[0] ?? [];
        $hasChildren = fn($id) => !empty($children[(int) $id]);

        $keyFromTitle = function ($title) {
            $k = strtolower(trim($title));
            $k = preg_replace('/\s+/', '-', $k);
            $k = preg_replace('/[^a-z0-9\-]/', '', $k);
            return $k;
        };

        $ctaUrl = '/book/';
    @endphp

    <div>
        <header class="relative">
            <div class="flex flex-wrap max-w-7xl mx-auto items-center justify-between gap-3 px-4 py-5 text-black/60 sm:px-6">
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center gap-6">
                        <a>
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a>
                            <i class="fa-brands fa-tiktok"></i>
                        </a>
                        <a>
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </span>
                </div>

                <div class="flex items-center gap-2">

                    <span class="opacity-70">Whatsapp us</span>
                    <a class="hover:text-black/80 pl-2" href="tel:+442073239534">
                        <i class="fa-brands fa-whatsapp"></i>
                        <span class="ml-2">
                            020 7323 9534</span></a>
                    <a class="px-8">
                        <i class="fab fa-weixin"></i></a>
                    <span class="opacity-70">Opening hours</span>
                    <i class="fa-regular fa-clock"></i>
                    <span>Mon-Sat, 10:00am-6:30pm</span>
                </div>
            </div>
            <div class="mx-auto max-w-400 bg-white flex flex-col items-center relative">
                <a href="{{ home_url('/') }}">
                    <img src="{{ get_template_directory_uri() }}/resources/images/front-page-hero.png" alt="CLINICITY"
                        class="" />

                </a>

                <div class="w-full max-w-6xl">
                    <div class="relative flex items-center justify-between gap-6 px-4 py-4 w-full sm:px-6">
                        <nav class="relative">
                            <ul class="flex flex-wrap items-center gap-x-8 gap-y-2 uppercase text-black/55">
                                @foreach ($top as $item)
                                    @php
                                        $id = (int) $item->ID;
                                        $title = $item->title;
                                        $url = $item->url;
                                        $k = $keyFromTitle($title);
                                        $openable = $hasChildren($id);

                                        $isCurrent =
                                            !empty($item->current) ||
                                            !empty($item->current_item_ancestor) ||
                                            !empty($item->current_item_parent);
                                    @endphp

                                    <li class="group static">
                                        <a href="{{ $url }}"
                                            class="relative inline-flex items-center py-2 transition hover:text-black/75 {{ $isCurrent ? 'text-black/75' : '' }}">
                                            {{ $title }}

                                            @if ($openable)
                                                <span
                                                    class="pointer-events-none absolute -bottom-4.5 left-1/2 hidden h-0 w-0 -translate-x-1/2
                     border-l-8 border-r-8 border-t-8
                     border-l-transparent border-r-transparent border-t-[#d7cfbf]
                     group-hover:block group-focus-within:block {{ $isCurrent ? 'block' : '' }}"></span>
                                            @endif
                                        </a>

                                        @if ($openable)
                                            <div
                                                class="pointer-events-none absolute inset-x-0 top-full z-50 mt-5
                   opacity-0 transition duration-200
                   group-hover:pointer-events-auto group-hover:opacity-100
                   group-focus-within:pointer-events-auto group-focus-within:opacity-100">
                                                <div class="mx-auto max-w-6xl px-4 sm:px-6">
                                                    <div
                                                        class="border border-black/10 bg-[#d7cfbf] px-10 py-10 shadow-[0_20px_50px_rgba(0,0,0,0.12)]">

                                                        @if ($k === 'treatments')
                                                            @php $cols = $children[$id] ?? []; @endphp

                                                            <div class="grid gap-12 lg:grid-cols-3">
                                                                @foreach ($cols as $col)
                                                                    @php
                                                                        $colId = (int) $col->ID;
                                                                        $links = $children[$colId] ?? [];
                                                                    @endphp

                                                                    <div>
                                                                        <p
                                                                            class="text-[13px] font-medium tracking-[0.12em] text-black/55">
                                                                            {{ $col->title }}
                                                                        </p>

                                                                        <ul
                                                                            class="mt-5 space-y-3 text-[14px] tracking-[0.02em] text-black/50">
                                                                            @foreach ($links as $lnk)
                                                                                <li class="flex items-start gap-3">
                                                                                    <span
                                                                                        class="mt-2 inline-block h-1 w-1 rounded-full bg-black/35"></span>
                                                                                    <a href="{{ $lnk->url }}"
                                                                                        class="hover:text-black/70 transition">
                                                                                        {{ $lnk->title }}
                                                                                    </a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @elseif ($k === 'collaborate')
                                                            @php $blocks = $children[$id] ?? []; @endphp

                                                            <div>
                                                                <h3
                                                                    class="font-serif text-[42px] tracking-[0.08em] text-black/55">
                                                                    COLLABORATE
                                                                </h3>

                                                                <div class="mt-8 grid gap-10 lg:grid-cols-4">
                                                                    @foreach ($blocks as $b)
                                                                        <a href="{{ $b->url }}" class="block">
                                                                            <p
                                                                                class="text-[13px] font-semibold tracking-widest text-black/55">
                                                                                {{ $b->title }}
                                                                            </p>
                                                                            <p
                                                                                class="mt-3 max-w-[22ch] text-[14px] leading-7 text-black/45">
                                                                                {{ $b->description }}
                                                                            </p>
                                                                        </a>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        @else
                                                            @php $subs = $children[$id] ?? []; @endphp

                                                            <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3">
                                                                @foreach ($subs as $sub)
                                                                    <div>
                                                                        <a href="{{ $sub->url }}"
                                                                            class="text-[13px] font-medium tracking-[0.12em] text-black/55 hover:text-black/70">
                                                                            {{ $sub->title }}
                                                                        </a>

                                                                        @php $subChildren = $children[(int)$sub->ID] ?? []; @endphp
                                                                        @if (!empty($subChildren))
                                                                            <ul
                                                                                class="mt-4 space-y-2 text-[14px] text-black/45">
                                                                                @foreach ($subChildren as $sc)
                                                                                    <li>
                                                                                        <a href="{{ $sc->url }}"
                                                                                            class="hover:text-black/70 transition">
                                                                                            {{ $sc->title }}
                                                                                        </a>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        @endif
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </nav>


                        <a href="{{ $ctaUrl }}"
                            class="shrink-0 rounded-full bg-[#c9b06f] hover:bg-[#c9b06f]/70 px-10 py-3 text-white">
                            BOOK YOUR CONSULTATION
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <section class="px-4 sm:px-6 bg-transparent">
            <div class="mx-auto w-full max-w-400 overflow-hidden">
                <section id="treatments" class="px-4 pb-16 pt-10 sm:px-6 sm:pb-20 sm:pt-12">
                    <div class="mx-auto max-w-400">
                        <h2 class="text-center font-serif text-[#705F40] sm:text-[55px]">
                            TREATMENTS
                        </h2>

                        <div class="mt-10 grid gap-8 sm:mt-13 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach ($treatments as $card)
                                <article class="">
                                    <div class="aspect-video overflow-hidden bg-black/5">
                                        {{-- <img src="@asset($card['image'])" alt="{{ $card['title'] }}" class="h-full w-full object-cover"
                                    loading="lazy" /> --}}
                                    </div>

                                    <div class="bg-[#DED6C7] px-4 py-5 text-center">
                                        <h3 class="text-[18px] font-medium  text-[#705F40]">
                                            {{ $card['title'] }}
                                        </h3>
                                    </div>

                                    <div class="px-6 pb-6 pt-8 text-center">
                                        <p class="mx-auto font-light max-w-[36ch] text-[18px] leading-5 text-black/45">
                                            {{ $card['text'] }}
                                        </p>

                                        <a href="{{ $card['url'] }}"
                                            class="mt-8 inline-flex items-center justify-center rounded-full border border-[#c9b06f] px-6 py-2 min-w-59 text-[#705F40] hover:bg-[#c9b06f]/10 transition">
                                            READ MORE
                                        </a>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </section>
                <section class="px-4 sm:px-6 items-center flex justify-center">

                    <div class="grid gap-0 lg:grid-cols-2 max-w-7xl">
                        <div class="px-8 py-10 sm:px-10 flex flex-col items-center justify-center">
                            <div>
                                <p class="text-[18px] tracking-[0.28em] text-[#C7B276] uppercase">
                                    Aesthetic & Wellness Clinic
                                </p>

                                <h1
                                    class="mt-5 uppercase font-serif text-[48px] tracking-widest text-[#705F40] sm:text-[40px]">
                                    Clincity London
                                </h1>

                                <div class="mt-7 flex gap-15">
                                    <div class="w-0.5 bg-[#DED6C7]"></div>
                                    <p class="max-w-95 text-[18px] leading-6 text-[#705F40]">
                                        We’re more than just an aesthetic clinic. We’re a sanctuary in the heart of London
                                        where science and your wellness journey converge. Our team of highly skilled
                                        professionals is dedicated to guiding you on your path to radiance - that's not just
                                        on the surface.
                                        <br><br>
                                        Ready to start your journey with us?
                                        Book your consultation with our experts here.
                                    </p>
                                </div>
                            </div>
                            <a
                                class="mt-10 rounded-full border border-[#c9b06f] hover:bg-[#c9b06f]/70 hover:text-white hover:cursor-pointer px-10 py-3 text-[#c9b06f] uppercase">
                                BOOK YOUR CONSULTATION
                            </a>
                        </div>

                        <div class="bg-white">
                            <img src="{{ get_template_directory_uri() }}/resources/images/tenderness-with-curls.png"
                                alt="Clincity Team" class="h-full w-full object-cover" loading="lazy" />
                        </div>
                    </div>
                </section>

                <section class="px-4 pb-12 sm:pt-26 sm:pb-14">
                    <div class="mx-auto max-w-7xl">
                        <h2 class="text-center font-serif text-[30px] tracking-[0.14em] text-black/55 sm:text-[36px]">
                            GOOGLE REVIEWS
                        </h2>

                        <div class="mt-10 grid gap-8 sm:mt-12 lg:grid-cols-3">
                            @foreach ($reviews as $r)
                                <article class="bg-white px-8 py-8 text-center shadow-[0_10px_30px_rgba(0,0,0,0.06)]">
                                    <div class="flex items-center justify-center gap-1 text-[#c9b06f]">
                                        @for ($i = 0; $i < $r['stars']; $i++)
                                            <png viewBox="0 0 24 24" class="h-4 w-4 fill-current" aria-hidden="true">
                                                <path
                                                    d="M12 17.27l-5.18 3.04 1.64-5.81L3 9.24l5.94-.51L12 3l3.06 5.73 5.94.51-5.46 5.26 1.64 5.81z" />
                                            </png>
                                        @endfor
                                    </div>

                                    <div class="mt-6 flex gap-6">
                                        <div class="w-px bg-black/10"></div>
                                        <p class="text-left text-[11px] leading-5 text-black/45">
                                            {{ $r['text'] }}
                                        </p>
                                    </div>

                                    <p class="mt-7 text-[10px] tracking-[0.28em] text-black/55">
                                        {{ $r['name'] }}
                                    </p>
                                </article>
                            @endforeach
                        </div>

                        <div class="mt-10 flex justify-center">
                            <a href="/reviews/"
                                class="inline-flex items-center justify-center rounded-full border border-[#c9b06f] px-10 py-2 text-[10px]
                 tracking-[0.18em] text-black/55 hover:bg-[#c9b06f]/10 transition">
                                SHOW MORE
                            </a>
                        </div>

                        <div class="mt-12 flex flex-wrap items-center justify-center gap-x-12 gap-y-6 opacity-80">
                            {{-- @foreach ($brandLogos as $logo)
                        <img src="@asset($logo['src'])" alt="{{ $logo['alt'] }}" class="h-6 w-auto" loading="lazy" />
                    @endforeach --}}
                        </div>
                    </div>
                </section>

                <section class="px-4 pb-16 pt-10 sm:px-6 sm:pb-20">
                    <div class="mx-auto max-w-7xl">
                        <div class="overflow-hidden border border-[#c9b06f]/60">
                            <div class="h-90 w-full bg-black/5 sm:h-105">
                                {!! do_shortcode('[YOUR_MAP_SHORTCODE_HERE]') !!}
                            </div>

                            <div class="border-t border-[#c9b06f]/60 bg-[#f6f2ec] px-6 py-4 text-center">
                                <p class="text-[10px] tracking-[0.28em] text-[#bda66a]">
                                    FIND US <span class="text-black/45 tracking-normal">36 Great Titchfield Street, London,
                                        W1W
                                        7BQ</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        @endsection
