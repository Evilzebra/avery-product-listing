<?php 
/**
 * @Author	Jonathon byrd
 * @link http://www.jonathonbyrd.com
 * @Package Wordpress
 * @SubPackage Total Widget Control
 * @copyright Proprietary Software, Copyright Byrd Incorporated. All Rights Reserved
 * @Since 1.0.0
 * 
 * 
 */

defined('ABSPATH') or die("Cannot access pages directly.");

/**
 * Constructor Function.
 * 
 */
function vibe_initialize()
{
	//ACTION!
	add_action('plugins_loaded', 'twc_current_user_can', 1);
	add_action('plugins_loaded', '_vibe_registration');


}

/**
 * Registers Objects with WP.
 * 
 */
function _vibe_registration()
{
	register_custom_metaboxes(array(
    'id' => 'vibe-metabox-products',
    'title' => 'Custom meta box',
    'page' => 'replays',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Text box',
            'desc' => 'Enter something here',
            'id' => 'text',
            'type' => 'text',
            'std' => 'Default value 1'
        ),
        array(
            'name' => 'Textarea',
            'desc' => 'Enter big text here',
            'id' => 'textarea',
            'type' => 'textarea',
            'std' => 'Default value 2'
        ),
        array(
            'name' => 'Select box',
            'id' => 'select',
            'type' => 'select',
            'options' => array('Option 1', 'Option 2', 'Option 3')
        ),
        array(
            'name' => 'Radio',
            'id' => 'radio',
            'type' => 'radio',
            'options' => array(
                array('name' => 'Name 1', 'value' => 'Value 1'),
                array('name' => 'Name 2', 'value' => 'Value 2')
            )
        ),
        array(
            'name' => 'Checkbox',
            'id' => 'checkbox',
            'type' => 'checkbox'
        ),
		array(
            'name' => '',
            'desc' => '',
            'id' => 'property-image-gallery',
            'type' => 'image-gallery',
            'std' => ''
        ),
		array(
            'name' => '',
            'desc' => '',
            'id' => 'property-file-gallery',
            'type' => 'file-gallery',
            'std' => ''
        ),
		array(
            'name' => 'Audio File',
            'desc' => '',
            'id' => 'property-audio-gallery',
            'type' => 'audio-gallery',
            'std' => ''
        ),
    )
));
}

/**
 * Function is responsible for setting the actual capability check
 * after the plugins are loaded and the cookie is also loaded.
 * 
 */
function vibe_current_user_can()
{
	defined("VIBE_CURRENT_USER_CAN") or define("VIBE_CURRENT_USER_CAN", (current_user_can(VIBE_ACCESS_CAPABILITY)) );
	defined("VIBE_CURRENT_USER_CANNOT") or define("VIBE_CURRENT_USER_CANNOT", (!VIBE_CURRENT_USER_CAN) );

}