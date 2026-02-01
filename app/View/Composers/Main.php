<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Main extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'welcome-page',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'main' => $this->getMainData(),
        ];
    }

    private function getMainData()
    {
        return [
            'hero' => $this->getHeroData(),
            'device_banner' => $this->getDeviceBannerData(),
            'reviews' => $this->getReviewsData(),
            'cta_section' => $this->getCtaSectionData(),
        ];
    }

    private function getHeroData()
    {
        return [
            'video_url' => $this->getAcfImageSafe(
                'hero_video_url',
                false,
                'full',
                get_theme_file_uri('/resources/videos/film_www.webm')
            ),
            'video_placeholder' => $this->getAcfImageSafe(
                'hero_video_placeholder',
                false,
                'full',
                get_theme_file_uri('/resources/images/cute-girl.png')
            ),
            'image_mobile' => $this->getAcfImageSafe(
                'hero_image_mobile',
                false,
                'full',
                get_theme_file_uri('/resources/images/young-woman-with-seductive-mobile.png')
            ),
            'image_first_text' => $this->getAcfFieldSafe('hero_image_first_text', false, 'Confidence Begins'),
            'image_second_text' => $this->getAcfFieldSafe('hero_image_second_text', false, 'With Skin You Love'),
            'title' => $this->getAcfFieldSafe('hero_title', false, 'About'),
            'title_2' => $this->getAcfFieldSafe('hero_title_2', false, 'us'),
            'hero_bg_image' => $this->getAcfImageSafe(
                'hero_bg_image',
                false,
                'full',
                get_theme_file_uri('/resources/images/flower-bg-main.png')
            ),
            'hero_description' => $this->getAcfFieldSafe('hero_description', false, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed diam nonummy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.'),
            'hero_button_text' => $this->getAcfFieldSafe('hero_button_text', false, 'Read more'),
            'hero_button_url' => $this->formatUrl($this->getAcfFieldSafe('hero_button_url', false, '/about')),
        ];
    }

    private function getDeviceBannerData()
    {
        return [
            'device_image' => $this->getAcfImageSafe(
                'device_banner_image',
                false,
                'full',
                get_theme_file_uri('/resources/images/machine-phone.png')
            ),
            'bg_image' => $this->getAcfImageSafe(
                'device_banner_bg_image',
                false,
                'full',
                get_theme_file_uri('/resources/images/flower-face.png')
            ),
            'bg_image_mobile' => $this->getAcfImageSafe(
                'device_banner_bg_image_mobile',
                false,
                'full',
                get_theme_file_uri('/resources/images/flower-face-mobile.png')
            ),
            'title' => $this->getAcfFieldSafe('device_banner_title', false, 'Because your skin'),
            'title_2' => $this->getAcfFieldSafe('device_banner_title_2', false, 'deserves the best'),
        ];
    }

    private function getReviewsData()
    {
        $reviews_rows = $this->getAcfFieldSafe('reviews_rows', false, []);
        $stats_rows = $this->getAcfFieldSafe('statistics_rows', false, []);

        if (empty($stats_rows)) {
            $statistics = [
                [
                    'number' => '123',
                    'label' => 'Professional <br/> products',
                ],
                [
                    'number' => '45',
                    'label' => 'Aesthetic <br/> treatments',
                ],
                [
                    'number' => '6',
                    'label' => 'Years of <br/> experience',
                ],
            ];
        } else {
            $statistics = [];
            foreach ($stats_rows as $row) {
                $statistics[] = [
                    'number' => $row['number'] ?? '',
                    'label' => $row['label'] ?? '',
                ];
            }
        }

        if (empty($reviews_rows)) {
            $reviews = [
                [
                    'text' =>
                    'Lorem ipsum dolor sit amet, consectetur sadipscing elit, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.',
                    'name' => 'Alice Johnson',
                ],
                [
                    'text' =>
                    'At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem.',
                    'name' => 'Michael Brown',
                ],
                [
                    'text' =>
                    'Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros.',
                    'name' => 'Emily Davis',
                ],
                [
                    'text' =>
                    'Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.',
                    'name' => 'David Wilson',
                ],
            ];
        } else {
            $reviews = [];
            foreach ($reviews_rows as $row) {
                $reviews[] = [
                    'text' => $row['text'] ?? '',
                    'name' => $row['name'] ?? '',
                ];
            }
        }

        return [
            'title' => $this->getAcfFieldSafe('reviews_title', false, "Reviews"),
            'title_2' => $this->getAcfFieldSafe('reviews_title_2', false, "Lumiere"),
            'reviews_list' => $reviews,
            'device_image' => $this->getAcfImageSafe(
                'reviews_device_image',
                false,
                'full',
                get_theme_file_uri('/resources/images/machine.png')
            ),
            'statistics' => $statistics,
        ];
    }

    private function getCtaSectionData()
    {
        return [
            'bg_image' => $this->getAcfImageSafe(
                'cta_bg_image',
                false,
                'full',
                get_theme_file_uri('/resources/images/mirror.png')
            ),
            'title' => $this->getAcfFieldSafe('cta_title', false, 'Ready to glow?'),
            'title_2' => $this->getAcfFieldSafe('cta_title_2', false, 'Take the first step'),
            'button_left_text' => $this->getAcfFieldSafe('cta_button_left_text', false, 'Contact Us'),
            'button_left_url' => $this->formatUrl($this->getAcfFieldSafe('cta_button_left_url', false, '/contact')),
            'button_right_text' => $this->getAcfFieldSafe('cta_button_right_text', false, 'Book Now'),
            'button_right_url' => $this->formatUrl($this->getAcfFieldSafe('cta_button_right_url', false, '/booking')),
        ];
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
        if (!preg_match("~^(?:f|ht)tps?://~i", $url) && strpos($url, 'mailto:') !== 0 && strpos($url, 'tel:') !== 0 && strpos($url, '#') !== 0) {
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
                    // Try to get image URL first
                    $url = \wp_get_attachment_image_url($image, $size);
                    // If it fails (e.g. it's a video), try getting the attachment URL directly
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
