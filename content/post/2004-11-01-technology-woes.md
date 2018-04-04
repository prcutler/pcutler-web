---
title: Technology Woes
author: Paul Cutler
type: post
date: 2004-11-01T14:07:43+00:00
url: /2004/11/technology-woes/
categories:
  - Linux
  - Technology

---
Spent the weekend on and off attacking my to-do list.

Got the den cleaned up, a bit. Most everything off the floor.

Spent a good chunk of the weekend trying to stop the lockups on my Ubuntu desktop. It&#8217;s definitely a Nvidia bug. Started with X freezing, but the mouse pointer works. [Found the bug on nvnews.net][1], but no solution. Asked for help on the [Ubuntu forums][2], but no luck there. Asked for help on the TCLUG, but can&#8217;t even get to my mail now with the frequent lock ups.

I&#8217;ve installed and un-installed the Nvidia packages from Ubuntu, messed with my XFree86-4 configuration file, including making sure the modules are right, and even trying with and without the DRI module as some posts indicate. It definitely has something to do with the GL functions &#8211; the screensavers and GLXgears lock it up instantly.

The next two things to try are swapping 4200 cards, and maybe trying to build the Nvidia drivers from source (ugh).

I did get Vino working on the laptop &#8211; that&#8217;s pretty cool as I can just use the remote desktop functionality to read my email on my box from my laptop in the living room over the wireless connection. I&#8217;ll need to play with the screen resolutions a bit, as my desktop has 1600&#215;1200 and my laptop is 1024&#215;768, which makes it a bit hard to read at times.

All of this makes the case for getting my Athlon64 up and running &#8211; it might be my solution to dedicate that box as my primary linux box.

I disconnected my Linksys router I use as an access point. For some reason, unlike my D-Link A/G router, the Linksys won&#8217;t serve as a passthrough to my server, so any device connected to the Linksys won&#8217;t have internet access. I attempted to hook up a second D-Link, a vanilla 802.11g, but couldn&#8217;t get it to work like my A/G. It&#8217;s a pain in the ass to do it too, as I have to dedicate one machine to it, turn DHCP and all that fun stuff off, but I&#8217;ve learned I&#8217;ll have to have a second box hooked up to the A/G so I can figure out what settings I&#8217;m missing to get it to work.

To top it all off, I&#8217;m in the living room watching football, and my UPS freaks out. It&#8217;s probably my own fault as I don&#8217;t drain it periodically like I should, but it starts beeping and won&#8217;t stop. I&#8217;ll have to re-evaluate my power needs for my den. It&#8217;s just more to add to my to-do list. One step forward and two steps backwards.

 [1]: http://www.nvnews.net/vbulletin/showthread.php?t=31858
 [2]: http://www.ubuntuforums.org