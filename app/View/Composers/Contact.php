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
            'sections' => $this->getSectionsData(),
            'company' => $this->getCompanyData(),
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
            'title' => $this->getAcfFieldSafe('page_title', false, 'Kontakt123'),
        ];
    }

    /**
     * Get section headings from ACF fields
     *
     * @return array
     */
    private function getSectionsData()
    {
        return [
            'contact_heading' => $this->getAcfFieldSafe('contact_section_heading', false, 'Dane kontaktowe'),
            'hours_heading' => $this->getAcfFieldSafe('hours_section_heading', false, 'Godziny Otwarcia!'),
        ];
    }

    /**
     * Get company information from ACF fields
     *
     * @return array
     */
    private function getCompanyData()
    {
        return [
            'email' => $this->getAcfFieldSafe('company_email', false, 'info@optimumtaxfinance.co.uk'),
            'phone' => $this->getAcfFieldSafe('company_phone', false, '+0208 840 0422'),
            'addr' => $this->getAcfFieldSafe('company_address', false, '56 Boston Road <br> London W7 3TR'),
            'hours' => $this->getCompanyHours(),
        ];
    }

    /**
     * Get company opening hours from ACF fields
     *
     * @return array
     */
    private function getCompanyHours()
    {
        // Check for ACF hours fields
        if (function_exists('get_field')) {
            $hours_weekdays = \get_field('opening_hours_weekdays');
            $hours_weekend = \get_field('opening_hours_weekend');

            $hours = [];
            if ($hours_weekdays) $hours[] = $hours_weekdays;
            if ($hours_weekend) $hours[] = $hours_weekend;

            if (!empty($hours)) {
                return $hours;
            }
        }

        // Fallback hours
        return [
            'Pon–Pt: 9.00 – 17.00',
            'Sob: 9.00 – 13.00'
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
