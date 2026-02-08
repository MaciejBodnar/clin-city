{{--
  Template Name: Team
--}}

@extends('layouts.app')

@section('content')
    @php
        $heroImage = '/resources/images/team/logo-on-window.png';

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
        <section class="px-4 sm:px-6">
            <div class="mx-auto w-full max-w-400 overflow-hidden bg-white pt-5">

                <div class="grid gap-0 lg:grid-cols-2">
                    <div class="bg-white px-8 py-10 sm:px-10 flex flex-col items-center justify-center">
                        <div>
                            <p class="text-[18px] tracking-[0.28em] text-[#C7B276] uppercase">
                                WELCOME TO CLINCITY LONDON
                            </p>

                            <h1 class="mt-3 uppercase font-serif text-[48px] tracking-widest text-[#705F40] sm:text-[40px]">
                                MEET THE TEAM
                            </h1>

                            <div class="mt-5 flex gap-15">
                                <div class="w-0.5 bg-[#DED6C7]"></div>
                                <p class="max-w-95 text-[18px] leading-6 text-[#705F40]">
                                    Where your aesthetic journey to excellence starts with our skilled team.
                                    Guided by leaders in cosmetic and aesthetic treatments, our committed experts are here
                                    to
                                    make your experience transformative and peaceful.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white">
                        <div class="aspect-video sm:aspect-3/2 lg:aspect-video">
                            <img src="{{ get_template_directory_uri() }}/resources/images/logo-on-window.png"
                                alt="Clincity Team" class="h-full w-full object-cover" loading="lazy" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="px-4 pb-16 pt-12 sm:px-6 sm:pb-40">
            <div class="mx-auto max-w-6xl">
                <div class="mb-22 flex flex-col gap-6">
                    <h2 class="shrink-0 font-serif text-[#705F40] sm:text-[48px]">
                        OUR TEAM
                    </h2>
                    <div class="h-0.5 w-full bg-[#DED6C7]"></div>
                </div>

                <div class="grid gap-x-10 gap-y-14 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($team as $person)
                        <article class="flex flex-col justify-between">
                            <div class="text-center">
                                <div class="mx-auto h-63.75 w-63.75 overflow-hidden rounded-full bg-black/5">
                                    {{-- <img src="@asset($person['image'])" alt="{{ $person['name'] }}" class="h-full w-full object-cover"
                                    loading="lazy" /> --}}
                                </div>

                                <h3 class="mt-5 font-serif text-[39px] text-[#705F40]">
                                    {{ $person['name'] }}
                                </h3>

                                <p class="mt-1 text-[18px] text-[#C7B276]">
                                    {{ $person['role'] }}
                                </p>
                            </div>
                            <div class="flex justify-center w-full">
                                <button type="button" data-member='@json($person)'
                                    onclick="openTeamModal(this)"
                                    class="mt-5 inline-flex cursor-pointer items-center justify-center rounded-full uppercase w-59 border border-[#C7B276] px-10 py-2 text-[#705F40] hover:bg-[#c9b06f]/10 transition">
                                    READ MORE
                                </button>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="px-4 pb-20 sm:px-6">
            <div class="mx-auto max-w-6xl">
                <div class="mb-22 flex flex-col gap-6">
                    <h2 class="shrink-0 font-serif uppercase text-[#705F40] sm:text-[48px]">
                        OUR PARTNERS
                    </h2>
                    <div class="h-0.5 w-full bg-[#DED6C7]"></div>
                </div>

                <div class="grid gap-x-10 gap-y-14 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($partners as $person)
                        <article class="flex flex-col justify-between">
                            <div class="text-center">
                                <div class="mx-auto h-63.75 w-63.75 overflow-hidden rounded-full bg-black/5">
                                    {{-- <img src="@asset($person['image'])" alt="{{ $person['name'] }}" class="h-full w-full object-cover"
                                    loading="lazy" /> --}}
                                </div>

                                <h3 class="mt-5 font-serif text-[39px] text-[#705F40]">
                                    {{ $person['name'] }}
                                </h3>

                                <p class="mt-1 text-[18px] text-[#C7B276]">
                                    {{ $person['role'] }}
                                </p>
                            </div>
                            <div class="flex justify-center w-full">
                                <button type="button" data-member='@json($person)'
                                    onclick="openTeamModal(this)"
                                    class="mt-5 inline-flex cursor-pointer items-center justify-center rounded-full uppercase w-59 border border-[#C7B276] px-10 py-2 text-[#705F40] hover:bg-[#c9b06f]/10 transition">
                                    READ MORE
                                </button>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    <div id="team-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="fixed inset-0 bg-black/50 transition-opacity backdrop-blur-sm" aria-hidden="true"
            onclick="closeTeamModal()"></div>

        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <div
                class="relative w-full max-w-400 transform overflow-hidden bg-white p-6 text-left shadow-xl transition-all sm:my-8 sm:py-40 sm:px-60">

                <div class="absolute right-0 top-0 pr-12 pt-12">
                    <button type="button" class="text-[18px] bg-white text-black hover:text-gray-500 hover:cursor-pointer"
                        onclick="closeTeamModal()">
                        <i class="fa-solid fa-x"></i>
                    </button>
                </div>

                <div class="sm:flex sm:items-start">
                    <div class="mt-3 w-full text-center sm:ml-4 sm:mt-0 sm:text-left">
                        <div class="inline-flex gap-25">
                            <div class="mx-auto h-63.75 w-63.75 overflow-hidden rounded-full shrink-0 bg-black/5">
                                <img id="modal-image" src="" alt=""
                                    class="h-full w-full object-cover text-transparent">
                            </div>

                            <div>
                                <h1 class="mt-3 uppercase font-serif text-[48px] tracking-widest text-[#705F40] sm:text-[40px]"
                                    id="modal-title">
                                    MEET THE TEAM
                                </h1>
                                <p class="text-[18px] tracking-[0.28em] text-[#C7B276] uppercase" id="modal-role">
                                    Dr William Wong
                                </p>


                                <div class="mt-5 flex gap-15">
                                    <div class="w-0.5 bg-[#DED6C7]"></div>
                                    <p class="max-w- text-[18px] leading-6 text-[#705F40]" id="modal-bio">
                                        Where your aesthetic journey to excellence starts with our skilled team.
                                        Guided by leaders in cosmetic and aesthetic treatments, our committed experts are
                                        here
                                        to
                                        make your experience transformative and peaceful.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
