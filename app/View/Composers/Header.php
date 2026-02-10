<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Header extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'sections.header',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'header' => $this->getHeaderData(),
        ];
    }

    private function getHeaderData(): array
    {
        $rows = $this->getAcfFieldSafe('header_social_links', 'option', []);

        if (empty($rows)) {
            $social = [
                ['icon' => 'fa-brands fa-facebook-f', 'url' => '#'],
                ['icon' => 'fa-brands fa-tiktok', 'url' => '#'],
                ['icon' => 'fa-brands fa-instagram', 'url' => '#'],
            ];
        } else {
            $social = [];
            foreach ($rows as $row) {
                $social[] = [
                    'icon' => $row['icon'] ?? '',
                    'url'  => $this->formatUrl($row['url'] ?? '#'),
                ];
            }
        }

        return [
            'social' => $social,

            'whatsapp' => [
                'label'      => $this->getAcfFieldSafe('header_whatsapp_label', 'option', 'Whatsapp us'),
                'phone_text' => $this->getAcfFieldSafe('header_whatsapp_phone_text', 'option', '020 7323 9534'),
                'tel'        => $this->getAcfFieldSafe('header_whatsapp_tel', 'option', '+442073239534'),
            ],

            'wechat' => [
                'icon_class' => $this->getAcfFieldSafe('header_wechat_icon_class', 'option', 'fab fa-weixin'),
                'url'        => $this->formatUrl($this->getAcfFieldSafe('header_wechat_url', 'option', '#')),
            ],

            'hours' => [
                'label'   => $this->getAcfFieldSafe('header_hours_label', 'option', 'Opening hours'),
                'text'    => $this->getAcfFieldSafe('header_hours_text', 'option', 'Mon-Sat, 10:00am-6:30pm'),
            ],
            'logo'  => $this->getAcfImageSafe('header_logo_image', 'option', 'full', get_template_directory_uri() . '/resources/images/logo-menu.png'),
            'logo_link' => home_url('/'),
            'button_text'    => $this->getAcfFieldSafe('header_cta_text', 'option', 'BOOK YOUR CONSULTATION'),
            'button_url'     => $this->formatUrl($this->getAcfFieldSafe('header_cta_url', 'option', '/book/')),
        ];
    }

    /**
     * Helpers
     */
    private function formatUrl($url)
    {
        if (empty($url)) {
            return $url;
        }

        if (strpos($url, '/') === 0) {
            return home_url($url);
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

    private function getAcfFieldSafe($field_name, $post_id = 'option', $fallback = null)
    {
        if (function_exists('get_field')) {
            $value = get_field($field_name, $post_id);
            return !empty($value) ? $value : $fallback;
        }
        return $fallback;
    }

    private function getAcfImageSafe($field_name, $post_id = 'option', $size = 'full', $fallback_url = '')
    {
        if (function_exists('get_field')) {
            $image = get_field($field_name, $post_id);

            if ($image) {
                if (is_array($image) && isset($image['url'])) {
                    return $image['url'];
                } elseif (is_string($image)) {
                    return wp_get_attachment_image_url($image, $size) ?: $image;
                } elseif (is_numeric($image)) {
                    $url = wp_get_attachment_image_url($image, $size);
                    if (!$url) $url = wp_get_attachment_url($image);
                    return $url ?: $fallback_url;
                }
            }
        }

        return $fallback_url;
    }
}
