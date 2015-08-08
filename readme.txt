=== Plugin Name ===
Contributors: akrabat
Donate link: http://akrabat.com
Tags: revcanonical, links, url shortener, shorturl, shortlink
Requires at least: 3.0
Tested up to: 4.3
Stable tag: 2.0.6
License: New-BSD
License URI: http://akrabat.com/license/new-bsd

Override the default WordPress "shortlink" URL with one that
has a custom text in it. You can also set a different base URL.

== Description ==

The **Shorter Links** WordPress plugin overrides the default WordPress
"shortlink" URL with one that has a custom text in it. You can also set a
different base URL.

A custom field called "Shorter link" is created once a post is saved, 
so that you can change the shortlink to a more memorable set of
characters.

The choice of base URL to use for the short link can be configured within
Settings->Shorter Links.

Related Links:

* [Plugin home page](http://akrabat.com/shorter-links)

== Installation ==

1. Upload `shorter_links.php and config.php` to `/wp-content/plugins/shorter-links` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. If you want to set a different base URL, change it from
   Settings->Shorter Links.
4. To set a custom shorter link, update a post so that the custom field is
   created and then fill in a unique value in the field.

== Frequently Asked Questions ==

** Is there a bookmarklet to extract shorturl links? **

Try this bookmarklet: [Short URL][1]

[1]: javascript:(function(){var%20url=document.location;var%20links=document.getElementsByTagName('link');var%20found=0;for(var%20i=0,l;l=links[i];i++){if(l.getAttribute('rel')=='shortlink'||(/alternateshort/).exec(l.getAttribute('rel'))){found=l.getAttribute('href');break;}}if(!found){for(var%20i=0;l=document.links[i];i++){if(l.getAttribute('rel')=='shorturl'){found=l.getAttribute('href');break;}}}if(found){prompt('URL:',found);}else{alert("No%20shortlink%20found");}})();

(Just drag to your bookmarks bar)

There's also the "[Short URL](http://github.com/clintecker/Shorturl-Safari-Extension)" Safari extension by Clink Ecker.


== Screenshots ==

None.

== Licence ==

This plugin is licensed under the [New BSD license](http://akrabat.com/license/new-bsd).

== History ==


**2.0.6 - 8 August 2015**
Ensure that the short_link is correct when using a post id.

**2.0.5 - 8 August 2015**
Updated Tested up to 4.3

**2.0.3 - 9 July 2012**
Bug fix so that archives work.

**2.0.2 - 23 June 2012**
Fall back to REQUEST_URI if there's nothing interesting in $query_vars.

**2.0.1 - 20 June 2012**
Updated to handle 4 digit short links that look like a year to WordPress.

**2.0.0 - 21 November 2010**
Updated to be WordPress 3.0 or above, so we only need to hook into the WordPress
shortlink system

**1.8.2 - 21 November 2010**
Fix permissions issue on settings page. This is the last version that works
on WordPress 2.9.x or earlier.

**1.8.1 - 7 September 2010**
Bug fix to remove a warning.

**1.8 - 1 September 2010**
use shortlink rather than shorturl for WordPress less than 3.
For WordPress 3 or higher, hook into the new shortlink system.
Fix the admin page so that it displays in WordPress 3.

**1.7 - 11 Feburary 2010**
Handle failures better.

**1.6 - 10 January 2010**
Update version number in correct places so that the WP plugins system notices the update.

**1.5 - 29 December 2009**
Support permalinks that start with /%category%/

**1.4 - 14 April 2009**
Support rel="shorturl" as per [Robert Spychala's Short URL Auto-Discovery proposal](http://sites.google.com/a/snaplog.com/wiki/short_url).

**1.3 - 14 April 2009**
Add support for setting the base URL. Patch by [Dave Marshall](davemastergeneral@gmail.com).

**1.2 - 13 April 2009**
Only send the `Link` HTTP header as recommended by [Shiflett](http://shiflett.org/blog/2009/apr/a-rev-canonical-http-header).

**1.1 - 13 April 2009**
Fixed output of HTTP headers. Patch by [Jeff Waugh](http://bethesignal.org/).

**1.0 - 11 April 2009**
Initial release.

