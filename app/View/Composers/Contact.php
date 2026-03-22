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
            'info' => $this->getInfoData(),
            'form' => $this->getFormData(),
        ];
    }

    /**
     * Get contact info data from ACF fields
     *
     * @return array
     */
    private function getInfoData()
    {
        return [
            'number' => $this->getAcfFieldSafe('phone_number', false, '020 7323 9534'),
            'whatsapp_url' => $this->getAcfFieldSafe('whatsapp_url', false, 'https://wa.me/442073239534'),
            'email' => $this->getAcfFieldSafe('email_address', false, 'info@clinicity.com'),
            'address' => $this->getAcfFieldSafe('address', false, '36 Great Titchfield Street, London, W1W 8BQ'),
            'address_url' => $this->getAcfFieldSafe('address_url', false, 'https://www.google.pl/maps/place/Clinicity+London+-+Aesthetic+Clinic/@51.5176798,-0.1426417,17z/data=!3m2!4b1!5s0x48761b2a63cb6ce1:0xef0f04cf911ebf08!4m6!3m5!1s0x48761bd2cb10f481:0x60eda2c124c8234f!8m2!3d51.5176765!4d-0.1400668!16s%2Fg%2F11tjgcdr_t?entry=ttu&g_ep=EgoyMDI2MDIxNy4wIKXMDSoASAFQAw%3D%3D'),
        ];
    }

    /**
     * Get form data from ACF fields
     *
     * @return array
     */
    private function getFormData()
    {
        return [
            'title' => $this->getAcfFieldSafe('form_title', false, 'Leave a message'),
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
            'title' => $this->getAcfFieldSafe('page_title', false, 'Contact us'),
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
