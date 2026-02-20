<?php $__env->startSection('header'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main class="">
        <div class="px-4 sm:px-6">
            <section class="mx-auto w-full max-w-400 overflow-hidden rounded-none ">
                <div
                    class="flex flex-wrap max-w-7xl mx-auto items-center justify-between gap-3 px-4 py-5 text-black/60 sm:px-6">
                    <div class="flex items-center gap-2">
                        <span class="md:inline-flex items-center gap-6 hidden">
                            <?php $__currentLoopData = $welcome['topbar']['social']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e($item['url']); ?>">
                                    <?php echo $item['icon']; ?>

                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </span>
                    </div>

                    <div class="items-center gap-2 hidden md:flex">
                        <span class="opacity-70 hidden md:flex"><?php echo e($welcome['topbar']['whatsapp_label']); ?></span>
                        <a class="hover:text-black/80 pl-2 text-[30px] md:text-base"
                            href="<?php echo e($welcome['topbar']['whatsapp_tel']); ?>">
                            <i class="fa-brands fa-whatsapp"></i>
                            <span class="ml-2 hidden md:inline-block">
                                <?php echo e($welcome['topbar']['whatsapp_phone_text']); ?></span></a>
                        <a class="px-8 text-[30px] md:text-base" href="<?php echo e($welcome['topbar']['wechat_url']); ?>"
                            target="_blank">
                            <i class="fab fa-weixin"></i></a>
                        <div class="hidden md:inline-block">
                            <span class="opacity-70"><?php echo e($welcome['topbar']['hours_label']); ?></span>
                            <i class="fa-regular fa-clock"></i>
                            <span><?php echo e($welcome['topbar']['hours_text']); ?></span>
                        </div>
                    </div>
                </div>

                <div class="relative mb-10">
                    <div class="absolute inset-0">
                        <img src="<?php echo e($welcome['hero']['bg_image']); ?>" alt="" class="h-full w-full object-cover" />
                    </div>

                    <div
                        class="relative flex min-h-140 flex-col items-center justify-center px-6 pb-10 pt-50 text-center sm:min-h-160">
                        <h1 class="select-none font-serif text-[68px] font-light tracking-[0.22em] text-white drop-shadow-[0_2px_12px_rgba(0,0,0,0.35)]
                   sm:text-[92px] md:text-[120px]"
                            aria-label="CLINICITY">
                            <img src="<?php echo e($welcome['hero']['logo_image']); ?>" alt="CLINICITY"
                                class="h-16 w-auto sm:h-20 md:h-50 mx-auto" />
                        </h1>

                        <p class="mt-12 text-[11px] tracking-[0.35em] text-white/85 sm:text-[26px]">
                            <?php echo e($welcome['hero']['subtitle']); ?>

                        </p>

                        <nav class="mt-40 w-full">
                            <ul
                                class="menu flex flex-wrap items-start justify-center gap-x-6 gap-y-3 text-[11px] tracking-[0.15em] text-white/40">
                                <?php $__currentLoopData = $welcome['treatments_nav']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="max-w-50!">
                                        <a href="<?php echo e($item['url']); ?>"
                                            class="inline-block pb-2 border-b border-transparent hover:border-white hover:text-white transition">
                                            <?php echo e($item['label']); ?>

                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </nav>

                        <div class="mt-12">
                            <a href="<?php echo e($welcome['enter']['url']); ?>" id="enter-site"
                                class="inline-flex items-center justify-center rounded-full uppercase bg-white/90 px-7 py-3 font-medium tracking-[0.2em] text-black/70 backdrop-blur
                     hover:bg-white hover:text-black/80 transition">
                                <?php echo e($welcome['enter']['text']); ?>

                                <span
                                    class="ml-2 inline-flex h-4 w-4 items-center justify-center roundedtext-[10px] leading-none">
                                    <i class="fa-solid fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="relative border-t border-black/10 bg-white px-4 py-3 text-center text-black/50 sm:px-6">
                        © <?php echo date('Y'); ?> - The Central London Clinic Ltd. - D&amp;C with <span
                            class="text-[#C7B276]"><i class="fa-solid fa-heart" style="color: #c7b276;"></i></span> <a
                            href="https://sltmedia.com" target="_blank"><?php echo e($welcome['footer']['brand_text']); ?></a>
                    </div>
                </div>
            </section>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wordpress/wp-content/themes/clin-city/resources/views/welcome-page.blade.php ENDPATH**/ ?>