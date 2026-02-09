<?php

add_filter('acf/settings/show_admin', '__return_true');

add_action('acf/init', function () {
    if (!function_exists('acf_update_field_group') || !function_exists('acf_update_field')) {
        return;
    }

    // Register each schema separately
    register_acf_group_with_version('welcome_page', '1', get_welcome_page_group());
    register_acf_group_with_version('team_page', '1', get_team_page_group());
    register_acf_group_with_version('rooms_page', '1', get_rooms_page_group());
    register_acf_group_with_version('front_page', '1', get_front_page_group());
    register_acf_group_with_version('treatments_page', '1', get_treatments_page_group());
});

/**
 * Register one ACF group with versioning (like your current code, but reusable).
 */
function register_acf_group_with_version(string $slug, string $schema_version, array $group): void
{
    $option_key = "acf_schema_{$slug}_version";

    if (get_option($option_key) === $schema_version) {
        return;
    }

    $saved_group = acf_update_field_group($group);

    $parent_id = $saved_group['ID'] ?? null;
    if ($parent_id && !empty($group['fields']) && is_array($group['fields'])) {
        foreach ($group['fields'] as $field) {
            $field['parent'] = $parent_id;
            acf_update_field($field);
        }
    }

    update_option($option_key, $schema_version);
}

/**
 * Your existing welcome group builder.
 * Put your current $group array here (fields omitted in this example).
 */
function get_welcome_page_group(): array
{
    return [
        'key' => 'group_welcome_page',
        'title' => 'Welcome Page',
        'fields' => [
            // ... your existing fields here ...
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
    ];
}

function get_rooms_page_group(): array
{
    return [
        'key' => 'group_rooms_page',
        'title' => 'Rooms Template',
        'fields' => [
            // HERO
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

            // SECTION TITLES
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

            // CTA
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

        // IMPORTANT: must match the actual template filename WP stores
        'location' => [
            [[
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'rooms-template.blade.php',
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
    ];
}

function get_front_page_group(): array
{
    return [
        'key' => 'group_front_page',
        'title' => 'Front Page',
        'fields' => [
            /**
             * TOPBAR
             */
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
            [
                'key' => 'field_front_map_embed',
                'label' => 'Map Embed (iframe or shortcode)',
                'name' => 'front_map_embed',
                'type' => 'textarea',
                'instructions' => 'Paste iframe OR a shortcode like [your_map]. You will output this raw in Blade.',
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
        ],

        /**
         * Location rule:
         * This MUST match the template WP stores for your page.
         * For Sage, it's often 'front-page.blade.php' OR 'front-page.php' depending on setup.
         */
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
    ];
}


/**
 * Team Page group builder (add your Team fields here).
 */
function get_team_page_group(): array
{
    return [
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
    ];
}
/**
 * Treatments Page group builder (add your Treatments fields here).
 */
function get_treatments_page_group(): array
{
    return [
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
    ];
}
