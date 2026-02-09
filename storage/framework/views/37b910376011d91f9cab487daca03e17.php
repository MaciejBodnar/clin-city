<!doctype html>
<html <?php (language_attributes()); ?>>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php (do_action('get_header')); ?>
    <?php (wp_head()); ?>

    <link rel="stylesheet" href="https://use.typekit.net/avj8yvl.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body <?php (body_class()); ?>
    style="background-image: url('<?php echo e(get_template_directory_uri()); ?>/resources/images/golden-background-with-palm-tree(1).png'); background-attachment: fixed; background-size: cover; background-position: center;">
    <?php (wp_body_open()); ?>

    <div id="app">
        <?php $__env->startSection('header'); ?>
            <?php echo $__env->make('sections.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php echo $__env->yieldSection(); ?>

        <main id="main" class="main">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
        <?php ($route = get_query_var('clin_route')); ?>
        <?php if($route !== 'welcome'): ?>
            <?php echo $__env->make('sections.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endif; ?>


    </div>

    <?php (do_action('get_footer')); ?>
    <?php (wp_footer()); ?>
</body>

</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wordpress/wp-content/themes/clin-city/resources/views/layouts/app.blade.php ENDPATH**/ ?>