---
title: More AWN Eye Candy
author: Paul Cutler
type: post
date: 2007-07-15T23:38:46+00:00
url: /2007/07/more-awn-eye-candy/
categories:
  - Foresight
  - GNOME
  - Linux
  - Technology

---
[Neil Patel upated his blog][1] with news that [Avant Window Navigator][2], everyone&#8217;s favorite dock-like menu bar for GNOME, now had reflections enabled (and some bug fixes) in the latest subversion thanks to some contributors.

Pscott was kind enough to package it within minutes of being pinged in IRC, a simple conary update avant-window-navigator and voila, new AWN. (See, don&#8217;t you wish you were running [Foresight][3] right now?)

Here is a picture of my dock taken just minutes ago with the new AWN from subversion:

[<img src="https://i2.wp.com/farm2.static.flickr.com/1318/824217632_81af63350b_o.png?resize=700%2C79" width="700" height="79" alt="awn-dock-715-3" data-recalc-dims="1" />][4]

Changing AWN to use reflections and have the icons sit on top of the bar does require two changes in Gconf, it&#8217;s not in the AWN preferences yet. This [Youtube click shows you how][5], or just do this:

1. Open Gconf (Applicatons > System Tools > Configuration Editor)
  
2. Click on Apps > Avant-Window-Navigator > Bar
  
3. Change the Bar_angle value to 30
  
4. Change the Icon_offset value to 10
  
5. Close Gconf
  
6. Restart Avant-Window-Navigator (Right click on it (not on an icon!) and click Close. Hit ALT-F2 to run it, and type avant-window-naviagor to start it. Voila!

Thanks again to the fine developers, and to Pscott for packaging it so quickly. It&#8217;s the little things that keep me happy, like eye candy.

_Update: Thanks to Cornelius in the comments, these settings make the reflection much more apparent:
  
_ 
  
bar_angle: 45
  
icon_offset: 18

 [1]: http://njpatel.blogspot.com/2007/07/so-now-that-we-have-some-depth.html
 [2]: http://code.google.com/p/avant-window-navigator/
 [3]: http://www.foresightlinux.org
 [4]: http://www.flickr.com/photos/silwenae/824217632/ "Photo Sharing"
 [5]: http://www.youtube.com/watch?v=hfzKJu70U14&mode=related&search=