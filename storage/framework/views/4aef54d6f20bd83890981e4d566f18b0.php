<?php $__env->startSection('content'); ?>
    <section>
        <div class="mx-auto max-w-7xl px-4 pb-20 pt-12 sm:px-6 sm:pt-14">
            <div class="bg-transparent">
                <h1 class="font-serif text-[42px] tracking-widest uppercase text-black/60 sm:text-[56px]">
                    <?php echo e($contact['page']['title']); ?>

                </h1>

                <div
                    class="w-full mt-6 bg-[#DED6C7] flex flex-col md:flex-row md:items-center justify-center px-6 py-10 gap-10 text-[#705F40]">
                    <span class="flex gap-2 items-center">
                        <a href="<?php echo e($contact['info']['whatsapp_url']); ?>" class="flex gap-2 items-center">
                            <p>Whatsapp us</p>
                            <i class="fa-brands fa-whatsapp"></i>
                            <p><?php echo e($contact['info']['number']); ?></p>
                        </a>
                    </span>
                    <span class="flex gap-2 items-center">
                        <a href="mailto:<?php echo e($contact['info']['email']); ?>" class="flex gap-2 items-center">
                            <i class="fa-solid fa-envelope-open"></i>
                            <p><?php echo e($contact['info']['email']); ?></p>
                        </a>
                    </span>
                    <span class="flex gap-2 items-center">
                        <a href="<?php echo e($contact['info']['address_url']); ?>" target="_blank" class="flex gap-2 items-center">
                            <i class="fa-solid fa-location-dot"></i>
                            <p><?php echo e($contact['info']['address']); ?></p>
                        </a>
                    </span>
                </div>
                <h2 class="font-serif text-[38px] mt-10 tracking-widest uppercase text-black/60">
                    <?php echo e($contact['form']['title']); ?>

                </h2>
                <div class="mt-8">
                    <div class="contact-form-skin">
                        <?php echo do_shortcode('[contact-form-7 id="98d3aa4" title="Contact"]'); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-15 md:px-20 md-10">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13088.011403573828!2d-0.13899790384304!3d51.51403162242169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761bd2cb10f481%3A0x60eda2c124c8234f!2sClinicity%20London%20-%20Aesthetic%20Clinic!5e0!3m2!1sen!2sen!4v1771756895800!5m2!1sen!2sen"
            width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>

    <style>
        .contact-form-skin :is(input[type="text"], input[type="email"], input[type="tel"], input[type="date"], select, textarea) {
            width: 100%;
            background: transparent;
            border: 0;
            border-bottom: 1px solid rgba(0, 0, 0, .14);
            border-left: 1px solid rgba(0, 0, 0, .14);
            padding: 14px 14px 14px 14px;
            font-size: 18px;
            line-height: 1.6;
            color: rgba(0, 0, 0, .60);
            outline: none;
            margin-top: 8px;
        }

        .contact-form-skin textarea {
            border: 1px solid rgba(0, 0, 0, .14);
            padding: 14px 14px;
            min-height: 128px !important;
            height: 128px !important;
            resize: vertical;
        }

        .contact-form-skin label {
            display: block;
            font-size: 18px;
            color: rgba(0, 0, 0, .55);
            margin-bottom: 8px;
            letter-spacing: .02em;
        }

        .contact-form-skin ::placeholder {
            color: rgba(0, 0, 0, .25);
        }

        .contact-form-skin input[type="checkbox"] {
            -webkit-appearance: none;
            appearance: none;
            width: 26px;
            height: 26px;
            flex: 0 0 26px;
            border: 1px solid #C7B276;
            background: #fff;
            border-radius: 0;
            margin: 2px 0 0 0;
            cursor: pointer;
            background: transparent;
        }


        .contact-form-skin input[type="checkbox"]:checked {
            background: #C7B276;
            border-color: #C7B276;
        }

        .contact-form-skin .wpcf7-form-control.wpcf7-checkbox .wpcf7-list-item {
            margin: 0 24px 0 0;
        }

        .contact-form-skin .wpcf7-form-control.wpcf7-checkbox .wpcf7-list-item>label {
            display: inline-flex;
            align-items: center;
            gap: 14px;
            margin: 0;
            line-height: 1.2;
        }

        .contact-form-skin .wpcf7-form-control.wpcf7-checkbox .wpcf7-list-item-label {
            display: inline-block;
            font-size: 18px;
            color: rgba(0, 0, 0, .55);
            transform: translateY(1px);
        }

        .contact-form-skin .wpcf7-form-control.wpcf7-checkbox {
            display: flex;
            flex-wrap: wrap;
            gap: 18px 28px;
        }

        .contact-form-skin .wpcf7-form-control.wpcf7-acceptance label {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            margin: 0;
            line-height: 1.6;
        }

        .contact-form-skin .wpcf7-form-control.wpcf7-acceptance input[type="checkbox"] {
            margin-top: 4px;
        }

        .contact-form-skin .wpcf7 form,
        .contact-form-skin form {
            display: grid;
            gap: 22px;
        }

        @media (min-width: 768px) {
            .contact-form-skin .form-row-2 {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 28px;
            }
        }

        .contact-form-skin :is(button, input[type="submit"]) {
            width: 285px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 9999px;
            background: #c9b06f;
            color: #fff;
            border: 0;
            padding: 12px 44px;
            font-size: 16px;
            cursor: pointer;
        }

        .contact-form-skin :is(button, input[type="submit"]):hover {
            filter: brightness(.96);
        }

        .contact-form-skin .wpcf7-not-valid-tip,
        .contact-form-skin .wpcf7-response-output {
            font-size: 18px;
            color: rgba(0, 0, 0, .55);
            border: 0;
            margin: 0;
            padding: 10px 0 0;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wordpress/wp-content/themes/clin-city/resources/views/contact-template.blade.php ENDPATH**/ ?>