---
title: 'Writing Foresight Docs: Part 3'
author: Paul Cutler
type: post
date: 2007-06-05T03:18:22+00:00
url: /blog/2007/06/writing-foresight-docs-part-3/
categories:
  - Foresight
  - Linux
  - Technology

---
My original intent in this continuing series on Writing Documentation for Foresight was to post weekly, but I just had to share the latest news.

With Paul Scott-Wilson&#8217;s help in IRC last night, the Userguide&#8217;s first two chapters are now working in Yelp. Pscott shared a diff file fixing some syntax issues, and pointed out I could just run yelp installation.xml to display the Docbook file in Yelp, or if it crashed, the terminal spit back all the errors and the lines to go fix them on. (I really do need to use the command line more.)

After spending a couple hours on all the errors that the terminal was yelling at me about, we now have Yelp displaying the Userguide (with images!):

[<img src="https://i2.wp.com/farm2.static.flickr.com/1181/531027887_5ad0b36492.jpg?resize=500%2C313" width="500" height="313" alt="userguide-yelp1" data-recalc-dims="1" />][1]

There are still a number of typo&#8217;s I&#8217;m finding, especially as it relates to bullets and indentation, but the menu&#8217;s and links are working, the content is displayed, and best of all, no errors when starting from the command line. Check it out yourself from the [Mercurial repository][2], it&#8217;s up to date.

Next up: Learn how to tie the docbook files together (Pscott pointed me at this link: <http://www.sagehill.net/docbookxsl/ModularDoc.html>) and package them up in Foresight. These first two chapters took me longer than expected to port to Docbook and re-write, so it&#8217;s probably a good idea to see if this even works.

 [1]: http://www.flickr.com/photos/silwenae/531027887/ "Photo Sharing"
 [2]: http://hg.foresightlinux.org/hg/foresight-user-guide/