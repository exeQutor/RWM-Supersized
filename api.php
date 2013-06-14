<?php

/**
 * @package RWM Supersized API
 * @subpackage RWM Framework
 * @author Randolph
 * @since 1.0
 */

if ( ! function_exists('rwm_supersized')) {
    function rwm_supersized() {
        $attachments = get_posts(array(
            'post_type' => 'attachment',
            'posts_per_page' => -1,
            'post_status' => 'any',
            'post_parent' => null,
            'meta_query' => array(
                array(
                    'key' => RWMss_PREFIX . 'supersized',
                    'value' => '1'
                )
            )
        ));
        
        return $attachments;
    }
}

/**
 * @filesource ./api.php
 */