<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Contact extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'contact-template',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'contact' => $this->getContactData(),
        ];
    }

    /**
     * Get contact page data from ACF fields
     *
     * @return array
     */
    private function getContactData()
    {
        return [
            'page' => $this->getPageData(),
        ];
    }

    /**
     * Get page-level data from ACF fields
     *
     * @return array
     */
    private function getPageData()
    {
        return [
            'title' => $this->getAcfFieldSafe('page_title', false, 'collaborate'),
            'text' => $this->getAcfFieldSafe('page_text', false, "Interested in working together? Fill out some info and we will be in touch shortly! We can't wait to hear from you!"),
        ];
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
}
