=== Site Layout Customizer ===
Contributors: wpcolor
Donate link: 
Tags: layout, custom, front page, customize, post, page, site, images, image, images, admin, theme, excerpt, background, css, shortcode, tags, categories, cystom post, custom layout, media, excerpt
Requires at least: 3.3.1
Tested up to: 3.6.1
Stable tag: 1.8

Customize the front page & other pages. Display your posts with different layouts.

== Description ==

IMPORTANT you need to choose SET FEATURED IMAGE when you upload an image to your post. The plugin only shows featured images.

This plugin allows you to create a custom front page and other pages to show the latest posts. It will allow you to display your posts with different custom layouts. As an example it can make the posts on the front page look similar to a magazine or news website. The uses for it are many. It is easy to custom different layouts for your posts and pages.


Some Features

* Customize & theme your frontpage, page or post
* Display Title, pictures, excerpt, categories, tags, biographic info, author, date for each post
* Filter posts by category
* Integrates nicely with many themes
* Change width & height of thumbnail & image
* Easy Customize Layout editor
* Display posts with shortcode
* Put text over images & thumbnails
* All around plugin with many uses








== Installation ==

1. Download the plugin

2. With your FTP program, upload the Plugin folder to the wp-content/plugins folder.

3. Activate the plugin

More detailed information here: http://codex.wordpress.org/Managing_Plugins


example how to get started fast:

4. Go to the Site Layout Customizer menu and edit Layout 1 to your liking.

5. Add a new page and paste in the following shortcode: 

[layout show="1"]

publish and view the page.

Now layout 1 should be showing on that page.


== Frequently Asked Questions ==

= What is a layout? =

In the menu you can choose from several layouts. Each layout can be customized with "what you see is what you get" interface, and has a number of options such as where to put the title, image and excerpt, effects and so on. 

= How do I add a Layout on a page? =

To make a layout show up on a page you simply paste a shortcode on a page. Add a new page and add the following shortcode exactly:

[layout show="1"]

and then publish it. View the page. You should now see the layout with the latest posts showing up. You can custom the layout and how many posts to show in the menu by choosing Layout 1 in the plugins menu. The default settings offer a starting point.

You can also custom the layouts 2, 3, 4 to make them show up on a page. To do this you simply change the number 1 in the shortcode to the number of the layout you want to show. For example to show layout 2 we add the shortcode

[layout show="2"]

= How do I add several Layouts on a page? =

To display several layouts on one page, simply add several short codes after each other For example:

[layout show="1"]

[layout show="2"]

[layout show="3"]


= The Settings =

Each layout has a number of settings that can be customized. The placement settings allows you to put title, image and other elements in three different main areas TOP, LEFT and RIGHT. So this allows you for example to put the title to the right and the image to the left or in any combination. 

There is also a position selector (beside the area selector) where you can select a number between 1 to 10. This allows for arranging elements within each area. A higher number puts the element higher up and a lower number puts it lower down. This makes it possible for example to put the title over the excerpt.

In addition to the 3 main areas top, left and right there is also an over image option where you can put any text over the image.

= Making a page the front page =

To make a page a front page, go to Settings then Reading Settings and select Static Page, in the drop down menu choose the page you want as your front page.

= Images =

The plugin uses the image sizes set under settings->media. You can set the width and height of the image in the layout settings, this will just upscale or downscale the image without actually changing the original image size. If a featured image is set for the post then that will be used, otherwise if a image has been inserted into the post then that image will be used.


= CSS important! =

This information is valid only if you want to edit the css stylesheet

You have the option to add your own external css file and overide the plugin stylesheet. To protect your css file from being overwritten you need to put it in a safe directory outside the plugin directory. Change the css file url in the main option page to point to your css file. 

Steps:

1. take a copy of the style.css in the plugins directory
2. put the copy in a safe directory outside the plugin. Example the root or the themes folder
3. Change the css file url in the main option page to point to your css file.

Note: adding a css file will not disable the css file in the plugin, both will be used.

Title & excerpt can be set individually for each layout. Most of the other elements are common for all layouts. In your css file you can override id tags & classes.   Title & excerpt can be set individually for each layout. Most of the other elements are common for all layouts.

= Theme Compability =

The plugin has been tested with a number of themes but there might be some themes that will need some css tweaking to work properly.



== Screenshots ==

1. example
2. example

== Changelog ==

= 1.6 =
* First released version.

== Upgrade Notice ==

= 1.6 =
