=== Plugin Name ===
Contributors: akrabat
Donate link: http://akrabat.com
Tags: revcanonical links url shorter
Requires at least: 2.5
Tested up to: 2.7.9
Stable tag: 1.1

This plugin creates rel="alternate shorter" (and rev="canonical) links with 
shorter URLs in them, along with appropriate HTTP headers.

== Description ==

The **Shorter Links** WordPress plugin automatically creates a link
element in the <head> section of the post's page with 
rev="canonical" and rel="alternate shorter" attributes. The URL in 
the href attribute defaults to the id number of the post in question. 
It also creates two HTTP headers: X-Rev-Canonical and Link that also 
point to the shorter link.

A custom field called "Shorter link" is created once a post is saved, 
so that you can change the shorter link to a more memorable set of 
characters.

Note that rev="canonical" isn't HTML5 compliant, so it is possible
that this attribute will be removed at some point in the future.

The <link> element looks like this:
    <link rev="canonical" rel="alternate shorter" href="{url}" />

The HTTP headers are:
    X-Rev-Canonical: {url}
    Link: <{$url}>; rev="http://revcanonical.appspot.com/#canonical"; 
        rel="alternate http://revcanonical.appspot.com/#shorter"

Related Links:

* <a href="http://akrabat.com/shorter-links/" title="Shorter Links WordPress plugin">Plugin Homepage</a>
* <a href="http://revcanonical.appspot.com/" title="revCanonical :url shortening that doesn't hurt the internet">revCanonical URL shortener</a>
* <a href="http://shiflett.org/blog/2009/apr/save-the-internet-with-rev-canonical" title="Save the Internet with rev=canonical">Information about shorter links by Chris Shiflett</a>

== Installation ==

1. Upload `shorter_links.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. To set a custom shorter link, update a post so that the custom field is
   created and then fill in a unique value in the field.

== Frequently Asked Questions ==

*what's new in the latest version?*

The changelog is maintened on [the project home page](http:/akrabat.com/shorter-links/).

== Screenshots == 

None.

== Licence ==

This plugin is licensed under the [New BSD license](http://akrabat.com/license/new-bsd).
