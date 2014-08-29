<?php
namespace CFPB\Rolodex;

class PostTypes {

    public function build() {
        Util::build_post_type(
            'Contact',
            'Contacts',
            'contact',
            $prefix = '',
            $args = array(
                'has_archive' => true,
                'supports' => array(
                    'thumbnail',
                )
            )
        );
    }
}