{{--
  Template Name: Welcome Page
--}}

@extends('layouts.app')

@section('content')
    <main class="min-h-screen">
        <div class="min-h-screen px-4 py-6 sm:px-6 sm:py-8">
            <section
                class="mx-auto w-full max-w-6xl overflow-hidden rounded-none border border-black/10 bg-white shadow-[0_10px_30px_rgba(0,0,0,0.08)]">
                <div
                    class="flex flex-wrap items-center justify-between gap-3 border-b border-black/10 bg-white px-4 py-2 text-[11px] text-black/60 sm:px-6">
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center gap-1">
                            <span class="opacity-70">Whatsapp us</span>
                            <span class="inline-block h-4 w-px bg-black/10"></span>
                            <a class="hover:text-black/80" href="tel:+442073239534">020 7323 9534</a>
                        </span>
                    </div>

                    <div class="flex items-center gap-2">
                        <span class="opacity-70">Opening hours</span>
                        <span class="inline-block h-4 w-px bg-black/10"></span>
                        <span>Mon-Sat, 10:00am-6:30pm</span>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute inset-0">
                        <img src="{{ $main['hero']['video_placeholder'] }}" alt=""
                            class="h-full w-full object-cover" />
                        <div class="absolute inset-0 bg-black/10"></div>
                        <div class="absolute inset-0 backdrop-blur-[2px]"></div>
                        <div class="absolute inset-0 bg-linear-to-b from-black/10 via-transparent to-black/20"></div>
                    </div>

                    <div
                        class="relative flex min-h-140 flex-col items-center justify-center px-6 pb-10 pt-14 text-center sm:min-h-160">
                        <h1 class="select-none font-serif text-[68px] font-light tracking-[0.22em] text-white drop-shadow-[0_2px_12px_rgba(0,0,0,0.35)]
                   sm:text-[92px] md:text-[120px]"
                            aria-label="CLINICITY">
                            <span class="inline-flex items-end gap-1">
                                <span>CLIN</span>

                                <span class="inline-block translate-y-1.5" aria-hidden="true">
                                    <svg width="34" height="92" viewBox="0 0 34 92" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="opacity-95">
                                        <path d="M17 0C19.5 6 24 8 24 14V18H10V14C10 8 14.5 6 17 0Z" fill="white"
                                            opacity="0.9" />
                                        <path d="M10 18H24V86H10V18Z" fill="white" opacity="0.9" />
                                        <path d="M8 86H26V92H8V86Z" fill="white" opacity="0.9" />
                                        <circle cx="17" cy="42" r="6" fill="#d9cbbd" opacity="0.9" />
                                        <path d="M14 42H20" stroke="white" stroke-width="2" opacity="0.8" />
                                        <path d="M17 39V45" stroke="white" stroke-width="2" opacity="0.8" />
                                    </svg>
                                </span>

                                <span>CITY</span>
                            </span>
                        </h1>

                        <p class="mt-2 text-[11px] tracking-[0.35em] text-white/85 sm:text-[12px]">
                            MEDICAL-FIRST APPROACH TO AESTHETICS
                        </p>

                        <nav class="mt-12 w-full max-w-4xl">
                            <ul
                                class="flex flex-wrap items-center justify-center gap-x-6 gap-y-3 text-[10px] tracking-[0.22em] text-white/60">
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
                                <li>
                                    <a href="{{ home_url('/home') }}" class="hover:text-white/90 transition">
                                        <?php echo esc_html($label); ?>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </nav>

                        <div class="mt-12">
                            <a href="{{ home_url('/home') }}" id="enter-site"
                                class="inline-flex items-center justify-center rounded-full bg-white/90 px-7 py-3 text-[11px] font-medium tracking-[0.2em] text-black/70
                     shadow-[0_8px_24px_rgba(0,0,0,0.20)] backdrop-blur
                     hover:bg-white hover:text-black/80 transition">
                                ENTER OUR WEBSITE
                                <span
                                    class="ml-2 inline-flex h-4 w-4 items-center justify-center rounded border border-black/20 text-[10px] leading-none">
                                    ?
                                </span>
                            </a>
                        </div>
                    </div>

                    <div
                        class="relative border-t border-black/10 bg-white px-4 py-3 text-center text-[11px] text-black/50 sm:px-6">
                        © <?php echo date('Y'); ?> - The Central London Clinic Ltd. - D&amp;C with <span
                            class="underline underline-offset-2">Sltmedia</span>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
