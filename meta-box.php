<?php
namespace CFPB\Rolodex;
use \CFPB\Utils\MetaBox\Models;

class MetaBox extends Models {
    function __construct() {
        $this->post_type = array( 'contact', );
        $this->title = 'Contact details';
        $this->slug = 'contact_details';
        $this->context = 'normal';
        $this->fields = array(
            'contact-name' => array(
                'title' => 'Contact name',
                'slug' => 'contact-name',
                'meta_key' => 'post_title',
            ),
            'contact-description'=> array(
                'title' => 'Contact description',
                'slug' => 'contact-description',
                'meta_key' => 'content',
            ),
            'email' => array(
                'title' => 'Email address',
                'slug' => 'email',
                'type' => 'email',
                'params' => array(),
                'meta_key' => 'email',
                'howto' => 'Enter an email address for this contact.',
            ),
            'phone' => array(
                'title' => 'Phone number',
                'slug' => 'phone',
                'type' => 'fieldset',
                'fields' => array(
                    array(
                        'type' => 'text',
                        'max_length' => 10,
                        'label' => 'Number',
                        'meta_key' => 'num',
                    ),
                    array(
                        'type' => 'text',
                        'max_length' => 20,
                        'label' => 'Description',
                        'meta_key' => 'desc',
                    ),
                ),
                'meta_key' => 'phone',
                'howto' => '',
            ),
            'phone-2' => array(
                'title' => 'Alternate Phone number',
                'slug' => 'phone-2',
                'type' => 'fieldset',
                'fields' => array(
                    array(
                        'type' => 'text',
                        'max_length' => 20,
                        'label' => 'Number',
                        'meta_key' => 'num',
                    ),
                    array(
                        'type' => 'text',
                        'max_length' => 20,
                        'label' => 'Description',
                        'meta_key' => 'num',
                    ),
                ),
                'params' => array(),
                'max_length' => 10,
                'meta_key' => 'phone-2',
                'howto' => 'This can be an alternative contact number. Use the description field to explain what it is.',
            ),
            'fax' => array(
                'title' => 'Fax number',
                'slug' => 'fax',
                'type' => 'text',
                'params' => array(),
                'max_length' => 10,
                'meta_key' => 'fax',
                'howto' => 'Enter a fax number for this contact.',
            ),
            'mail' => array(
                'title' => 'Physical address',
                'slug' => 'mail',
                'type' => 'text_area',
                'params' => array(),
                'meta_key' => 'mail',
                'howto' => 'Enter a mailing address for this contact.',
            ),
            'web' => array(
                'title' => 'Website',
                'slug' => 'web',
                'type' => 'url',
                'params' => array(),
                'meta_key' => 'web',
                'howto' => 'Enter a web address for this contact.',
            ),
        );
        parent::__construct();
    }
}