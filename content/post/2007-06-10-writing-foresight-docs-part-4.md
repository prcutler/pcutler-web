---
title: 'Writing Foresight Docs: Part 4'
author: Paul Cutler
type: post
date: 2007-06-11T00:05:18+00:00
url: /2007/06/writing-foresight-docs-part-4/
categories:
  - Foresight
  - GNOME
  - Linux
  - Technology

---
Progress on the Userguide has been swift this week. Ken&#8217;s comments about having Foresight Linux 2.0 in testing in a &#8220;couple of weeks&#8221; spurred me to action. In no particular order are the things I&#8217;ve learned and accomplished this week:

  * URLs. Again, it&#8217;s just a matter of re-wiring my brain from HTML to Docbook&#8217;s format. For example: `[ulink url="http://www.openoffice.org/product/math.html" type="http">Math here[/ulink]` (replace brackets with < or >) links to the Math page on OpenOffice.org. Similar, but different. And god knows I&#8217;m no HTML expert to start with.
  * Bullets have been driving me crazy. It was just one little thing, adding the mark=&#8221;bullet&#8221; to the tag, i.e.  `[itemizedlist mark="bullet"]`
  * 3 of the 5 last pages created were created with **_zero_** syntax errors. Yes, pride cometh before the fall. All it means is I&#8217;m starting to get the hang of this. And I haven&#8217;t started doing any of the advanced formatting yet.
  * All pages have been committed. There&#8217;s some editing to be done (more on this below), but the directory structure is complete, all screenshots are uploaded,and the copy is complete in all XML files.
  * I&#8217;ve learned more Mercurial commands, such as hg pull and hg update, as I&#8217;ve worked on this on my laptop and desktop now. And I experienced a moment of panic after editing a file and not having done a pull. But I figured it out, thankfully.
  * I added a TODO file in the repository, but it probably needs to be updated more often.

Things left to do:

  * The first few pages need major formatting updates, especially on removing the indentation.
  * All pages need to be reviewed and edited for the correct URL tags.
  * Bullet points need to be fixed in almost all the pages.
  * Screenshots need to be resized to 510 pixels wide (so they print correctly, per the GNOME Documentation Handbook guidelines).
  * I still need to research, learn and build a Table of Contents.
  * I need to add some advanced formatting, specifically the arrow labels when showing how to access menus to run applications. (The <guimenu> tag I believe).</guimenu>
  * I still need to research on how to add this to the default Yelp page in GNOME, and how that will work from a packaging perspective.

Paul Scott-Wilson asked a great question in IRC last night, regarding whether [Docbook repository][1] or the [Wiki][2] will be the master copy of the userguide moving forward. My recommendation would be that Docbook would be the master copy, put together from the text on the wiki. This way it gives users a chance to contribute to the userguide on the wiki, adding new copy, having it proofed, and then moved to Docbook. The [Printing][3] section is a great example of this, it&#8217;s 80% complete on the wiki, but it needs to be 100% to be included in Docbook. (Jonathan Brickman, where are you? Please finish the Printing page!) Additionally, the Docbook repository has source control, which would make it easier to manage over the long term. Opinions or thoughts? Leave a comment below on the blog, or email me at pcutler at foresightlinux dot org.

Progress will be small to non-existent as I have to travel for my day job. This probably means no blog updates either. More to come soon.

 [1]: http://hg.foresightlinux.org/hg/foresight-user-guide/
 [2]: http://wiki.foresightlinux.com/confluence/display/docs/Getting+Started+with+Foresight+Linux
 [3]: http://wiki.foresightlinux.com/confluence/display/docs/Printing