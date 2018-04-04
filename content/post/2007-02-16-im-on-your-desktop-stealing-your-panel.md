---
title: "I'm on your desktop, stealing your panel"
author: Paul Cutler
type: post
date: 2007-02-17T01:28:22+00:00
url: /2007/02/im-on-your-desktop-stealing-your-panel/
categories:
  - Linux
  - Technology
  - Ubuntu

---
The 5th time is the charm, as I finally was able to install [Avant Window Navigator][1] from subversion today on Ubuntu 6.10 (Edgy Eft) with Beryl:

[<img src="https://i0.wp.com/farm1.static.flickr.com/167/392490229_9264a053ac.jpg?resize=500%2C313" width="500" height="313" alt="avant" data-recalc-dims="1" />][2]

Neil Patel is doing some really innovative work with GNOME right now, from creating Avant Window Navigator to [Tracker][3] to including [metadata information in to Nautilus][4]. You really must [check out his blog][5] to see his work in progress on these projects.

Back to Avant Window Navigator: AWN replaces one of your panels, and shows both what applications are open and a launcher for other applications.

I had some difficulty getting AWN installed even after reading [this thread on Ubuntu Forums][6] and following the instructions on the [AWN Wiki][7]. In the end, I was able to get it installed using Subversion, but I had to change one line from the wiki:

The wiki&#8217;s last step says:
  
`cd data<br />
      gconftool-2 --install-schema-file=avant-window-navigator.schemas`

But there was no avant-window-navigator.schemas file in the /data directory. So I typed:

`gconftool-2 --install-schema-file=avant-window-navigator.schemas.in`

which _was_ a file in the /data directory, and voila, AWN!

I made notes on the screenshot on Flickr, but on the left of the dock are the launcher applications, and on the 4 icons on the right side are the applications currently opened.

I removed the bottom panel once AWN was running, and moved my workspace switcher, show desktop button and trash icon to the panel at the top.

Overall, I&#8217;m quite impressed with AWN. It scales the icons beautifully, I like how they move when highlighted, and I love how it&#8217;s both a launcher and a switch application tool. Hats off to the developer for this one. It takes some getting used to not seeing a panel at the bottom of the screen after using GNOME all these years, but I have a feeling I&#8217;ll adjust.

 [1]: http://code.google.com/p/avant-window-navigator/
 [2]: http://www.flickr.com/photos/silwenae/392490229/ "Photo Sharing"
 [3]: http://www.gnome.org/projects/tracker/
 [4]: http://njpatel.blogspot.com/2007/02/nautilus-love.html
 [5]: http://njpatel.blogspot.com/
 [6]: http://www.ubuntuforums.org/showthread.php?t=351186&highlight=avant
 [7]: http://awn.wetpaint.com/page/SVN+Version+Installation