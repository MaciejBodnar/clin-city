<?php $__env->startSection('header'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $mobileMenuOpen = false;

        $nav = [
            ['label' => 'HOME', 'url' => '/home/'],
            ['label' => 'TREATMENTS', 'url' => '#treatments'],
            ['label' => 'TEAM', 'url' => '/team/'],
            ['label' => 'COLLABORATE', 'url' => '/collaborate/'],
            ['label' => 'GALLERY', 'url' => '/gallery/'],
            ['label' => 'CONTACT', 'url' => '/contact/'],
        ];
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
                $mk(
                    21,
                    'BASIC ROOM',
                    '/basic-room/',
                    20,
                    'Our Basic Room offers a functional and comfortable setting.',
                ),
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

        $ctaUrl = '/book/';
    ?>

    <div>
        <header class="relative m-3 md:m-0">
            <div x-data="{ mobileMenuOpen: false }" @click.away="mobileMenuOpen = false"
                x-effect="document.body.style.overflow = mobileMenuOpen ? 'hidden' : ''" style="--default-overflow: auto;">
                <header class="relative m-3 md:m-0">
                    <div
                        class="flex flex-wrap max-w-7xl mx-auto items-center justify-between gap-3 px-4 py-5 text-black/60 sm:px-6">
                        <div class="flex items-center gap-2 max-md:w-full">
                            <span class="hidden md:inline-flex items-center gap-6">
                                <?php $__currentLoopData = $front['topbar']['social']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e($social['url']); ?>" class="hover:text-black/80">
                                        <i class="<?php echo e($social['icon']); ?>"></i>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </span>
                            <span class="md:hidden flex justify-between w-full items-center">
                                <button @click="mobileMenuOpen = !mobileMenuOpen" class="hover:text-black/75 transition">
                                    <i class="fa-solid fa-bars fa-xl"></i>
                                </button>
                                <span>
                                    <i class="fa-brands fa-whatsapp fa-xl"></i>
                                    <i class="fab fa-weixin fa-xl"></i></span>
                                <a class="bg-[#C7B276] rounded-full px-8 py-2 text-white">
                                    Book now
                                </a>
                            </span>
                        </div>

                        <div class="hidden md:flex items-center gap-2">

                            <span class="opacity-70"><?php echo e($front['topbar']['whatsapp_label']); ?></span>
                            <a class="hover:text-black/80 pl-2" href="tel:<?php echo e($front['topbar']['whatsapp_tel']); ?>">
                                <i class="fa-brands fa-whatsapp"></i>
                                <span class="ml-2">
                                    <?php echo e($front['topbar']['whatsapp_phone']); ?></span></a>
                            <a class="px-8">
                                <i class="fab fa-weixin"></i></a>
                            <span class="opacity-70"><?php echo e($front['topbar']['hours_label']); ?></span>
                            <i class="fa-regular fa-clock"></i>
                            <span><?php echo e($front['topbar']['hours_text']); ?></span>
                        </div>
                    </div>

                    <div x-show="mobileMenuOpen" @click="mobileMenuOpen = false"
                        class="fixed inset-0 z-40 bg-black/30 md:hidden" x-transition style="display: none;">
                    </div>

                    <div x-show="mobileMenuOpen"
                        class="fixed top-0 left-0 z-50 flex flex-col h-screen w-80 bg-white shadow-lg md:hidden"
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
                            <ul class="space-y-1">
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
                            <a href="<?php echo e($front['header']['cta_url']); ?>" @click="mobileMenuOpen = false"
                                class="block w-full rounded-full bg-[#c9b06f] hover:bg-[#c9b06f]/70 px-4 py-3 text-center text-white transition">
                                <?php echo e($front['header']['cta_text']); ?>

                            </a>
                        </div>
                    </div>

                    <div class="mx-auto max-w-400 bg-white flex flex-col items-center relative">
                        <a href="<?php echo e(home_url('/')); ?>">
                            <img src="<?php echo e($front['header']['logo']); ?>" alt="CLINICITY" class="hidden md:block" />
                            <img src="<?php echo e($front['header']['logo_mobile']); ?>" alt="CLINICITY" class="md:hidden" />
                        </a>

                        <div class="w-full max-w-6xl">
                            <div class="hidden md:flex items-center justify-between gap-6 px-4 py-4 w-full sm:px-6">
                                <nav class="">
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
                                                    <div
                                                        class="w-full relative inline-flex items-center py-2 transition hover:text-black/75 justify-center <?php echo e($isCurrent ? 'text-black/75' : ''); ?>">
                                                        <?php echo e($title); ?>

                                                        <?php if($openable): ?>
                                                            <span
                                                                class="items-center absolute -bottom-7 text-[#705F40] left-1/2 hidden group-hover:block group-focus-within:block pt-10 pr-10 <?php echo e($isCurrent ? 'block' : ''); ?>">
                                                                &#9206;
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php else: ?>
                                                    <a href="<?php echo e($url); ?>"
                                                        class="w-full relative inline-flex items-center py-2 transition hover:text-black/75 justify-center <?php echo e($isCurrent ? 'text-black/75' : ''); ?>">
                                                        <?php echo e($title); ?>

                                                        <?php if($openable): ?>
                                                            <span
                                                                class="items-center absolute -bottom-7 text-[#705F40] left-1/2 hidden group-hover:block group-focus-within:block pt-10 pr-10 <?php echo e($isCurrent ? 'block' : ''); ?>">
                                                                &#9206;
                                                            </span>
                                                        <?php endif; ?>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if($openable): ?>
                                                    <div
                                                        class="pointer-events-none absolute inset-x-0 min-w-full left-0 top-full z-50
                                            opacity-0 transition duration-200
                                            group-hover:pointer-events-auto group-hover:opacity-100
                                            group-focus-within:pointer-events-auto group-focus-within:opacity-100">
                                                        <div
                                                            class="w-full border-t-[#705F40] border-b-0 border-x-0 border-2 bg-[#d7cfbf]">
                                                            <div class="mx-auto w-full max-w-6xl px-10 py-10">

                                                                <?php if($k === 'treatments'): ?>
                                                                    <?php $cols = $children[$id] ?? []; ?>
                                                                    <h3
                                                                        class="font-serif mb-8 text-[42px] tracking-[0.08em] text-black/55">
                                                                        TREATMENTS
                                                                    </h3>

                                                                    <div class="grid gap-12 lg:grid-cols-3">
                                                                        <?php $__currentLoopData = $cols; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php
                                                                                $colId = (int) $col->ID;
                                                                                $links = $children[$colId] ?? [];
                                                                            ?>

                                                                            <div>

                                                                                <p
                                                                                    class="text-[13px] font-medium tracking-[0.12em] text-black/55">
                                                                                    <?php echo e($col->title); ?>

                                                                                </p>

                                                                                <ul
                                                                                    class="submenu-item mt-5 space-y-3 text-[14px] tracking-[0.02em] text-black/50">
                                                                                    <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lnk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <li
                                                                                            class="flex items-start gap-3 submenu-item">
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

                                                                        <div class="mt-8 grid gap-10 lg:grid-cols-4">
                                                                            <?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <a href="<?php echo e($b->url); ?>"
                                                                                    class="block">
                                                                                    <p
                                                                                        class="text-[16px] font-semibold tracking-widest text-black/55">
                                                                                        <?php echo e($b->title); ?>

                                                                                    </p>
                                                                                    <p
                                                                                        class="ml-2 mt-3 max-w-[22ch] text-[14px] leading-7 text-black/45">
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


                                <a href="<?php echo e($front['header']['cta_url']); ?>"
                                    class="shrink-0 rounded-full bg-[#c9b06f] hover:bg-[#c9b06f]/70 px-10 py-3 text-white">
                                    <?php echo e($front['header']['cta_text']); ?>

                                </a>
                            </div>
                        </div>
                    </div>
                </header>

                <section class="px-4 sm:px-6 bg-transparent">
                    <div class="mx-auto w-full max-w-400 overflow-hidden">
                        <section id="treatments" class="px-4 pb-16 pt-10 sm:px-6 sm:pb-20 sm:pt-12">
                            <div class="mx-auto max-w-400">
                                <h2 class="text-center font-serif text-[#705F40] text-[44px] sm:text-[55px]">
                                    <?php echo e($front['treatments']['title']); ?>

                                </h2>

                                <div class="mt-10 grid gap-2.5 md:gap-8 sm:mt-13 grid-cols-2 lg:grid-cols-3">
                                    <?php $__currentLoopData = $front['treatments']['cards']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <article class="h-full flex flex-col">
                                            <div class="aspect-video overflow-hidden bg-black/5">
                                                <img src="<?php echo e($card['image']); ?>" alt="<?php echo e($card['title']); ?>"
                                                    class="h-full w-full object-cover" loading="lazy" />
                                            </div>

                                            <div
                                                class="bg-[#DED6C7] px-4 py-5 text-center uppercase tracking-widest flex-1 flex items-center justify-center min-h-12">
                                                <h3
                                                    class="text-[12px] sm:text-[18px] font-thin text-[#705F40] line-clamp-3">
                                                    <?php echo e($card['title']); ?>

                                                </h3>
                                            </div>

                                            <div class="px-6 pb-6 pt-8 text-center hidden sm:block">
                                                <p
                                                    class="mx-auto font-light max-w-[36ch] text-[18px] leading-5 text-black/45">
                                                    <?php echo e($card['text']); ?>

                                                </p>

                                                <a href="<?php echo e($card['url']); ?>"
                                                    class="mt-8 inline-flex items-center justify-center rounded-full border border-[#c9b06f] px-6 py-2 min-w-59 text-[#705F40] hover:bg-[#c9b06f]/10 transition">
                                                    <?php echo e($front['treatments']['button_text']); ?>

                                                </a>
                                            </div>
                                        </article>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </section>
                        <section class="px-4 sm:px-6 items-center flex justify-center">

                            <div class="grid gap-0 lg:grid-cols-2 max-w-7xl">
                                <div class="px-8 py-10 sm:px-10 flex flex-col items-center justify-center">
                                    <div>
                                        <p class="text-[18px] tracking-[0.28em] text-[#C7B276] uppercase">
                                            <?php echo e($front['about']['kicker']); ?>

                                        </p>

                                        <h1
                                            class="mt-5 uppercase font-serif text-[48px] tracking-widest text-[#705F40] sm:text-[40px]">
                                            <?php echo e($front['about']['title']); ?>

                                        </h1>

                                        <div class="mt-7 flex gap-10 md:gap-15">
                                            <div class="w-0.5 bg-[#DED6C7]"></div>
                                            <p class="max-w-95 text-[18px] leading-6 text-[#705F40]">
                                                <?php echo $front['about']['text']; ?>

                                            </p>
                                        </div>
                                    </div>
                                    <a href="<?php echo e($front['about']['cta_url']); ?>"
                                        class="mt-10 rounded-full border border-[#c9b06f] hover:bg-[#c9b06f]/70 hover:text-white hover:cursor-pointer text-nowrap px-6 py-3 text-[#c9b06f] uppercase">
                                        <?php echo e($front['about']['cta_text']); ?>

                                    </a>
                                </div>

                                <div class="bg-white">
                                    <img src="<?php echo e($front['about']['image']); ?>" alt="Clincity Team"
                                        class="h-full w-full object-cover" loading="lazy" />
                                </div>
                            </div>
                        </section>

                        <section class="px-4 pb-12 sm:pt-26 sm:pb-14">
                            <div class="mx-auto max-w-7xl flex flex-col items-center justify-center">
                                <h2
                                    class="text-center font-serif text-[30px] tracking-[0.14em] text-black/55 sm:text-[36px] mt-13 md:mt-0">
                                    <?php echo e($front['reviews']['title']); ?>

                                </h2>

                                <div class="ti-front-reviews mt-10 flex-nowrap">
                                    <?php echo do_shortcode('[trustindex no-registration=google]'); ?>

                                </div>
                                <a href="<?php echo e($front['reviews']['button_url']); ?>"
                                    class="mt-8 inline-flex items-center justify-center rounded-full border border-[#c9b06f] px-6 py-2 min-w-59 text-[#705F40] hover:bg-[#c9b06f]/10 transition">

                                    <?php echo e($front['reviews']['button_text']); ?>

                                </a>

                                <div
                                    class="mt-12 hidden md:flex flex-wrap w-full items-center justify-center gap-x-12 gap-y-6 opacity-80">
                                    <img src="<?php echo e($front['map']['brands_logos']); ?>" alt="Brand Logos" class="" />
                                </div>
                            </div>
                        </section>


                        <section class="px-4 pb-16 pt-10 sm:px-6 sm:pb-20">
                            <div class="mx-auto max-w-7xl">
                                <div class="w-full max-w-6xl mx-auto border border-[#c7b27a] bg-white">
                                    <div class="relative">
                                        <img src="<?php echo e($front['map']['map_image']); ?>" alt="Map"
                                            class="w-full h-65 md:h-80 object-cover" />

                                        <div
                                            class="pointer-events-none absolute inset-x-0 bottom-0 h-24 bg-linear-to-b from-transparent via-white/70 to-white">
                                        </div>
                                    </div>

                                    <div class="bg-white">
                                        <div class="mx-auto w-10/12 border-t border-[#c7b27a]"></div>

                                        <div class="py-10 text-center">
                                            <div class="flex flex-col md:flex-row justify-center items-center gap-3 px-4">
                                                <a href="#"
                                                    class="text-xs uppercase tracking-[0.35em] text-[#c7b27a] font-medium">
                                                    <?php echo e($front['map']['address_label']); ?>

                                                </a>
                                                <span class="text-sm text-[#6b6b6b]">
                                                    <?php echo e($front['map']['address_text']); ?>

                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </section>
                    </div>
                </section>
                <section class="hidden md:block px-4 pb-16 pt-10 sm:px-6 sm:pb-20">
                    <div class="mx-auto max-w-5xl">
                        <div class="grid grid-cols-1 items-start gap-20 md:grid-cols-2">
                            <div>
                                <h2 class="text-[#6a5a40] uppercase text-4xl md:text-5xl font-light tracking-wide">
                                    <?php echo e($front['opening_hours']['title']); ?>

                                </h2>

                                <div class="mt-6 uppercase text-[#c7b27a] text-xs tracking-[0.45em]">
                                    <?php echo e($front['opening_hours']['subtitle']); ?>

                                </div>
                            </div>

                            <div class="w-full">
                                <dl class="ml-10 space-y-2 text-[#7a6b55]">
                                    <?php $__currentLoopData = $front['opening_hours']['hours']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="grid grid-cols-2 gap-6 justify-between">
                                            <dt class="text-base font-normal">
                                                <?php echo e($row['day']); ?>

                                            </dt>
                                            <dd class="text-base font-normal text-right">
                                                <?php echo e($row['time']); ?>

                                            </dd>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </dl>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
            <style>
                .ti-front-reviews,
                .ti-front-reviews .ti-widget,
                .ti-front-reviews .ti-widget-container,
                .ti-front-reviews .ti-reviews-container,
                .ti-front-reviews .ti-reviews-container-wrapper {
                    width: 100% !important;
                    max-width: 100% !important;
                    justify-content: center !important;
                    flex-wrap: nowrap !important;
                }

                .ti-widget.ti-goog .ti-review-item>.ti-inner,
                .ti-widget.ti-goog .ti-load-more-reviews-container .ti-load-more-reviews-button {
                    background: transparent !important;
                }

                .ti-front-reviews .ti-widget-container.ti-col-4,
                .ti-front-reviews .ti-widget-container.ti-col-3,
                .ti-front-reviews .ti-widget-container.ti-col-2,
                .ti-front-reviews .ti-widget-container.ti-col-1 {
                    display: grid !important;
                    gap: 4.5rem !important;
                    align-items: start !important;
                    justify-items: stretch !important;
                }

                /* Mobile Carousel */
                @media (max-width: 1024px) {

                    .ti-front-reviews .ti-widget-container,
                    .ti-front-reviews .ti-widget-container.ti-col-1,
                    .ti-front-reviews .ti-widget-container.ti-col-2,
                    .ti-front-reviews .ti-widget-container.ti-col-3,
                    .ti-front-reviews .ti-widget-container.ti-col-4 {
                        display: flex !important;
                        flex-direction: row !important;
                        flex-wrap: nowrap !important;
                        overflow-x: auto !important;
                        overflow-y: hidden !important;
                        scroll-snap-type: x mandatory !important;
                        gap: 0 !important;
                        scroll-behavior: smooth !important;
                        -webkit-overflow-scrolling: touch !important;
                        scroll-padding: 0 !important;
                        padding-bottom: 0 !important;
                        width: 100% !important;
                        align-items: stretch !important;
                        grid-template-columns: none !important;
                    }

                    /* Hide scrollbar */
                    .ti-front-reviews .ti-widget-container::-webkit-scrollbar {
                        height: 3px !important;
                    }

                    .ti-front-reviews .ti-review-item .ti-inner {
                        width: 100% !important;
                        display: flex !important;
                        flex-direction: column !important;
                        white-space: normal !important;
                    }
                }

                /* SHOW ONLY FIRST 3 REVIEWS */
                .ti-front-reviews .ti-review-item:nth-child(n+4) {
                    display: none !important;
                }

                /* Remove the "card" look */
                .ti-front-reviews .ti-review-item,
                .ti-front-reviews .ti-review-item .ti-inner {
                    background: transparent !important;
                    border: 0 !important;
                    border-radius: 0 !important;
                    box-shadow: none !important;
                    padding: 0 !important;
                    margin: 0 !important;
                }

                /* Hide platform icon, avatar, date, verified, read more, load more */
                .ti-front-reviews .ti-platform-icon,
                .ti-front-reviews .ti-profile-img,
                .ti-front-reviews .ti-date,
                .ti-front-reviews .ti-verified-review,
                .ti-front-reviews .ti-verified-platform,
                .ti-front-reviews .ti-read-more,
                .ti-front-reviews .ti-load-more-reviews-container {
                    display: none !important;
                }

                /* Stars centered, gold-ish */
                .ti-front-reviews .ti-stars {
                    display: flex !important;
                    justify-content: start !important;
                    gap: .5rem !important;
                    margin: 0 0 1.75rem 0 !important;
                    font-style: #C7B276 !important;
                }

                .ti-front-reviews .ti-stars .ti-star {
                    width: 20px !important;
                    height: 20px !important;
                    opacity: 1 !important;
                }

                /* Review text block with the vertical line */
                .ti-front-reviews .ti-review-text-container {
                    position: relative !important;
                    padding-left: 2.2rem !important;
                    max-width: 26rem !important;
                    margin: 0 auto !important;
                    height: auto !important;
                }

                .ti-widget.ti-goog .ti-review-item>.ti-inner,
                .ti-widget.ti-goog .ti-load-more-reviews-container .ti-load-more-reviews-button {
                    border: none !important;
                }

                .ti-inner {
                    position: relative !important;
                    min-height: 250px !important;
                }

                .ti-review-header {
                    position: absolute !important;
                    top: 80% !important;
                    width: 100% !important;
                }

                .ti-name {
                    font-size: 18px !important;
                }

                .ti-widget.ti-goog .ti-col-4 .ti-review-item {
                    min-width: 350px !important;
                    min-height: 250px !important;
                    overflow: hidden !important;
                }

                .ti-front-reviews .ti-review-text-container::before {
                    content: "" !important;
                    position: absolute !important;
                    left: .75rem !important;
                    top: .2rem !important;
                    bottom: .2rem !important;
                    width: 1px !important;
                    background: rgba(0, 0, 0, .18) !important;
                }

                /* Text styling */
                .ti-front-reviews .ti-review-content {
                    font-size: 16px !important;
                    line-height: 1.9 !important;
                    color: rgba(0, 0, 0, .55) !important;
                    height: auto !important;
                    max-height: none !important;
                    overflow: visible !important;
                }

                /* Put NAME at the bottom like your design */
                .ti-front-reviews .ti-review-header {
                    display: flex !important;
                    justify-content: center !important;
                }

                .ti-front-reviews .ti-profile-details {
                    text-align: center !important;
                }

                .ti-front-reviews .ti-name {
                    font-size: 12px !important;
                    letter-spacing: .32em !important;
                    text-transform: uppercase !important;
                    color: rgba(0, 0, 0, .55) !important;
                }

                /* Remove extra spacing from plugin */
                .ti-front-reviews .ti-review-item .ti-inner>* {
                    margin-left: 0 !important;
                    margin-right: 0 !important;
                }
            </style>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wordpress/wp-content/themes/clin-city/resources/views/front-page.blade.php ENDPATH**/ ?>