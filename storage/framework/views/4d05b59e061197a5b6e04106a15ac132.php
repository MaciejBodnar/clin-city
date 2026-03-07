<?php

    $locations = get_nav_menu_locations();
    $menuId = $locations['primary_navigation'] ?? null;
    $menuItems = $menuId ? wp_get_nav_menu_items($menuId) : [];

    if (empty($menuItems)) {
        $mk = function ($id, $title, $url, $parent = 0, $desc = '') {
            return (object) [
                'ID' => $id,
                'title' => $title,
                'url' => $url,
                'menu_item_parent' => $parent,
                'description' => $desc,
                'current' => false,
                'current_item_parent' => false,
                'current_item_ancestor' => false,
            ];
        };
        $menuItems = [
            $mk(1, 'HOME', '/home/'),
            $mk(10, 'TREATMENTS', '/treatments/'),

            $mk(11, 'FACE', '#', 10),
            $mk(111, 'Hydro2 Facial', '/treatments/hydro2-facial/', 11),
            $mk(112, 'Skin Booster', '/treatments/skin-booster/', 11),
            $mk(113, 'Mesotherapy + Polynucleotides', '/treatments/mesotherapy-polynucleotides/', 11),
            $mk(114, 'Chemical Peels', '/treatments/chemical-peels/', 11),
            $mk(115, 'Anti-wrinkle injection', '/treatments/anti-wrinkle/', 11),
            $mk(116, 'Dermal filler', '/treatments/dermal-filler/', 11),
            $mk(117, 'Dermalux Led', '/treatments/dermalux-led/', 11),
            $mk(118, 'Visia Skin Analysis', '/treatments/visia-skin-analysis/', 11),

            $mk(12, 'FACE AND BODY', '#', 10),
            $mk(121, 'Ultherapy Prime', '/treatments/ultherapy-prime/', 12),
            $mk(122, 'Thermage FLX', '/treatments/thermage-flx/', 12),
            $mk(123, 'BBL Laser', '/treatments/bbl-laser/', 12),
            $mk(124, 'Halo laser', '/treatments/halo-laser/', 12),
            $mk(125, 'Clear + Brilliant Laser', '/treatments/clear-brilliant/', 12),
            $mk(126, 'SkinPen Microneedling + exosomes', '/treatments/skinpen-exosomes/', 12),
            $mk(127, 'PRP', '/treatments/prp/', 12),
            $mk(128, 'HIFU', '/treatments/hifu/', 12),

            $mk(13, 'BODY', '#', 10),
            $mk(131, 'Lipolysis injection', '/treatments/lipolysis-injection/', 13),
            $mk(132, 'BBL Hair Reduction', '/treatments/bbl-hair-reduction/', 13),
            $mk(133, '3D Lipo', '/treatments/3d-lipo/', 13),
            $mk(134, 'IV Drip Therapy', '/treatments/iv-drip-therapy/', 13),

            $mk(2, 'TEAM', '/team/'),

            $mk(20, 'COLLABORATE', '/collaborate/'),
            $mk(21, 'BASIC ROOM', '/basic-room/', 20, 'Our Basic Room offers a functional and comfortable setting.'),
            $mk(22, 'ESSENTIAL ROOM', '/essential-room/', 20, 'The Essential Room provides all the core elements.'),
            $mk(23, 'PRIMARY ROOM', '/primary-room/', 20, 'Our Primary Room offers a fully equipped environment.'),
            $mk(24, 'BOOK THE ROOM', '/book-the-room/', 20, 'Fill out the form to book your room.'),

            $mk(3, 'GALLERY', '/gallery/'),
            $mk(4, 'CONTACT', '/contact/'),
        ];
    }

    $children = [];
    $itemsById = [];

    foreach ($menuItems as $it) {
        $itemsById[$it->ID] = $it;
        $parent = (int) $it->menu_item_parent;
        if (!isset($children[$parent])) {
            $children[$parent] = [];
        }
        $children[$parent][] = $it;
    }

    $top = $children[0] ?? [];
    $hasChildren = fn($id) => !empty($children[(int) $id]);

    $keyFromTitle = function ($title) {
        $k = strtolower(trim($title));
        $k = preg_replace('/\s+/', '-', $k);
        $k = preg_replace('/[^a-z0-9\-]/', '', $k);
        return $k;
    };
?>

