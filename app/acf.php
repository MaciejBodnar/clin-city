<?php

add_filter('acf/settings/show_admin', '__return_true');

add_action('acf/init', function () {
    if (!function_exists('acf_update_field_group')) return;

    acf_add_local_field_group(array(
        'key' => 'group_1',
        'title' => 'Rooms Template',
        'fields' => [
            [
                'key' => 'field_rooms_hero_tab',
                'label' => 'Hero',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_rooms_hero_kicker',
                'label' => 'Hero Kicker',
                'name' => 'rooms_hero_kicker',
                'type' => 'text',
                'default_value' => 'WELCOME TO CLINCITY LONDON',
            ],
            [
                'key' => 'field_rooms_hero_title',
                'label' => 'Hero Title',
                'name' => 'rooms_hero_title',
                'type' => 'text',
                'default_value' => 'MEET THE TEAM',
            ],
            [
                'key' => 'field_rooms_hero_description',
                'label' => 'Hero Description',
                'name' => 'rooms_hero_description',
                'type' => 'textarea',
                'new_lines' => 'br',
                'default_value' => "Where your aesthetic journey to excellence starts with our skilled team.\nGuided by leaders in cosmetic and aesthetic treatments, our committed experts are here to make your experience transformative and peaceful.",
            ],
            [
                'key' => 'field_rooms_hero_image',
                'label' => 'Hero Image',
                'name' => 'rooms_hero_image',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ],
            [
                'key' => 'field_rooms_sections_tab',
                'label' => 'Section Titles',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_rooms_left_title',
                'label' => 'Left Column Title',
                'name' => 'rooms_left_title',
                'type' => 'text',
                'default_value' => 'Room Features & Assets',
            ],
            [
                'key' => 'field_rooms_assets_title',
                'label' => 'Assets Title',
                'name' => 'rooms_assets_title',
                'type' => 'text',
                'default_value' => 'Assets',
            ],
            [
                'key' => 'field_rooms_key_features_title',
                'label' => 'Key Features Title',
                'name' => 'rooms_key_features_title',
                'type' => 'text',
                'default_value' => 'Key Features',
            ],
            [
                'key' => 'field_rooms_right_title',
                'label' => 'Right Column Title',
                'name' => 'rooms_right_title',
                'type' => 'text',
                'default_value' => 'Additional Facilities & Services:',
            ],
            [
                'key' => 'field_rooms_additional_facilities_title',
                'label' => 'Additional Facilities Title',
                'name' => 'rooms_additional_facilities_title',
                'type' => 'text',
                'default_value' => 'Additional Facilities:',
            ],
            [
                'key' => 'field_rooms_additional_services_title',
                'label' => 'Additional Services Title',
                'name' => 'rooms_additional_services_title',
                'type' => 'text',
                'default_value' => '',
            ],

            // LISTS
            [
                'key' => 'field_rooms_lists_tab',
                'label' => 'Lists',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_rooms_assets_items',
                'label' => 'Assets Items',
                'name' => 'rooms_assets_items',
                'type' => 'repeater',
                'layout' => 'row',
                'button_label' => 'Add item',
                'sub_fields' => [
                    [
                        'key' => 'field_rooms_assets_items_text',
                        'label' => 'Text',
                        'name' => 'text',
                        'type' => 'text',
                    ],
                ],
            ],
            [
                'key' => 'field_rooms_key_features_items',
                'label' => 'Key Features Items',
                'name' => 'rooms_key_features_items',
                'type' => 'repeater',
                'layout' => 'row',
                'button_label' => 'Add item',
                'sub_fields' => [
                    [
                        'key' => 'field_rooms_key_features_items_text',
                        'label' => 'Text',
                        'name' => 'text',
                        'type' => 'text',
                    ],
                ],
            ],
            [
                'key' => 'field_rooms_additional_facilities_items',
                'label' => 'Additional Facilities Items',
                'name' => 'rooms_additional_facilities_items',
                'type' => 'repeater',
                'layout' => 'row',
                'button_label' => 'Add item',
                'sub_fields' => [
                    [
                        'key' => 'field_rooms_additional_facilities_items_text',
                        'label' => 'Text',
                        'name' => 'text',
                        'type' => 'text',
                    ],
                ],
            ],
            [
                'key' => 'field_rooms_additional_services_items',
                'label' => 'Additional Services Items',
                'name' => 'rooms_additional_services_items',
                'type' => 'repeater',
                'layout' => 'row',
                'button_label' => 'Add item',
                'sub_fields' => [
                    [
                        'key' => 'field_rooms_additional_services_items_text',
                        'label' => 'Text',
                        'name' => 'text',
                        'type' => 'text',
                    ],
                ],
            ],

            [
                'key' => 'field_rooms_cta_tab',
                'label' => 'CTA',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_rooms_cta_button_text',
                'label' => 'CTA Button Text',
                'name' => 'rooms_cta_button_text',
                'type' => 'text',
                'default_value' => 'Rent a room',
            ],
            [
                'key' => 'field_rooms_cta_button_url',
                'label' => 'CTA Button URL',
                'name' => 'rooms_cta_button_url',
                'type' => 'url',
                'default_value' => '',
            ],
        ],
        'location' => [
            [[
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'rooms-template.blade.php',
            ]],
        ],
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_front_page',
        'title' => 'Front Page',
        'fields' => [
            [
                'key' => 'field_front_tab_topbar',
                'label' => 'Top Bar',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],

            [
                'key' => 'field_front_social_links',
                'label' => 'Social Links',
                'name' => 'front_social_links',
                'type' => 'repeater',
                'layout' => 'row',
                'button_label' => 'Add link',
                'sub_fields' => [
                    [
                        'key' => 'field_front_social_links_icon',
                        'label' => 'Icon class',
                        'name' => 'icon',
                        'type' => 'text',
                        'instructions' => 'Font Awesome class, e.g. "fa-brands fa-instagram"',
                    ],
                    [
                        'key' => 'field_front_social_links_url',
                        'label' => 'URL',
                        'name' => 'url',
                        'type' => 'url',
                    ],
                ],
            ],

            [
                'key' => 'field_front_whatsapp_label',
                'label' => 'Whatsapp Label',
                'name' => 'front_whatsapp_label',
                'type' => 'text',
                'default_value' => 'Whatsapp us',
            ],
            [
                'key' => 'field_front_whatsapp_phone',
                'label' => 'Whatsapp Phone Text',
                'name' => 'front_whatsapp_phone',
                'type' => 'text',
                'default_value' => '020 7323 9534',
            ],
            [
                'key' => 'field_front_whatsapp_tel',
                'label' => 'Whatsapp Tel (digits)',
                'name' => 'front_whatsapp_tel',
                'type' => 'text',
                'instructions' => 'Example: +442073239534',
                'default_value' => '+442073239534',
            ],
            [
                'key' => 'field_front_wechat_enabled',
                'label' => 'Show WeChat icon',
                'name' => 'front_wechat_enabled',
                'type' => 'true_false',
                'ui' => 1,
                'default_value' => 1,
            ],
            [
                'key' => 'field_front_hours_label',
                'label' => 'Hours Label',
                'name' => 'front_hours_label',
                'type' => 'text',
                'default_value' => 'Opening hours',
            ],
            [
                'key' => 'field_front_hours_text',
                'label' => 'Hours Text',
                'name' => 'front_hours_text',
                'type' => 'text',
                'default_value' => 'Mon-Sat, 10:00am-6:30pm',
            ],

            /**
             * HEADER
             */
            [
                'key' => 'field_front_tab_header',
                'label' => 'Header',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_front_logo_image',
                'label' => 'Logo Image',
                'name' => 'front_logo_image',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ],
            [
                'key' => 'field_front_header_cta_text',
                'label' => 'Header CTA Text',
                'name' => 'front_header_cta_text',
                'type' => 'text',
                'default_value' => 'BOOK YOUR CONSULTATION',
            ],
            [
                'key' => 'field_front_header_cta_url',
                'label' => 'Header CTA URL',
                'name' => 'front_header_cta_url',
                'type' => 'url',
                'default_value' => '/book/',
            ],

            /**
             * TREATMENTS
             */
            [
                'key' => 'field_front_tab_treatments',
                'label' => 'Treatments',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_front_treatments_title',
                'label' => 'Treatments Title',
                'name' => 'front_treatments_title',
                'type' => 'text',
                'default_value' => 'TREATMENTS',
            ],
            [
                'key' => 'field_front_treatments',
                'label' => 'Treatments Cards',
                'name' => 'front_treatments',
                'type' => 'repeater',
                'layout' => 'row',
                'button_label' => 'Add treatment',
                'sub_fields' => [
                    [
                        'key' => 'field_front_treatments_card_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_front_treatments_card_image',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                    ],
                    [
                        'key' => 'field_front_treatments_card_text',
                        'label' => 'Text',
                        'name' => 'text',
                        'type' => 'textarea',
                        'new_lines' => 'br',
                    ],
                    [
                        'key' => 'field_front_treatments_card_url',
                        'label' => 'URL',
                        'name' => 'url',
                        'type' => 'url',
                    ],
                ],
            ],
            [
                'key' => 'field_front_treatment_button_text',
                'label' => 'Treatment Button Text (per-card)',
                'name' => 'front_treatment_button_text',
                'type' => 'text',
                'default_value' => 'READ MORE',
            ],

            /**
             * ABOUT
             */
            [
                'key' => 'field_front_tab_about',
                'label' => 'About Section',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_front_about_kicker',
                'label' => 'About Kicker',
                'name' => 'front_about_kicker',
                'type' => 'text',
                'default_value' => 'Aesthetic & Wellness Clinic',
            ],
            [
                'key' => 'field_front_about_title',
                'label' => 'About Title',
                'name' => 'front_about_title',
                'type' => 'text',
                'default_value' => 'Clincity London',
            ],
            [
                'key' => 'field_front_about_text',
                'label' => 'About Text',
                'name' => 'front_about_text',
                'type' => 'textarea',
                'new_lines' => 'br',
                'default_value' => "We’re more than just an aesthetic clinic. We’re a sanctuary in the heart of London where science and your wellness journey converge. Our team of highly skilled professionals is dedicated to guiding you on your path to radiance - that's not just on the surface.\n\nReady to start your journey with us?\nBook your consultation with our experts here.",
            ],
            [
                'key' => 'field_front_about_image',
                'label' => 'About Image',
                'name' => 'front_about_image',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ],
            [
                'key' => 'field_front_about_cta_text',
                'label' => 'About CTA Text',
                'name' => 'front_about_cta_text',
                'type' => 'text',
                'default_value' => 'BOOK YOUR CONSULTATION',
            ],
            [
                'key' => 'field_front_about_cta_url',
                'label' => 'About CTA URL',
                'name' => 'front_about_cta_url',
                'type' => 'url',
                'default_value' => '/book/',
            ],

            /**
             * REVIEWS
             */
            [
                'key' => 'field_front_tab_reviews',
                'label' => 'Reviews',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_front_reviews_title',
                'label' => 'Reviews Title',
                'name' => 'front_reviews_title',
                'type' => 'text',
                'default_value' => 'GOOGLE REVIEWS',
            ],
            [
                'key' => 'field_front_reviews_shortcode',
                'label' => 'Reviews Shortcode',
                'name' => 'front_reviews_shortcode',
                'type' => 'text',
                'default_value' => '[trustindex no-registration=google]',
            ],
            [
                'key' => 'field_front_reviews_button_text',
                'label' => 'Reviews Button Text',
                'name' => 'front_reviews_button_text',
                'type' => 'text',
                'default_value' => 'READ MORE',
            ],
            [
                'key' => 'field_front_reviews_button_url',
                'label' => 'Reviews Button URL',
                'name' => 'front_reviews_button_url',
                'type' => 'url',
                'default_value' => '/reviews/',
            ],

            /**
             * MAP
             */
            [
                'key' => 'field_front_tab_map',
                'label' => 'Map',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            //TODO  - BRAND IMAGE
            [
                'key' => 'field_front_brands_logos',
                'label' => 'Brands Logos',
                'name' => 'front_brands_logos',
                'type' => 'image',
                'instructions' => 'Upload an image for the brands logos. You will output this in Blade.',
            ],
            [
                'key' => 'field_front_map_image',
                'label' => 'Map Image',
                'name' => 'front_map_image',
                'type' => 'image',
                'instructions' => 'Upload an image for the map. You will output this in Blade.',
            ],
            [
                'key' => 'field_front_map_label',
                'label' => 'Map Label',
                'name' => 'front_map_label',
                'type' => 'text',
                'default_value' => 'FIND US',
            ],
            [
                'key' => 'field_front_map_address',
                'label' => 'Address',
                'name' => 'front_map_address',
                'type' => 'text',
                'default_value' => '36 Great Titchfield Street, London, W1W 7BQ',
            ],
            /**
             * Open hours
             */
            [
                'key' => 'field_front_opening_hours_title',
                'label' => 'Opening Hours Title',
                'name' => 'front_opening_hours_title',
                'type' => 'text',
                'default_value' => "LET'S START TODAY!",
            ],
            [
                'key' => 'field_front_opening_hours_subtitle',
                'label' => 'Opening Hours Subtitle',
                'name' => 'front_opening_hours_subtitle',
                'type' => 'text',
                'default_value' => "OPENING HOURS",
            ],
            [
                'key' => 'field_front_opening_hours',
                'label' => 'Opening Hours',
                'name' => 'front_opening_hours',
                'type' => 'repeater',
                'sub_fields' => [
                    [
                        'key' => 'field_front_opening_hours_day',
                        'label' => 'Day',
                        'name' => 'day',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_front_opening_hours_time',
                        'label' => 'Time',
                        'name' => 'time',
                        'type' => 'text',
                    ],
                ],
            ],

        ],
        'location' => [
            [[
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'front-page.blade.php',
            ]],
        ],

        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'seamless',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => ['the_content'],
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));

    acf_add_local_field_group(array(
        'key' => 'group_welcome_page',
        'title' => 'Welcome Page',
        'fields' => [

            /**
             * TOPBAR
             */
            [
                'key'   => 'field_welcome_topbar_tab',
                'label' => 'Topbar',
                'type'  => 'tab',
                'placement' => 'top',
            ],

            [
                'key'   => 'field_welcome_social_links',
                'label' => 'Social Links',
                'name'  => 'welcome_social_links',
                'type'  => 'repeater',
                'layout' => 'row',
                'button_label' => 'Add Social Link',
                'sub_fields' => [
                    [
                        'key'   => 'field_welcome_social_icon',
                        'label' => 'Icon class',
                        'name'  => 'icon',
                        'type'  => 'text',
                        'instructions' => 'Example: fa-brands fa-facebook-f',
                    ],
                    [
                        'key'   => 'field_welcome_social_url',
                        'label' => 'URL',
                        'name'  => 'url',
                        'type'  => 'url',
                    ],
                ],
            ],

            [
                'key'   => 'field_welcome_whatsapp_label',
                'label' => 'WhatsApp Label',
                'name'  => 'welcome_whatsapp_label',
                'type'  => 'text',
                'default_value' => 'Whatsapp us',
            ],
            [
                'key'   => 'field_welcome_whatsapp_phone_text',
                'label' => 'WhatsApp Phone (display)',
                'name'  => 'welcome_whatsapp_phone_text',
                'type'  => 'text',
                'default_value' => '020 7323 9534',
            ],
            [
                'key'   => 'field_welcome_whatsapp_tel',
                'label' => 'WhatsApp Tel (raw)',
                'name'  => 'welcome_whatsapp_tel',
                'type'  => 'text',
                'instructions' => 'Can be +4420... or tel:+4420... (your code will format it)',
                'default_value' => '+442073239534',
            ],

            [
                'key'   => 'field_welcome_wechat_enabled',
                'label' => 'Enable WeChat',
                'name'  => 'welcome_wechat_enabled',
                'type'  => 'true_false',
                'ui'    => 1,
                'default_value' => 1,
            ],

            [
                'key'   => 'field_welcome_hours_enabled',
                'label' => 'Enable Opening Hours',
                'name'  => 'welcome_hours_enabled',
                'type'  => 'true_false',
                'ui'    => 1,
                'default_value' => 1,
            ],
            [
                'key'   => 'field_welcome_hours_label',
                'label' => 'Hours Label',
                'name'  => 'welcome_hours_label',
                'type'  => 'text',
                'default_value' => 'Opening hours',
                'conditional_logic' => [
                    [[
                        'field'    => 'field_welcome_hours_enabled',
                        'operator' => '==',
                        'value'    => '1',
                    ]],
                ],
            ],
            [
                'key'   => 'field_welcome_hours_text',
                'label' => 'Hours Text',
                'name'  => 'welcome_hours_text',
                'type'  => 'text',
                'default_value' => 'Mon-Sat, 10:00am-6:30pm',
                'conditional_logic' => [
                    [[
                        'field'    => 'field_welcome_hours_enabled',
                        'operator' => '==',
                        'value'    => '1',
                    ]],
                ],
            ],

            /**
             * HERO
             */
            [
                'key'   => 'field_welcome_hero_tab',
                'label' => 'Hero',
                'type'  => 'tab',
                'placement' => 'top',
            ],

            [
                'key'   => 'field_welcome_hero_bg_image',
                'label' => 'Hero Background Image',
                'name'  => 'welcome_hero_bg_image',
                'type'  => 'image',
                'return_format' => 'array', // your helper supports array/id/url; array is a nice default
                'preview_size'  => 'medium',
                'library'       => 'all',
            ],
            [
                'key'   => 'field_welcome_logo_image',
                'label' => 'Logo Image',
                'name'  => 'welcome_logo_image',
                'type'  => 'image',
                'return_format' => 'array',
                'preview_size'  => 'medium',
                'library'       => 'all',
            ],
            [
                'key'   => 'field_welcome_subtitle',
                'label' => 'Subtitle',
                'name'  => 'welcome_subtitle',
                'type'  => 'text',
                'default_value' => 'MEDICAL-FIRST APPROACH TO AESTHETICS',
            ],
            [
                'key'   => 'field_welcome_nav_default_url',
                'label' => 'Nav Default URL',
                'name'  => 'welcome_nav_default_url',
                'type'  => 'url',
                'default_value' => '/',
                'instructions' => 'Used as fallback for Treatments links when row URL is empty.',
            ],

            /**
             * TREATMENTS NAV
             */
            [
                'key'   => 'field_welcome_treatments_tab',
                'label' => 'Treatments Nav',
                'type'  => 'tab',
                'placement' => 'top',
            ],

            [
                'key'   => 'field_welcome_treatments_nav',
                'label' => 'Treatments Navigation',
                'name'  => 'welcome_treatments_nav',
                'type'  => 'repeater',
                'layout' => 'row',
                'button_label' => 'Add Treatment Item',
                'sub_fields' => [
                    [
                        'key'   => 'field_welcome_treatments_label',
                        'label' => 'Label',
                        'name'  => 'label',
                        'type'  => 'text',
                    ],
                    [
                        'key'   => 'field_welcome_treatments_url',
                        'label' => 'URL',
                        'name'  => 'url',
                        'type'  => 'url',
                        'instructions' => 'If empty, will fall back to Nav Default URL.',
                    ],
                ],
            ],

            /**
             * ENTER BUTTON
             */
            [
                'key'   => 'field_welcome_enter_tab',
                'label' => 'Enter Button',
                'type'  => 'tab',
                'placement' => 'top',
            ],
            [
                'key'   => 'field_welcome_enter_button_text',
                'label' => 'Button Text',
                'name'  => 'welcome_enter_button_text',
                'type'  => 'text',
                'default_value' => 'ENTER OUR WEBSITE',
            ],
            [
                'key'   => 'field_welcome_enter_button_url',
                'label' => 'Button URL',
                'name'  => 'welcome_enter_button_url',
                'type'  => 'url',
                'default_value' => '/',
            ],

            /**
             * FOOTER
             */
            [
                'key'   => 'field_welcome_footer_tab',
                'label' => 'Footer',
                'type'  => 'tab',
                'placement' => 'top',
            ],
            [
                'key'   => 'field_welcome_footer_left_text',
                'label' => 'Left Text',
                'name'  => 'welcome_footer_left_text',
                'type'  => 'text',
                'default_value' => 'The Central London Clinic Ltd.',
            ],
            [
                'key'   => 'field_welcome_footer_right_text',
                'label' => 'Right Text',
                'name'  => 'welcome_footer_right_text',
                'type'  => 'text',
                'default_value' => 'D&C with',
            ],
            [
                'key'   => 'field_welcome_footer_brand_text',
                'label' => 'Brand Text',
                'name'  => 'welcome_footer_brand_text',
                'type'  => 'text',
                'default_value' => 'Sltmedia',
            ],
            [
                'key'   => 'field_welcome_footer_show_heart',
                'label' => 'Show Heart',
                'name'  => 'welcome_footer_show_heart',
                'type'  => 'true_false',
                'ui'    => 1,
                'default_value' => 1,
            ],
        ],
        'location' => [
            [[
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'welcome-page.blade.php',
            ]],
        ],

        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'seamless',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => ['the_content'],
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));


    acf_add_local_field_group(array(
        'key' => 'group_team_page',
        'title' => 'Team Page',
        'fields' => [
            // HERO TAB
            [
                'key' => 'field_team_hero_tab',
                'label' => 'Hero',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_team_hero_kicker',
                'label' => 'Hero Kicker',
                'name' => 'team_hero_kicker',
                'type' => 'text',
                'default_value' => 'WELCOME TO CLINCITY LONDON 123',
            ],
            [
                'key' => 'field_team_hero_title',
                'label' => 'Hero Title',
                'name' => 'team_hero_title',
                'type' => 'text',
                'default_value' => 'MEET THE TEAM',
            ],
            [
                'key' => 'field_team_hero_description',
                'label' => 'Hero Description',
                'name' => 'team_hero_description',
                'type' => 'textarea',
                'new_lines' => 'br',
                'default_value' => "Where your aesthetic journey to excellence starts with our skilled team.\nGuided by leaders in cosmetic and aesthetic treatments, our committed experts are here to make your experience transformative and peaceful.",
            ],
            [
                'key' => 'field_team_hero_image',
                'label' => 'Hero Image',
                'name' => 'team_hero_image',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ],

            // SECTIONS TAB
            [
                'key' => 'field_team_sections_tab',
                'label' => 'Sections',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_team_section_heading',
                'label' => 'Team Section Heading',
                'name' => 'team_section_heading',
                'type' => 'text',
                'default_value' => 'OUR TEAM',
            ],
            [
                'key' => 'field_partners_section_heading',
                'label' => 'Partners Section Heading',
                'name' => 'partners_section_heading',
                'type' => 'text',
                'default_value' => 'OUR PARTNERS',
            ],
            [
                'key' => 'field_team_button_text',
                'label' => 'Button Text',
                'name' => 'team_button_text',
                'type' => 'text',
                'default_value' => 'READ MORE',
            ],

            // TEAM MEMBERS TAB
            [
                'key' => 'field_team_members_tab',
                'label' => 'Team Members',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_team_members',
                'label' => 'Team Members',
                'name' => 'team_members',
                'type' => 'repeater',
                'layout' => 'row',
                'button_label' => 'Add Team Member',
                'sub_fields' => [
                    [
                        'key' => 'field_team_member_name',
                        'label' => 'Name',
                        'name' => 'name',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_team_member_role',
                        'label' => 'Role',
                        'name' => 'role',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_team_member_image',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ],
                    [
                        'key' => 'field_team_member_bio',
                        'label' => 'Bio',
                        'name' => 'bio',
                        'type' => 'wysiwyg',
                        'tabs' => 'visual',
                        'toolbar' => 'basic',
                        'media_upload' => 0,
                    ],
                    [
                        'key' => 'field_team_member_url',
                        'label' => 'URL',
                        'name' => 'url',
                        'type' => 'url',
                    ],
                ],
            ],

            // PARTNERS TAB
            [
                'key' => 'field_partners_tab',
                'label' => 'Partners',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_partners_members',
                'label' => 'Partners Members',
                'name' => 'partners_members',
                'type' => 'repeater',
                'layout' => 'row',
                'button_label' => 'Add Partner',
                'sub_fields' => [
                    [
                        'key' => 'field_partner_name',
                        'label' => 'Name',
                        'name' => 'name',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_partner_role',
                        'label' => 'Role',
                        'name' => 'role',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_partner_image',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ],
                    [
                        'key' => 'field_partner_bio',
                        'label' => 'Bio',
                        'name' => 'bio',
                        'type' => 'wysiwyg',
                        'tabs' => 'visual',
                        'toolbar' => 'basic',
                        'media_upload' => 0,
                    ],
                    [
                        'key' => 'field_partner_url',
                        'label' => 'URL',
                        'name' => 'url',
                        'type' => 'url',
                    ],
                ],
            ],

            // MODAL TAB
            [
                'key' => 'field_team_modal_tab',
                'label' => 'Modal (Defaults)',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_team_modal_title',
                'label' => 'Modal Title',
                'name' => 'team_modal_title',
                'type' => 'text',
                'default_value' => 'MEET THE TEAM',
            ],
            [
                'key' => 'field_team_modal_default_role',
                'label' => 'Modal Default Role',
                'name' => 'team_modal_default_role',
                'type' => 'text',
                'default_value' => 'Dr William Wong',
            ],
            [
                'key' => 'field_team_modal_default_bio',
                'label' => 'Modal Default Bio',
                'name' => 'team_modal_default_bio',
                'type' => 'textarea',
                'new_lines' => 'br',
                'default_value' => "Where your aesthetic journey to excellence starts with our skilled team.\nGuided by leaders in cosmetic and aesthetic treatments, our committed experts are here to make your experience transformative and peaceful.",
            ],
        ],
        'location' => [
            [[
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'team-template.blade.php',
            ]],
        ],
        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'seamless',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => ['the_content'],
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));


    acf_add_local_field_group(array(
        'key' => 'group_treatments_template',
        'title' => 'Treatments Template',
        'fields' => [
            // ========== HERO (group) ==========
            [
                'key' => 'field_treatment_hero',
                'label' => 'Hero',
                'name' => 'treatment_hero',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => [
                    [
                        'key' => 'field_treatment_hero_kicker',
                        'label' => 'Kicker',
                        'name' => 'kicker',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_treatment_hero_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'textarea',
                        'rows' => 4,
                        'new_lines' => 'br',
                    ],
                    [
                        'key' => 'field_treatment_hero_text',
                        'label' => 'Text',
                        'name' => 'text',
                        'type' => 'textarea',
                        'rows' => 6,
                        'new_lines' => 'br',
                    ],
                    [
                        'key' => 'field_treatment_hero_image',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                    ],
                ],
            ],

            // ========== SPLIT SECTIONS (repeater) ==========
            [
                'key' => 'field_treatment_sections',
                'label' => 'Split Sections',
                'name' => 'treatment_sections',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Add Section',
                'sub_fields' => [
                    [
                        'key' => 'field_treatment_sections_heading',
                        'label' => 'Heading',
                        'name' => 'heading',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_treatment_sections_image',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                    ],
                    [
                        'key' => 'field_treatment_sections_image_side',
                        'label' => 'Image Side',
                        'name' => 'image_side',
                        'type' => 'select',
                        'choices' => [
                            'left' => 'Left',
                            'right' => 'Right',
                        ],
                        'default_value' => 'left',
                        'ui' => 1,
                    ],
                    [
                        'key' => 'field_treatment_sections_content_type',
                        'label' => 'Content Type',
                        'name' => 'content_type',
                        'type' => 'select',
                        'choices' => [
                            'bullets' => 'Bullets',
                            'ordered' => 'Ordered',
                            'wysiwyg' => 'WYSIWYG',
                        ],
                        'default_value' => 'wysiwyg',
                        'ui' => 1,
                    ],

                    // bullets repeater
                    [
                        'key' => 'field_treatment_sections_bullets',
                        'label' => 'Bullets',
                        'name' => 'bullets',
                        'type' => 'repeater',
                        'layout' => 'row',
                        'button_label' => 'Add Bullet',
                        'conditional_logic' => [
                            [[
                                'field' => 'field_treatment_sections_content_type',
                                'operator' => '==',
                                'value' => 'bullets',
                            ]],
                        ],
                        'sub_fields' => [
                            [
                                'key' => 'field_treatment_sections_bullets_title',
                                'label' => 'Title',
                                'name' => 'title',
                                'type' => 'text',
                            ],
                            [
                                'key' => 'field_treatment_sections_bullets_text',
                                'label' => 'Text',
                                'name' => 'text',
                                'type' => 'textarea',
                                'rows' => 3,
                                'new_lines' => 'br',
                            ],
                        ],
                    ],

                    // ordered repeater
                    [
                        'key' => 'field_treatment_sections_ordered',
                        'label' => 'Ordered Lines',
                        'name' => 'ordered',
                        'type' => 'repeater',
                        'layout' => 'row',
                        'button_label' => 'Add Line',
                        'conditional_logic' => [
                            [[
                                'field' => 'field_treatment_sections_content_type',
                                'operator' => '==',
                                'value' => 'ordered',
                            ]],
                        ],
                        'sub_fields' => [
                            [
                                'key' => 'field_treatment_sections_ordered_line',
                                'label' => 'Line',
                                'name' => 'line',
                                'type' => 'text',
                            ],
                        ],
                    ],

                    // wysiwyg
                    [
                        'key' => 'field_treatment_sections_wysiwyg',
                        'label' => 'WYSIWYG',
                        'name' => 'wysiwyg',
                        'type' => 'wysiwyg',
                        'toolbar' => 'basic',
                        'media_upload' => 0,
                        'conditional_logic' => [
                            [[
                                'field' => 'field_treatment_sections_content_type',
                                'operator' => '==',
                                'value' => 'wysiwyg',
                            ]],
                        ],
                    ],
                ],
            ],

            // ========== 3-COL INFO (group) ==========
            [
                'key' => 'field_treatment_info_3col',
                'label' => '3-Column Info Block',
                'name' => 'treatment_info_3col',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => [
                    [
                        'key' => 'field_treatment_info_3col_columns',
                        'label' => 'Columns',
                        'name' => 'columns',
                        'type' => 'repeater',
                        'layout' => 'row',
                        'min' => 3,
                        'max' => 3,
                        'button_label' => 'Add Column',
                        'sub_fields' => [
                            [
                                'key' => 'field_treatment_info_3col_columns_title',
                                'label' => 'Title',
                                'name' => 'title',
                                'type' => 'text',
                            ],
                            [
                                'key' => 'field_treatment_info_3col_columns_text',
                                'label' => 'Text',
                                'name' => 'text',
                                'type' => 'textarea',
                                'rows' => 6,
                                'new_lines' => 'br',
                            ],
                        ],
                    ],
                ],
            ],

            // ========== PRICING BLOCKS (repeater) ==========
            [
                'key' => 'field_treatment_pricing_blocks',
                'label' => 'Pricing Blocks',
                'name' => 'treatment_pricing_blocks',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Add Pricing Block',
                'sub_fields' => [
                    [
                        'key' => 'field_treatment_pricing_blocks_title',
                        'label' => 'Block Title',
                        'name' => 'title',
                        'type' => 'text',
                    ],

                    // columns
                    [
                        'key' => 'field_treatment_pricing_blocks_columns',
                        'label' => 'Columns',
                        'name' => 'columns',
                        'type' => 'repeater',
                        'layout' => 'row',
                        'button_label' => 'Add Column',
                        'sub_fields' => [
                            [
                                'key' => 'field_treatment_pricing_blocks_columns_key',
                                'label' => 'Key (must match row price keys)',
                                'name' => 'key',
                                'type' => 'text',
                                'instructions' => 'Examples: single, course_3, course_5',
                            ],
                            [
                                'key' => 'field_treatment_pricing_blocks_columns_label',
                                'label' => 'Label',
                                'name' => 'label',
                                'type' => 'text',
                                'instructions' => 'Example: SINGLE, COURSE OF 3',
                            ],
                        ],
                    ],

                    // rows
                    [
                        'key' => 'field_treatment_pricing_blocks_rows',
                        'label' => 'Rows',
                        'name' => 'rows',
                        'type' => 'repeater',
                        'layout' => 'block',
                        'button_label' => 'Add Row',
                        'sub_fields' => [
                            [
                                'key' => 'field_treatment_pricing_blocks_rows_label',
                                'label' => 'Row Label',
                                'name' => 'label',
                                'type' => 'text',
                            ],
                            [
                                'key' => 'field_treatment_pricing_blocks_rows_prices',
                                'label' => 'Prices (key/value)',
                                'name' => 'prices',
                                'type' => 'repeater',
                                'layout' => 'row',
                                'button_label' => 'Add Price',
                                'sub_fields' => [
                                    [
                                        'key' => 'field_treatment_pricing_blocks_rows_prices_key',
                                        'label' => 'Key',
                                        'name' => 'key',
                                        'type' => 'text',
                                        'instructions' => 'Must match a column key (e.g. single)',
                                    ],
                                    [
                                        'key' => 'field_treatment_pricing_blocks_rows_prices_value',
                                        'label' => 'Value',
                                        'name' => 'value',
                                        'type' => 'text',
                                        'instructions' => 'Example: £450',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],

        'location' => [
            [[
                'param' => 'page_template',
                'operator' => '==',
                // MUST match the actual WP template filename you assign to the page
                'value' => 'treatments-template.blade.php',
            ]],
        ],

        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'seamless',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => ['the_content'],
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));

    acf_add_local_field_group(array(
        'key' => 'group_contact_template',
        'title' => 'Contact Template',
        'fields' => [
            [
                'key' => 'field_contact_title',
                'label' => 'Contact Page Title',
                'name' => 'page_title',
                'type' => 'text',
                'default_value' => 'COLLABORATE',
            ],
            [
                'key' => 'field_contact_text',
                'label' => 'Contact Page Text',
                'name' => 'page_text',
                'type' => 'text',
                'default_value' => "Interested in working together? Fill out some info and we will be in touch shortly! We can't wait to hear from you!",
            ],
        ],

        'location' => [
            [[
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'contact-template.blade.php',
            ]],
        ],

        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'seamless',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => ['the_content'],
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));

    acf_add_local_field_group(array(
        'key' => 'group_privacy_template',
        'title' => 'Privacy Template',
        'fields' => [
            [
                'key' => 'field_privacy_text',
                'label' => 'Privacy Page Content',
                'name' => 'privacy_text',
                'type' => 'textarea',
                'default_value' => '<p><strong>Welcome to our Privacy Policy</strong></p>
  <p> — Your privacy is critically important to us.</p>
  <p>It is Clin City policy to respect your privacy regarding any information we may collect while operating our website. This Privacy Policy applies to Clin City (hereinafter, “us”, “we”, or “Clin City“). We respect your privacy and are committed to protecting personally identifiable information you may provide us through the Website. We have adopted this privacy policy (“Privacy Policy”) to explain what information may be collected on our Website, how we use this information, and under what circumstances we may disclose the information to third parties. This Privacy Policy applies only to information we collect through the Website and does not apply to our collection of information from other sources.</p>
  <p>This Privacy Policy, together with the Terms and conditions posted on our Website, set forth the general rules and policies governing your use of our Website. Depending on your activities when visiting our Website, you may be required to agree to additional terms and conditions.</p>
  <p><strong>Website Visitors</strong></p>
  <p>Like most website operators, Clin City collects non-personally-identifying information of the sort that web browsers and servers typically make available, such as the browser type, language preference, referring site, and the date and time of each visitor request. Clin City purpose in collecting non-personally identifying information is to better understand how Clin City visitors use its website. From time to time, Clin City may release non-personally-identifying information in the aggregate, e.g., by publishing a report on trends in the usage of its website.</p>
  <p><strong>Gathering of Personally-Identifying Information</strong></p>
  <p>Certain visitors to Clin City websites choose to interact with Clin City ways that require Clin City to gather personally-identifying information. The amount and type of information that Clin City gathers depends on the nature of the interaction.</p>
  <p><strong>Security</strong></p>
  <p>The security of your Personal Information is important to us, but remember that no method of transmission over the Internet, or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Information, we cannot guarantee its absolute security.</p>
  <p><strong>Advertisements</strong></p>
  <p>Ads appearing on our website may be delivered to users by advertising partners, who may set cookies. These cookies allow the ad server to recognize your computer each time they send you an online advertisement to compile information about you or others who use your computer. This information allows ad networks to, among other things, deliver targeted advertisements that they believe will be of most interest to you. This Privacy Policy covers the use of cookies by Clin City and does not cover the use of cookies by any advertisers.</p>
  <p><strong>Links To External Sites</strong></p>
  <p>Our Service may contain links to external sites that are not operated by us. If you click on a third party link, you will be directed to that third party’s site. We strongly advise you to review the Privacy Policy and terms and conditions of every site you visit.</p>
  <p>We have no control over, and assume no responsibility for the content, privacy policies or practices of any third party sites, products or services.</p>
  <p><strong>Aggregated Statistics</strong></p>
  <p>Clin City may collect statistics about the behavior of visitors to its website. Clin City may display this information publicly or provide it to others. However, Clin City does not disclose your personally-identifying information.</p>
  <p><strong>Cookies</strong></p>
  <p>To enrich and perfect your online experience, Clin City uses “Cookies”, similar technologies and services provided by others to display personalized content, appropriate advertising and store your preferences on your computer.</p>
  <p>A cookie is a string of information that a website stores on a visitor’s computer, and that the visitor’s browser provides to the website each time the visitor returns. Clin City uses cookies to help Clin City identify and track visitors and their website access preferences. Clin City visitors who do not wish to have cookies placed on their computers should set their browsers to refuse cookies before using Clin City websites, with the drawback that certain features of Clin City’s websites may not function properly without the aid of cookies.</p>
  <p>By continuing to navigate our website without changing your cookie settings, you hereby acknowledge and agree to Clin City‘ use of cookies.</p>
  <p><strong>Privacy Policy Changes</strong></p>
  <p>Although most changes are likely to be minor, Clin City may change its Privacy Policy from time to time, and in Clin City sole discretion. Clin City encourages visitors to frequently check this page for any changes to its Privacy Policy. Your continued use of this site after any change in this Privacy Policy will constitute your acceptance of such change.</p>',
            ],
        ],

        'location' => [
            [[
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'privacy-policy-template.blade.php',
            ]],
        ],

        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'seamless',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => ['the_content'],
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));


    acf_add_options_page([
        'page_title'  => 'Footer Settings',
        'menu_title'  => 'Footer',
        'menu_slug'   => 'acf-footer-settings',
        'capability'  => 'edit_theme_options',
        'parent_slug' => 'tools.php',
        'redirect'    => false,
        'autoload'    => true,
        'update_button' => 'Save Footer',
        'updated_message' => 'Footer settings saved.',
    ]);

    acf_add_local_field_group([
        'key'   => 'group_footer_settings',
        'title' => 'Footer Settings',
        'fields' => [

            /**
             * SOCIAL
             */
            [
                'key'   => 'field_footer_social_tab',
                'label' => 'Social',
                'type'  => 'tab',
                'placement' => 'top',
            ],
            [
                'key'   => 'field_footer_find_us',
                'label' => 'Find us label',
                'name'  => 'footer_find_us',
                'type'  => 'text',
                'default_value' => 'Find us online',
            ],
            [
                'key'   => 'field_footer_social_links',
                'label' => 'Social Links',
                'name'  => 'footer_social_links',
                'type'  => 'repeater',
                'layout' => 'row',
                'button_label' => 'Add Social Link',
                'sub_fields' => [
                    [
                        'key'   => 'field_footer_social_icon',
                        'label' => 'Icon class',
                        'name'  => 'icon',
                        'type'  => 'text',
                        'instructions' => 'Example: fa-brands fa-facebook-f',
                    ],
                    [
                        'key'   => 'field_footer_social_url',
                        'label' => 'URL',
                        'name'  => 'url',
                        'type'  => 'url',
                    ],
                ],
            ],

            /**
             * QUICK LINKS
             */
            [
                'key'   => 'field_footer_quick_links_tab',
                'label' => 'Quick Links',
                'type'  => 'tab',
                'placement' => 'top',
            ],
            [
                'key'   => 'field_footer_quick_links',
                'label' => 'Quick Links',
                'name'  => 'footer_quick_links',
                'type'  => 'repeater',
                'layout' => 'row',
                'button_label' => 'Add Quick Link',
                'sub_fields' => [
                    [
                        'key'   => 'field_footer_quick_links_label',
                        'label' => 'Label',
                        'name'  => 'label',
                        'type'  => 'text',
                    ],
                    [
                        'key'   => 'field_footer_quick_links_url',
                        'label' => 'URL',
                        'name'  => 'url',
                        'type'  => 'url',
                    ],
                ],
            ],

            /**
             * WHATSAPP
             */
            [
                'key'   => 'field_footer_whatsapp_tab',
                'label' => 'WhatsApp',
                'type'  => 'tab',
                'placement' => 'top',
            ],
            [
                'key'   => 'field_footer_whatsapp_label',
                'label' => 'Label',
                'name'  => 'footer_whatsapp_label',
                'type'  => 'text',
                'default_value' => 'Whatsapp us',
            ],
            [
                'key'   => 'field_footer_whatsapp_phone_text',
                'label' => 'Phone (display)',
                'name'  => 'footer_whatsapp_phone_text',
                'type'  => 'text',
                'default_value' => '020 7323 9534',
            ],
            [
                'key'   => 'field_footer_whatsapp_tel',
                'label' => 'Tel (raw)',
                'name'  => 'footer_whatsapp_tel',
                'type'  => 'text',
                'default_value' => '+442073239534',
            ],

            /**
             * EMAIL + ADDRESS
             */
            [
                'key'   => 'field_footer_contact_tab',
                'label' => 'Contact',
                'type'  => 'tab',
                'placement' => 'top',
            ],
            [
                'key'   => 'field_footer_email_url',
                'label' => 'Email',
                'name'  => 'footer_email_url',
                'type'  => 'text',
                'instructions' => 'Use an email like info@domain.com (your code will format it). You can also store mailto:info@domain.com.',
                'default_value' => 'info@clincity.com',
            ],
            [
                'key'   => 'field_footer_address_text',
                'label' => 'Address',
                'name'  => 'footer_address_text',
                'type'  => 'textarea',
                'rows'  => 2,
                'default_value' => '36 Great Titchfield Street, London, W1W 8BQ',
            ],

            /**
             * LOGO
             */
            [
                'key'   => 'field_footer_logo_tab',
                'label' => 'Logo',
                'type'  => 'tab',
                'placement' => 'top',
            ],
            [
                'key'   => 'field_footer_logo_image',
                'label' => 'Logo Image',
                'name'  => 'footer_logo_image',
                'type'  => 'image',
                'return_format' => 'array',
                'preview_size'  => 'medium',
                'library'       => 'all',
            ],

            /**
             * COPYRIGHT + BRANDING
             */
            [
                'key'   => 'field_footer_branding_tab',
                'label' => 'Branding',
                'type'  => 'tab',
                'placement' => 'top',
            ],
            [
                'key'   => 'field_footer_copyright_text',
                'label' => 'Copyright text',
                'name'  => 'footer_copyright_text',
                'type'  => 'text',
                'default_value' => '© 2026 - The Central London Clinic Ltd. - D&C with',
            ],
            [
                'key'   => 'field_footer_heart_icon_class',
                'label' => 'Heart icon class',
                'name'  => 'footer_heart_icon_class',
                'type'  => 'text',
                'instructions' => 'Example: fa-solid fa-heart',
                'default_value' => 'fa-solid fa-heart',
            ],
            [
                'key'   => 'field_footer_slt_text',
                'label' => 'Brand text (Slt)',
                'name'  => 'footer_slt_text',
                'type'  => 'text',
                'default_value' => 'Sltmedia',
            ],
            [
                'key'   => 'field_footer_slt_link',
                'label' => 'Brand link (Slt)',
                'name'  => 'footer_slt_link',
                'type'  => 'url',
                'default_value' => 'https://sltmedia.com/',
            ],
        ],

        'location' => [
            [
                [
                    'param'    => 'options_page',
                    'operator' => '==',
                    'value'    => 'acf-footer-settings',
                ],
            ],
        ],

        'menu_order' => 0,
        'position'   => 'normal',
        'style'      => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active'     => true,
        'description' => '',
        'show_in_rest' => 0,
    ]);

    acf_add_options_page([
        'page_title'  => 'Header Settings',
        'menu_title'  => 'Header',
        'menu_slug'   => 'acf-header-settings',
        'capability'  => 'edit_theme_options',
        'parent_slug' => 'tools.php',     // puts it under Tools
        'redirect'    => false,
        'autoload'    => true,
        'update_button' => 'Save Header',
        'updated_message' => 'Header settings saved.',
    ]);

    /**
     * 2) Local field group bound to that options page
     */
    acf_add_local_field_group([
        'key'   => 'group_header_settings',
        'title' => 'Header Settings',
        'fields' => [

            // SOCIAL
            [
                'key'   => 'field_header_social_tab',
                'label' => 'Social',
                'type'  => 'tab',
                'placement' => 'top',
            ],
            [
                'key'   => 'field_header_social_links',
                'label' => 'Social Links',
                'name'  => 'header_social_links',
                'type'  => 'repeater',
                'layout' => 'row',
                'button_label' => 'Add Social Link',
                'sub_fields' => [
                    [
                        'key'   => 'field_header_social_icon',
                        'label' => 'Icon class',
                        'name'  => 'icon',
                        'type'  => 'text',
                        'instructions' => 'Example: fa-brands fa-facebook-f',
                    ],
                    [
                        'key'   => 'field_header_social_url',
                        'label' => 'URL',
                        'name'  => 'url',
                        'type'  => 'url',
                    ],
                ],
            ],

            // WHATSAPP
            [
                'key'   => 'field_header_whatsapp_tab',
                'label' => 'WhatsApp',
                'type'  => 'tab',
                'placement' => 'top',
            ],
            [
                'key'   => 'field_header_whatsapp_label',
                'label' => 'Label',
                'name'  => 'header_whatsapp_label',
                'type'  => 'text',
                'default_value' => 'Whatsapp us',
            ],
            [
                'key'   => 'field_header_whatsapp_phone_text',
                'label' => 'Phone (display)',
                'name'  => 'header_whatsapp_phone_text',
                'type'  => 'text',
                'default_value' => '020 7323 9534',
            ],
            [
                'key'   => 'field_header_whatsapp_tel',
                'label' => 'Tel (raw)',
                'name'  => 'header_whatsapp_tel',
                'type'  => 'text',
                'instructions' => 'Example: +442073239534 (your code can format later if you want)',
                'default_value' => '+442073239534',
            ],

            // WECHAT
            [
                'key'   => 'field_header_wechat_tab',
                'label' => 'WeChat',
                'type'  => 'tab',
                'placement' => 'top',
            ],
            [
                'key'   => 'field_header_wechat_icon_class',
                'label' => 'Icon class',
                'name'  => 'header_wechat_icon_class',
                'type'  => 'text',
                'default_value' => 'fab fa-weixin',
            ],
            [
                'key'   => 'field_header_wechat_url',
                'label' => 'WeChat URL',
                'name'  => 'header_wechat_url',
                'type'  => 'url',
                'default_value' => '#',
            ],

            // OPENING HOURS
            [
                'key'   => 'field_header_hours_tab',
                'label' => 'Opening Hours',
                'type'  => 'tab',
                'placement' => 'top',
            ],
            [
                'key'   => 'field_header_hours_label',
                'label' => 'Label',
                'name'  => 'header_hours_label',
                'type'  => 'text',
                'default_value' => 'Opening hours',
            ],
            [
                'key'   => 'field_header_hours_text',
                'label' => 'Text',
                'name'  => 'header_hours_text',
                'type'  => 'text',
                'default_value' => 'Mon-Sat, 10:00am-6:30pm',
            ],

            // LOGO
            [
                'key'   => 'field_header_logo_tab',
                'label' => 'Logo',
                'type'  => 'tab',
                'placement' => 'top',
            ],
            [
                'key'   => 'field_header_logo_image',
                'label' => 'Logo Image',
                'name'  => 'header_logo_image',
                'type'  => 'image',
                'return_format' => 'array', // your helper supports array/id/url
                'preview_size'  => 'medium',
                'library'       => 'all',
            ],

            // CTA BUTTON
            [
                'key'   => 'field_header_cta_tab',
                'label' => 'CTA Button',
                'type'  => 'tab',
                'placement' => 'top',
            ],
            [
                'key'   => 'field_header_cta_text',
                'label' => 'Button text',
                'name'  => 'header_cta_text',
                'type'  => 'text',
                'default_value' => 'BOOK YOUR CONSULTATION',
            ],
            [
                'key'   => 'field_header_cta_url',
                'label' => 'Button URL',
                'name'  => 'header_cta_url',
                'type'  => 'url',
                'default_value' => '/book/',
                'instructions' => 'You can use /book/ and it will be treated as internal in your formatUrl helper.',
            ],
        ],

        'location' => [
            [
                [
                    'param'    => 'options_page',
                    'operator' => '==',
                    'value'    => 'acf-header-settings',
                ],
            ],
        ],

        'menu_order' => 0,
        'position'   => 'normal',
        'style'      => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active'     => true,
        'description' => '',
        'show_in_rest' => 0,
    ]);

    // // Register each schema separately
    // register_acf_group_with_version('welcome_page', '4', get_welcome_page_group());
    // register_acf_group_with_version('team_page', '6', get_team_page_group()); // Bumped to force full rebuild
    // register_acf_group_with_version('rooms_page', '4', get_rooms_page_group());
    // register_acf_group_with_version('front_page', '5', get_front_page_group());
    // register_acf_group_with_version('treatments_page', '4', get_treatments_page_group());
});

/**
 * Register one ACF group with versioning.
 * Deletes and rebuilds on version change to prevent corruption.
 */

function register_acf_group_with_version(string $slug, string $schema_version, array $group): void
{
    $option_key = "acf_schema_{$slug}_version";
    $current_version = get_option($option_key);

    // If version changed, delete the old group and rebuild it fresh
    if ($current_version !== $schema_version) {
        $existing = acf_get_field_group($group['key']);

        // Delete the old field group entirely
        if (!empty($existing['ID'])) {
            acf_delete_field_group($existing['ID']);
        }

        // Don't set the ID - let ACF create it fresh
        unset($group['ID']);
    } else {
        // Same version - just get the ID and update
        $existing = acf_get_field_group($group['key']);
        if (!empty($existing['ID'])) {
            $group['ID'] = $existing['ID'];
        }
    }

    // Always update/sync the field group
    $result = acf_update_field_group($group);

    // Log result
    if (defined('WP_DEBUG') && WP_DEBUG) {
        error_log("ACF Sync [{$slug}]: Version {$schema_version} - Result: " . ($result ? 'Success' : 'Failed'));
    }

    // Update version only after successful sync
    if ($result) {
        update_option($option_key, $schema_version);
    }
}

// /**
//  * Your existing welcome group builder.
//  * Put your current $group array here (fields omitted in this example).
//  */
// function get_welcome_page_group(): array
// {
//     return [
//         'key' => 'group_welcome_page',
//         'title' => 'Welcome Page',
//         'fields' => [
//             // ... your existing fields here ...
//         ],
//         'location' => [
//             [[
//                 'param' => 'page_template',
//                 'operator' => '==',
//                 'value' => 'welcome-page.blade.php',
//             ]],
//         ],
//         'menu_order' => 0,
//         'position' => 'acf_after_title',
//         'style' => 'seamless',
//         'label_placement' => 'top',
//         'instruction_placement' => 'label',
//         'hide_on_screen' => ['the_content'],
//         'active' => true,
//         'description' => '',
//         'show_in_rest' => 0,
//     ];
// }

// function get_rooms_page_group(): array
// {
//     return [
//         'key' => 'group_rooms_page',
//         'title' => 'Rooms Template',
//         'fields' => [
//             // HERO
//             [
//                 'key' => 'field_rooms_hero_tab',
//                 'label' => 'Hero',
//                 'name' => '',
//                 'type' => 'tab',
//                 'placement' => 'top',
//             ],
//             [
//                 'key' => 'field_rooms_hero_kicker',
//                 'label' => 'Hero Kicker',
//                 'name' => 'rooms_hero_kicker',
//                 'type' => 'text',
//                 'default_value' => 'WELCOME TO CLINCITY LONDON',
//             ],
//             [
//                 'key' => 'field_rooms_hero_title',
//                 'label' => 'Hero Title',
//                 'name' => 'rooms_hero_title',
//                 'type' => 'text',
//                 'default_value' => 'MEET THE TEAM',
//             ],
//             [
//                 'key' => 'field_rooms_hero_description',
//                 'label' => 'Hero Description',
//                 'name' => 'rooms_hero_description',
//                 'type' => 'textarea',
//                 'new_lines' => 'br',
//                 'default_value' => "Where your aesthetic journey to excellence starts with our skilled team.\nGuided by leaders in cosmetic and aesthetic treatments, our committed experts are here to make your experience transformative and peaceful.",
//             ],
//             [
//                 'key' => 'field_rooms_hero_image',
//                 'label' => 'Hero Image',
//                 'name' => 'rooms_hero_image',
//                 'type' => 'image',
//                 'return_format' => 'array',
//                 'preview_size' => 'medium',
//                 'library' => 'all',
//             ],

//             // SECTION TITLES
//             [
//                 'key' => 'field_rooms_sections_tab',
//                 'label' => 'Section Titles',
//                 'name' => '',
//                 'type' => 'tab',
//                 'placement' => 'top',
//             ],
//             [
//                 'key' => 'field_rooms_left_title',
//                 'label' => 'Left Column Title',
//                 'name' => 'rooms_left_title',
//                 'type' => 'text',
//                 'default_value' => 'Room Features & Assets',
//             ],
//             [
//                 'key' => 'field_rooms_assets_title',
//                 'label' => 'Assets Title',
//                 'name' => 'rooms_assets_title',
//                 'type' => 'text',
//                 'default_value' => 'Assets',
//             ],
//             [
//                 'key' => 'field_rooms_key_features_title',
//                 'label' => 'Key Features Title',
//                 'name' => 'rooms_key_features_title',
//                 'type' => 'text',
//                 'default_value' => 'Key Features',
//             ],
//             [
//                 'key' => 'field_rooms_right_title',
//                 'label' => 'Right Column Title',
//                 'name' => 'rooms_right_title',
//                 'type' => 'text',
//                 'default_value' => 'Additional Facilities & Services:',
//             ],
//             [
//                 'key' => 'field_rooms_additional_facilities_title',
//                 'label' => 'Additional Facilities Title',
//                 'name' => 'rooms_additional_facilities_title',
//                 'type' => 'text',
//                 'default_value' => 'Additional Facilities:',
//             ],
//             [
//                 'key' => 'field_rooms_additional_services_title',
//                 'label' => 'Additional Services Title',
//                 'name' => 'rooms_additional_services_title',
//                 'type' => 'text',
//                 'default_value' => '',
//             ],

//             // LISTS
//             [
//                 'key' => 'field_rooms_lists_tab',
//                 'label' => 'Lists',
//                 'name' => '',
//                 'type' => 'tab',
//                 'placement' => 'top',
//             ],
//             [
//                 'key' => 'field_rooms_assets_items',
//                 'label' => 'Assets Items',
//                 'name' => 'rooms_assets_items',
//                 'type' => 'repeater',
//                 'layout' => 'row',
//                 'button_label' => 'Add item',
//                 'sub_fields' => [
//                     [
//                         'key' => 'field_rooms_assets_items_text',
//                         'label' => 'Text',
//                         'name' => 'text',
//                         'type' => 'text',
//                     ],
//                 ],
//             ],
//             [
//                 'key' => 'field_rooms_key_features_items',
//                 'label' => 'Key Features Items',
//                 'name' => 'rooms_key_features_items',
//                 'type' => 'repeater',
//                 'layout' => 'row',
//                 'button_label' => 'Add item',
//                 'sub_fields' => [
//                     [
//                         'key' => 'field_rooms_key_features_items_text',
//                         'label' => 'Text',
//                         'name' => 'text',
//                         'type' => 'text',
//                     ],
//                 ],
//             ],
//             [
//                 'key' => 'field_rooms_additional_facilities_items',
//                 'label' => 'Additional Facilities Items',
//                 'name' => 'rooms_additional_facilities_items',
//                 'type' => 'repeater',
//                 'layout' => 'row',
//                 'button_label' => 'Add item',
//                 'sub_fields' => [
//                     [
//                         'key' => 'field_rooms_additional_facilities_items_text',
//                         'label' => 'Text',
//                         'name' => 'text',
//                         'type' => 'text',
//                     ],
//                 ],
//             ],
//             [
//                 'key' => 'field_rooms_additional_services_items',
//                 'label' => 'Additional Services Items',
//                 'name' => 'rooms_additional_services_items',
//                 'type' => 'repeater',
//                 'layout' => 'row',
//                 'button_label' => 'Add item',
//                 'sub_fields' => [
//                     [
//                         'key' => 'field_rooms_additional_services_items_text',
//                         'label' => 'Text',
//                         'name' => 'text',
//                         'type' => 'text',
//                     ],
//                 ],
//             ],

//             // CTA
//             [
//                 'key' => 'field_rooms_cta_tab',
//                 'label' => 'CTA',
//                 'name' => '',
//                 'type' => 'tab',
//                 'placement' => 'top',
//             ],
//             [
//                 'key' => 'field_rooms_cta_button_text',
//                 'label' => 'CTA Button Text',
//                 'name' => 'rooms_cta_button_text',
//                 'type' => 'text',
//                 'default_value' => 'Rent a room',
//             ],
//             [
//                 'key' => 'field_rooms_cta_button_url',
//                 'label' => 'CTA Button URL',
//                 'name' => 'rooms_cta_button_url',
//                 'type' => 'url',
//                 'default_value' => '',
//             ],
//         ],

//         // IMPORTANT: must match the actual template filename WP stores
//         'location' => [
//             [[
//                 'param' => 'page_template',
//                 'operator' => '==',
//                 'value' => 'rooms-template.blade.php',
//             ]],
//         ],

//         'menu_order' => 0,
//         'position' => 'acf_after_title',
//         'style' => 'seamless',
//         'label_placement' => 'top',
//         'instruction_placement' => 'label',
//         'hide_on_screen' => ['the_content'],
//         'active' => true,
//         'description' => '',
//         'show_in_rest' => 0,
//     ];
// }

// function get_front_page_group(): array
// {
//     return [
//         'key' => 'group_front_page',
//         'title' => 'Front Page',
//         'fields' => [
//             [
//                 'key' => 'field_front_tab_topbar',
//                 'label' => 'Top Bar',
//                 'name' => '',
//                 'type' => 'tab',
//                 'placement' => 'top',
//             ],

//             [
//                 'key' => 'field_front_social_links',
//                 'label' => 'Social Links',
//                 'name' => 'front_social_links',
//                 'type' => 'repeater',
//                 'layout' => 'row',
//                 'button_label' => 'Add link',
//                 'sub_fields' => [
//                     [
//                         'key' => 'field_front_social_links_icon',
//                         'label' => 'Icon class',
//                         'name' => 'icon',
//                         'type' => 'text',
//                         'instructions' => 'Font Awesome class, e.g. "fa-brands fa-instagram"',
//                     ],
//                     [
//                         'key' => 'field_front_social_links_url',
//                         'label' => 'URL',
//                         'name' => 'url',
//                         'type' => 'url',
//                     ],
//                 ],
//             ],

//             [
//                 'key' => 'field_front_whatsapp_label',
//                 'label' => 'Whatsapp Label',
//                 'name' => 'front_whatsapp_label',
//                 'type' => 'text',
//                 'default_value' => 'Whatsapp us',
//             ],
//             [
//                 'key' => 'field_front_whatsapp_phone',
//                 'label' => 'Whatsapp Phone Text',
//                 'name' => 'front_whatsapp_phone',
//                 'type' => 'text',
//                 'default_value' => '020 7323 9534',
//             ],
//             [
//                 'key' => 'field_front_whatsapp_tel',
//                 'label' => 'Whatsapp Tel (digits)',
//                 'name' => 'front_whatsapp_tel',
//                 'type' => 'text',
//                 'instructions' => 'Example: +442073239534',
//                 'default_value' => '+442073239534',
//             ],
//             [
//                 'key' => 'field_front_wechat_enabled',
//                 'label' => 'Show WeChat icon',
//                 'name' => 'front_wechat_enabled',
//                 'type' => 'true_false',
//                 'ui' => 1,
//                 'default_value' => 1,
//             ],
//             [
//                 'key' => 'field_front_hours_label',
//                 'label' => 'Hours Label',
//                 'name' => 'front_hours_label',
//                 'type' => 'text',
//                 'default_value' => 'Opening hours',
//             ],
//             [
//                 'key' => 'field_front_hours_text',
//                 'label' => 'Hours Text',
//                 'name' => 'front_hours_text',
//                 'type' => 'text',
//                 'default_value' => 'Mon-Sat, 10:00am-6:30pm',
//             ],

//             /**
//              * HEADER
//              */
//             [
//                 'key' => 'field_front_tab_header',
//                 'label' => 'Header',
//                 'name' => '',
//                 'type' => 'tab',
//                 'placement' => 'top',
//             ],
//             [
//                 'key' => 'field_front_logo_image',
//                 'label' => 'Logo Image',
//                 'name' => 'front_logo_image',
//                 'type' => 'image',
//                 'return_format' => 'array',
//                 'preview_size' => 'medium',
//                 'library' => 'all',
//             ],
//             [
//                 'key' => 'field_front_header_cta_text',
//                 'label' => 'Header CTA Text',
//                 'name' => 'front_header_cta_text',
//                 'type' => 'text',
//                 'default_value' => 'BOOK YOUR CONSULTATION',
//             ],
//             [
//                 'key' => 'field_front_header_cta_url',
//                 'label' => 'Header CTA URL',
//                 'name' => 'front_header_cta_url',
//                 'type' => 'url',
//                 'default_value' => '/book/',
//             ],

//             /**
//              * TREATMENTS
//              */
//             [
//                 'key' => 'field_front_tab_treatments',
//                 'label' => 'Treatments',
//                 'name' => '',
//                 'type' => 'tab',
//                 'placement' => 'top',
//             ],
//             [
//                 'key' => 'field_front_treatments_title',
//                 'label' => 'Treatments Title',
//                 'name' => 'front_treatments_title',
//                 'type' => 'text',
//                 'default_value' => 'TREATMENTS',
//             ],
//             [
//                 'key' => 'field_front_treatments',
//                 'label' => 'Treatments Cards',
//                 'name' => 'front_treatments',
//                 'type' => 'repeater',
//                 'layout' => 'row',
//                 'button_label' => 'Add treatment',
//                 'sub_fields' => [
//                     [
//                         'key' => 'field_front_treatments_card_title',
//                         'label' => 'Title',
//                         'name' => 'title',
//                         'type' => 'text',
//                     ],
//                     [
//                         'key' => 'field_front_treatments_card_image',
//                         'label' => 'Image',
//                         'name' => 'image',
//                         'type' => 'image',
//                         'return_format' => 'array',
//                         'preview_size' => 'medium',
//                         'library' => 'all',
//                     ],
//                     [
//                         'key' => 'field_front_treatments_card_text',
//                         'label' => 'Text',
//                         'name' => 'text',
//                         'type' => 'textarea',
//                         'new_lines' => 'br',
//                     ],
//                     [
//                         'key' => 'field_front_treatments_card_url',
//                         'label' => 'URL',
//                         'name' => 'url',
//                         'type' => 'url',
//                     ],
//                 ],
//             ],
//             [
//                 'key' => 'field_front_treatment_button_text',
//                 'label' => 'Treatment Button Text (per-card)',
//                 'name' => 'front_treatment_button_text',
//                 'type' => 'text',
//                 'default_value' => 'READ MORE',
//             ],

//             /**
//              * ABOUT
//              */
//             [
//                 'key' => 'field_front_tab_about',
//                 'label' => 'About Section',
//                 'name' => '',
//                 'type' => 'tab',
//                 'placement' => 'top',
//             ],
//             [
//                 'key' => 'field_front_about_kicker',
//                 'label' => 'About Kicker',
//                 'name' => 'front_about_kicker',
//                 'type' => 'text',
//                 'default_value' => 'Aesthetic & Wellness Clinic',
//             ],
//             [
//                 'key' => 'field_front_about_title',
//                 'label' => 'About Title',
//                 'name' => 'front_about_title',
//                 'type' => 'text',
//                 'default_value' => 'Clincity London',
//             ],
//             [
//                 'key' => 'field_front_about_text',
//                 'label' => 'About Text',
//                 'name' => 'front_about_text',
//                 'type' => 'textarea',
//                 'new_lines' => 'br',
//                 'default_value' => "We’re more than just an aesthetic clinic. We’re a sanctuary in the heart of London where science and your wellness journey converge. Our team of highly skilled professionals is dedicated to guiding you on your path to radiance - that's not just on the surface.\n\nReady to start your journey with us?\nBook your consultation with our experts here.",
//             ],
//             [
//                 'key' => 'field_front_about_image',
//                 'label' => 'About Image',
//                 'name' => 'front_about_image',
//                 'type' => 'image',
//                 'return_format' => 'array',
//                 'preview_size' => 'medium',
//                 'library' => 'all',
//             ],
//             [
//                 'key' => 'field_front_about_cta_text',
//                 'label' => 'About CTA Text',
//                 'name' => 'front_about_cta_text',
//                 'type' => 'text',
//                 'default_value' => 'BOOK YOUR CONSULTATION',
//             ],
//             [
//                 'key' => 'field_front_about_cta_url',
//                 'label' => 'About CTA URL',
//                 'name' => 'front_about_cta_url',
//                 'type' => 'url',
//                 'default_value' => '/book/',
//             ],

//             /**
//              * REVIEWS
//              */
//             [
//                 'key' => 'field_front_tab_reviews',
//                 'label' => 'Reviews',
//                 'name' => '',
//                 'type' => 'tab',
//                 'placement' => 'top',
//             ],
//             [
//                 'key' => 'field_front_reviews_title',
//                 'label' => 'Reviews Title',
//                 'name' => 'front_reviews_title',
//                 'type' => 'text',
//                 'default_value' => 'GOOGLE REVIEWS',
//             ],
//             [
//                 'key' => 'field_front_reviews_shortcode',
//                 'label' => 'Reviews Shortcode',
//                 'name' => 'front_reviews_shortcode',
//                 'type' => 'text',
//                 'default_value' => '[trustindex no-registration=google]',
//             ],
//             [
//                 'key' => 'field_front_reviews_button_text',
//                 'label' => 'Reviews Button Text',
//                 'name' => 'front_reviews_button_text',
//                 'type' => 'text',
//                 'default_value' => 'READ MORE',
//             ],
//             [
//                 'key' => 'field_front_reviews_button_url',
//                 'label' => 'Reviews Button URL',
//                 'name' => 'front_reviews_button_url',
//                 'type' => 'url',
//                 'default_value' => '/reviews/',
//             ],

//             /**
//              * MAP
//              */
//             [
//                 'key' => 'field_front_tab_map',
//                 'label' => 'Map',
//                 'name' => '',
//                 'type' => 'tab',
//                 'placement' => 'top',
//             ],
//             [
//                 'key' => 'field_front_map_embed',
//                 'label' => 'Map Embed (iframe or shortcode)',
//                 'name' => 'front_map_embed',
//                 'type' => 'textarea',
//                 'instructions' => 'Paste iframe OR a shortcode like [your_map]. You will output this raw in Blade.',
//             ],
//             [
//                 'key' => 'field_front_map_label',
//                 'label' => 'Map Label',
//                 'name' => 'front_map_label',
//                 'type' => 'text',
//                 'default_value' => 'FIND US',
//             ],
//             [
//                 'key' => 'field_front_map_address',
//                 'label' => 'Address',
//                 'name' => 'front_map_address',
//                 'type' => 'text',
//                 'default_value' => '36 Great Titchfield Street, London, W1W 7BQ',
//             ],
//         ],

//         /**
//          * Location rule:
//          * This MUST match the template WP stores for your page.
//          * For Sage, it's often 'front-page.blade.php' OR 'front-page.php' depending on setup.
//          */
//         'location' => [
//             [[
//                 'param' => 'page_template',
//                 'operator' => '==',
//                 'value' => 'front-page.blade.php',
//             ]],
//         ],

//         'menu_order' => 0,
//         'position' => 'acf_after_title',
//         'style' => 'seamless',
//         'label_placement' => 'top',
//         'instruction_placement' => 'label',
//         'hide_on_screen' => ['the_content'],
//         'active' => true,
//         'description' => '',
//         'show_in_rest' => 0,
//     ];
// }


// /**
//  * Team Page group builder (add your Team fields here).
//  */
// function get_team_page_group(): array
// {
//     return [
//         'key' => 'group_team_page',
//         'title' => 'Team Page',
//         'fields' => [
//             // HERO TAB
//             [
//                 'key' => 'field_team_hero_tab',
//                 'label' => 'Hero',
//                 'name' => '',
//                 'type' => 'tab',
//                 'placement' => 'top',
//             ],
//             [
//                 'key' => 'field_team_hero_kicker',
//                 'label' => 'Hero Kicker',
//                 'name' => 'team_hero_kicker',
//                 'type' => 'text',
//                 'default_value' => 'WELCOME TO CLINCITY LONDON 123',
//             ],
//             [
//                 'key' => 'field_team_hero_title',
//                 'label' => 'Hero Title',
//                 'name' => 'team_hero_title',
//                 'type' => 'text',
//                 'default_value' => 'MEET THE TEAM',
//             ],
//             [
//                 'key' => 'field_team_hero_description',
//                 'label' => 'Hero Description',
//                 'name' => 'team_hero_description',
//                 'type' => 'textarea',
//                 'new_lines' => 'br',
//                 'default_value' => "Where your aesthetic journey to excellence starts with our skilled team.\nGuided by leaders in cosmetic and aesthetic treatments, our committed experts are here to make your experience transformative and peaceful.",
//             ],
//             [
//                 'key' => 'field_team_hero_image',
//                 'label' => 'Hero Image',
//                 'name' => 'team_hero_image',
//                 'type' => 'image',
//                 'return_format' => 'array',
//                 'preview_size' => 'medium',
//                 'library' => 'all',
//             ],

//             // SECTIONS TAB
//             [
//                 'key' => 'field_team_sections_tab',
//                 'label' => 'Sections',
//                 'name' => '',
//                 'type' => 'tab',
//                 'placement' => 'top',
//             ],
//             [
//                 'key' => 'field_team_section_heading',
//                 'label' => 'Team Section Heading',
//                 'name' => 'team_section_heading',
//                 'type' => 'text',
//                 'default_value' => 'OUR TEAM',
//             ],
//             [
//                 'key' => 'field_partners_section_heading',
//                 'label' => 'Partners Section Heading',
//                 'name' => 'partners_section_heading',
//                 'type' => 'text',
//                 'default_value' => 'OUR PARTNERS',
//             ],
//             [
//                 'key' => 'field_team_button_text',
//                 'label' => 'Button Text',
//                 'name' => 'team_button_text',
//                 'type' => 'text',
//                 'default_value' => 'READ MORE',
//             ],

//             // TEAM MEMBERS TAB
//             [
//                 'key' => 'field_team_members_tab',
//                 'label' => 'Team Members',
//                 'name' => '',
//                 'type' => 'tab',
//                 'placement' => 'top',
//             ],
//             [
//                 'key' => 'field_team_members',
//                 'label' => 'Team Members',
//                 'name' => 'team_members',
//                 'type' => 'repeater',
//                 'layout' => 'row',
//                 'button_label' => 'Add Team Member',
//                 'sub_fields' => [
//                     [
//                         'key' => 'field_team_member_name',
//                         'label' => 'Name',
//                         'name' => 'name',
//                         'type' => 'text',
//                     ],
//                     [
//                         'key' => 'field_team_member_role',
//                         'label' => 'Role',
//                         'name' => 'role',
//                         'type' => 'text',
//                     ],
//                     [
//                         'key' => 'field_team_member_image',
//                         'label' => 'Image',
//                         'name' => 'image',
//                         'type' => 'image',
//                         'return_format' => 'array',
//                         'preview_size' => 'thumbnail',
//                         'library' => 'all',
//                     ],
//                     [
//                         'key' => 'field_team_member_bio',
//                         'label' => 'Bio',
//                         'name' => 'bio',
//                         'type' => 'wysiwyg',
//                         'tabs' => 'visual',
//                         'toolbar' => 'basic',
//                         'media_upload' => 0,
//                     ],
//                     [
//                         'key' => 'field_team_member_url',
//                         'label' => 'URL',
//                         'name' => 'url',
//                         'type' => 'url',
//                     ],
//                 ],
//             ],

//             // PARTNERS TAB
//             [
//                 'key' => 'field_partners_tab',
//                 'label' => 'Partners',
//                 'name' => '',
//                 'type' => 'tab',
//                 'placement' => 'top',
//             ],
//             [
//                 'key' => 'field_partners_members',
//                 'label' => 'Partners Members',
//                 'name' => 'partners_members',
//                 'type' => 'repeater',
//                 'layout' => 'row',
//                 'button_label' => 'Add Partner',
//                 'sub_fields' => [
//                     [
//                         'key' => 'field_partner_name',
//                         'label' => 'Name',
//                         'name' => 'name',
//                         'type' => 'text',
//                     ],
//                     [
//                         'key' => 'field_partner_role',
//                         'label' => 'Role',
//                         'name' => 'role',
//                         'type' => 'text',
//                     ],
//                     [
//                         'key' => 'field_partner_image',
//                         'label' => 'Image',
//                         'name' => 'image',
//                         'type' => 'image',
//                         'return_format' => 'array',
//                         'preview_size' => 'thumbnail',
//                         'library' => 'all',
//                     ],
//                     [
//                         'key' => 'field_partner_bio',
//                         'label' => 'Bio',
//                         'name' => 'bio',
//                         'type' => 'wysiwyg',
//                         'tabs' => 'visual',
//                         'toolbar' => 'basic',
//                         'media_upload' => 0,
//                     ],
//                     [
//                         'key' => 'field_partner_url',
//                         'label' => 'URL',
//                         'name' => 'url',
//                         'type' => 'url',
//                     ],
//                 ],
//             ],

//             // MODAL TAB
//             [
//                 'key' => 'field_team_modal_tab',
//                 'label' => 'Modal (Defaults)',
//                 'name' => '',
//                 'type' => 'tab',
//                 'placement' => 'top',
//             ],
//             [
//                 'key' => 'field_team_modal_title',
//                 'label' => 'Modal Title',
//                 'name' => 'team_modal_title',
//                 'type' => 'text',
//                 'default_value' => 'MEET THE TEAM',
//             ],
//             [
//                 'key' => 'field_team_modal_default_role',
//                 'label' => 'Modal Default Role',
//                 'name' => 'team_modal_default_role',
//                 'type' => 'text',
//                 'default_value' => 'Dr William Wong',
//             ],
//             [
//                 'key' => 'field_team_modal_default_bio',
//                 'label' => 'Modal Default Bio',
//                 'name' => 'team_modal_default_bio',
//                 'type' => 'textarea',
//                 'new_lines' => 'br',
//                 'default_value' => "Where your aesthetic journey to excellence starts with our skilled team.\nGuided by leaders in cosmetic and aesthetic treatments, our committed experts are here to make your experience transformative and peaceful.",
//             ],
//         ],
//         'location' => [
//             [[
//                 'param' => 'page_template',
//                 'operator' => '==',
//                 'value' => 'team-template.blade.php',
//             ]],
//         ],
//         'menu_order' => 0,
//         'position' => 'acf_after_title',
//         'style' => 'seamless',
//         'label_placement' => 'top',
//         'instruction_placement' => 'label',
//         'hide_on_screen' => ['the_content'],
//         'active' => true,
//         'description' => '',
//         'show_in_rest' => 0,
//     ];
// }

// /**
//  * Treatments Page group builder (add your Treatments fields here).
//  */
// function get_treatments_page_group(): array
// {
//     return [
//         'key' => 'group_treatments_template',
//         'title' => 'Treatments Template',
//         'fields' => [
//             // ========== HERO (group) ==========
//             [
//                 'key' => 'field_treatment_hero',
//                 'label' => 'Hero',
//                 'name' => 'treatment_hero',
//                 'type' => 'group',
//                 'layout' => 'block',
//                 'sub_fields' => [
//                     [
//                         'key' => 'field_treatment_hero_kicker',
//                         'label' => 'Kicker',
//                         'name' => 'kicker',
//                         'type' => 'text',
//                     ],
//                     [
//                         'key' => 'field_treatment_hero_title',
//                         'label' => 'Title',
//                         'name' => 'title',
//                         'type' => 'textarea',
//                         'rows' => 4,
//                         'new_lines' => 'br',
//                     ],
//                     [
//                         'key' => 'field_treatment_hero_text',
//                         'label' => 'Text',
//                         'name' => 'text',
//                         'type' => 'textarea',
//                         'rows' => 6,
//                         'new_lines' => 'br',
//                     ],
//                     [
//                         'key' => 'field_treatment_hero_image',
//                         'label' => 'Image',
//                         'name' => 'image',
//                         'type' => 'image',
//                         'return_format' => 'array',
//                         'preview_size' => 'medium',
//                         'library' => 'all',
//                     ],
//                 ],
//             ],

//             // ========== SPLIT SECTIONS (repeater) ==========
//             [
//                 'key' => 'field_treatment_sections',
//                 'label' => 'Split Sections',
//                 'name' => 'treatment_sections',
//                 'type' => 'repeater',
//                 'layout' => 'block',
//                 'button_label' => 'Add Section',
//                 'sub_fields' => [
//                     [
//                         'key' => 'field_treatment_sections_heading',
//                         'label' => 'Heading',
//                         'name' => 'heading',
//                         'type' => 'text',
//                     ],
//                     [
//                         'key' => 'field_treatment_sections_image',
//                         'label' => 'Image',
//                         'name' => 'image',
//                         'type' => 'image',
//                         'return_format' => 'array',
//                         'preview_size' => 'medium',
//                         'library' => 'all',
//                     ],
//                     [
//                         'key' => 'field_treatment_sections_image_side',
//                         'label' => 'Image Side',
//                         'name' => 'image_side',
//                         'type' => 'select',
//                         'choices' => [
//                             'left' => 'Left',
//                             'right' => 'Right',
//                         ],
//                         'default_value' => 'left',
//                         'ui' => 1,
//                     ],
//                     [
//                         'key' => 'field_treatment_sections_content_type',
//                         'label' => 'Content Type',
//                         'name' => 'content_type',
//                         'type' => 'select',
//                         'choices' => [
//                             'bullets' => 'Bullets',
//                             'ordered' => 'Ordered',
//                             'wysiwyg' => 'WYSIWYG',
//                         ],
//                         'default_value' => 'wysiwyg',
//                         'ui' => 1,
//                     ],

//                     // bullets repeater
//                     [
//                         'key' => 'field_treatment_sections_bullets',
//                         'label' => 'Bullets',
//                         'name' => 'bullets',
//                         'type' => 'repeater',
//                         'layout' => 'row',
//                         'button_label' => 'Add Bullet',
//                         'conditional_logic' => [
//                             [[
//                                 'field' => 'field_treatment_sections_content_type',
//                                 'operator' => '==',
//                                 'value' => 'bullets',
//                             ]],
//                         ],
//                         'sub_fields' => [
//                             [
//                                 'key' => 'field_treatment_sections_bullets_title',
//                                 'label' => 'Title',
//                                 'name' => 'title',
//                                 'type' => 'text',
//                             ],
//                             [
//                                 'key' => 'field_treatment_sections_bullets_text',
//                                 'label' => 'Text',
//                                 'name' => 'text',
//                                 'type' => 'textarea',
//                                 'rows' => 3,
//                                 'new_lines' => 'br',
//                             ],
//                         ],
//                     ],

//                     // ordered repeater
//                     [
//                         'key' => 'field_treatment_sections_ordered',
//                         'label' => 'Ordered Lines',
//                         'name' => 'ordered',
//                         'type' => 'repeater',
//                         'layout' => 'row',
//                         'button_label' => 'Add Line',
//                         'conditional_logic' => [
//                             [[
//                                 'field' => 'field_treatment_sections_content_type',
//                                 'operator' => '==',
//                                 'value' => 'ordered',
//                             ]],
//                         ],
//                         'sub_fields' => [
//                             [
//                                 'key' => 'field_treatment_sections_ordered_line',
//                                 'label' => 'Line',
//                                 'name' => 'line',
//                                 'type' => 'text',
//                             ],
//                         ],
//                     ],

//                     // wysiwyg
//                     [
//                         'key' => 'field_treatment_sections_wysiwyg',
//                         'label' => 'WYSIWYG',
//                         'name' => 'wysiwyg',
//                         'type' => 'wysiwyg',
//                         'toolbar' => 'basic',
//                         'media_upload' => 0,
//                         'conditional_logic' => [
//                             [[
//                                 'field' => 'field_treatment_sections_content_type',
//                                 'operator' => '==',
//                                 'value' => 'wysiwyg',
//                             ]],
//                         ],
//                     ],
//                 ],
//             ],

//             // ========== 3-COL INFO (group) ==========
//             [
//                 'key' => 'field_treatment_info_3col',
//                 'label' => '3-Column Info Block',
//                 'name' => 'treatment_info_3col',
//                 'type' => 'group',
//                 'layout' => 'block',
//                 'sub_fields' => [
//                     [
//                         'key' => 'field_treatment_info_3col_columns',
//                         'label' => 'Columns',
//                         'name' => 'columns',
//                         'type' => 'repeater',
//                         'layout' => 'row',
//                         'min' => 3,
//                         'max' => 3,
//                         'button_label' => 'Add Column',
//                         'sub_fields' => [
//                             [
//                                 'key' => 'field_treatment_info_3col_columns_title',
//                                 'label' => 'Title',
//                                 'name' => 'title',
//                                 'type' => 'text',
//                             ],
//                             [
//                                 'key' => 'field_treatment_info_3col_columns_text',
//                                 'label' => 'Text',
//                                 'name' => 'text',
//                                 'type' => 'textarea',
//                                 'rows' => 6,
//                                 'new_lines' => 'br',
//                             ],
//                         ],
//                     ],
//                 ],
//             ],

//             // ========== PRICING BLOCKS (repeater) ==========
//             [
//                 'key' => 'field_treatment_pricing_blocks',
//                 'label' => 'Pricing Blocks',
//                 'name' => 'treatment_pricing_blocks',
//                 'type' => 'repeater',
//                 'layout' => 'block',
//                 'button_label' => 'Add Pricing Block',
//                 'sub_fields' => [
//                     [
//                         'key' => 'field_treatment_pricing_blocks_title',
//                         'label' => 'Block Title',
//                         'name' => 'title',
//                         'type' => 'text',
//                     ],

//                     // columns
//                     [
//                         'key' => 'field_treatment_pricing_blocks_columns',
//                         'label' => 'Columns',
//                         'name' => 'columns',
//                         'type' => 'repeater',
//                         'layout' => 'row',
//                         'button_label' => 'Add Column',
//                         'sub_fields' => [
//                             [
//                                 'key' => 'field_treatment_pricing_blocks_columns_key',
//                                 'label' => 'Key (must match row price keys)',
//                                 'name' => 'key',
//                                 'type' => 'text',
//                                 'instructions' => 'Examples: single, course_3, course_5',
//                             ],
//                             [
//                                 'key' => 'field_treatment_pricing_blocks_columns_label',
//                                 'label' => 'Label',
//                                 'name' => 'label',
//                                 'type' => 'text',
//                                 'instructions' => 'Example: SINGLE, COURSE OF 3',
//                             ],
//                         ],
//                     ],

//                     // rows
//                     [
//                         'key' => 'field_treatment_pricing_blocks_rows',
//                         'label' => 'Rows',
//                         'name' => 'rows',
//                         'type' => 'repeater',
//                         'layout' => 'block',
//                         'button_label' => 'Add Row',
//                         'sub_fields' => [
//                             [
//                                 'key' => 'field_treatment_pricing_blocks_rows_label',
//                                 'label' => 'Row Label',
//                                 'name' => 'label',
//                                 'type' => 'text',
//                             ],
//                             [
//                                 'key' => 'field_treatment_pricing_blocks_rows_prices',
//                                 'label' => 'Prices (key/value)',
//                                 'name' => 'prices',
//                                 'type' => 'repeater',
//                                 'layout' => 'row',
//                                 'button_label' => 'Add Price',
//                                 'sub_fields' => [
//                                     [
//                                         'key' => 'field_treatment_pricing_blocks_rows_prices_key',
//                                         'label' => 'Key',
//                                         'name' => 'key',
//                                         'type' => 'text',
//                                         'instructions' => 'Must match a column key (e.g. single)',
//                                     ],
//                                     [
//                                         'key' => 'field_treatment_pricing_blocks_rows_prices_value',
//                                         'label' => 'Value',
//                                         'name' => 'value',
//                                         'type' => 'text',
//                                         'instructions' => 'Example: £450',
//                                     ],
//                                 ],
//                             ],
//                         ],
//                     ],
//                 ],
//             ],
//         ],

//         'location' => [
//             [[
//                 'param' => 'page_template',
//                 'operator' => '==',
//                 // MUST match the actual WP template filename you assign to the page
//                 'value' => 'treatments-template.blade.php',
//             ]],
//         ],

//         'menu_order' => 0,
//         'position' => 'acf_after_title',
//         'style' => 'seamless',
//         'label_placement' => 'top',
//         'instruction_placement' => 'label',
//         'hide_on_screen' => ['the_content'],
//         'active' => true,
//         'description' => '',
//         'show_in_rest' => 0,
//     ];
// }
