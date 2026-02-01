{{--
  Template Name: Welcome Page
--}}

@extends('layouts.app')

@section('header')
@endsection

@section('content')
    <main class="min-h-screen">
        <div class="min-h-screen px-4 sm:px-6">
            <section class="mx-auto w-full max-w-400 overflow-hidden rounded-none ">
                <div
                    class="flex flex-wrap max-w-7xl mx-auto items-center justify-between gap-3 px-4 py-5 text-black/60 sm:px-6">
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

                <div class="relative">
                    <div class="absolute inset-0">
                        <img src="{{ $main['hero']['video_placeholder'] }}" alt=""
                            class="h-full w-full object-cover" />
                    </div>

                    <div
                        class="relative flex min-h-140 flex-col items-center justify-center px-6 pb-10 pt-50 text-center sm:min-h-160">
                        <h1 class="select-none font-serif text-[68px] font-light tracking-[0.22em] text-white drop-shadow-[0_2px_12px_rgba(0,0,0,0.35)]
                   sm:text-[92px] md:text-[120px]"
                            aria-label="CLINICITY">
                            <img src="{{ get_template_directory_uri() }}/resources/images/logo.png" alt="CLINICITY"
                                class="h-16 w-auto sm:h-20 md:h-50 mx-auto" />
                        </h1>

                        <p class="mt-12 text-[11px] tracking-[0.35em] text-white/85 sm:text-[26px]">
                            MEDICAL-FIRST APPROACH TO AESTHETICS
                        </p>

                        <nav class="mt-40 w-full">
                            <ul
                                class="flex flex-wrap items-start justify-center gap-x-6 gap-y-3 text-[11px] tracking-[0.15em] text-white/40">
                                <?php
              $items = [
                'ULTHERAPY',
                'THERMAGE',
                'BBL+HALO',
                'ANTI WRINKLE INJECTIONS AND DERMA FILLERS',
                'SKINPEN',
                'SKIN BOOSTERS',
                'CLEAR & BRILLIANT',
                'CHEMICAL PEEL',
                'HYDRO2',
              ];
              foreach ($items as $label) :
              ?>
                                <li class="max-w-50!">
                                    <a href="{{ home_url('/home') }}"
                                        class="inline-block pb-2 border-b border-transparent hover:border-white hover:text-white transition">
                                        <?php echo esc_html($label); ?>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </nav>

                        <div class="mt-12">
                            <a href="{{ home_url('/home') }}" id="enter-site"
                                class="inline-flex items-center justify-center rounded-full uppercase bg-white/90 px-7 py-3 font-medium tracking-[0.2em] text-black/70 backdrop-blur
                     hover:bg-white hover:text-black/80 transition">
                                ENTER OUR WEBSITE
                                <span
                                    class="ml-2 inline-flex h-4 w-4 items-center justify-center roundedtext-[10px] leading-none">
                                    <i class="fa-solid fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="relative border-t border-black/10 bg-white px-4 py-3 text-center text-black/50 sm:px-6">
                        © <?php echo date('Y'); ?> - The Central London Clinic Ltd. - D&amp;C with <span
                            class="text-[#C7B276]"><i class="fa-solid fa-heart" style="color: #c7b276;"></i></span> Sltmedia
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
