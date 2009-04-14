<?php
// vim: set filetype=php expandtab tabstop=4 shiftwidth=4 autoindent smartindent:

/**
 * @package Shorter Links
 * @author Dave Marshall (davemastergeneral@gmail.com)
 * @license New BSD: http://akrabat.com/license/new-bsd
 * @version 1.0
 */

if (isset($_POST['akrabat_sl_base_url'])) {
    check_admin_referer('akrabat_sl_form');
    update_option('akrabat_sl_base_url', $_POST['akrabat_sl_base_url']);
?>
    <div class="updated"><p><strong><?php _e('Options saved. Clear any caches you may be using!' ); ?></strong></p></div>
<?php
}
?>
<div class="wrap">  
    <h2>Shorter Links options</h2>
      
    <form name="akrabat_sl_form" method="post" action="<?php echo str_replace('%7E', '~', $_SERVER['REQUEST_URI']); ?>">  
        <?php wp_nonce_field('akrabat_sl_form'); ?>
        <p>
           <label for="akrabat_sl_base_url">Base URL:</label>
           <input type="text" id="akrabat_sl_base_url" name="akrabat_sl_base_url" 
                   value="<?php echo get_option('akrabat_sl_base_url');?>" /> e.g. <?php echo get_bloginfo('url');?>
           <div>Will use <tt><?php echo get_bloginfo('url');?></tt> if left blank.</div>
        </p>
        <p class="submit">  
            <input type="submit" name="Submit" value="Save" />
        </p>  
    </form>  
</div>  

