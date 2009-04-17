<?php
// vim: set filetype=php expandtab tabstop=4 shiftwidth=4 autoindent smartindent:

/**
 * @package Shorter Links
 * @author Dave Marshall (davemastergeneral@gmail.com)
 * @author Rob Allen (rob@akrabat.com)
 * @license New BSD: http://akrabat.com/license/new-bsd
 * @version 1.1
 */

if (isset($_POST['akrabat_sl_base_url']) || isset($_POST['akrabat_sl_include_rev_canonical'])) {
    check_admin_referer('akrabat_sl_form');
    update_option('akrabat_sl_base_url', $_POST['akrabat_sl_base_url']);
    update_option('akrabat_sl_include_rev_canonical', (int)$_POST['akrabat_sl_include_rev_canonical']);
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
        <p>
           <label for="akrabat_sl_include_rev_canonical">Include rev="canonical" attribute:</label>
           <input type="hidden" name="akrabat_sl_include_rev_canonical" value="0" />
           <input type="checkbox" id="akrabat_sl_include_rev_canonical"
                  name="akrabat_sl_include_rev_canonical"
                  value="1"
                  <?php if (get_option('akrabat_sl_include_rev_canonical') == "1") {echo 'checked="checked"';}  ?> />
        </p>
        <p class="submit">
            <input type="submit" name="Submit" value="Save" />
        </p>
    </form>
</div>
