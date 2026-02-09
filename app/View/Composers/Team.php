<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Team extends Composer
{
    /**
     * List of views served by this composer.
     *
     * IMPORTANT:
     * Put the actual Blade view name you use.
     * If your template is resources/views/team-template.blade.php -> 'team-template'
     */
    protected static $views = [
        'team-template',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'team' => $this->getTeamData(),
        ];
    }

    private function getTeamData()
    {
        return [
            'hero' => $this->getHeroData(),
            'sections' => $this->getSectionsData(),
            'team_members' => $this->getTeamMembersData(),
            'partners' => $this->getPartnersData(),
            'modal' => $this->getModalData(),
        ];
    }

    private function getHeroData()
    {
        return [
            'kicker' => $this->getAcfFieldSafe('team_hero_kicker', false, 'WELCOME TO CLINCITY LONDON'),
            'title' => $this->getAcfFieldSafe('team_hero_title', false, 'MEET THE TEAM'),
            'description' => $this->getAcfFieldSafe(
                'team_hero_description',
                false,
                "Where your aesthetic journey to excellence starts with our skilled team.\nGuided by leaders in cosmetic and aesthetic treatments, our committed experts are here to make your experience transformative and peaceful."
            ),
            'image' => $this->getAcfImageSafe(
                'team_hero_image',
                false,
                'full',
                get_theme_file_uri('/resources/images/logo-on-window.png')
            ),
        ];
    }

    private function getSectionsData()
    {
        return [
            'team_heading' => $this->getAcfFieldSafe('team_section_heading', false, 'OUR TEAM'),
            'partners_heading' => $this->getAcfFieldSafe('partners_section_heading', false, 'OUR PARTNERS'),
            'button_text' => $this->getAcfFieldSafe('team_button_text', false, 'READ MORE'),
        ];
    }

    private function getTeamMembersData()
    {
        $rows = $this->getAcfFieldSafe('team_members', false, []);

        // Fallback to your hardcoded defaults if repeater empty
        if (empty($rows)) {
            return [
                [
                    'name' => 'Dr William Wong',
                    'role' => 'MEDICAL DIRECTOR AND CQC NOMINATED INDIVIDUAL, CLINCITY',
                    'image' => get_theme_file_uri('/resources/images/william.png'),
                    'bio' => '',
                    'url' => $this->formatUrl('/team/dr-william-wong/'),
                ],
                [
                    'name' => 'Agata',
                    'role' => 'TEAM LEADER AND AESTHETIC THERAPIST',
                    'image' => '',
                    'bio' => '',
                    'url' => $this->formatUrl('/team/agata/'),
                ],
                [
                    'name' => 'Gentiana',
                    'role' => 'AESTHETIC PRACTITIONER',
                    'image' => '',
                    'bio' => '',
                    'url' => $this->formatUrl('/team/gentiana/'),
                ],
                [
                    'name' => 'Sara',
                    'role' => 'AESTHETIC THERAPIST',
                    'image' => '',
                    'bio' => '',
                    'url' => $this->formatUrl('/team/sara/'),
                ],
                [
                    'name' => 'David',
                    'role' => 'CLIENT RELATIONS MANAGER',
                    'image' => '',
                    'bio' => '',
                    'url' => $this->formatUrl('/team/david/'),
                ],
            ];
        }

        // Map repeater rows to your Blade structure
        $members = [];
        foreach ($rows as $row) {
            $members[] = [
                'name' => $row['name'] ?? '',
                'role' => $row['role'] ?? '',
                'image' => $this->extractImageUrl($row['image'] ?? ''),
                'bio' => $row['bio'] ?? '',
                'url' => $this->formatUrl($row['url'] ?? ''),
            ];
        }

        return $members;
    }

    private function getPartnersData()
    {
        $rows = $this->getAcfFieldSafe('partners_members', false, []);

        // Fallback to your hardcoded defaults if repeater empty
        if (empty($rows)) {
            return [
                [
                    'name' => 'Dr Li',
                    'role' => 'TRADITIONAL CHINESE MEDICINE (TCM) DOCTOR',
                    'image' => '',
                    'bio' => '',
                    'url' => $this->formatUrl('/partners/dr-li/'),
                ],
                [
                    'name' => 'Dr Lara De Luca',
                    'role' => 'PLASTIC SURGEON AND AESTHETIC DOCTOR',
                    'image' => '',
                    'bio' => '',
                    'url' => $this->formatUrl('/partners/dr-lara-de-luca/'),
                ],
                [
                    'name' => 'Karolina Jendras',
                    'role' => 'REGISTERED INDEPENDENT NURSE PRESCRIBER',
                    'image' => '',
                    'bio' => '',
                    'url' => $this->formatUrl('/partners/karolina-jendras/'),
                ],
                [
                    'name' => 'Helen Chapman',
                    'role' => 'ADVANCED MEDICAL AESTHETIC PRACTITIONER',
                    'image' => '',
                    'bio' => '',
                    'url' => $this->formatUrl('/partners/helen-chapman/'),
                ],
                [
                    'name' => 'Dr Torka Hirbod',
                    'role' => 'AESTHETIC DOCTOR',
                    'image' => '',
                    'bio' => '',
                    'url' => $this->formatUrl('/partners/dr-torka-hirbod/'),
                ],
            ];
        }

        $partners = [];
        foreach ($rows as $row) {
            $partners[] = [
                'name' => $row['name'] ?? '',
                'role' => $row['role'] ?? '',
                'image' => $this->extractImageUrl($row['image'] ?? ''),
                'bio' => $row['bio'] ?? '',
                'url' => $this->formatUrl($row['url'] ?? ''),
            ];
        }

        return [
            $partners,
        ];
    }

    private function getModalData()
    {
        // Optional: control default modal placeholders from ACF
        return [
            'title' => $this->getAcfFieldSafe('team_modal_title', false, 'MEET THE TEAM'),
            'default_role' => $this->getAcfFieldSafe('team_modal_default_role', false, 'Dr William Wong'),
            'default_bio' => $this->getAcfFieldSafe(
                'team_modal_default_bio',
                false,
                "Where your aesthetic journey to excellence starts with our skilled team.\nGuided by leaders in cosmetic and aesthetic treatments, our committed experts are here to make your experience transformative and peaceful."
            ),
        ];
    }

    /**
     * Extract image URL from ACF image field value (array/id/url).
     */
    private function extractImageUrl($image, $size = 'full')
    {
        if (empty($image)) {
            return '';
        }

        // ACF image array
        if (is_array($image) && isset($image['url'])) {
            return $image['url'];
        }

        // attachment ID
        if (is_numeric($image)) {
            return wp_get_attachment_image_url((int) $image, $size) ?: '';
        }

        // already a URL
        if (is_string($image)) {
            // If it's an ID as string
            if (ctype_digit($image)) {
                return wp_get_attachment_image_url((int) $image, $size) ?: '';
            }
            return $image;
        }

        return '';
    }

    /**
     * Format URL to ensure it's absolute or has protocol
     *
     * @param string $url
     * @return string
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

    /**
     * Safe ACF field retrieval with fallback
     *
     * @param string $field_name
     * @param mixed $post_id
     * @param mixed $fallback
     * @return mixed
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
     *
     * @param string $field_name
     * @param mixed $post_id
     * @param string $size
     * @param string $fallback_url
     * @return string
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
