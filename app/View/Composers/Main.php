<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Main extends Composer
{
    /**
     * If your template is resources/views/front-page.blade.php -> 'front-page'
     */
    protected static $views = [
        'front-page',
    ];

    public function with()
    {
        return [
            'front' => $this->getFrontData(),
        ];
    }

    private function getFrontData()
    {
        return [
            'topbar' => $this->getTopbarData(),
            'header' => $this->getHeaderData(),
            'treatments' => $this->getTreatmentsData(),
            'about' => $this->getAboutData(),
            'reviews' => $this->getReviewsData(),
            'map' => $this->getMapData(),
        ];
    }

    private function getTopbarData()
    {
        $social_rows = $this->getAcfFieldSafe('front_social_links', false, []);

        $social = [];
        if (empty($social_rows)) {
            $social = [
                ['icon' => 'fa-brands fa-facebook-f', 'url' => '#'],
                ['icon' => 'fa-brands fa-tiktok', 'url' => '#'],
                ['icon' => 'fa-brands fa-instagram', 'url' => '#'],
            ];
        } else {
            foreach ($social_rows as $row) {
                $social[] = [
                    'icon' => $row['icon'] ?? 'fa-brands fa-facebook-f',
                    'url' => $this->formatUrl($row['url'] ?? '#'),
                ];
            }
        }

        return [
            'social' => $social,

            'whatsapp_label' => $this->getAcfFieldSafe('front_whatsapp_label', false, 'Whatsapp us'),
            'whatsapp_phone' => $this->getAcfFieldSafe('front_whatsapp_phone', false, '020 7323 9534'),
            'whatsapp_tel' => $this->formatTel($this->getAcfFieldSafe('front_whatsapp_tel', false, '+442073239534')),
            'wechat_enabled' => (bool) $this->getAcfFieldSafe('front_wechat_enabled', false, 1),

            'hours_label' => $this->getAcfFieldSafe('front_hours_label', false, 'Opening hours'),
            'hours_text' => $this->getAcfFieldSafe('front_hours_text', false, 'Mon-Sat, 10:00am-6:30pm'),
        ];
    }

    private function getHeaderData()
    {
        return [
            'logo' => $this->getAcfImageSafe(
                'front_logo_image',
                false,
                'full',
                get_theme_file_uri('/resources/images/front-page-hero.png')
            ),
            'logo_mobile' => $this->getAcfImageSafe(
                'front_logo_mobile_image',
                false,
                'full',
                get_theme_file_uri('/resources/images/logo_mobile.png')
            ),

            'cta_text' => $this->getAcfFieldSafe('front_header_cta_text', false, 'BOOK YOUR CONSULTATION'),
            'cta_url' => $this->formatUrl($this->getAcfFieldSafe('front_header_cta_url', false, '/book/')),
        ];
    }

    private function getTreatmentsData()
    {
        $rows = $this->getAcfFieldSafe('front_treatments', false, []);

        if (empty($rows)) {
            $rows = [
                [
                    'title' => 'ULTHERAPY PRIME',
                    'image' => '',
                    'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.',
                    'url' => '/treatments/ultherapy-prime',
                ],
                [
                    'title' => 'THERMAGE FLX',
                    'image' => '',
                    'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.',
                    'url' => '/treatments/thermage-flx',
                ],
                [
                    'title' => 'BBL LASER',
                    'image' => '',
                    'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.',
                    'url' => '/treatments/bbl-laser',
                ],
                [
                    'title' => 'ANTI WRINKLE INJECTIONS',
                    'image' => '',
                    'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.',
                    'url' => '/treatments/anti-wrinkle-injections',
                ],
                [
                    'title' => 'SKINPEN MICRONEEDLING',
                    'image' => '',
                    'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.',
                    'url' => '/treatments/skinpen-microneedling',
                ],
                [
                    'title' => 'SKIN BOOSTER',
                    'image' => '',
                    'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.',
                    'url' => '/treatments/skin-booster',
                ],
                [
                    'title' => 'CLEAR & BRILLIANT LASER',
                    'image' => '',
                    'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.',
                    'url' => '/treatments/clear-brilliant',
                ],
                [
                    'title' => 'CHEMICAL PEELS',
                    'image' => '',
                    'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.',
                    'url' => '/treatments/chemical-peels',
                ],
                [
                    'title' => 'HYDRO2 FACIAL',
                    'image' => '',
                    'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.',
                    'url' => '/treatments/hydro2-facial',
                ],
            ];
        }

        $cards = [];
        foreach ($rows as $row) {
            $cards[] = [
                'title' => $row['title'] ?? '',
                'image' => $this->extractImageUrl($row['image'] ?? ''),
                'text' => $row['text'] ?? '',
                'url' => $this->formatUrl($row['url'] ?? ''),
            ];
        }

        return [
            'title' => $this->getAcfFieldSafe('front_treatments_title', false, 'TREATMENTS'),
            'cards' => $cards,
            'button_text' => $this->getAcfFieldSafe('front_treatment_button_text', false, 'READ MORE'),
        ];
    }

    private function getAboutData()
    {
        return [
            'kicker' => $this->getAcfFieldSafe('front_about_kicker', false, 'Aesthetic & Wellness Clinic'),
            'title' => $this->getAcfFieldSafe('front_about_title', false, 'Clincity London'),
            'text' => $this->getAcfFieldSafe(
                'front_about_text',
                false,
                "We’re more than just an aesthetic clinic. We’re a sanctuary in the heart of London where science and your wellness journey converge. Our team of highly skilled professionals is dedicated to guiding you on your path to radiance - that's not just on the surface.\n\nReady to start your journey with us?\nBook your consultation with our experts here."
            ),
            'image' => $this->getAcfImageSafe(
                'front_about_image',
                false,
                'full',
                get_theme_file_uri('/resources/images/tenderness-with-curls.png')
            ),
            'cta_text' => $this->getAcfFieldSafe('front_about_cta_text', false, 'BOOK YOUR CONSULTATION'),
            'cta_url' => $this->formatUrl($this->getAcfFieldSafe('front_about_cta_url', false, '/book/')),
        ];
    }

    private function getReviewsData()
    {
        return [
            'title' => $this->getAcfFieldSafe('front_reviews_title', false, 'GOOGLE REVIEWS'),
            'shortcode' => $this->getAcfFieldSafe('front_reviews_shortcode', false, '[trustindex no-registration=google]'),
            'button_text' => $this->getAcfFieldSafe('front_reviews_button_text', false, 'READ MORE'),
            'button_url' => $this->formatUrl($this->getAcfFieldSafe('front_reviews_button_url', false, '/reviews/')),
            'brand_logos' => $this->getAcfImageSafe(
                'front_reviews_brand_logos',
                false,
                'full',
                get_theme_file_uri('/resources/images/brands.png')
            ),
        ];
    }

    private function getMapData()
    {
        return [
            'embed' => $this->getAcfFieldSafe('front_map_embed', false, ''), // iframe OR shortcode
            'address_label' => $this->getAcfFieldSafe('front_map_label', false, 'FIND US'),
            'address_text' => $this->getAcfFieldSafe(
                'front_map_address',
                false,
                '36 Great Titchfield Street, London, W1W 7BQ'
            ),
        ];
    }

    /**
     * Helpers
     */

    private function extractImageUrl($image, $size = 'full')
    {
        if (empty($image)) {
            return '';
        }
        if (is_array($image) && isset($image['url'])) {
            return $image['url'];
        }
        if (is_numeric($image)) {
            return wp_get_attachment_image_url((int) $image, $size) ?: '';
        }
        if (is_string($image)) {
            if (ctype_digit($image)) {
                return wp_get_attachment_image_url((int) $image, $size) ?: '';
            }
            return $image;
        }
        return '';
    }

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

    private function formatTel($tel)
    {
        if (empty($tel)) return $tel;
        // if already tel:
        if (strpos($tel, 'tel:') === 0) return $tel;
        // keep + and digits
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
