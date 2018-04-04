---
title: Drupal Woes
author: Paul Cutler
type: post
date: 2005-09-25T23:19:34+00:00
url: /2005/09/drupal-woes/
categories:
  - Technology
  - Websites

---
Over the last month or so since I migrated Silwenae.com over to [Site5][1] for hosting, and transferred the silwenae.com content to [Apatheia.org][2] I&#8217;ve been working on the image module in [Drupal][3] as it stopped working during the site migration.

I&#8217;ve been through the code, I&#8217;ve re-installed the module, and nothing has worked. I decided to tackle it this weekend, with mixed results.

I upgraded Apatheia.org&#8217;s Druapl installation from 4.5.5 to 4.6.3 so it was running the latest version. (No problems there).

I downloaded the image.module for 4.6 and installed it. (No problems there).

In reviewing the images in the website, the root web directory of apatheia.org does not have an images directory. Looking at my backup of silwenae.com, it had an images directory with all the images stored in it, including all the re-sized images that the image.module made. Where did they go?

To further complicate things, when you look at the images stored on Apatheia.org, take a look at the Majordomo story on the frontpage. According to the image properties, it&#8217;s at: http://www.apatheia.org/images/majordomo2-312\_800x600.jpg , but there is no images directory when I ssh in to the website, or FTP in. Is Drupal doing something via mod\_rewrite? Per one post on the forums, I turned clean URLs on, but it didn&#8217;t fix my image upload problem.

In the image.module settings, I changed from using ImageMagick to GD, and I could now upload a picture, though the thumbnail wouldn&#8217;t store, and it errored out upon submitting.

I did a chmod on the tmp directory, and pointed the settings a few different ways at the current tmp directory with mixed results. I re-created an images directory.

You can now upload images, with some caveats:

Upon selecting an image to upload and hitting preview, you see the image with the following error at the top of the screen:

`warning: Invalid argument supplied for foreach() in /home/apatheia/public_html/modules/image/image.module on line 623.`

Hitting submit off this preview results in an error page with the errors:

`warning: Invalid argument supplied for foreach() in /home/apatheia/public_html/modules/image/image.module on line 623.</p>
<p>warning: Cannot modify header information - headers already sent by (output started at /home/apatheia/public_html/includes/common.inc:348) in /home/apatheia/public_html/includes/common.inc on line 159.`

However, then going back to Apatheia.org (use a bookmark or something) you&#8217;ll see the image uploaded just fine.

So it&#8217;s working &#8211; it spits out errors, but it&#8217;s working. The image properties still show in apatheia.org/images &#8211; _but there are no files in that directory_! I&#8217;d love to know where they are.

The image.module in Drupal is notoriously buggy &#8211; the number of threads in the forums looking for help with the module are staggering. There aren&#8217;t a lot of good alternatives. Gallery2 integration exists, but I don&#8217;t think it&#8217;s quite what I&#8217;m looking for.

It&#8217;s frustrating as the functionality that was there in 4.5 was perfect &#8211; it was great for the users of the site, the re-sizing functionality was very cool. My only beef with it then was it was a little difficult to post stories around the pictures (though you could bump pictures up to the front page) but this one has me beat.

 [1]: http://www.site5.com
 [2]: http://www.apatheia.org
 [3]: http://www.drupal.org