<?php $__env->startSection('content'); ?>
    <div class="relative">
        <section class="">
            <div class="mx-auto w-full max-w-400 overflow-hidden bg-white pt-5">

                <div class="grid gap-0 lg:grid-cols-2">
                    <div class="bg-white px-8 py-10 sm:px-10 flex flex-col items-center justify-center">
                        <div>
                            <p class="text-[18px] tracking-[0.28em] text-[#C7B276] uppercase">
                                <?php echo e($treatment['hero']['title']); ?>

                            </p>

                            <h1
                                class="mt-3 uppercase font-serif text-[32px] md:text-[48px] tracking-widest text-[#705F40] sm:text-[40px]">
                                <?php echo e($treatment['hero']['kicker']); ?>

                            </h1>

                            <div class="mt-5 flex gap-10 md:gap-15">
                                <div class="w-0.5 bg-[#DED6C7]"></div>
                                <p class="max-w-95 text-[18px] leading-6 text-[#705F40]">
                                    <?php echo e($treatment['hero']['text']); ?>

                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white">
                        <div class="aspect-video sm:aspect-3/2 lg:aspect-video">
                            <img src="<?php echo e($treatment['hero']['image']); ?>" alt="<?php echo e($treatment['hero']['title']); ?>"
                                class="h-full w-full object-cover" loading="lazy" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="px-4 pb-12 pt-10 sm:px-6 sm:pb-14">
            <div class="mx-auto max-w-7xl space-y-10">
                <?php $__currentLoopData = $treatment['sections']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="grid items-stretch md:grid-cols-2 gap-8 p-8 sm:p-10">
                        <div class="h-full">
                            <div class="h-full min-h-55 overflow-hidden bg-black/5 sm:min-h-65  <?php echo e($s['image_side']); ?>">
                                <img src="<?php echo e($s['image']); ?>" alt="" class="h-full w-full object-cover"
                                    loading="lazy">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <h2 class="font-serif text-[39px] tracking-[0.06em] text-black/60 sm:text-[22px]">
                                <?php echo e($s['heading'] ?? ''); ?>

                            </h2>

                            <div class="mt-4 h-px w-full bg-black/10"></div>

                            <div class="mt-6 text-[18px] leading-6 text-black/45">
                                <?php if($s['content_type'] === 'bullets'): ?>
                                    <ul class="space-y-4">
                                        <?php $__currentLoopData = $s['bullets'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <span class="font-medium text-black/55"><?php echo e($b['title'] ?? ''); ?>:</span>
                                                <span><?php echo e($b['text'] ?? ''); ?></span>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                <?php elseif($s['content_type'] === 'ordered'): ?>
                                    <ol class="space-y-3 pl-5">
                                        <?php $__currentLoopData = $s['ordered'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="list-decimal">
                                                <?php echo e($line); ?>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ol>
                                <?php else: ?>
                                    <div
                                        class="prose prose-sm max-w-none prose-p:leading-6 prose-p:text-black/45 prose-li:text-black/45 prose-strong:text-black/55">
                                        <?php echo $s['wysiwyg'] ?? ''; ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>

        <section class="px-4 pb-12 sm:px-6 sm:pb-14">
            <div class="mx-auto max-w-400 overflow-hidden bg-[#efeae2] flex justify-center">
                <div class="grid gap-10 px-8 py-10 sm:px-10 sm:py-12 lg:grid-cols-3 max-w-7xl">
                    <?php $__currentLoopData = $treatments['info_3col'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex flex-col justify-between">
                            <h3 class="font-serif text-[39px] tracking-[0.06em] text-black/60">
                                <?php echo e($col['title'] ?? ''); ?>

                            </h3>
                            <div>
                                <div class="mt-4 h-px w-full bg-white"></div>

                                <div class="mt-6 whitespace-pre-line text-[18px] leading-6 text-black/45">
                                    <?php echo e($col['text'] ?? ''); ?>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>

        <section class="px-4 pb-16 sm:px-6 sm:pb-20">
            <div class="mx-auto max-w-7xl space-y-20">
                <?php $__currentLoopData = $treatments['pricing_blocks']['blocks']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $cols = $block['columns'] ?? ['single' => 'SINGLE'];
                        $rows = $block['rows'] ?? [];
                        $colKeys = array_keys($cols);
                        $colCount = count($colKeys);

                        $colW = '9rem';
                        $rowH = '2.2rem';
                    ?>
                    <div class="-mx-4 overflow-x-auto px-4">
                        <div class="min-w-225">
                            <div class="grid items-start gap-10"
                                style="grid-template-columns: minmax(0,1fr) repeat(<?php echo e($colCount); ?>, <?php echo e($colW); ?>);">
                                <h2 class="w-full font-serif text-[44px] tracking-[0.04em] text-black/60">
                                    <?php echo e($block['title'] ?? ''); ?>

                                </h2>

                                <?php $__currentLoopData = $cols; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div
                                        class="bg-[#f2efe9] pb-10 pt-8 text-center text-[16px] tracking-[0.08em] text-black/55">
                                        <?php echo e($label); ?>

                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <div class="h-px w-full bg-black/10"></div>

                            <div class="grid gap-10"
                                style="grid-template-columns: minmax(0,1fr) repeat(<?php echo e($colCount); ?>, <?php echo e($colW); ?>);">

                                <div class="space-y-2 pt-6 text-[18px] text-black/45">
                                    <?php $__currentLoopData = $block['rows']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div style="min-height: 50px; line-height: 50px;">
                                            <?php echo e($r['label'] ?? ''); ?>

                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                                <?php $__currentLoopData = $colKeys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="bg-[#f2efe9] px-6 py-6">
                                        <div class="space-y-2 text-center text-[18px] text-black/55">
                                            <?php $__currentLoopData = $block['rows']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div style="min-height: 50px; line-height: 50px;">
                                                    <?php echo e($r[$k] ?? ''); ?>

                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wordpress/wp-content/themes/clin-city/resources/views/treatments-template.blade.php ENDPATH**/ ?>