<footer>
    <div class="mx-auto max-w-400 items-center flex flex-col justify-center px-4 pb-14 pt-10 sm:px-6">
        <div class="flex max-w-6xl flex-wrap w-full items-center justify-center md:justify-between gap-6">
            <p class=" text-[#C7B276] uppercase tracking-[0.3em]">
                <?php echo e($footer['find_us']); ?>

            </p>

            <div class="flex items-center gap-8 md:gap-30 text-[#C7B276]/80">
                <?php $__currentLoopData = $footer['social']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e($s['url']); ?>" class="text-[34px] transition hover:text-[#bda66a]"
                        aria-label="<?php echo e($s['label']); ?>" target="_blank" rel="noopener">
                        <?php echo $s['icon']; ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div class="mt-8 h-0.5 w-full bg-[#bda66a]/35"></div>

        <div class="max-w-6xl w-full mt-12 grid gap-10 md:gap-14 text-black/55 lg:grid-cols-4 max-md:text-center">
            <div class="flex items-start justify-center lg:justify-start">
                <a href="<?php echo e($footer['logo_link']); ?>" class="font-serif text-[42px] tracking-[0.18em] text-[#c9b06f]">
                    <img src="<?php echo e($footer['logo']); ?>" alt="CLINICITY" class="h-12" />
                </a>
            </div>

            <div class="space-y-3 leading-6">
                <p>
                    <span class="opacity-75"><?php echo e($footer['whatsapp']['label']); ?></span>
                    <a class="hover:text-black/80 pl-2 font-medium" href="<?php echo e($footer['whatsapp']['url']); ?>">
                        <i class="fa-brands fa-whatsapp"></i>
                        <span class="ml-2">
                            <?php echo e($footer['whatsapp']['phone_text']); ?></span></a>
                </p>

                <p>
                    <a class="hover:text-black/70 font-medium"
                        href="mailto:<?php echo e($footer['email']['url']); ?>"><?php echo e($footer['email']['url']); ?></a>
                </p>

                <p class="font-medium">
                    <?php echo e($footer['address']['text']); ?>

                </p>
            </div>

            <div class="space-y-3 leading-6 md:ml-10">
                <?php $__currentLoopData = $footer['quick_links']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p>
                        <a href="<?php echo e($p['url']); ?>" class="hover:text-black/70 transition">
                            <?php echo e($p['label']); ?>

                        </a>
                    </p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="flex flex-col items-center">
                <img src="<?php echo e($footer['qr_code']); ?>" alt="QR Code"
                    class="max-w-30! max-h-30! object-cover mx-auto lg:mx-0" />
                <p class="text-center mt-2 text-sm text-black/50"><?php echo e($footer['qr_code_text']); ?></p>
            </div>
        </div>

        <div class="mt-18 text-center text-black/50 sm:px-6">
            © <?php echo date('Y'); ?> <?php echo e($footer['copyright_text']); ?> <span class="text-[#C7B276]"><i
                    class="<?php echo e($footer['heart_icon_class']); ?>" style="color: #c7b276;"></i></span> <a
                href="<?php echo e($footer['slt_link']); ?>" target="_blank"
                class="hover:text-black/70 transition"><?php echo e($footer['slt_text']); ?></a>
        </div>
    </div>
</footer>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wordpress/wp-content/themes/clin-city/resources/views/sections/footer.blade.php ENDPATH**/ ?>