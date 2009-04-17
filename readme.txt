=== Plugin Name ===
Contributors: akrabat
Donate link: http://akrabat.com
Tags: revcanonical links url shorter shorturl
Requires at least: 2.5
Tested up to: 2.7.9
Stable tag: 1.4

This plugin creates rel="shorturl" link with a shorter URL in it, along with
an appropriate Link HTTP header.

== Description ==

The **Shorter Links** WordPress plugin automatically creates a link element in
the <head> section of the post's page with a rel="shorturl" attribute. The URL
in the href attribute defaults to the id number of the post in question. It
also creates an HTTP `Link` header that also points to the shorter link.

A custom field called "Shorter link" is created once a post is saved, 
so that you can change the shorter link to a more memorable set of 
characters.

The choice of base URL to use for the short link can be configured within
Settings->Shorter Links.

The &lt;link&gt; element looks like this:

    <link rel="shorturl" href="{url}" />

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
3. If you want to set a different base URL, change it from
   Settings->Shorter Links.
4. To set a custom shorter link, update a post so that the custom field is
   created and then fill in a unique value in the field.

== Frequently Asked Questions ==

** Is there a bookmarklet to extract shorturl links? **

This is a bookmarklet based on [Shorten](http://swtiny.eu/EZa):

[Short URL][1]

[1]: javascript:(function(){var%20url=document.location;var%20links=document.getElementsByTagName('link');var%20found=0;for(var%20i%20=%200,%20l;%20l%20=%20links[i];%20i++){if(l.getAttribute('rel')=='shorturl'||(/alternateshort/).exec(l.getAttribute('rel')))%20{found=l.getAttribute('href');break;}}if%20(!found)%20{for%20(var%20i%20=%200;%20l%20=%20document.links[i];%20i++)%20{if%20(l.getAttribute('rel')%20==%20'shorturl')%20{found%20=%20l.getAttribute('href');break;}}}if%20(found)%20{prompt('URL:',%20found);}%20else%20{window.onTinyUrlGot%20=%20function(r)%20{if%20(r.ok)%20{prompt('URL:',%20r.tinyurl);}%20else%20{alert('Could%20not%20shorten%20with%20tinyurl');}};var%20s%20=%20document.createElement('script');s.type='text/javascript';s.src='http://json-tinyurl.appspot.com/?callback=onTinyUrlGot&url='%20+document.location;document.getElementsByTagName('head')[0].appendChild(s);}})();


(Just drag to your bookmarks bar)

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

