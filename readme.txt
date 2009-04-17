=== Plugin Name ===
Contributors: akrabat
Donate link: http://akrabat.com
Tags: revcanonical links url shorter
Requires at least: 2.5
Tested up to: 2.7.9
Stable tag: 1.3

This plugin creates rel="shorturl" and optionally rev="canonical" links with
shorter URLs in them, along with an appropriate HTTP header.

== Description ==

The **Shorter Links** WordPress plugin automatically creates a link element in
the <head> section of the post's page with a rel="shorturl" attribute. The URL
in the href attribute defaults to the id number of the post in question. It
also creates an HTTP `Link` header that also points to the shorter link.

A custom field called "Shorter link" is created once a post is saved, 
so that you can change the shorter link to a more memorable set of 
characters.

The choice of URL to use for the short link can be configured within
Settings->Shorter Links.

The &lt;link&gt; element looks like this:
    
    <link rel="shorturl" href="{url}" />
or
    <link rel="shorturl" rev="canonical" href="{url}" />

The HTTP header is:

    Link: <{url}>; rel=shorturl

Related Links:

* [Plugin home page](http://akrabat.com/shorter-links)
* [Robert Spychala's Short URL Auto-Discovery proposal](http://sites.google.com/a/snaplog.com/wiki/short_url)
* [URL Shortening Hinting article](http://laughingmeme.org/2009/04/03/url-shortening-hinting/)
* [A rev="canonical" HTTP Header article](http://shiflett.org/blog/2009/apr/a-rev-canonical-http-header)

== Installation ==

1. Upload `shorter_links.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3 If you want to set a different Base URL, then change set it from Settings->Shorter Links
4. To set a custom shorter link, update a post so that the custom field is
   created and then fill in a unique value in the field.

== Frequently Asked Questions ==

None yet!

== Screenshots == 

None.

== Licence ==

This plugin is licensed under the [New BSD license](http://akrabat.com/license/new-bsd).

== History == 

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


