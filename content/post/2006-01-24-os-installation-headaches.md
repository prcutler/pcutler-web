---
title: OS Installation Headaches
author: Paul Cutler
type: post
date: 2006-01-24T05:16:03+00:00
url: /blog/2006/01/os-installation-headaches/
categories:
  - Hardware
  - Linux
  - Technology
  - Ubuntu

---
I thought I was done with installing my operating system, but I ran into another glitch today. I installed, or more appropriately, tried to install Quake IV and Doom 3. Quake IV I had working previously before the reformat, and I kept meaning to get around to installing Doom 3 on Linux to try out some of the mods.

Fixing my Doom 3 problem was easy &#8211; for whatever reason, my DVD-rom drive wouldn&#8217;t read the first disc, so I couldn&#8217;t transfer the .pak file over I needed. Put it on the NAS, and fixed it.

Quake IV is driving me nuts. All of the menu&#8217;s have the wrong text, such as #str_000000 or different numbers. Searching on Google turned up [one hit on the SUSE mailing lists][1] &#8211; and the guy reinstalled and it was fine. I&#8217;ve re-installed 3 times with no luck, including trying the 1.05 installer instead of 1.06.

I even thought the above problems were a video card driver problem, that my ATI card wasn&#8217;t working right. So I swapped it out for a Nvidia 6800 and spent a good hour reconfiguring my X server (that was fun). Turns out I needed different mode lines for my Dell 2405 (more on that later).

The net result is I&#8217;m running a Nvidia 6800 instead of my ATI x800, so the net result is about equal. It took a while to get my 1920&#215;1200 resolution back, but it&#8217;s working. Doom3 is working, but no Quake IV yet (and I even backed up my save games!).

 [1]: http://lists.suse.com/archive/suse-linux-e/2005-Dec/2171.html