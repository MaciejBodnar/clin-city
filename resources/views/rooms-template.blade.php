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
                                <p class="max-w-95 text-[18px] tracking-wide leading-8 text-[#705F40]">
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
                            <img src="{{ get_template_directory_uri() }}/resources/images/room-basic.png"
                                alt="Clincity Team" class="h-full w-full object-cover" loading="lazy" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="px-4 pb-14 pt-12 sm:px-6 sm:pb-16">
            <div class="mx-auto max-w-7xl">
                <div class="grid gap-10 lg:grid-cols-2 lg:gap-14">
                    <div>
                        <h2 class="font-serif text-[39px] text-black/60 sm:text-[39px]">
                            Room Features &amp; Assets
                        </h2>
                        <div class="mt-10 h-px w-full bg-black/10"></div>

                        <div class="mt-10 grid gap-10 sm:grid-cols-2">
                            <div>
                                <p class="text-[18px] font-medium tracking-[0.12em] text-black/55">Assets</p>
                                <ul class="mt-4 space-y-2 text-[18px] text-black/45">
                                    @foreach ($assets as $item)
                                        <li class="flex gap-3 items-center">
                                            <span class="inline-block h-1 w-1 rounded-full bg-[#c9b06f]"></span>
                                            <span>{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div>
                                <p class="text-[18px] font-medium tracking-[0.12em] text-black/55">Key Features</p>
                                <ul class="mt-4 space-y-2 text-[18px] text-black/45">
                                    @foreach ($keyFeatures as $item)
                                        <li class="flex gap-3 items-center">
                                            <span class="inline-block h-1 w-1 rounded-full bg-[#c9b06f]"></span>
                                            <span>{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h2 class="font-serif text-[39px] text-black/60 sm:text-[39px]">
                            Additional Facilities &amp; Services:
                        </h2>
                        <div class="mt-10 h-px w-full bg-black/10"></div>

                        <div class="mt-10 grid gap-10 sm:grid-cols-2">
                            <div>
                                <p class="text-[18px] font-medium tracking-[0.12em] text-black/55">Additional Facilities:
                                </p>
                                <ul class="mt-4 space-y-2 text-[18px] text-black/45">
                                    @foreach ($additionalFacilities as $item)
                                        <li class="flex gap-3 items-center">
                                            <span class="inline-block h-1 w-1 rounded-full bg-[#c9b06f]"></span>
                                            <span>{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div>
                                <p class="text-[18px] font-medium tracking-[0.12em] text-black/55">&nbsp;</p>
                                <ul class="mt-4 space-y-2 text-[18px] text-black/45">
                                    @foreach ($additionalServices as $item)
                                        <li class="flex gap-3 items-center">
                                            <span class="inline-block h-1 w-1 rounded-full bg-[#c9b06f]"></span>
                                            <span>{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-24 flex justify-center">
                    <a href=""
                        class="min-w-71.25 rounded-full text-center bg-[#c9b06f] uppercase hover:bg-[#c9b06f]/70 px-10 py-3 text-white">
                        Rent a room
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection
