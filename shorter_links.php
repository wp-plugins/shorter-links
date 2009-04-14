<?php
/**
 * @package Shorter Links
 * @author Rob Allen (rob@akrabat.com)
 * @license New BSD: http://akrabat.com/license/new-bsd
 * @version 1.1
 */
/*
Plugin Name: Shorter Links
Plugin URI: http://akrabat.com/shorter_links
Description: Provide links with rel="alternate shorter" and rev="canonical" attributes
Author: Rob Allen
Version: 1.2
Author URI: http://akrabat.com
*/

define ('AKRABAT_SL_META_FIELD_NAME', 'Shorter link');
$akrabat_sl_shorter_link = '';

function akrabat_sl_create_shortlink(&$wp) {
    global $post, $akrabat_sl_shorter_link;
    if (is_single() || (is_page() && !is_front_page())) {
        $url = trim(get_option('akrabat_sl_base_url'), "/\t\r\n ");
        if (empty($url)) {
            $url = trim($get_bloginfo('url'), "/\t\r\n ");
        }

        if($post && $post->ID > 0) {
            $shortLink = get_post_meta($post->ID, AKRABAT_SL_META_FIELD_NAME, true);
            $slug = $post->ID;
            if(!empty($shortLink)) {
                $slug = $shortLink;
            }
            $url .= "/$slug";
            $akrabat_sl_shorter_link = $url;
            if (!headers_sent()) {
                header('Link: <'.$url.'>; rev=canonical');
            }
        }
    }
}

function akrabat_sl_wp_head() {
    global $akrabat_sl_shorter_link;
    if (!empty($akrabat_sl_shorter_link)) {
        echo '<link rev="canonical" rel="alternate shorter" href="'.$akrabat_sl_shorter_link.'" />';
    }
}

function akrabat_sl_save_post($post_id, $post) {
    $realPostId = wp_is_post_revision($post);
    $value = get_post_meta($realPostId, AKRABAT_SL_META_FIELD_NAME);
    if(empty($value)) {
        add_post_meta($realPostId, AKRABAT_SL_META_FIELD_NAME, $realPostId, true);
    }
}

function akrabat_sl_redirect($query_vars)
{
    // check if pagename matches a short url
    if(!array_key_exists('pagename', $query_vars)) {
        return $query_vars;
    }

    $shortUrl = $query_vars['pagename'];
    if((int)$shortUrl > 0) {
        wp_redirect(get_permalink($shortUrl));
        exit;
    }

    $query = array('meta_key' => AKRABAT_SL_META_FIELD_NAME,
		'meta_value' => $shortUrl);
    $posts = get_posts($query);
    if (count($posts) > 0) {
        wp_redirect(get_permalink($posts[0]), 301);
        exit;
    } else {
        $pages = get_pages($query);
        if (count($pages) > 0) {
            wp_redirect(get_permalink($pages[0]), 301);
            exit;
        }
    }
    return $query_vars;
}

function akrabat_sl_admin_actions()
{
    add_options_page('Shorter Links', 'Shorter Links', 1, 'Shorter Links', 'akrabat_sl_admin_page');
}

function akrabat_sl_admin_page()
{
    include('config.php');
}

add_action('wp', 'akrabat_sl_create_shortlink');
add_action('wp_head', 'akrabat_sl_wp_head');
add_action('save_post', 'akrabat_sl_save_post', 10, 2);
add_action('admin_menu', 'akrabat_sl_admin_actions');  
add_filter('request', 'akrabat_sl_redirect');

// vim: set filetype=php expandtab tabstop=4 shiftwidth=4 autoindent smartindent: 

