---
title: Ubuntu Breezy Badger Colony 4 Upgrade
author: Paul Cutler
type: post
date: 2005-09-08T13:51:30+00:00
url: /blog/2005/09/ubuntu-breezy-badger-colony-4-upgrade/
categories:
  - Linux
  - Technology
  - Ubuntu

---
I upgraded my main computer with [Ubuntu&#8217;s][1] Hoary Hedgehog release from May &#8217;04 to the latest version of testing (Colony 4) Tuesday night. I wanted to perform the upgrade with the release of [GNOME 2.12][2] Wed., and Breezy Badger about a month out.

I used apt-get to perform the install, and considering it&#8217;s not even to preview version, some things went right and some things went wrong.

The Good:

  * Updated my /etc/apt/sources.list and replaced all instances of &#8220;Hoary&#8221; with &#8220;Breezy&#8221; 

  * It took about 20 minutes to install and upgrade, had a few instances where I had to force (-f) the packages

The Bad:

  * ATI binary drivers aren&#8217;t in Breezy yet

  * My xorg.conf file is pretty messed up. My original Hoary xorg.conf included the actual scan lines for my Dell 2405 monitor. I ran through the manual setup script and removed one bad resolution (1920 x 1440) and am using DRI to draw the desktop. At least I get to the desktop to that way, though I currently have no 3d acceleration.

The Ugly:

  * My icons are pretty messed up &#8211; I&#8217;ll post a screenshot tonight. Including icons on the panel (Tomboy specifically) and on the desktop.

  * I keep my desktop clean of icons, with the exception of my Samba and SSH links to my remote servers. Those icons are messed up, as is Nautilus, including the new spatial tree view.

Overall, GNOME still feels snappy, even in DRI mode, and I&#8217;m fairly excited about some of the new features, especially the spatial tree view in Nautilus.

 [1]: http://www.ubuntulinux.org
 [2]: http://www.gnome.org/start/2.12/