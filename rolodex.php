<?php
/*
Plugin name: Rolodex
Description: A set of features for beta.consumerfinance.gov

This plugin inclues enhancements to the Post editing screen including a meta box
that allows users to link one post to another.

Plugin URI: http://github.com/gboone/Rolodex
Plugin author: Greg Boone
*/
namespace CFPB\Rolodex;

class Base {
	public function initialize() {
		if ( defined('DEPENDENCIES_READY')) {
            require_once( 'inc/meta-box.php' );
            require_once( 'inc/post-type.php');

			add_action( 'save_post', array( '\CFPB\Rolodex', 'save' ) );
			add_action( 'add_meta_boxes', array( '\CFPB\Rolodex', 'box_me_up' ) );
			add_action( 'init', array( '\CFPB\Rolodex\PostTypes', 'build' ) );
		} else {
	        $error = new \WP_Error('_missing_dependency', '<pre>Rolodex: The dependency cms-toolkit plugin is missing, please download it from <a href="http://github.com/cfpb/cms-toolkit">GitHub</a></pre>');

	        echo "<pre>{$error->get_error_message('_missing_dependency')}</pre>";

	        return;
	    }
	}

	public function save( $post_id ) {
		$post = get_post( $post_id, OBJECT, 'raw' );
		$RolodexBox = new \CFPB\Rolodex\MetaBox();

		if ( in_array( $post->post_id, $RolodexBox->post_type ) ){
			$RolodexBox->validate_and_save( $post_id, $_POST );
		}
		
	}

	public function box_me_up() {
		$RolodexBox = new \CFPB\Rolodex\MetaBox();
		$RolodexBox->generate();
	}
}

add_action('plugins_loaded', array('\CFPB\Rolodex\Base', 'initialize' ) );