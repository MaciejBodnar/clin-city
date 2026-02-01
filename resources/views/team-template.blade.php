{{--
  Template Name: Team
--}}

@extends('layouts.app')

@section('content')
    @php
        $heroImage = 'images/team/team-hero.jpg';

        $nav = [
            ['label' => 'HOME', 'url' => '/home/'],
            ['label' => 'TREATMENTS', 'url' => '/treatments/'],
            ['label' => 'TEAM', 'url' => '/team/'],
            ['label' => 'COLLABORATE', 'url' => '/collaborate/'],
            ['label' => 'GALLERY', 'url' => '/gallery/'],
            ['label' => 'CONTACT', 'url' => '/contact/'],
        ];

        $team = [
            [
                'name' => 'Dr William Wong',
                'role' => 'MEDICAL DIRECTOR AND CQC NOMINATED INDIVIDUAL, CLINCITY',
                // 'image' => 'images/team/william-wong.jpg',
                'url' => '/team/dr-william-wong/',
            ],
            [
                'name' => 'Agata',
                'role' => 'TEAM LEADER AND AESTHETIC THERAPIST',
                // 'image' => 'images/team/agata.jpg',
                'url' => '/team/agata/',
            ],
            [
                'name' => 'Gentiana',
                'role' => 'AESTHETIC PRACTITIONER',
                // 'image' => 'images/team/gentiana.jpg',
                'url' => '/team/gentiana/',
            ],
            [
                'name' => 'Sara',
                'role' => 'AESTHETIC THERAPIST',
                // 'image' => 'images/team/sara.jpg',
                'url' => '/team/sara/',
            ],
            [
                'name' => 'David',
                'role' => 'CLIENT RELATIONS MANAGER',
                // 'image' => 'images/team/david.jpg',
                'url' => '/team/david/',
            ],
        ];

        $partners = [
            [
                'name' => 'Dr Li',
                'role' => 'TRADITIONAL CHINESE MEDICINE (TCM) DOCTOR',
                // 'image' => 'images/partners/dr-li.jpg',
                'url' => '/partners/dr-li/',
            ],
            [
                'name' => 'Dr Lara De Luca',
                'role' => 'PLASTIC SURGEON AND AESTHETIC DOCTOR',
                // 'image' => 'images/partners/dr-lara-de-luca.jpg',
                'url' => '/partners/dr-lara-de-luca/',
            ],
            [
                'name' => 'Karolina Jendras',
                'role' => 'REGISTERED INDEPENDENT NURSE PRESCRIBER',
                // 'image' => 'images/partners/karolina-jendras.jpg',
                'url' => '/partners/karolina-jendras/',
            ],
            [
                'name' => 'Helen Chapman',
                'role' => 'ADVANCED MEDICAL AESTHETIC PRACTITIONER',
                // 'image' => 'images/partners/helen-chapman.jpg',
                'url' => '/partners/helen-chapman/',
            ],
            [
                'name' => 'Dr Torka Hirbod',
                'role' => 'AESTHETIC DOCTOR',
                // 'image' => 'images/partners/dr-torka-hirbod.jpg',
                'url' => '/partners/dr-torka-hirbod/',
            ],
        ];
    @endphp

    <div>
        <section class="px-4 sm:px-6 sm:pt-8">
            <div class="mx-auto w-full max-w-6xl overflow-hidden bg-white">

                <div class="grid gap-0 lg:grid-cols-2">
                    <div class="bg-white px-8 py-10 sm:px-10">
                        <p class="text-[10px] tracking-[0.28em] text-[#bda66a]">
                            WELCOME TO CLINCITY LONDON
                        </p>

                        <h1 class="mt-3 font-serif text-[34px] tracking-widest text-black/70 sm:text-[40px]">
                            MEET THE TEAM
                        </h1>

                        <div class="mt-5 flex gap-6">
                            <div class="w-px bg-black/10"></div>
                            <p class="max-w-[42ch] text-[12px] leading-6 text-black/45">
                                Where your aesthetic journey to excellence starts with our skilled team.
                                Guided by leaders in cosmetic and aesthetic treatments, our committed experts are here to
                                make your experience transformative and peaceful.
                            </p>
                        </div>
                    </div>

                    <div class="bg-white">
                        <div class="aspect-video sm:aspect-3/2 lg:aspect-video">
                            {{-- <img src="@asset($heroImage)" alt="Clincity Team" class="h-full w-full object-cover"
                                loading="lazy" /> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="px-4 pb-16 pt-12 sm:px-6 sm:pb-20">
            <div class="mx-auto max-w-6xl">
                <div class="mb-10 flex items-center gap-6">
                    <h2 class="shrink-0 font-serif text-[22px] tracking-[0.14em] text-black/55 sm:text-[26px]">
                        OUR TEAM
                    </h2>
                    <div class="h-px w-full bg-black/10"></div>
                </div>

                <div class="grid gap-x-10 gap-y-14 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($team as $person)
                        <article class="text-center">
                            <div class="mx-auto h-32 w-32 overflow-hidden rounded-full bg-black/5 sm:h-36 sm:w-36">
                                {{-- <img src="@asset($person['image'])" alt="{{ $person['name'] }}" class="h-full w-full object-cover"
                                    loading="lazy" /> --}}
                            </div>

                            <h3 class="mt-5 font-serif text-[18px] text-black/65">
                                {{ $person['name'] }}
                            </h3>

                            <p class="mt-1 text-[9px] tracking-[0.28em] text-[#bda66a]">
                                {{ $person['role'] }}
                            </p>

                            <a href="{{ $person['url'] }}"
                                class="mt-5 inline-flex items-center justify-center rounded-full border border-[#c9b06f] px-10 py-2 text-[10px]
                       tracking-[0.18em] text-black/55 hover:bg-[#c9b06f]/10 transition">
                                READ MORE
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="px-4 pb-20 sm:px-6">
            <div class="mx-auto max-w-6xl">
                <div class="mb-10 flex items-center gap-6">
                    <h2 class="shrink-0 font-serif text-[22px] tracking-[0.14em] text-black/55 sm:text-[26px]">
                        OUR PARTNERS
                    </h2>
                    <div class="h-px w-full bg-black/10"></div>
                </div>

                <div class="grid gap-x-10 gap-y-14 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($partners as $person)
                        <article class="text-center">
                            <div class="mx-auto h-32 w-32 overflow-hidden rounded-full bg-black/5 sm:h-36 sm:w-36">
                                {{-- <img src="@asset($person['image'])" alt="{{ $person['name'] }}" class="h-full w-full object-cover"
                                    loading="lazy" /> --}}
                            </div>

                            <h3 class="mt-5 font-serif text-[18px] text-black/65">
                                {{ $person['name'] }}
                            </h3>

                            <p class="mt-1 text-[9px] tracking-[0.28em] text-[#bda66a]">
                                {{ $person['role'] }}
                            </p>

                            <a href="{{ $person['url'] }}"
                                class="mt-5 inline-flex items-center justify-center rounded-full border border-[#c9b06f] px-10 py-2 text-[10px]
                       tracking-[0.18em] text-black/55 hover:bg-[#c9b06f]/10 transition">
                                READ MORE
                            </a>
                        </article>
                    @endforeach
                </div>

                <div class="mt-16 border-t border-black/10 pt-8">
                    <div
                        class="flex flex-wrap items-center justify-between gap-6 text-[10px] tracking-[0.28em] text-[#bda66a]">
                        <span>FIND US ONLINE</span>

                        <div class="flex items-center gap-6 text-black/35">
                            <a href="#"
                                class="inline-flex h-6 w-6 items-center justify-center rounded border border-black/10 hover:text-black/60 transition"
                                aria-label="Instagram">?</a>
                            <a href="#"
                                class="inline-flex h-6 w-6 items-center justify-center rounded border border-black/10 hover:text-black/60 transition"
                                aria-label="Facebook">?</a>
                            <a href="#"
                                class="inline-flex h-6 w-6 items-center justify-center rounded border border-black/10 hover:text-black/60 transition"
                                aria-label="TikTok">?</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
