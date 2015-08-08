<?php
/*
Plugin Name: Shorter Links
Plugin URI: http://wordpress.org/extend/plugins/shorter-links/
Description: Overrides WordPress' shortlink functionality to allow custom shortcodes per post.
Version: 2.1.0
Author: Rob Allen
Author URI: http://akrabat.com
License New BSD: http://akrabat.com/license/new-bsd
*/

class AkrabatShorterLinks
{
    const META_FIELD_NAME='Shorter link';

    /**
     * Redirect to a shorter link if we can. This hook is called after WP has done
     * its processing, so we can check if we have a 404 to determine if we need to
     * look for a shorter link.
     *
     * @param  WP $wp
     * @return null
     */
    public function redirectToShorterLink(WP $wp)
    {
        if (is_404()) {
            // WordPress didn't find anything to display, so look for a shortlink
            $shortLink = $wp->request;
            // $shortLink = preg_replace('#/.*#i', "", $WP->request); // only need first segment

            // if it's a number, then test for a post id first
            if (is_numeric($shortLink)) {
                $post = get_post( $shortLink);
                if ($post->post_status == 'publish') {
                    $link = get_permalink($shortLink);
                    if ($link) {
                        wp_redirect($link);
                        exit;
                    }
                }
            }

            // Look up the post or page with this shorter link
            $query = array('meta_key' => self::META_FIELD_NAME, 'meta_value' => $shortLink);
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
        }
    }

    public function pre_get_shortlink($false, $id, $context=null, $allow_slugs=null)
    {
        // get the post id
        global $wp_query;
        if ($id == 0) {
            $post_id = $wp_query->get_queried_object_id();
        } else {
            $post = get_post($id);
            $post_id = $post->ID;
        }

        $short_link = get_post_meta($post_id, self::META_FIELD_NAME, true);
        if('' == $short_link) {
            // Set shortlink to /{post id} as it looks nicer than ?p={post id}
            $short_link = $post_id;
        }
        $short_link = '/' . ltrim($short_link, '/');

        $url = trim(get_option('akrabat_sl_base_url'), "/\t\r\n ");
        if (!empty($url)) {
            $short_link = rtrim($url, '/') . $short_link;
        } else {
            $short_link = home_url($short_link);
        }
        return $short_link;
    }

    /**
     * On save_post, ensure that the custom field is created
     */
    public function save_post($post_id, $post) {
        if (!$post) {
            return;
        }
        
        // get the correct post rid
        if ($post->post_parent != 0) {
            $post_id = $post->post_parent;
        } else {
            $post_id = $post->ID;
        }

        // If there is no custom field already, then create one.
        $keys = get_post_custom_keys($post_id);
        if (!$keys || array_search(self::META_FIELD_NAME, $keys) === false) {
            add_post_meta($post_id, self::META_FIELD_NAME, '', true);
        }
    }

    public function admin_menu()
    {
        add_options_page('ShorterLinks', 'Shorter Links', 'manage_options', 'akrabat-sl', array(&$this, 'admin_page'));
    }

    public function admin_page()
    {
        include(dirname(__FILE__). '/settings.phtml');
    }

    public function admin_init(){
        register_setting( 'akrabat-sl', 'akrabat_sl_base_url');
    }
}

$akrabatShorterLinks = new AkrabatShorterLinks();
add_filter('pre_get_shortlink',  array($akrabatShorterLinks, 'pre_get_shortlink'), 10, 4);
add_action('wp', array($akrabatShorterLinks, 'redirectToShorterLink'));
add_action('save_post', array($akrabatShorterLinks, 'save_post'), 10, 2);
add_action('admin_menu', array($akrabatShorterLinks, 'admin_menu'));
add_action('admin_init', array($akrabatShorterLinks, 'admin_init'));

// vim: set filetype=php expandtab tabstop=4 shiftwidth=4 autoindent smartindent: 
