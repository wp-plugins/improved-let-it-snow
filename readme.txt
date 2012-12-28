=== Improved Let It Snow! ===
Contributors: codix, mohanjith
Donate link: http://twitter.com/codemasteroy
Tags: snow, christmas, xmas, flakes, aen
Requires at least: 1.5
Tested up to: 3.5
Stable tag: 3.5

Upload the plugin folder to your plugin directory and activate to see falling snow on your blog.

== Description ==

**Update Dec 23, 2012**

Updated snow falll script to work with Wibiya. Localized Settings Page. Moved the Settings Page under main Settings. Uses register script and enque script.

**Update Jan 30, 2011**

Updated the plugin to the latest stable version of the snow script. Added additional options to the plugin admin page.

**Update Nov 07, 2009**

I have not been supporting this plugin for a long long time, almost 2 years in fact. Since Christmas is round the corner, I thought I should give this plugin a nice refresh. I have updated the snow script to the latest version. Best of all, I have added a plugin settings page so it's easier for those who are not comfortable with tweaking code.

**History**

In 2007, WordPress.com introduced a [falling snow options](http://wordpress.com/blog/2007/12/25/let-it-snow/) for its users after [Matt Mullenweg asked for a falling snow script](http://photomatt.net/2007/12/23/falling-snow-script/). Because the feature was only available to WordPress.com users and not self-hosted WordPress blogs, I took the falling snow code and made a plugin that exactly the same thing. All users needed to do was to download and activate the plugin to have beautiful falling snow flakes on the blogs.

== Installation ==

1. upload the folder `improved-let-it-snow` with its contents to `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress Admin Panel
1. Configure snowfall if you like, in the 'Settings' -> 'Improved Let It Snow!' page. That's it!

== Frequently Asked Questions ==

= The snow looks weird =

Check that your theme is not applying styles to all `IMG` elements. If you are not sure what this is, contact your theme's author.

= It's not working =

If it does not work for you. Check that your theme has the `wp_footer()` function call in footer.php. If it does not, add `<?php wp_footer(); ?>` just before the closing `</body>` tag.
If you have questions or need help, leave a comment here.

= I have a suggestion! =

Sure! Write to us at [hello@codemaster.fi](mailto:hello@codemaster.fi) with your suggestions.

== Notes & Credits ==

The falling snow script used in this plugin is originally by [Scott Schiller](http://www.schillmania.com/projects/snowstorm/).
This plugin is originally written by [Aen Tan](http://aentan.com/) and later improved by [S H Mohanjith](http://mohanjith.com/).

You should follow us on Twitter *[here](http://twitter.com/codemasteroy)*.

== Changelog ==

= 3.5 =
Updated snow fall script to work with Wibiya and localized settings page.

= 3.0 =
Updated snow fall script and generally cleaned things up.

= 2.0 =
Updated snow fall script and generally cleaned things up.

= 1.3 =
Changed z-index of snow so it's on top of everything.

= 1.2 =
snowCollect now working, thanks to Scott Schiller for his help.

= 1.1 =
Added additional style declarations for themes that style the img tag.

= 1.0 =
First version
