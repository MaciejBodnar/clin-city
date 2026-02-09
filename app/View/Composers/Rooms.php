<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Rooms extends Composer
{
    /**
     * List of views served by this composer.
     * If your Blade is resources/views/rooms-template.blade.php -> 'rooms-template'
     */
    protected static $views = [
        'rooms-template',
        // add more if needed:
        // 'template-rooms',
        // 'page-rooms',
    ];

    public function with()
    {
        return [
            'rooms' => $this->getRoomsData(),
        ];
    }

    private function getRoomsData()
    {
        return [
            'hero' => $this->getHeroData(),
            'sections' => $this->getSectionsData(),
            'lists' => $this->getListsData(),
            'cta' => $this->getCtaData(),
        ];
    }

    private function getHeroData()
    {
        return [
            'kicker' => $this->getAcfFieldSafe('rooms_hero_kicker', false, 'WELCOME TO CLINCITY LONDON'),
            'title' => $this->getAcfFieldSafe('rooms_hero_title', false, 'MEET THE TEAM'),
            'description' => $this->getAcfFieldSafe(
                'rooms_hero_description',
                false,
                "Where your aesthetic journey to excellence starts with our skilled team.\nGuided by leaders in cosmetic and aesthetic treatments, our committed experts are here to make your experience transformative and peaceful."
            ),
            'image' => $this->getAcfImageSafe(
                'rooms_hero_image',
                false,
                'full',
                get_theme_file_uri('/resources/images/room-basic.png')
            ),
        ];
    }

    private function getSectionsData()
    {
        return [
            'left_title' => $this->getAcfFieldSafe('rooms_left_title', false, 'Room Features & Assets'),
            'left_col_1_title' => $this->getAcfFieldSafe('rooms_assets_title', false, 'Assets'),
            'left_col_2_title' => $this->getAcfFieldSafe('rooms_key_features_title', false, 'Key Features'),

            'right_title' => $this->getAcfFieldSafe('rooms_right_title', false, 'Additional Facilities & Services:'),
            'right_col_1_title' => $this->getAcfFieldSafe('rooms_additional_facilities_title', false, 'Additional Facilities:'),
            'right_col_2_title' => $this->getAcfFieldSafe('rooms_additional_services_title', false, ''), // you used &nbsp;
        ];
    }

    private function getListsData()
    {
        $assets_rows = $this->getAcfFieldSafe('rooms_assets_items', false, []);
        $key_features_rows = $this->getAcfFieldSafe('rooms_key_features_items', false, []);
        $additional_facilities_rows = $this->getAcfFieldSafe('rooms_additional_facilities_items', false, []);
        $additional_services_rows = $this->getAcfFieldSafe('rooms_additional_services_items', false, []);

        return [
            'assets' => $this->mapSimpleList($assets_rows, [
                'Electric Beauty Bed',
                'Consultant Chair',
                'Patient Chair',
                'Desk',
                'Cabinets',
                'Vinyl Flooring',
                'Sink and Tap',
                'Soap Dispenser',
                'Paper Towel Dispenser',
                'Hand Gel',
                'Aprons',
                'Couch Rolls',
                'Medical Waste Bins',
            ]),
            'key_features' => $this->mapSimpleList($key_features_rows, [
                'Waiting Area',
                'WiFi',
                'Wheelchair Access',
                'CQC-registered',
            ]),
            'additional_facilities' => $this->mapSimpleList($additional_facilities_rows, [
                'Waiting Area',
                'Locker Room',
                'Kitchen',
                'Staff Toilet / Guest Toilet',
            ]),
            'additional_services' => $this->mapSimpleList($additional_services_rows, [
                'Reception Service (clients list required)',
                'Water Dispenser',
                'Cleaning Service (after use)',
            ]),
        ];
    }

    private function getCtaData()
    {
        return [
            'button_text' => $this->getAcfFieldSafe('rooms_cta_button_text', false, 'Rent a room'),
            'button_url' => $this->formatUrl($this->getAcfFieldSafe('rooms_cta_button_url', false, '')),
        ];
    }

    /**
     * Accepts either:
     * - repeater rows like [ ['text' => '...'], ... ]
     * - or raw array of strings (if ACF returns that somehow)
     */
    private function mapSimpleList($rows, array $fallback): array
    {
        if (empty($rows) || !is_array($rows)) {
            return $fallback;
        }

        $out = [];

        foreach ($rows as $row) {
            if (is_string($row) && $row !== '') {
                $out[] = $row;
                continue;
            }

            if (is_array($row)) {
                $txt = $row['text'] ?? ($row['item'] ?? '');
                if (!empty($txt)) {
                    $out[] = $txt;
                }
            }
        }

        return !empty($out) ? $out : $fallback;
    }

    /**
     * Format URL to ensure it's absolute or has protocol
     */
    private function formatUrl($url)
    {
        if (empty($url)) {
            return $url;
        }

        if (strpos($url, '/') === 0) {
            return \home_url($url);
        }

        if (
            !preg_match("~^(?:f|ht)tps?://~i", $url)
            && strpos($url, 'mailto:') !== 0
            && strpos($url, 'tel:') !== 0
            && strpos($url, '#') !== 0
        ) {
            return 'https://' . $url;
        }

        return $url;
    }

    /**
     * Safe ACF field retrieval with fallback
     */
    private function getAcfFieldSafe($field_name, $post_id = false, $fallback = null)
    {
        if (function_exists('get_field')) {
            $value = \get_field($field_name, $post_id);
            return !empty($value) ? $value : $fallback;
        }
        return $fallback;
    }

    /**
     * Safe ACF image retrieval with fallback
     */
    private function getAcfImageSafe($field_name, $post_id = false, $size = 'full', $fallback_url = '')
    {
        if (function_exists('get_field')) {
            $image = \get_field($field_name, $post_id);

            if ($image) {
                if (is_array($image) && isset($image['url'])) {
                    return $image['url'];
                } elseif (is_string($image)) {
                    return wp_get_attachment_image_url($image, $size) ?: $image;
                } elseif (is_numeric($image)) {
                    $url = \wp_get_attachment_image_url($image, $size);
                    if (!$url) {
                        $url = \wp_get_attachment_url($image);
                    }
                    return $url ?: $fallback_url;
                }
            }
        }
        return $fallback_url;
    }
}
