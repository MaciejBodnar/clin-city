<footer>
    <div class="mx-auto max-w-400 items-center flex flex-col justify-center px-4 pb-14 pt-10 sm:px-6">
        <div class="flex max-w-6xl flex-wrap w-full items-center justify-center md:justify-between gap-6">
            <p class=" text-[#C7B276] uppercase tracking-[0.3em]">
                {{ $footer['find_us'] }}
            </p>

            <div class="flex items-center gap-8 md:gap-30 text-[#C7B276]/80">
                @foreach ($footer['social'] as $s)
                    <a href="{{ $s['url'] }}" class="text-[34px] transition hover:text-[#bda66a]"
                        aria-label="{{ $s['label'] }}" target="_blank" rel="noopener">
                        <i class="{{ $s['icon'] }}"></i>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="mt-8 h-0.5 w-full bg-[#bda66a]/35"></div>

        <div class="max-w-6xl w-full mt-12 grid gap-10 text-black/55 lg:grid-cols-[1fr_1fr_1fr] max-md:text-center">
            <div class="flex items-start justify-center lg:justify-start">
                <a href="{{ $footer['logo_link'] }}" class="font-serif text-[42px] tracking-[0.18em] text-[#c9b06f]">
                    <img src="{{ $footer['logo'] }}" alt="CLINICITY" class="h-12" />
                </a>
            </div>

            <div class="space-y-3 leading-6">
                <p>
                    <span class="opacity-75">{{ $footer['whatsapp']['label'] }}</span>
                    <a class="hover:text-black/80 pl-2 font-medium" href="tel:{{ $footer['whatsapp']['tel'] }}">
                        <i class="fa-brands fa-whatsapp"></i>
                        <span class="ml-2">
                            {{ $footer['whatsapp']['phone_text'] }}</span></a>
                </p>

                <p>
                    <a class="hover:text-black/70 font-medium"
                        href="mailto:{{ $footer['email']['url'] }}">{{ $footer['email']['url'] }}</a>
                </p>

                <p class="font-medium">
                    {{ $footer['address']['text'] }}
                </p>
            </div>

            <div class="space-y-3 leading-6">
                @foreach ($footer['quick_links'] as $p)
                    <p>
                        <a href="{{ $p['url'] }}" class="hover:text-black/70 transition">
                            {{ $p['label'] }}
                        </a>
                    </p>
                @endforeach
            </div>
        </div>

        <div class="mt-18 text-center text-black/50 sm:px-6">
            © <?php echo date('Y'); ?> {{ $footer['copyright_text'] }} <span class="text-[#C7B276]"><i
                    class="{{ $footer['heart_icon_class'] }}" style="color: #c7b276;"></i></span> <a
                href="{{ $footer['slt_link'] }}" target="_blank"
                class="hover:text-black/70 transition">{{ $footer['slt_text'] }}</a>
        </div>
    </div>
</footer>
