<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Welcome extends Composer
{
    /**
     * If your template is resources/views/welcome-page.blade.php -> 'welcome-page'
     */
    protected static $views = [
        'welcome-page',
    ];

    public function with()
    {
        return [
            'welcome' => $this->getWelcomeData(),
        ];
    }

    private function getWelcomeData()
    {
        return [
            'topbar' => $this->getTopbarData(),
            'hero' => $this->getHeroData(),
            'treatments_nav' => $this->getTreatmentsNavData(),
            'enter' => $this->getEnterData(),
            'footer' => $this->getFooterData(),
        ];
    }

    private function getTopbarData()
    {
        $social_rows = $this->getAcfFieldSafe('welcome_social_links', false, []);

        if (empty($social_rows)) {
            $social = [
                ['icon' => '<i class="fa-brands fa-facebook-f"></i>', 'url' => '#'],
                ['icon' => '<i class="fa-brands fa-tiktok"></i>', 'url' => '#'],
                ['icon' => '<i class="fa-brands fa-instagram"></i>', 'url' => '#'],
            ];
        } else {
            $social = [];
            foreach ($social_rows as $row) {
                $social[] = [
                    'icon' => $row['icon'] ?? '',
                    'url' => $this->formatUrl($row['url'] ?? '#'),
                ];
            }
        }

        return [
            'social' => $social,

            'whatsapp_label' => $this->getAcfFieldSafe('welcome_whatsapp_label', false, 'Whatsapp us'),
            'whatsapp_phone_text' => $this->getAcfFieldSafe('welcome_whatsapp_phone_text', false, '020 7323 9534'),
            'whatsapp_url' => $this->getAcfFieldSafe('welcome_whatsapp_url', false, 'https://wa.me/442073239534'),

            'wechat_enabled' => (bool) $this->getAcfFieldSafe('welcome_wechat_enabled', false, 1),
            'wechat_url' => $this->getAcfFieldSafe('welcome_wechat_url', false, '#123'),

            'hours_enabled' => (bool) $this->getAcfFieldSafe('welcome_hours_enabled', false, 1),
            'hours_label' => $this->getAcfFieldSafe('welcome_hours_label', false, 'Opening hours'),
            'hours_text' => $this->getAcfFieldSafe('welcome_hours_text', false, 'Mon-Sat, 10:00am-6:30pm'),
        ];
    }

    private function getHeroData()
    {
        return [
            // background image behind the hero (your placeholder)
            'bg_image' => $this->getAcfImageSafe(
                'welcome_hero_bg_image',
                false,
                'full',
                get_theme_file_uri('/resources/images/cute-girl.png') // fallback
            ),

            // logo image in the middle
            'logo_image' => $this->getAcfImageSafe(
                'welcome_logo_image',
                false,
                'full',
                get_theme_file_uri('/resources/images/logo.png')
            ),

            'subtitle' => $this->getAcfFieldSafe(
                'welcome_subtitle',
                false,
                'MEDICAL-FIRST APPROACH TO AESTHETICS'
            ),

            // optional: link for each nav item if you want it
            'nav_default_url' => $this->formatUrl($this->getAcfFieldSafe('welcome_nav_default_url', false, '/')),
        ];
    }

    private function getTreatmentsNavData()
    {
        $rows = $this->getAcfFieldSafe('welcome_treatments_nav', false, []);

        if (empty($rows)) {
            return [
                ['label' => 'ULTHERAPY', 'url' => $this->formatUrl('/')],
                ['label' => 'THERMAGE', 'url' => $this->formatUrl('/')],
                ['label' => 'BBL+HALO', 'url' => $this->formatUrl('/')],
                ['label' => 'ANTI WRINKLE INJECTIONS AND DERMA FILLERS', 'url' => $this->formatUrl('/')],
                ['label' => 'SKINPEN', 'url' => $this->formatUrl('/')],
                ['label' => 'SKIN BOOSTERS', 'url' => $this->formatUrl('/')],
                ['label' => 'CLEAR & BRILLIANT', 'url' => $this->formatUrl('/')],
                ['label' => 'CHEMICAL PEEL', 'url' => $this->formatUrl('/')],
                ['label' => 'HYDRO2', 'url' => $this->formatUrl('/')],
            ];
        }

        $items = [];
        foreach ($rows as $row) {
            $items[] = [
                'label' => $row['label'] ?? '',
                'url' => $this->formatUrl($row['url'] ?? $this->getAcfFieldSafe('welcome_nav_default_url', false, '/')),
            ];
        }

        return $items;
    }

    private function getEnterData()
    {
        return [
            'text' => $this->getAcfFieldSafe('welcome_enter_button_text', false, 'ENTER OUR WEBSITE'),
            'url' => $this->formatUrl($this->getAcfFieldSafe('welcome_enter_button_url', false, '/')),
        ];
    }

    private function getFooterData()
    {
        return [
            'left_text' => $this->getAcfFieldSafe(
                'welcome_footer_left_text',
                false,
                'The Central London Clinic Ltd.'
            ),
            'right_text' => $this->getAcfFieldSafe(
                'welcome_footer_right_text',
                false,
                'D&C with'
            ),
            'brand_text' => $this->getAcfFieldSafe(
                'welcome_footer_brand_text',
                false,
                'Sltmedia'
            ),
            'show_heart' => (bool) $this->getAcfFieldSafe('welcome_footer_show_heart', false, 1),
        ];
    }

    /**
     * Helpers (same idea as your other composers)
     */

    private function formatUrl($url)
    {
        if (empty($url)) {
            return $url;
        }

        // If it starts with /, treat as internal relative to home_url
        if (strpos($url, '/') === 0) {
            return \home_url($url);
        }

        // If it doesn't have a protocol and doesn't look like an anchor or mailto/tel
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

    private function formatTel($tel)
    {
        if (empty($tel)) return $tel;
        if (strpos($tel, 'tel:') === 0) return $tel;

        $clean = preg_replace('/[^0-9\+]/', '', $tel);
        return 'tel:' . $clean;
    }

    private function getAcfFieldSafe($field_name, $post_id = false, $fallback = null)
    {
        if (function_exists('get_field')) {
            $value = \get_field($field_name, $post_id);
            return !empty($value) ? $value : $fallback;
        }
        return $fallback;
    }

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
