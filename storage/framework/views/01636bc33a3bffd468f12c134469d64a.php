<?php
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
?>

<footer>
    <div class="mx-auto max-w-400 items-center flex flex-col justify-center px-4 pb-14 pt-10 sm:px-6">
        <div class="flex max-w-6xl flex-wrap w-full items-center justify-center md:justify-between gap-6">
            <p class=" text-[#C7B276] uppercase tracking-[0.3em]">
                FIND US ONLINE
            </p>

            <div class="flex items-center gap-8 md:gap-30 text-[#C7B276]/80">
                <?php $__currentLoopData = $social; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e($s['url']); ?>" class="text-[34px] transition hover:text-[#bda66a]"
                        aria-label="<?php echo e($s['label']); ?>" target="_blank" rel="noopener">
                        <i class="<?php echo e($s['icon']); ?>"></i>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div class="mt-8 h-0.5 w-full bg-[#bda66a]/35"></div>

        <div class="max-w-6xl w-full mt-12 grid gap-10 text-black/55 lg:grid-cols-[1fr_1fr_1fr] max-md:text-center">
            <div class="flex items-start justify-center lg:justify-start">
                <a href="<?php echo e(home_url('/')); ?>" class="font-serif text-[42px] tracking-[0.18em] text-[#c9b06f]">
                    <img src="<?php echo e(get_template_directory_uri()); ?>/resources/images/logo-menu.png" alt="CLINICITY"
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
                <?php $__currentLoopData = $policyItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p>
                        <a href="<?php echo e($p->url); ?>" class="hover:text-black/70 transition">
                            <?php echo e($p->title); ?>

                        </a>
                    </p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div class="mt-18 text-center text-black/50 sm:px-6">
            © <?php echo date('Y'); ?> - The Central London Clinic Ltd. - D&amp;C with <span class="text-[#C7B276]"><i
                    class="fa-solid fa-heart" style="color: #c7b276;"></i></span> Sltmedia
        </div>
    </div>
</footer>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wordpress/wp-content/themes/clin-city/resources/views/sections/footer.blade.php ENDPATH**/ ?>