{{--
  Template Name: Rooms Template
--}}

@extends('layouts.app')

@section('content')
    @php
        // Swap these to real assets in resources/images/
        $heroImage = 'images/collaborate/basic-room.jpg';

        $nav = [
            ['label' => 'HOME', 'url' => '/home/'],
            ['label' => 'TREATMENTS', 'url' => '/treatments/'],
            ['label' => 'TEAM', 'url' => '/team/'],
            ['label' => 'COLLABORATE', 'url' => '/collaborate/'],
            ['label' => 'GALLERY', 'url' => '/gallery/'],
            ['label' => 'CONTACT', 'url' => '/contact/'],
        ];

        $assets = [
            'Electric Beauty Bed',
            'Consultant Chair',
            'Patient Chair',
            'Desk',
            'Cabinets',
            'Vinyl Flooring',
            'Sink and Tap',
            'Soap Dispenser',
            'Paper Towel Dispenser',
            'Hand Gel',
            'Aprons',
            'Couch Rolls',
            'Medical Waste Bins',
        ];

        $keyFeatures = ['Waiting Area', 'WiFi', 'Wheelchair Access', 'CQC-registered'];

        $additionalFacilities = ['Waiting Area', 'Locker Room', 'Kitchen', 'Staff Toilet / Guest Toilet'];

        $additionalServices = [
            'Reception Service (clients list required)',
            'Water Dispenser',
            'Cleaning Service (after use)',
        ];
    @endphp

    <div>
        {{-- HERO CARD --}}
        <section class="px-4 sm:px-6 sm:pt-8">
            <div class="mx-auto w-full max-w-6xl overflow-hidden bg-white">
                {{-- Room hero (text left, image right) --}}
                <div class="grid gap-0 lg:grid-cols-2">
                    <div class="bg-white px-8 py-10 sm:px-10">
                        <p class="text-[10px] tracking-[0.28em] text-[#bda66a]">
                            COLLABORATE
                        </p>

                        <h1 class="mt-3 font-serif text-[34px] tracking-widest text-black/70 sm:text-[40px]">
                            BASIC ROOM
                        </h1>

                        <div class="mt-5 flex gap-6">
                            <div class="w-px bg-black/10"></div>
                            <div class="max-w-[46ch] space-y-4 text-[12px] leading-6 text-black/45">
                                <p>
                                    Our Basic Room offers a functional and comfortable setting for consultations or simple
                                    treatments.
                                    Featuring a desk, chair, sink, and tap, it’s equipped with all the essentials like soap
                                    dispensers and hand gel.
                                </p>
                                <p>
                                    Perfect for those seeking a no-frills, professional space for lighter services.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white">
                        <div class="aspect-video sm:aspect-3/2 lg:aspect-video">
                            {{-- <img src="@asset($heroImage)" alt="Basic Room" class="h-full w-full object-cover"
                                loading="lazy" /> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- FEATURES / ASSETS --}}
        <section class="px-4 pb-14 pt-12 sm:px-6 sm:pb-16">
            <div class="mx-auto max-w-6xl">
                <div class="grid gap-10 lg:grid-cols-2 lg:gap-14">
                    {{-- Left column --}}
                    <div>
                        <h2 class="font-serif text-[24px] tracking-[0.08em] text-black/60 sm:text-[28px]">
                            Room Features &amp; Assets
                        </h2>
                        <div class="mt-4 h-px w-full bg-black/10"></div>

                        <div class="mt-8 grid gap-10 sm:grid-cols-2">
                            {{-- Assets list --}}
                            <div>
                                <p class="text-[11px] font-medium tracking-[0.12em] text-black/55">Assets</p>
                                <ul class="mt-4 space-y-2 text-[11px] text-black/45">
                                    @foreach ($assets as $item)
                                        <li class="flex gap-3">
                                            <span
                                                class="mt-1.5 inline-block h-0.75 w-0.75 rounded-full bg-[#c9b06f]"></span>
                                            <span>{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            {{-- Key features list --}}
                            <div>
                                <p class="text-[11px] font-medium tracking-[0.12em] text-black/55">Key Features</p>
                                <ul class="mt-4 space-y-2 text-[11px] text-black/45">
                                    @foreach ($keyFeatures as $item)
                                        <li class="flex gap-3">
                                            <span
                                                class="mt-1.5 inline-block h-0.75 w-0.75 rounded-full bg-[#c9b06f]"></span>
                                            <span>{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- Right column --}}
                    <div>
                        <h2 class="font-serif text-[24px] tracking-[0.08em] text-black/60 sm:text-[28px]">
                            Additional Facilities &amp; Services:
                        </h2>
                        <div class="mt-4 h-px w-full bg-black/10"></div>

                        <div class="mt-8 grid gap-10 sm:grid-cols-2">
                            <div>
                                <p class="text-[11px] font-medium tracking-[0.12em] text-black/55">Additional Facilities:
                                </p>
                                <ul class="mt-4 space-y-2 text-[11px] text-black/45">
                                    @foreach ($additionalFacilities as $item)
                                        <li class="flex gap-3">
                                            <span
                                                class="mt-1.5 inline-block h-0.75 w-0.75 rounded-full bg-[#c9b06f]"></span>
                                            <span>{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div>
                                <p class="text-[11px] font-medium tracking-[0.12em] text-black/55">&nbsp;</p>
                                <ul class="mt-4 space-y-2 text-[11px] text-black/45">
                                    @foreach ($additionalServices as $item)
                                        <li class="flex gap-3">
                                            <span
                                                class="mt-1.5 inline-block h-0.75 w-0.75 rounded-full bg-[#c9b06f]"></span>
                                            <span>{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CTA --}}
                <div class="mt-14 flex justify-center">
                    <a href="/rent-a-room/"
                        class="inline-flex items-center justify-center rounded-full bg-[#c9b06f] px-12 py-2 text-[10px] font-medium
                   tracking-[0.18em] text-white shadow-[0_10px_20px_rgba(0,0,0,0.12)]
                   hover:brightness-95 transition">
                        RENT A ROOM
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection
