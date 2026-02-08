<?php

add_action('acf/init', function () {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group([
        'key' => 'group_welcome_page',
        'title' => 'Welcome Page',
        'fields' => [
            // HERO
            [
                'key' => 'field_hero_tab',
                'label' => 'Hero',
                'type' => 'tab',
            ],
            [
                'key' => 'field_hero_video_url',
                'label' => 'Hero video (URL or file)',
                'name' => 'hero_video_url',
                'type' => 'url',
            ],
            [
                'key' => 'field_hero_video_placeholder',
                'label' => 'Hero video placeholder',
                'name' => 'hero_video_placeholder',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ],
            [
                'key' => 'field_hero_image_mobile',
                'label' => 'Hero image mobile',
                'name' => 'hero_image_mobile',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ],
            [
                'key' => 'field_hero_image_first_text',
                'label' => 'Hero image first text',
                'name' => 'hero_image_first_text',
                'type' => 'text',
            ],
            [
                'key' => 'field_hero_image_second_text',
                'label' => 'Hero image second text',
                'name' => 'hero_image_second_text',
                'type' => 'text',
            ],
            [
                'key' => 'field_hero_title',
                'label' => 'Hero title',
                'name' => 'hero_title',
                'type' => 'text',
            ],
            [
                'key' => 'field_hero_title_2',
                'label' => 'Hero title 2',
                'name' => 'hero_title_2',
                'type' => 'text',
            ],
            [
                'key' => 'field_hero_bg_image',
                'label' => 'Hero background image',
                'name' => 'hero_bg_image',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ],
            [
                'key' => 'field_hero_description',
                'label' => 'Hero description',
                'name' => 'hero_description',
                'type' => 'textarea',
                'new_lines' => 'br',
            ],
            [
                'key' => 'field_hero_button_text',
                'label' => 'Hero button text',
                'name' => 'hero_button_text',
                'type' => 'text',
            ],
            [
                'key' => 'field_hero_button_url',
                'label' => 'Hero button URL',
                'name' => 'hero_button_url',
                'type' => 'url',
            ],

            // DEVICE BANNER
            [
                'key' => 'field_device_tab',
                'label' => 'Device Banner',
                'type' => 'tab',
            ],
            [
                'key' => 'field_device_banner_image',
                'label' => 'Device image',
                'name' => 'device_banner_image',
                'type' => 'image',
                'return_format' => 'array',
            ],
            [
                'key' => 'field_device_banner_bg_image',
                'label' => 'Background image',
                'name' => 'device_banner_bg_image',
                'type' => 'image',
                'return_format' => 'array',
            ],
            [
                'key' => 'field_device_banner_bg_image_mobile',
                'label' => 'Background image (mobile)',
                'name' => 'device_banner_bg_image_mobile',
                'type' => 'image',
                'return_format' => 'array',
            ],
            [
                'key' => 'field_device_banner_title',
                'label' => 'Title',
                'name' => 'device_banner_title',
                'type' => 'text',
            ],
            [
                'key' => 'field_device_banner_title_2',
                'label' => 'Title 2',
                'name' => 'device_banner_title_2',
                'type' => 'text',
            ],

            // REVIEWS
            [
                'key' => 'field_reviews_tab',
                'label' => 'Reviews',
                'type' => 'tab',
            ],
            [
                'key' => 'field_reviews_title',
                'label' => 'Title',
                'name' => 'reviews_title',
                'type' => 'text',
            ],
            [
                'key' => 'field_reviews_title_2',
                'label' => 'Title 2',
                'name' => 'reviews_title_2',
                'type' => 'text',
            ],
            [
                'key' => 'field_reviews_rows',
                'label' => 'Reviews list',
                'name' => 'reviews_rows',
                'type' => 'repeater',
                'layout' => 'row',
                'button_label' => 'Add review',
                'sub_fields' => [
                    [
                        'key' => 'field_reviews_row_text',
                        'label' => 'Text',
                        'name' => 'text',
                        'type' => 'textarea',
                        'new_lines' => 'br',
                    ],
                    [
                        'key' => 'field_reviews_row_name',
                        'label' => 'Name',
                        'name' => 'name',
                        'type' => 'text',
                    ],
                ],
            ],
            [
                'key' => 'field_reviews_device_image',
                'label' => 'Device image',
                'name' => 'reviews_device_image',
                'type' => 'image',
                'return_format' => 'array',
            ],
            [
                'key' => 'field_statistics_rows',
                'label' => 'Statistics',
                'name' => 'statistics_rows',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Add stat',
                'sub_fields' => [
                    [
                        'key' => 'field_stat_number',
                        'label' => 'Number',
                        'name' => 'number',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_stat_label',
                        'label' => 'Label',
                        'name' => 'label',
                        'type' => 'textarea',
                        'new_lines' => 'br',
                    ],
                ],
            ],

            // CTA
            [
                'key' => 'field_cta_tab',
                'label' => 'CTA',
                'type' => 'tab',
            ],
            [
                'key' => 'field_cta_bg_image',
                'label' => 'Background image',
                'name' => 'cta_bg_image',
                'type' => 'image',
                'return_format' => 'array',
            ],
            [
                'key' => 'field_cta_title',
                'label' => 'Title',
                'name' => 'cta_title',
                'type' => 'text',
            ],
            [
                'key' => 'field_cta_title_2',
                'label' => 'Title 2',
                'name' => 'cta_title_2',
                'type' => 'text',
            ],
            [
                'key' => 'field_cta_button_left_text',
                'label' => 'Left button text',
                'name' => 'cta_button_left_text',
                'type' => 'text',
            ],
            [
                'key' => 'field_cta_button_left_url',
                'label' => 'Left button URL',
                'name' => 'cta_button_left_url',
                'type' => 'url',
            ],
            [
                'key' => 'field_cta_button_right_text',
                'label' => 'Right button text',
                'name' => 'cta_button_right_text',
                'type' => 'text',
            ],
            [
                'key' => 'field_cta_button_right_url',
                'label' => 'Right button URL',
                'name' => 'cta_button_right_url',
                'type' => 'url',
            ],
        ],

        // IMPORTANT: where this field group appears
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ],
                // optionally: only show on a specific page
                // [
                //   'param' => 'page',
                //   'operator' => '==',
                //   'value' => 'welcome', // slug or ID depending on ACF version
                // ],
            ],
        ],

        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => [],
        'active' => true,
    ]);
});
