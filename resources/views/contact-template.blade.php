{{--
  Template Name: Contact
--}}

@extends('layouts.app')

@section('content')
    @php
        /**
         * This is a styled “Collaborate / Contact” form section like your screenshot.
         * Recommended: wire it to a WP form plugin via shortcode (CF7 / FluentForms / Gravity).
         *
         * Put the shortcode in ACF later (field: contact_form_shortcode), for now it falls back.
         */
        $shortcode = function_exists('get_field') ? (get_field('contact_form_shortcode') ?: '') : '';
        if (!$shortcode) {
            // Replace with your real shortcode once you install a form plugin
            $shortcode = '[contact-form-7 id="123" title="Collaborate"]';
        }
    @endphp

    <section>
        <div class="mx-auto max-w-6xl px-4 pb-20 pt-12 sm:px-6 sm:pt-14">
            <div class="bg-transparent">
                {{-- Title --}}
                <h1 class="font-serif text-[42px] tracking-widest text-black/60 sm:text-[56px]">
                    COLLABORATE
                </h1>

                <p class="mt-4 max-w-3xl text-[13px] leading-7 text-black/45">
                    Interested in working together? Fill out some info and we will be in touch shortly!
                    We can't wait to hear from you!
                </p>

                {{-- Form wrapper (styled to match: thin lines, transparent background) --}}
                <div class="mt-12">
                    <div class="contact-form-skin">
                        {!! do_shortcode($shortcode) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Form styling (scoped) --}}
    <style>
        /* Wrapper so we can style any plugin output consistently */
        .contact-form-skin :is(input[type="text"], input[type="email"], input[type="tel"], input[type="date"], select, textarea) {
            width: 100%;
            background: transparent;
            border: 0;
            border-bottom: 1px solid rgba(0, 0, 0, .14);
            padding: 14px 0;
            font-size: 13px;
            line-height: 1.6;
            color: rgba(0, 0, 0, .60);
            outline: none;
        }

        .contact-form-skin textarea {
            border: 1px solid rgba(0, 0, 0, .14);
            padding: 14px 14px;
            min-height: 140px;
            resize: vertical;
        }

        .contact-form-skin label {
            display: block;
            font-size: 12px;
            color: rgba(0, 0, 0, .55);
            margin-bottom: 8px;
            letter-spacing: .02em;
        }

        .contact-form-skin ::placeholder {
            color: rgba(0, 0, 0, .25);
        }

        /* Checkbox look */
        .contact-form-skin input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #c9b06f;
        }

        /* Typical plugin wrappers */
        .contact-form-skin .wpcf7 form,
        .contact-form-skin form {
            display: grid;
            gap: 22px;
            max-width: 980px;
        }

        /* Two-column rows when possible (matches screenshot) */
        @media (min-width: 768px) {
            .contact-form-skin .form-row-2 {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 28px;
            }
        }

        /* Button */
        .contact-form-skin :is(button, input[type="submit"]) {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 9999px;
            background: #c9b06f;
            color: #fff;
            border: 0;
            padding: 12px 44px;
            font-size: 12px;
            letter-spacing: .14em;
            box-shadow: 0 10px 20px rgba(0, 0, 0, .12);
            cursor: pointer;
            transition: filter .2s ease;
        }

        .contact-form-skin :is(button, input[type="submit"]):hover {
            filter: brightness(.96);
        }

        /* Make plugin error text subtle */
        .contact-form-skin .wpcf7-not-valid-tip,
        .contact-form-skin .wpcf7-response-output {
            font-size: 12px;
            color: rgba(0, 0, 0, .55);
            border: 0;
            margin: 0;
            padding: 10px 0 0;
        }
    </style>
@endsection
