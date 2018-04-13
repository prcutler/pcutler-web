---
title: Dell 2405 Modelines
author: Paul Cutler
type: post
date: 2006-01-24T05:21:55+00:00
url: /blog/2006/01/dell-2405-modelines/
categories:
  - Hardware
  - Linux
  - Technology
  - Ubuntu

---
As I mentioned in my last post, I needed to use different modeline setting on my Nvidia xorg.conf file than when I had my ATI card installed.

I have no idea why, but it worked. For posterity&#8217;s sake, I thought I&#8217;d just document &#8217;em here in case I ever needed again.

For my Nvidia card, in the Monitor section of my xorg.conf:

> `Section "Monitor"<br />
    Identifier  "DELL 2405FPW"<br />
    HorizSync   30-82<br />
    VertRefresh 60-60<br />
    Option "DPMS"<br />
    Modeline "1920x1200" 92.473920 1920 1992 2192 2464 1200 1209 1217 1251 -HSync +VSync interlace<br />
EndSection`

And from my ATI x800 xorg.conf:

> `Section "Monitor"<br />
    Identifier  "Monitor0"<br />
    HorizSync   30-82<br />
    VertRefresh 60-60<br />
    Option "DPMS"<br />
    Modeline "1920x1200" 193.16 1920 2048 2256 2592 1200 1201 1204 1242 -Hsync +Vsync`

EndSection

They both worked for 1920&#215;1200, the monitor&#8217;s native resolution, flawlessly. There&#8217;s a big difference in going from 1920&#215;1200 to any other resolution, especially 1600&#215;1200 or below. This monitor is definitely most crisp and bright when running in 1920&#215;1200 like it should be.