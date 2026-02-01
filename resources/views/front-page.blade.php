{{--
  Template Name: Front Page
--}}

@extends('layouts.app')

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
    @endphp

    <div>
        <section class="px-4 sm:px-6 sm:pt-8 bg-transparent">
            <div class="mx-auto w-full max-w-6xl overflow-hidden bg-white">
                <section id="treatments" class="px-4 pb-16 pt-10 sm:px-6 sm:pb-20 sm:pt-12">
                    <div class="mx-auto max-w-6xl">
                        <h2 class="text-center font-serif text-[28px] tracking-[0.22em] text-black/55 sm:text-[34px]">
                            TREATMENTS
                        </h2>

                        <div class="mt-10 grid gap-8 sm:mt-12 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach ($treatments as $card)
                                <article class="bg-white shadow-[0_10px_30px_rgba(0,0,0,0.06)]">
                                    <div class="aspect-video overflow-hidden bg-black/5">
                                        {{-- <img src="@asset($card['image'])" alt="{{ $card['title'] }}" class="h-full w-full object-cover"
                                    loading="lazy" /> --}}
                                    </div>

                                    <div class="bg-[#f6f2ec] px-4 py-3 text-center">
                                        <h3 class="text-[11px] font-medium tracking-[0.2em] text-black/55">
                                            {{ $card['title'] }}
                                        </h3>
                                    </div>

                                    <div class="px-6 pb-6 pt-5 text-center">
                                        <p class="mx-auto max-w-[36ch] text-[11px] leading-5 text-black/45">
                                            {{ $card['text'] }}
                                        </p>

                                        <a href="{{ $card['url'] }}"
                                            class="mt-5 inline-flex items-center justify-center rounded-full border border-[#c9b06f] px-6 py-2 text-[10px]
                         tracking-[0.18em] text-black/55 hover:bg-[#c9b06f]/10 transition">
                                            READ MORE
                                        </a>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </section>
                <section class="bg-[#f2eee7] px-4 pb-16 pt-6 sm:px-6 sm:pb-20 sm:pt-10">
                    <div class="mx-auto max-w-6xl">
                        <div class="grid items-start gap-10 lg:grid-cols-2 lg:gap-14">
                            <div class="bg-white px-8 py-10 shadow-[0_10px_30px_rgba(0,0,0,0.06)] sm:px-10">
                                <p class="text-[11px] tracking-[0.28em] text-[#bda66a]">
                                    AESTHETIC &amp; WELLNESS CLINIC
                                </p>

                                <h2 class="mt-3 font-serif text-[34px] tracking-[0.08em] text-black/70 sm:text-[40px]">
                                    CLINCITY LONDON
                                </h2>

                                <div class="mt-5 flex gap-6">
                                    <div class="w-px bg-black/10"></div>
                                    <div class="space-y-4 text-[12px] leading-6 text-black/45">
                                        <p>
                                            We’re more than just an aesthetic clinic. We’re a sanctuary in the heart of
                                            London where
                                            science and your wellness journey converge.
                                            Our team of highly skilled professionals is dedicated to guiding you on your
                                            path to
                                            radiance - that’s not just on the surface.
                                        </p>

                                        <p class="pt-2">
                                            Ready to start your journey with us?<br />
                                            Book your consultation with our experts here.
                                        </p>
                                    </div>
                                </div>

                                <a href="/book/"
                                    class="mt-8 inline-flex items-center justify-center rounded-full border border-[#c9b06f] px-7 py-2 text-[10px]
                   tracking-[0.18em] text-black/55 hover:bg-[#c9b06f]/10 transition">
                                    BOOK YOUR CONSULTATION
                                </a>
                            </div>

                            <div class="overflow-hidden bg-white shadow-[0_10px_30px_rgba(0,0,0,0.06)]">
                                <div class="aspect-4/3">
                                    {{-- <img src="@asset($aboutImage)" alt="Clincity London" class="h-full w-full object-cover"
                                loading="lazy" /> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="bg-[#f2eee7] px-4 pb-12 sm:px-6 sm:pb-14">
                    <div class="mx-auto max-w-6xl">
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

                <section class="bg-[#f2eee7] px-4 pb-16 pt-10 sm:px-6 sm:pb-20">
                    <div class="mx-auto max-w-6xl">
                        <div class="overflow-hidden border border-[#c9b06f]/60 bg-white">
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
