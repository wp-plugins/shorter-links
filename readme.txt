=== Plugin Name ===
Contributors: akrabat
Donate link: http://akrabat.com
Tags: revcanonical links url shorter
Requires at least: 2.5
Tested up to: 2.7.9
Stable tag: 1.2

This plugin creates rel="alternate shorter" (and rev="canonical) links with 
shorter URLs in them, along with an appropriate HTTP header.

== Description ==

The **Shorter Links** WordPress plugin automatically creates a link
element in the <head> section of the post's page with 
rev="canonical" and rel="alternate shorter" attributes. The URL in 
the href attribute defaults to the id number of the post in question. 
It also creates an HTTP `Link` header that also points to the shorter link.

A custom field called "Shorter link" is created once a post is saved, 
so that you can change the shorter link to a more memorable set of 
characters.

Note that rev="canonical" isn't HTML5 compliant, so it is possible
that this attribute will be removed at some point in the future.

The &lt;link&gt; element looks like this:
    
    <link rev="canonical" rel="alternate shorter" href="{url}" />

The HTTP header is:

   Link: <{url}>; rev=canonical

Related Links:

* [Plugin home page](http://akrabat.com/shorter-links)
* [revCanonical URL shortener](http://revcanonical.appspot.com/)
* [URL Shortening Hinting article](http://laughingmeme.org/2009/04/03/url-shortening-hinting/)
* [A rev="canonical" HTTP Header article](http://shiflett.org/blog/2009/apr/a-rev-canonical-http-header)

== Installation ==

1. Upload `shorter_links.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. To set a custom shorter link, update a post so that the custom field is
   created and then fill in a unique value in the field.

== Frequently Asked Questions ==

None yet!

== Screenshots == 

None.

== Licence ==

This plugin is licensed under the [New BSD license](http://akrabat.com/license/new-bsd).

== History == 

**1.2 - 13 April 2009**  
Only send the `Link` HTTP header as recommended by [Shiflett](http://shiflett.org/blog/2009/apr/a-rev-canonical-http-header).

**1.1 - 13 April 2009**  
Fixed output of HTTP headers. Patch by [Jeff Waugh](http://bethesignal.org/).

**1.0 - 11 April 2009**  
Initial release.