<header class="relative" x-data="{ mobileMenuOpen: false }" @click.away="mobileMenuOpen = false"
    x-effect="document.body.style.overflow = mobileMenuOpen ? 'hidden' : ''">
    <div class="flex flex-wrap max-w-7xl mx-auto items-center justify-between gap-3 px-4 py-5 text-black/60 sm:px-6">
        <div class="md:flex items-center gap-2 hidden">
            <span class="inline-flex items-center gap-6">
                <?php $__currentLoopData = $header['social'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e($s['url']); ?>"><?php echo $s['icon']; ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </span>
        </div>
        <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden hover:text-black/75 transition">
            <i class="fa-solid fa-bars fa-xl"></i>
        </button>

        <div class="hidden md:flex items-center gap-2">

            <span class="opacity-70"><?php echo e($header['whatsapp']['label']); ?></span>
            <a class="hover:text-black/80 pl-2" href="<?php echo e($header['whatsapp']['url']); ?>">
                <i class="fa-brands fa-whatsapp"></i>
                <span class="ml-2"><?php echo e($header['whatsapp']['phone_text']); ?></span></a>
            <a class="px-8" href="<?php echo e($header['wechat']['url']); ?>">
                <i class="<?php echo e($header['wechat']['icon_class']); ?>"></i></a>
            <span class="opacity-70"><?php echo e($header['hours']['label']); ?></span>
            <i class="fa-regular fa-clock"></i>
            <span><?php echo e($header['hours']['text']); ?></span>
        </div>
    </div>
    <div class="mx-auto max-w-400 bg-white flex flex-col items-center relative">
        <div class="px-4 py-8 text-center sm:px-6">
            <a href="<?php echo e($header['logo_link']); ?>"
                class="inline-block font-serif text-[42px] tracking-[0.18em] text-[#c9b06f]">
                <img src="<?php echo e($header['logo']); ?>" alt="CLINICITY" class="h-12 w-auto mx-auto" />
            </a>
        </div>

        <div x-show="mobileMenuOpen" @click="mobileMenuOpen = false" class="fixed inset-0 z-40 bg-black/30 md:hidden"
            x-transition style="display: none;">
        </div>

        <div x-show="mobileMenuOpen"
            class="fixed top-0 left-0 z-50 flex flex-col h-full w-80 bg-white shadow-lg md:hidden"
            x-transition:enter="transition ease-out duration-200" x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" @click.stop
            style="display: none;">

            <div class="flex items-center justify-between border-b border-black/10 px-6 py-4 shrink-0">
                <h2 class="text-lg font-semibold text-black/60">Menu</h2>
                <button @click="mobileMenuOpen = false" class="text-black/60 hover:text-black/80">
                    <i class="fa-solid fa-times fa-xl"></i>
                </button>
            </div>

            <nav class="p-6 overflow-y-auto flex-1">
                <ul class="menu space-y-1">
                    <?php $__currentLoopData = $top; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $id = (int) $item->ID;
                            $title = $item->title;
                            $url = $item->url;
                            $openable = $hasChildren($id);
                            $itemChildren = $children[$id] ?? [];
                        ?>

                        <?php if($openable): ?>
                            <li x-data="{ open: false }" class="border-b border-black/5">
                                <button @click="open = !open"
                                    class="flex w-full items-center justify-between px-4 py-3 text-black/60 hover:bg-black/5 transition rounded">
                                    <span class="font-medium"><?php echo e($title); ?></span>
                                    <i class="fa-solid fa-chevron-right" :class="{ 'rotate-90': open }"
                                        class="transition"></i>
                                </button>

                                <div x-show="open" class="bg-black/2.5 pl-4">
                                    <ul class="space-y-1 py-2">
                                        <?php $__currentLoopData = $itemChildren; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $childId = (int) $child->ID; ?>
                                            <li>
                                                <a href="<?php echo e($child->url); ?>"
                                                    class="block px-4 py-2 text-sm text-black/50 hover:text-black/75 transition">
                                                    <?php echo e($child->title); ?>

                                                </a>

                                                <?php $subChildren = $children[$childId] ?? []; ?>
                                                <?php if(!empty($subChildren)): ?>
                                                    <ul class="ml-4 space-y-1 border-l border-black/10 pl-4">
                                                        <?php $__currentLoopData = $subChildren; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li>
                                                                <a href="<?php echo e($sub->url); ?>"
                                                                    class="block py-1 text-xs text-black/40 hover:text-black/60 transition">
                                                                    <?php echo e($sub->title); ?>

                                                                </a>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                <?php endif; ?>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </li>
                        <?php else: ?>
                            <li>
                                <a href="<?php echo e($url); ?>"
                                    class="block px-4 py-3 font-medium text-black/60 hover:bg-black/5 transition rounded"
                                    @click="mobileMenuOpen = false">
                                    <?php echo e($title); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </nav>

            <div class="border-t border-black/10 p-6 space-y-3 shrink-0">
                <a href="<?php echo e($header['button_url']); ?>" @click="mobileMenuOpen = false"
                    class="block w-full rounded-full bg-[#c9b06f] hover:bg-[#c9b06f]/70 px-4 py-3 text-center text-white transition">
                    <?php echo e($header['button_text']); ?>

                </a>
            </div>
        </div>

        <div class="w-full max-w-6xl static">
            <div class="static hidden md:flex items-center justify-between gap-6 px-4 w-full sm:px-6">
                <nav class="static">
                    <ul class="menu flex flex-wrap items-center gap-x-8 gap-y-2 uppercase text-black/55">
                        <?php $__currentLoopData = $top; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $id = (int) $item->ID;
                                $title = $item->title;
                                $url = $item->url;
                                $k = $keyFromTitle($title);
                                $openable = $hasChildren($id);

                                $isCurrent =
                                    !empty($item->current) ||
                                    !empty($item->current_item_ancestor) ||
                                    !empty($item->current_item_parent);
                            ?>

                            <li class="group static">
                                <?php if($k === 'treatments' || $k === 'collaborate'): ?>
                                    <div href="<?php echo e($url); ?>"
                                        class="relative inline-flex items-center py-8 transition hover:text-black/75 <?php echo e($isCurrent ? 'text-black/75' : ''); ?>">
                                        <?php echo e($title); ?>


                                        <?php if($openable): ?>
                                            <span
                                                class="absolute -bottom-2 text-[#705F40] left-1/2 hidden -translate-x-1/2 group-hover:block group-focus-within:block <?php echo e($isCurrent ? 'block' : ''); ?>">
                                                &#9206;
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                <?php else: ?>
                                    <a href="<?php echo e($url); ?>"
                                        class="relative inline-flex items-center py-8 transition hover:text-black/75 <?php echo e($isCurrent ? 'text-black/75' : ''); ?>">
                                        <?php echo e($title); ?>


                                        <?php if($openable): ?>
                                            <span
                                                class="absolute -bottom-2 text-[#705F40] left-1/2 hidden -translate-x-1/2 group-hover:block group-focus-within:block <?php echo e($isCurrent ? 'block' : ''); ?>">
                                                &#9206;
                                            </span>
                                        <?php endif; ?>
                                    </a>
                                <?php endif; ?>

                                <?php if($openable): ?>
                                    <div
                                        class="pointer-events-none absolute inset-x-0 w-full left-0 top-full z-50
                                            opacity-0 transition duration-200
                                            group-hover:pointer-events-auto group-hover:opacity-100
                                            group-focus-within:pointer-events-auto group-focus-within:opacity-100">
                                        <div
                                            class="w-full border-t-[#705F40] border-b-0 border-x-0 border-2 bg-[#d7cfbf]">
                                            <div class="mx-auto w-full max-w-6xl px-10 py-10">

                                                <?php if($k === 'treatments'): ?>
                                                    <?php $cols = $children[$id] ?? []; ?>

                                                    <div class="grid gap-12 lg:grid-cols-3">
                                                        <?php $__currentLoopData = $cols; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                                $colId = (int) $col->ID;
                                                                $links = $children[$colId] ?? [];
                                                            ?>

                                                            <div>
                                                                <p
                                                                    class="text-[13px] font-semibold tracking-[0.12em] text-black/55">
                                                                    <?php echo e($col->title); ?>

                                                                </p>

                                                                <ul
                                                                    class="submenu-item mt-5 space-y-3 text-[14px] tracking-[0.02em] text-black/50">
                                                                    <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lnk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <li class="flex items-start gap-3 submenu-item">
                                                                            <a href="<?php echo e($lnk->url); ?>"
                                                                                class="hover:text-black/70 transition">
                                                                                <?php echo e($lnk->title); ?>

                                                                            </a>
                                                                        </li>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ul>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                <?php elseif($k === 'collaborate'): ?>
                                                    <?php $blocks = $children[$id] ?? []; ?>

                                                    <div>
                                                        <h3
                                                            class="font-serif text-[42px] tracking-[0.08em] text-black/55">
                                                            COLLABORATE
                                                        </h3>

                                                        <div class="mt-8 flex flex-col gap-6">
                                                            <?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <a href="<?php echo e($b->url); ?>"
                                                                    class="flex gap-4 items-center">
                                                                    <p
                                                                        class="text-[16px] font-semibold tracking-widest text-black/55">
                                                                        <?php echo e($b->title); ?>

                                                                    </p>
                                                                    <p class="text-[14px] leading-7 text-black/45">
                                                                        <?php echo e($b->description); ?>

                                                                    </p>
                                                                </a>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <?php $subs = $children[$id] ?? []; ?>

                                                    <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3">
                                                        <?php $__currentLoopData = $subs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div>
                                                                <a href="<?php echo e($sub->url); ?>"
                                                                    class="text-[13px] font-medium tracking-[0.12em] text-black/55 hover:text-black/70">
                                                                    <?php echo e($sub->title); ?>

                                                                </a>

                                                                <?php $subChildren = $children[(int)$sub->ID] ?? []; ?>
                                                                <?php if(!empty($subChildren)): ?>
                                                                    <ul
                                                                        class="mt-4 space-y-2 text-[14px] text-black/45">
                                                                        <?php $__currentLoopData = $subChildren; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <li>
                                                                                <a href="<?php echo e($sc->url); ?>"
                                                                                    class="hover:text-black/70 transition">
                                                                                    <?php echo e($sc->title); ?>

                                                                                </a>
                                                                            </li>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </ul>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </nav>


                <a href="<?php echo e($header['button_url']); ?>"
                    class="shrink-0 rounded-full bg-[#c9b06f] hover:bg-[#c9b06f]/70 px-10 py-3 text-white">
                    <?php echo e($header['button_text']); ?>

                </a>
            </div>
        </div>
    </div>
</header>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wordpress/wp-content/themes/clin-city/resources/views/sections/header.blade.php ENDPATH**/ ?>