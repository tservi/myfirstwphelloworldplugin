=== Plugin Name ===
Contributors: Jean Tinguely Awais
Donate link: https://www.paypal.com/fr/cgi-bin/webscr?cmd=_flow&SESSION=3f2Sxf2giP2tjrt7kFT27Omv9eg5hKGtb7_BEzmaxjhR6WIdW-Mu2iOHvBS&dispatch=5885d80a13c0db1f8e263663d3faee8d9384d85353843a619606282818e091d0
Tags: my first wordpress plugin
Requires at least: 3.1
Tested up to: 3.1
Stable tag: trunk

This plugin adds a "Hello world" text.

== Description ==
This plugin adds a "Hello world" text.


== Installation ==
1. Add a directory called 'myfirstwphelloworldplugin' (without the quotes) to your '/wp-content/plugins/' directory.
1. Upload myfirstwphelloworldplugin.php to the '/wp-content/plugins/add-to-facebook-plugin/' directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Go to 'Options->Hello World' in your admin interface to select you options.

== CSS ==
The CSS for this plugin is found in the included myfirstwphelloworldplugin.css file.  This file may be edited to change the style of the text.

== Options ==
There are two options on the options page: Text color and Text style.


== Template Tag ==
The following template tag must be added to your theme in the location you want the link to appear when insertion type is set to template:

`<?php if(function_exists(helloworld)) : helloworld(); endif; ?>`
