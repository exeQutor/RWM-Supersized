<?php

/**
 * @package RWM Supersized Main Controller
 * @subpackage RWM Framework
 * @author Randolph
 * @since 1.0
 */

class RWMss_Main {
    
    function __construct() {
        add_post_type_support('attachment', 'custom-fields');
        add_action('wp_enqueue_scripts', array($this, 'wp_enqueue_scripts'));
        add_action('wp_head', array($this, 'wp_head'));
        add_filter('attachment_fields_to_edit', array($this, 'attachment_fields_to_edit'), null, 2);
        add_filter('attachment_fields_to_save', array($this, 'attachment_fields_to_save'), null, 2);
    }
    
    function wp_enqueue_scripts() {
        wp_enqueue_style('supersized', RWMss_URL . 'assets/css/supersized.css');
        wp_enqueue_style('shutter', RWMss_URL . 'assets/theme/supersized.shutter.css');
        wp_enqueue_script('jquery');
        wp_enqueue_script('easing', RWMss_URL . 'assets/js/jquery.easing.min.js');
        wp_enqueue_script('supersized', RWMss_URL . 'assets/js/supersized.3.2.7.min.js');
        wp_enqueue_script('shutter', RWMss_URL . 'assets/theme/supersized.shutter.min.js');
    }
    
    function wp_head() {
        $theme_js = get_stylesheet_directory() . '/supersized.php';
        if (file_exists($theme_js))
            include $theme_js;
        else
            include RWMss_DIR . 'views/wp_head.php';
    }
    
    function attachment_fields_to_edit($form_fields, $post) {
        $form_fields[RWMss_PREFIX . 'supersized']['label'] = __("Supersized this?");  
        $form_fields[RWMss_PREFIX . 'supersized']['input'] = "html";  
        $supersized = get_post_meta($post->ID, RWMss_PREFIX . 'supersized', true);
        $checked = ($supersized) ? ' checked' : '';
        $form_fields[RWMss_PREFIX . 'supersized']['html'] = "<input type='checkbox' value='1' name='attachments[{$post->ID}][" . RWMss_PREFIX . "supersized]' id='attachments[{$post->ID}][" . RWMss_PREFIX . "supersized]'$checked />";
        
        return $form_fields;
    }
    
    function attachment_fields_to_save($post, $attachment) {
        if (isset($attachment[RWMss_PREFIX . 'supersized'])) {
            update_post_meta($post['ID'], RWMss_PREFIX . 'supersized', $attachment[RWMss_PREFIX . 'supersized']);
        } else {
            delete_post_meta($post['ID'], RWMss_PREFIX . 'supersized', $attachment[RWMss_PREFIX . 'supersized']);
        }
        
        return $post;
    }
}

/**
 * @filesource ./controllers/main.php
 */