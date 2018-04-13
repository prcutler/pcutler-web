---
title: 'HOWTO: Upgrading to Banshee 0.11.6 (SVN) on Ubuntu 6.10'
author: Paul Cutler
type: post
date: 2007-02-11T15:33:38+00:00
url: /blog/2007/02/howto-upgrading-to-banshee-0116-svn-on-ubuntu-610/
categories:
  - Linux
  - Technology
  - Ubuntu

---
Banshee 0.11.6 was released on Feb. 5th, 2007. Banshee 0.11.1 is included in Ubuntu 6.10, Edgy Eft. Major [changes to Banshee][1] 0.11.1 include:

  * Banshee-official-plugins merged with core
  * Radio stations can now be added/edited/removed from the radio plugin; additionally the remote stations can be easily and optionally disabled
  * Usability and interface updates to the podcast plugin 

How to upgrade Banshee on Ubuntu 6.10 from Subversion:

Step 1: Create your build environment:

`sudo apt-get build-dep banshee`

Step 2: Get the required development packages and configure them:

`sudo apt-get install libmono-sqlite2.0-cil libmono-cairo2.0-cil libglib2.0-dev<br />
    libtool subversion autoconf automake1.9 gnome-common libavahi1.0-cil`

`sudo update-alternatives --set automake /usr/bin/automake-1.9`
  
`sudo ldconfig`

Step 3: Remove Banshee 0.11.1:
  
`<br />
sudo apt-get remove banshee`

Step 4: Get Banshee from Subversion:

`svn co http://svn.gnome.org/svn/banshee/trunk/banshee`

Step 5: Build Banshee 0.11.6 with Avahi support:

`./autogen.sh --prefix=/usr --enable-avahi --disable-docs`
  
`make`
  
`sudo make install`

And run Banshee!

I have to say I really like the Internet Radio plugin, the layout is well done and the icons look great. Banshee feels snappier overall as well.

If I feel really brave, I may try to get MTP working later this week.

 [1]: http://www.banshee-project.org/Releases/0.11.6