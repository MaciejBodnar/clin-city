<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Footer extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'sections.footer',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'footer' => $this->getFooterData(),
        ];
    }

    private function getFooterData(): array
    {
        $rows = $this->getAcfFieldSafe('footer_social_links', 'option', []);

        $quick_links = $this->getAcfFieldSafe('footer_quick_links', 'option', []);

        if (empty($quick_links)) {
            $formatted_quick_links = [
                ['label' => 'Basic Room', 'url' => '#'],
                ['label' => 'Team', 'url' => '#'],
                ['label' => 'Home', 'url' => '#'],
            ];
        } else {
            $formatted_quick_links = [];
            foreach ($quick_links as $link) {
                $formatted_quick_links[] = [
                    'label' => $link['label'] ?? '',
                    'url'   => $this->formatUrl($link['url'] ?? '#'),
                ];
            }
        }

        if (empty($rows)) {
            $social = [
                ['icon' => '<i class="fa-brands fa-facebook-f"></i>', 'url' => '#'],
                ['icon' => '<i class="fa-brands fa-tiktok"></i>', 'url' => '#'],
                ['icon' => '<i class="fa-brands fa-instagram"></i>', 'url' => '#'],
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
            'find_us'      => $this->getAcfFieldSafe('footer_find_us', 'option', 'Find us online'),
            'whatsapp' => [
                'label'      => $this->getAcfFieldSafe('footer_whatsapp_label', 'option', 'Whatsapp us'),
                'phone_text' => $this->getAcfFieldSafe('footer_whatsapp_phone_text', 'option', '020 7323 9534'),
                'tel'        => $this->getAcfFieldSafe('footer_whatsapp_tel', 'option', '+442073239534'),
            ],

            'email' => [
                'url'        => $this->getAcfFieldSafe('footer_email_url', 'option', 'info@clincity.com'),
            ],

            'address' => [
                'text'    => $this->getAcfFieldSafe('footer_address_text', 'option', '36 Great Titchfield Street, London, W1W 8BQ'),
            ],
            'logo'  => $this->getAcfImageSafe('footer_logo_image', 'option', 'full', get_template_directory_uri() . '/resources/images/logo-menu.png'),
            'logo_link' => home_url('/'),
            'quick_links' => $formatted_quick_links,
            'copyright_text' => $this->getAcfFieldSafe('footer_copyright_text', 'option', '© 2026 - The Central London Clinic Ltd. - D&C with'),
            'heart_icon_class' => $this->getAcfFieldSafe('footer_heart_icon_class', 'option', 'fa-solid fa-heart'),
            'slt_text' => $this->getAcfFieldSafe('footer_slt_text', 'option', 'Sltmedia'),
            'slt_link' => $this->getAcfFieldSafe('footer_slt_link', 'option', 'https://sltmedia.com/'),
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
