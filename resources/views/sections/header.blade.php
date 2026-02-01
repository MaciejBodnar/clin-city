@php

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
            $mk(21, 'BASIC ROOM', '/basic-room/', 20, 'Our Basic Room offers a functional and comfortable setting.'),
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
        <div class="px-4 py-8 text-center sm:px-6">
            <a href="{{ home_url('/') }}" class="inline-block font-serif text-[42px] tracking-[0.18em] text-[#c9b06f]">
                <img src="{{ get_template_directory_uri() }}/resources/images/logo-menu.png" alt="CLINICITY"
                    class="h-12 w-auto mx-auto" />
            </a>
        </div>

        <div class="w-full max-w-6xl static">
            <div class="static flex items-center justify-between gap-6 px-4 w-full sm:px-6">
                <nav class="static">
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
                                    class="relative inline-flex items-center py-8 transition hover:text-black/75 {{ $isCurrent ? 'text-black/75' : '' }}">
                                    {{ $title }}

                                    @if ($openable)
                                        <span
                                            class="pointer-events-none absolute -bottom-0.5 left-1/2 hidden h-0 w-0 -translate-x-1/2
                     border-l-8 border-r-8 border-t-8
                     border-l-transparent border-r-transparent border-t-[#d7cfbf]
                     group-hover:block group-focus-within:block {{ $isCurrent ? 'block' : '' }}"></span>
                                    @endif
                                </a>

                                @if ($openable)
                                    <div
                                        class="pointer-events-none absolute inset-x-0 w-full left-0 top-full z-50
                                            opacity-0 transition duration-200
                                            group-hover:pointer-events-auto group-hover:opacity-100
                                            group-focus-within:pointer-events-auto group-focus-within:opacity-100">
                                        <div
                                            class="w-full border border-black/10 bg-[#d7cfbf] shadow-[0_20px_50px_rgba(0,0,0,0.12)]">
                                            <div class="mx-auto w-full max-w-6xl px-10 py-10">

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
