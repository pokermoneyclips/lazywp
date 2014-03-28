Lazy Grid WP Edition

Useful Additions
Pods, the greatest thing since sliced bread in my opinion, should be added to your site immediately! I'll be adding a lot of Pods support in the immediate future.
http://pods.io/ 

Dynamic Widgets
https://wordpress.org/plugins/dynamic-widgets/

Manual Image Crop
http://wordpress.org/plugins/manual-image-crop/


Getting Started
I've added a settings page for Lazy Grid to allow you to start customizing some of the options. More options will come available as I get feedback and what's wanted.
The settings page itself is available in your admin section under "Lazy Grid Settings"
Front Page settings allow you to choose between a slider, a single image with text, or no header section
If your "Reading" Settings (under Settings -> Reading) are set to static page then you can configure recent posts, pages, or attachments to display below your page content. This will appear in a 3 x 2 grid. You can choose which post categories appear and change the image sizes within the grid.
If your "Reading" Settings are set to recent posts, or you specify a home page for your recent posts, items will be displayed stacked on top of one another and use the "short" display image format
You can also choose the image sizes for posts and "short" display

About
This has been built on a fluid 960 grid. As you shrink your window your content will stack on top of itself for smaller displays. Your top menu will also convert to a moblie friendly menu.

404 page includes search box

Category listings currently display in a 3 x 3 grid, similar to the front page settings

Comments are configured to not display website box or gravitar image. This was done in the hopes of preventing spammers

Featured images are enabled for posts and pages. If you use a featured image it will appear in your slider, in your 3x2 grid on the front page, and left aligned on the post or page.

The front page has 2 optional widget areas below the 3 x 2 grid. It'll be hidden if nothing is placed, and will resize accordingly depending on whether you are using 1 or 2 widget areas.

The footer section has 3 optional widget areas. It will also resize accordingly.

The optional right sidebar will display on your custom recent posts page, every post page, and every page page. The content area will resize accordingly.


Adding Stuff
I separated out the menus, widgets, and image sizes into a separate php file for anyone who would like to start adding more. You can find them in the "functions" folder - menusnwidgets.php


Gotchas
I overrode some default html stuff like adding classes around embedded videos, changing the html of images when inserted into posts, etc. You can turn all that off if you'd like by commenting out the line include (TEMPLATEPATH . '/functions/htmlmods.php'); in functions.php 
Or remove what you don't want from the "functions" folder htmlmods.php

Instead of using the normal WP function to insert files, I used the include function to pass variables throughout the templates. These variables come from the options page or adjust grid sizes.

I created 2 folders, partials and variables to contain the code for included variables and the formatting for certain post styles

The social media icons are buried instead the partials folder in social-media.php. You can add or remove more here (better load time performance.) Using the font socicon [http://socicon.com/] so reference accordingly.
If you want to dump the social media icons comment out include (locate_template('/partials/social-media.php')); in partials/content-post.php



TO DO (last updated 3/27/14)
Don't have header be fixed so you can include more menu items (maybe)
Add option to include / exclude pages from Front Page Options if pages option is selected
Make sure the options return sanitized values
Add more Pods stuff
Add sticky post support