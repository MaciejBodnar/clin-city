@php
    $locations = get_nav_menu_locations();
    $policyMenuId = $locations['footer_policy'] ?? null;
    $policyItems = $policyMenuId ? wp_get_nav_menu_items($policyMenuId) : [];

    if (empty($policyItems)) {
        $policyItems = [
            (object) ['title' => 'Privacy Policy', 'url' => '/privacy-policy/'],
            (object) ['title' => 'Terms & Conditions', 'url' => '/terms-and-conditions/'],
            (object) ['title' => 'Booking Policy', 'url' => '/booking-policy/'],
        ];
    }

    $social = [
        ['label' => 'Facebook', 'url' => '#', 'icon' => 'fa-brands fa-facebook-f'],
        ['label' => 'TikTok', 'url' => '#', 'icon' => 'fa-brands fa-tiktok'],
        ['label' => 'Instagram', 'url' => '#', 'icon' => 'fa-brands fa-instagram'],
    ];
@endphp

<footer>
    <div class="mx-auto max-w-400 items-center flex flex-col justify-center px-4 pb-14 pt-10 sm:px-6">
        <div class="flex max-w-6xl flex-wrap w-full items-center justify-between gap-6">
            <p class=" text-[#C7B276] uppercase tracking-[0.3em]">
                FIND US ONLINE
            </p>

            <div class="flex items-center gap-30 text-[#C7B276]/80">
                @foreach ($social as $s)
                    <a href="{{ $s['url'] }}" class="text-[34px] transition hover:text-[#bda66a]"
                        aria-label="{{ $s['label'] }}" target="_blank" rel="noopener">
                        <i class="{{ $s['icon'] }}"></i>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="mt-8 h-0.5 w-full bg-[#bda66a]/35"></div>

        <div class="max-w-6xl w-full mt-12 grid gap-10 text-black/55 lg:grid-cols-[1fr_1fr_1fr]">
            <div class="flex items-start justify-center lg:justify-start">
                <a href="{{ home_url('/') }}" class="font-serif text-[42px] tracking-[0.18em] text-[#c9b06f]">
                    <img src="{{ get_template_directory_uri() }}/resources/images/logo-menu.png" alt="CLINICITY"
                        class="h-12" />
                </a>
            </div>

            <div class="space-y-3 leading-6">
                <p>
                    <span class="opacity-75">Whatsapp us</span>
                    <a class="hover:text-black/80 pl-2 font-medium" href="tel:+442073239534">
                        <i class="fa-brands fa-whatsapp"></i>
                        <span class="ml-2">
                            020 7323 9534</span></a>
                </p>

                <p>
                    <a class="hover:text-black/70 font-medium" href="mailto:info@clincity.com">info@clincity.com</a>
                </p>

                <p class="font-medium">
                    36 Great Titchfield Street, London, W1W 8BQ
                </p>
            </div>

            <div class="space-y-3 leading-6">
                @foreach ($policyItems as $p)
                    <p>
                        <a href="{{ $p->url }}" class="hover:text-black/70 transition">
                            {{ $p->title }}
                        </a>
                    </p>
                @endforeach
            </div>
        </div>

        <div class="mt-18 text-center text-black/50 sm:px-6">
            © <?php echo date('Y'); ?> - The Central London Clinic Ltd. - D&amp;C with <span class="text-[#C7B276]"><i
                    class="fa-solid fa-heart" style="color: #c7b276;"></i></span> Sltmedia
        </div>
    </div>
</footer>
