<?php $__env->startSection('content'); ?>
    <div>
        <section class="">
            <div class="mx-auto w-full max-w-400 overflow-hidden bg-white pt-5">

                <div class="grid gap-0 lg:grid-cols-2">
                    <div class="bg-white px-8 py-10 sm:px-10 flex flex-col items-center justify-center">
                        <div>
                            <p class="text-[18px] tracking-[0.28em] text-[#C7B276] uppercase">
                                <?php echo e($rooms['hero']['kicker']); ?>

                            </p>

                            <h1
                                class="mt-3 uppercase font-serif text-[32px] md:text-[48px] tracking-widest text-[#705F40] sm:text-[40px]">
                                <?php echo e($rooms['hero']['title']); ?>

                            </h1>

                            <div class="mt-5 flex gap-15">
                                <div class="w-0.5 bg-[#DED6C7]"></div>
                                <p class="max-w-95 text-[18px] tracking-wide leading-8 text-[#705F40]">
                                    <?php echo e($rooms['hero']['description']); ?>

                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white">
                        <div class="">
                            <img src="<?php echo e($rooms['hero']['image']); ?>" alt="Clincity Team" class="h-full w-full object-cover"
                                loading="lazy" />
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
                            <?php echo e($rooms['sections']['left_title']); ?>

                        </h2>
                        <div class="mt-10 h-px w-full bg-black/10"></div>

                        <div class="mt-10 grid gap-10 sm:grid-cols-2">
                            <div>
                                <p class="text-[18px] font-medium tracking-[0.12em] text-black/55">
                                    <?php echo e($rooms['sections']['left_col_1_title']); ?></p>
                                <ul class="menu mt-4 space-y-2 text-[18px] text-black/45">
                                    <?php $__currentLoopData = $rooms['lists']['assets']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="flex gap-3 items-center">
                                            <span class="inline-block h-1 w-1 rounded-full bg-[#c9b06f]"></span>
                                            <span><?php echo e($item); ?></span>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>

                            <div>
                                <p class="text-[18px] font-medium tracking-[0.12em] text-black/55">
                                    <?php echo e($rooms['sections']['left_col_2_title']); ?></p>
                                <ul class="menu mt-4 space-y-2 text-[18px] text-black/45">
                                    <?php $__currentLoopData = $rooms['lists']['key_features']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="flex gap-3 items-center">
                                            <span class="inline-block h-1 w-1 rounded-full bg-[#c9b06f]"></span>
                                            <span><?php echo e($item); ?></span>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h2 class="font-serif text-[39px] text-black/60 sm:text-[39px]">
                            <?php echo e($rooms['sections']['right_title']); ?>

                        </h2>
                        <div class="mt-10 h-px w-full bg-black/10"></div>

                        <div class="mt-10 grid gap-10 sm:grid-cols-2">
                            <div>
                                <p class="text-[18px] font-medium tracking-[0.12em] text-black/55">
                                    <?php echo e($rooms['sections']['right_col_1_title']); ?></p>
                                <ul class="menu mt-4 space-y-2 text-[18px] text-black/45">
                                    <?php $__currentLoopData = $rooms['lists']['additional_facilities']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="flex gap-3 items-center">
                                            <span class="inline-block h-1 w-1 rounded-full bg-[#c9b06f]"></span>
                                            <span><?php echo e($item); ?></span>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>

                            <div>
                                <p class="text-[18px] font-medium tracking-[0.12em] text-black/55">
                                    <?php echo e($rooms['sections']['right_col_2_title']); ?></p>
                                <ul class="menu mt-4 space-y-2 text-[18px] text-black/45">
                                    <?php $__currentLoopData = $rooms['lists']['additional_services']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="flex gap-3 items-center">
                                            <span class="inline-block h-1 w-1 rounded-full bg-[#c9b06f]"></span>
                                            <span><?php echo e($item); ?></span>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-24 flex justify-center">
                    <a href="<?php echo e($rooms['cta']['button_url']); ?>"
                        class="min-w-71.25 rounded-full text-center bg-[#c9b06f] uppercase hover:bg-[#c9b06f]/70 px-10 py-3 text-white">
                        <?php echo e($rooms['cta']['button_text']); ?>

                    </a>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wordpress/wp-content/themes/clin-city/resources/views/rooms-template.blade.php ENDPATH**/ ?>