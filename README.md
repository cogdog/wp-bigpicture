# HTML5up Big Picture Theme for Wordpress

-----
*If this kind of stuff has any value to you, please consider supporting me so I can do more!*

[![Support me on Patreon](http://cogdog.github.io/images/badge-patreon.png)](https://patreon.com/cogdog) [![Support me on via PayPal](http://cogdog.github.io/images/badge-paypal.png)](https://paypal.me/cogdog)

----- 


A configurable Wordpress Theme version of [HTML5up Big Picture Theme](https://html5up.net/big-picture) made for the internet by [@cogdog](http://cog.dog). It creates a simple, elegant calling card something that looks like

![Screenshot of Theme](screenshot.png "Screenshot of Theme")

You can see a demo version at http://lab.cogdogblog.com/bigpicture/

The top/splash screen is configured in the Wordpress Customizer. The backdrop image is managed by the **Header Background** controls in the Customizer, which means you have an option of loading several images that can be set to appear at random on page load.

Subsequent sections as you scroll down (or use the automatic generated menu) are managed as separate posts. If the post has a featured image, it's layout will be with that image as a large background, with  title and content in the boxes. The theme automatically alternates between left/right side content that animates as the page is scrolled into.

![left side content with featured image](images/bp-featured-left.jpg "left side content with featured image")

[Demo Left Side Content](http://lab.cogdogblog.com/bigpicture/#colors)

![right side content with featured image](images/bp-featured-right.jpg "right side content with featured image")

[Demo Right Side Content](http://lab.cogdogblog.com/bigpicture/#fast-mover)

Posts without featured images will be displayed as full content, and can accommodate and kind of content, embedded media, etc that a Wordpress editor provides.

![Wordpress content display](images/bp-content.jpg "Wordpress content display")

[Demo Wordpress Content](http://lab.cogdogblog.com/bigpicture/#content)

This also includes image galleries, and the extended types provided by the Jetpack plugin. There is a built in shortcode for generating a gallery in the animated style of the original theme (see below).

Each sections provide bottom arrow navigation to the next section. All content provides an `edit this` link for logged in users so they can directly edit the content.

The bottom footer can be customized with a social media icon menu and a custom footer menu text.

Big Picture works best for smaller amounts of content in each section, it's meant for high level summaries, and you can use hypertext links to expand to other sites. But still, some people want a lot of content in this site, so a features was added to mark the opening bits of a post to appear on the front, with a link to see expanded content in a single page ([see below for more](#splitting-content-into-see-more)).

Previously the theme was limited to 10 items on the front page, as of version 1.04 you can have as many as you like.


## Examples

* 25 Years of Ed Tech: The Audio Version https://25years.opened.ca/
* Aaron Davis http://home.readwriterespond.com/
* About Ryan Collins https://about.ryancollins.org/
* Affordances of [silly] Digital Media (workshop) https://cog.dog/roo/silly/
* Andrew Duncan Photography https://andrewduncan.photography/
* Aurex Relocations https://aurexrelocations.com/
* Buy-in For Badging http://nursekillam.com/badge/
* Developing Digital Fluency through the Open Web & Connected Learning (Coventry University) http://alanlevineetal.coventry.domains/
* Ellie Glade http://ellieglade.com/
* First version http://lab.cogdogblog.com/bigpicture/
* Fourwinds Holiday Cottage http://fourwindsholidaycottage.com/
* Humane Infrastructures https://humaneinfrastructures.humspace.ucla.edu/
* JustLego101 http://justlego101.com/ 
* Kenneth Cohen http://kencohen.org/
* Laura Killam Dossier http://dossier.nursekillam.com/
* Maha Bali & Colleagues (DMLL Visiting Fellows, Coventry University) http://mahabalietal.coventry.domains/
* Mechanical Reproduction https://mechanical-reproduction.com/
* North and South Main Streets "Explore our stories. Touring Cork city through sound!" http://nms.pennyjohnston.org/cms/
* Open Learning Lab (Lansing Community College) https://lab.openlcc.net/
* Paint Freedom Literature http://paintfreedom.org/
* Show Your Work! (workshop) https://cog.dog/roo/show/
* The Road in Spain (Hans and Jennifer Anderson) http://theroadinspain.com/
* What Works in Stories? (workshop) https://cog.dog/roo/storymaking/
* Winter Classic https://winterclassic.jessdaniels.umasscreate.net/

## Installing From Reclaim Hosting

If you are wise enough to host your web sites at [Reclaim Hosting](http://reclaimhosting.com/) you have the option of installing a fully functioning site with this theme ([a copy of the demo site](http://lab.cogdogblog.com/bigpicture/)) including recommended plugins, configured settings and sample content, all done  in one click. *But wait there is more!* With this method of installing your site, future updates to the theme are automatically added to your site.

In your cpanel, under **Applications** go to **All Applications**. This theme is available listed under Fratured Applications; just install from there.

![](images/reclaim-featured.jpg "Reclaim Hosting Featured Applications")

*Note that unlike other WordPress installs, this one will not preserve your username/password, so be sure to save that information.* When it's done, log into your new site and start making it your own. 


## Installing from Scratch

Install this theme on any self hosted Wordpress site. No luck on Wordpress.com, get a real web hosting package.  

You can download a ZIP file of this theme via the green **Code*" button above (use the Download Zip option). 

The zip can be uploaded directly to your site via **Themes** in the Wordpress dashboard, then **Add Theme** and finally **Upload Theme**. If you run into size upload limits or just prefer going old school like me, unzip the package and ftp the entire folder into your `wp-content/themes` directory.

Follow the directions below for customizing, some additional plugins may need to be installed.

## Updating the Theme

As of WordPress version 5.5 themes uploaded as .ZIP files can now be updated the same way you installed it; just download the newest version, and update it  via **Themes** in the Wordpress dashboard, then **Add Theme** and finally **Upload Theme**. You will be asked to confirm updating the theme with the newer version.  

If you have ftp/sftp access to your site (or this can be done in a cpanel file manager), simply upload the new theme files to the `wp-content/themes` directory that includes the older version theme. 

For those that lack direct file upload access or maybe that idea sends shivers down the spine, upload and activate the [Easy Theme and Plugin Upgrades](https://wordpress.org/plugins/easy-theme-and-plugin-upgrades/) plugin -- this will allow you to upload a newer version of a theme as a ZIP archive, the same way you add a theme by uploading.


## Customizing with the Customizer

The main elements are set and previewed in `Appearance` -> `Customize`

### Site Name. Anything you want!
Under `Site Identity` edit for the title that shows up in top left

### Use Header Image to Set Top Background
Under `Header Image` upload an image (recommended size 1400 x 715 px or bigger) to place a background image

![](images/bp-customize-header.jpg "Customize Header Image")

Once you have changed it, you will see it immediately previewed on the right

![](images/bp-customize-changed.jpg "Customize Header changed")

With the **Header image** controller you can upload more than one image, and use the option to randomize each time the site loads.

### Intro Section Content

The rest of the top / intro section is configured in the Customizer 

![](images/bp-customizer-section.jpg "Intro Section in the Customizer")

Change the title and the blurb content (which can include HTML) 

![](images/bp-customize-intro.jpg "Intro Section in the Customizer")

Enter in the **Menu Label** field a one or two word label for how this section will be listed in the top menu (if you leave it blank the men label will read `Intro`).

The text for **Footer Text** is actually used for the section at the bottom of the page, coming up next.

### Footer Section Content

The bottom left of the footer will by default display the name of the site and what ever is entered in the **Footer Text** goes in the section shown

![](images/bp-customize-footer.jpg "Intro Section in the Customizer")

However, the theme supports the use of a plugin for replacing the bottom left of the footer with customized menu of social media links.

> **NOTE** Previous versions of the themes used the [Font Awesome 4 Menus](https://wordpress.org/plugins/font-awesome-4-menus/) plugin, which is not compatible with the latest set of [Font Awesome icons](https://fontawesome.com/icons) I have built an update to this plugin in you want access to a larger set of icons. You will also need to add `fab` to the menu class names (see below)

To have a customized set of icon links on the front of the site, download, install and activate the [Font Awesome 5 Menus](https://github.com/cogdog/font-awesome-5-menus) plugin. This allows you to add an icon to any menu item.

From the Wordpress Dashboard look under **Appearances** for **Menus**. Click **create a new menu**  name it whatever you like -- `social` is  a good choice. Under  **Menu Settings** next to **Display Location** check the box for `Social Media`. 

To add a social media (or any link), open the panel for **Custom Link**. 

![](images/add-custom-link.jpg "Adding Menu Items Links")

Enter a title for the site and provide the URL that points to your content on that site. Add as many as you like. You can drag and drop them to change the order.

To set the icon, you must first enable the visibility of CSS classes for each menu item.  Click **Screen Options** in the upper right, and check the box for **CSS Classes**.

![](images/screen-options.jpg "Enabling screen options for menus")

Open an item in your Social Menu and you will now see a field for entering CSS Class names. You have the choice to add from [well over 1400 icons in the Font Awesome free collection](https://fontawesome.com/icons?d=gallery&m=free). Find the name of the icon you wish to use, and enter it's all of it's class names as listed,

For example these are the class names to render the icon for typical social media sites (these should be all lower case):

* fab fa-twitter
* fab fa-facebook
* fab fa-youtube
* fab fa-linkedin
* fab fa-instagram
* fab fa-flickr

With the Font Awesome icons, you can add any site you wish to be in your footer and pick the icon you prefer.

**Save** your menu and check out the spiffy icons in the footer.

![](images/font-awesome-icons.jpg "")

In addition, if you want to provide a tool tip hover for the icons, look again under  **Screen Options** and enable the option for **Title Attribute**. This adds another editable field to add the tooltip text.

![](images/menu-title-attribute.jpg "")





## Editing Content

The content for the blocks are managed as Wordpress Posts.  For each block you want create a post. If you want the animated style with a large background image, add a Featured image that is at least 1400 x 715 px in size- big beautiful images. 

The content can use anything you like, but should be short, a few sentences. 

![](images/bp-edit-post.jpg "Sidebar edits")

The order of the sections is controlled via the post sidebar **Post Attributes** option for... **Order**, lower numbers are displayed higher in the site.

The site now accommodates up to 10 sections.

Look for a setting called **Menu Label** under **Extra Big Picture Stuff** box below the post content. This defines what is used on the top navigation menu to link to this section. Use 1 or 2 word labels.

The Dashboard Posts view will list your sections in the order specified. To change the order quickly, hover a title and use the **Quick Edit** link to change the value of the order attribute.

## Splitting Content into See More

Okay, you want to write more content than displays well on the front of the site. Version 0.2 of this theme introduces a template for a single post view, and you can use the Wordpress feature to mark where in your post to split what appears on the front of the site.

![](images/bp-insert-more.jpg "Insert read more in the Wordpress editor")

In the Wordpress editor, find the place in  your post where you want this split to occur, and use the **Read More** button to place the marker.

When an `Read More` has been added to a post, on the front of your site, only the portion above the line is visible, and a **more...** link is added.

![](images/bp-front-more.jpg "More link appears on front of site")

Following the link leads to a single post view that will open with the featured image at the top (if there is a featured image, otherwise, just the post title appears) and the part of the post above the `Read More` marker:

![](images/bp-more-single-top.jpg "More link appears on front of site")

The arrow button leads to a view of the rest of the post. This gives you a place to include much more content.

## Big Picture gallery

You can use the built in Wordpress Gallery tools (under **Add Media** when editing a post) to add a gallery to a plain content section, but this theme has a special style of gallery that animates like the other content ([see the demo site](http://lab.cogdogblog.com/bigpicture/#content)).

First create  regular Wordpress Gallery tools (under **Add Media** when editing a post), click **Add Gallery**.  Upload or add the media you want to use (an even number works better). You can re-arrange te order by dragging images. 

The number of columns will not be used. But you can use the check box that will randomize the order on every page load.

![](images/edit-gallery.jpg "Edit Wordpress Gallery")

This gallery will not look very impressive. Hang on.

![](images/gallery-wp-default.jpg "Default and dull Wordpress Gallery")

Return to the editor, and make sure you have switched the editor to the Text view, where you will see the gallery shortcode:

![](images/gallery-editor.jpg "Default and dull Wordpress Gallery")

Change the gallery shortcode that reads like:

`[gallery ids="176,666,721,720,719,186,194,40,43,38"]`

to read

`[bigpicturegallery ids="176,666,721,720,719,186,194,40,43,38"]`

This will use the images you picked but will display in the format provided by the Big Picture theme, [see the demo](http://lab.cogdogblog.com/bigpicture/#content) as the screen show does not show the animation nor the slide show!

![](images/bp-gallery.jpg "Big Picture Gallery")

If you ever need to edit the Gallery (e.g. change the images), revert the name of the shortcode, use the visual editor in Wordpress, and click the edit icon. Make changes in the image selecion or order, then repeat the editing step of the shortcode.


## Suggested Plugins

* [Font Awesome 4 Menus](https://wordpress.org/plugins/font-awesome-4-menus/) used to add the  icons to the social media links in the footer
* [Fluid Video Embeds](https://wordpress.org/plugins/fluid-video-embeds/) will make sure your auto embedded videos (and other content wordpress can embed by URL) are responsive sized to fill the column width
* [Easy Theme and Plugin Upgrades](https://wordpress.org/plugins/easy-theme-and-plugin-upgrades/) allows you yo update the theme by uploading the zip file again as a new server (because wordpress does not provide this capability)
* [JetPack](https://wordpress.org/plugins/jetpack/) can add a number of capabilities, such as adding a contact form or a variety of other image galleries (try Mosaic). If you do [create a contact form](https://jetpack.com/support/contact-form/), make sure you also add and activate [Akismet](http://akismet.com/) because *you will get spam*
* [Regenerate Thumbnails](https://wordpress.org/plugins/regenerate-thumbnails/) If you change to this theme from another one, you should run this plug to re-generate previously uploaded images in the specific sizes used by the theme.


## Features / History

* v1.1 (Dec 23, 2019) Minor cleanup, language attribute in header, change for newer Font Awesome 5 Menus plugin, Customizer labeles more meaningful
* v1.04 (Sep 26, 2018) Removed 10 post/item limit for number of sections. Added new code that displays dismissible admin notice if Font Awesome 4 Menus plugin not installed or activated.
* v1.0 (Aug 12, 2018) Release version enabled with data files needed for one click install at Reclaim Hosting. 
* v0.6 (Jan  1, 2018)  Deprecated use of Customizer Social Icons and re-wrote instructions to use Font-Awesome 4 Menus
* v0.4 (Oct  13, 2017) Added template for standalone Wordpress Page.
* v0.3 (Oct  11, 2017) Small styling improvements- outline title text, bigger text below, added transparency to the sliding box overlays
* v0.2 (Sep  5, 2017)  Added template for single post view and support for **Read More** tags to separate content for front page excerpt and provide a space for more content in a single post view. Removed center alignment for primary content. Added home link to blog title in top left. 
* v0.1 (Sep  3, 2017)  First release, for the brave, the few, the daring.


### Requests

* *You tell me* Fork and edit to suggest features or [toss them into the Issues bin](https://github.com/cogdog/wp-bigpicture/issues)

### Credits

* **Default backdrop image** "Where the Rivers Meet" flickr photo by cogdogblog https://flickr.com/photos/cogdog/15635307651 shared under a [Creative Commons (BY) license](https://creativecommons.org/licenses/by/2.0/)
* [HTML5 Up Big Picture theme](https://html5up.net/big-picture) is shared under a [Creative Commons (BY) license](https://html5up.net/license)
