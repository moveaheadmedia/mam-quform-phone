<?php
/*
Plugin Name: Move Ahead Media Phone Field For Quform
Plugin URI: https://github.com/moveaheadmedia/mam-quform-phone
Description: This plugin add phone field to quform
Version: 1.0
Author: Ali Sal
Author URI: https://github.com/moveaheadmedia/
License: MIT
*/

// Block direct access to this file
if (!defined('ABSPATH')) {
    exit;
}

function mam_quform_phone_activation() {
    // Check if the required plugin is active
    if ( ! is_plugin_active( 'quform/quform.php' ) ) {
        // Deactivate this plugin
        deactivate_plugins( plugin_basename( __FILE__ ) );
    }
}
register_activation_hook( __FILE__, 'mam_quform_phone_activation' );

// Define the custom form field type
function mam_phone_field($type, $data, $element, $form, $value) {
    // Check if the custom field type is requested
    if ($type == 'mam_phone_field') {
        // Create your custom form field here
        $output = '<input class="mam-phone" type="tel" name="' . esc_attr($element['name']) . '" value="' . esc_attr($value) . '" />';
        return $output;
    }

    // Return the original form field type
    return $type;
}
add_filter('quform_field_type_mam_phone_field', 'mam_phone_field', 10, 5);
