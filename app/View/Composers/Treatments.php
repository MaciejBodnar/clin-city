<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Treatments extends Composer
{
    /**
     * If your template is resources/views/treatments-template.blade.php -> 'treatments-template'
     * If it is resources/views/treatment-detail.blade.php -> 'treatment-detail'
     *
     * You wrote: Template Name: Treatment Detail
     * So put the actual blade view filename here (without .blade.php).
     */
    protected static $views = [
        'treatments-template',
    ];

    public function with()
    {
        $treatmentData = $this->getTreatmentData();

        return [
            'treatment' => $treatmentData,
            'treatments' => $treatmentData, // For template consistency
            'contentType' => 'wysiwyg', // Default, will be overridden per section
        ];
    }

    private function getTreatmentData()
    {
        return [
            'hero' => $this->getHeroSection(),
            'sections' => $this->getSplitSections(),
            'info_3col' => $this->getInfo3Col(),
            'pricing_blocks' => $this->getPricingBlocks(),
        ];
    }

    /**
     * HERO (your top split)
     */
    private function getHeroSection()
    {
        // Fallback defaults (your current hardcoded sample text)
        $fallback = [
            'kicker' => 'TREATMENTS',
            'title' => "MESOTHERAPY\nAND\nPOLYNUCLEOTIDE\nINJECTIONS",
            'text' => "Mesotherapy is a minimally invasive cosmetic procedure used in aesthetic practice to rejuvenate and tighten the skin...\n\nPolynucleotides, derived from salmon DNA, rejuvenate skin, repair depressed scars, minimize pores...",
            'image' => get_theme_file_uri('/resources/images/treatments/mesotherapy/hero.jpg'),
        ];

        $hero = $this->getAcfFieldSafe('treatment_hero', false, []);

        return [
            'kicker' => $hero['kicker'] ?? $fallback['kicker'],
            'title' => $hero['title'] ?? $fallback['title'],
            'text' => $hero['text'] ?? $fallback['text'],
            'image' => $this->extractImageUrl($hero['image'] ?? '', 'full') ?: $fallback['image'],
        ];
    }

    /**
     * Repeatable split sections:
     * - image_side: left|right
     * - content_type: bullets|ordered|wysiwyg
     * - bullets: repeater (title,text)
     * - ordered: repeater (line)
     * - wysiwyg: WYSIWYG
     */
    private function getSplitSections()
    {
        $rows = $this->getAcfFieldSafe('treatment_sections', false, []);

        if (empty($rows)) {
            return [
                [
                    'layout' => 'split',
                    'heading' => 'Mesotherapy Benefits',
                    'image' => get_theme_file_uri('/resources/images/treatments/mesotherapy/benefit-1.jpg'),
                    'image_side' => 'left',
                    'content_type' => 'bullets',
                    'bullets' => [
                        ['title' => 'Skin Rejuvenation', 'text' => 'Helps improve skin texture, reduce fine lines, and enhance overall appearance.'],
                        ['title' => 'Cellulite Reduction', 'text' => 'May assist in breaking down fat deposits and improving the look of dimpled skin.'],
                        ['title' => 'Hair Restoration', 'text' => 'Can support hair growth by delivering nutrients to the scalp.'],
                        ['title' => 'Hydration and Radiance', 'text' => 'Hydrates skin from within, improving plumpness and glow.'],
                    ],
                    'ordered' => [],
                    'wysiwyg' => '',
                ],
                [
                    'layout' => 'split',
                    'heading' => 'Polynucleotide Benefits',
                    'image' => get_theme_file_uri('/resources/images/treatments/mesotherapy/benefit-2.jpg'),
                    'image_side' => 'right',
                    'content_type' => 'ordered',
                    'bullets' => [],
                    'ordered' => [
                        'Skin Rejuvenation: supports renewal and healthier turnover.',
                        'Anti-Aging Effects: promotes collagen and elastin support.',
                        'Improved Hydration: enhances moisture retention.',
                        'Scar and Stretch Mark Treatment: supports repair and regeneration.',
                        'Hair Restoration: may improve scalp conditions and growth.',
                        'Improved Skin Tone and Elasticity: supports radiance and texture.',
                    ],
                    'wysiwyg' => '',
                ],
            ];
        }

        $sections = [];
        foreach ($rows as $row) {
            $contentType = $row['content_type'] ?? 'wysiwyg';

            $bullets = [];
            foreach (($row['bullets'] ?? []) as $b) {
                $bullets[] = [
                    'title' => $b['title'] ?? '',
                    'text' => $b['text'] ?? '',
                ];
            }

            $ordered = [];
            foreach (($row['ordered'] ?? []) as $o) {
                // If you model ordered lines as repeater with subfield "line"
                if (is_array($o)) {
                    $ordered[] = $o['line'] ?? '';
                } else {
                    $ordered[] = (string) $o;
                }
            }

            $sections[] = [
                'layout' => 'split',
                'heading' => $row['heading'] ?? '',
                'image' => $this->extractImageUrl($row['image'] ?? '', 'full'),
                'image_side' => ($row['image_side'] ?? 'left') === 'right' ? 'right' : 'left',
                'content_type' => in_array($contentType, ['bullets', 'ordered', 'wysiwyg'], true) ? $contentType : 'wysiwyg',
                'bullets' => $bullets,
                'ordered' => $ordered,
                'wysiwyg' => $row['wysiwyg'] ?? '',
            ];
        }

        return $sections;
    }

    /**
     * 3-column info block:
     * columns: repeater of (title, text)
     */
    private function getInfo3Col()
    {
        $fallback = [
            [
                'title' => 'How it works:',
                'text' => "Mesotherapy involves micro-injections at the treatment site...\n\nPolynucleotides promote cellular regeneration...",
            ],
            [
                'title' => 'Safety and side effects:',
                'text' => "At our clinic, your safety is our top priority...\n\nYou may notice temporary side effects such as bruising...",
            ],
            [
                'title' => 'The Clincity Difference',
                'text' => "Your well-being is at the heart of our practice...\n\nWe use only safe, reliable, and regulated products...",
            ],
        ];

        $info = $this->getAcfFieldSafe('treatment_info_3col', false, []);

        if (empty($info)) {
            return $fallback;
        }

        $cols = $info['columns'] ?? [];

        if (empty($cols)) {
            return $fallback;
        }

        $out = [];
        foreach ($cols as $c) {
            $out[] = [
                'title' => $c['title'] ?? '',
                'text' => $c['text'] ?? '',
            ];
        }

        return $out;
    }

    /**
     * Pricing blocks:
     * pricing_blocks (repeater)
     * - title (text)
     * - columns (repeater): key, label
     * - rows (repeater): label + dynamic prices per key
     *
     * NOTE: ACF doesn't allow truly dynamic subfields easily.
     * Best practice: define columns as repeater, and rows as repeater with a nested repeater "prices"
     * where each price has (key, value). We map it to your Blade shape.
     */
    private function getPricingBlocks()
    {
        $rows = $this->getAcfFieldSafe('treatment_pricing_blocks', false, []);

        if (empty($rows)) {
            return [
                'blocks' => [
                    [
                        'title' => 'Mesotherapy/PRP',
                        'columns' => ['single' => 'SINGLE', 'course_3' => 'COURSE OF 3', 'course_5' => 'COURSE OF 5'],
                        'rows' => [
                            ['label' => 'Teoxane', 'single' => '£450', 'course_3' => '£1215', 'course_5' => '£1800'],
                            ['label' => 'Fillmed', 'single' => '£350', 'course_3' => '£945', 'course_5' => '£1400'],
                            ['label' => 'Teoxane and Skin Pen Microneedling', 'single' => '£600', 'course_3' => '', 'course_5' => ''],
                            ['label' => 'Fillmed and Skin Pen Microneedling', 'single' => '£500', 'course_3' => '', 'course_5' => ''],
                        ],
                    ],
                    [
                        'title' => 'Polynucleotides',
                        'columns' => ['single' => 'SINGLE', 'course_3' => 'COURSE OF 3'],
                        'rows' => [
                            ['label' => 'Plinest (eyes)', 'single' => '£320', 'course_3' => '£864'],
                            ['label' => 'Plinest (face)', 'single' => '£350', 'course_3' => '£945'],
                            ['label' => 'REJURAN I (eyes) 1ml', 'single' => '£380', 'course_3' => ''],
                            ['label' => 'REJURAN I (eyes) 2ml', 'single' => '£580', 'course_3' => ''],
                            ['label' => 'REJURAN S (face) 1ml', 'single' => '£320', 'course_3' => ''],
                            ['label' => 'REJURAN S (face) 2ml', 'single' => '£560', 'course_3' => ''],
                            ['label' => 'REJURAN Healer PN 2ml', 'single' => '£620', 'course_3' => ''],
                        ],
                    ],
                ]
            ];
        }

        $blocks = [];
        foreach ($rows as $block) {
            // columns repeater => associative array like ['single' => 'SINGLE', ...]
            $columnsAssoc = [];
            foreach (($block['columns'] ?? []) as $col) {
                $key = $col['key'] ?? '';
                $label = $col['label'] ?? '';
                if ($key !== '') {
                    $columnsAssoc[$key] = $label;
                }
            }

            // rows repeater => label + prices repeater => map to your Blade structure
            $rowsOut = [];
            foreach (($block['rows'] ?? []) as $r) {
                $row = [
                    'label' => $r['label'] ?? '',
                ];

                foreach (($r['prices'] ?? []) as $p) {
                    $k = $p['key'] ?? '';
                    $v = $p['value'] ?? '';
                    if ($k !== '') {
                        $row[$k] = $v;
                    }
                }

                $rowsOut[] = $row;
            }

            $blocks[] = [
                'title' => $block['title'] ?? '',
                'columns' => !empty($columnsAssoc) ? $columnsAssoc : ['single' => 'SINGLE'],
                'rows' => $rowsOut,
            ];
        }

        return ['blocks' => $blocks];
    }

    /**
     * ========= Helpers =========
     */

    private function extractImageUrl($image, $size = 'full')
    {
        if (empty($image)) return '';

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
            // If user pasted relative path, make it theme-relative
            if (strpos($image, 'http') !== 0 && strpos($image, '/') === 0) {
                return home_url($image);
            }
            return $image;
        }

        return '';
    }

    private function getAcfFieldSafe($field_name, $post_id = false, $fallback = null)
    {
        if (function_exists('get_field')) {
            $value = \get_field($field_name, $post_id);
            return !empty($value) ? $value : $fallback;
        }
        return $fallback;
    }
}
