---
title: Avant Window Navigator on Feisty Fawn Howto
author: Paul Cutler
type: post
date: 2007-02-17T17:53:56+00:00
url: /blog/2007/02/avant-window-navigator-on-feisty-fawn-howto/
categories:
  - Linux
  - Technology
  - Ubuntu

---
With some help from Pveith on the Ubuntu Forums, I was able to compile Avant Window Navigator from Subversion. Per Pveith&#8217;s recommendation, I used checkinstall, which created a .deb for installation. I am running Beryl and an Nvidia graphics card. I added a [Feisty Fawn Howto on the AWN wiki][1], here is how I got it working:

Step 1: Prepare your system

* sudo apt-get install checkinstall build-essential subversion

Step 2: Download the required dependencies

* sudo apt-get install libgtk2.0-dev libwnck-dev libwnck-common libgconf2-dev libglib2.0-dev libgnome2-dev libgnome-desktop-2 libgnome-desktop-dev

Step 3: Download Avant Window Navigator from Subversion:

* svn checkout http://avant-window-navigator.googlecode.com/svn/trunk/ avant-window-navigator

Step 4:

* ./autogen.sh

Step 5: Install using checkinstall

* sudo checkinstall

Step 6:

* cd data

* gconftool-2 &#8211;install-schema-file=avant-window-navigator.schemas.in

Step 7: Run Avant Window Navigator

* Alt-F2
      
* avant-window-navigator

Step 8: Have Avant Window Navigator automatically start up on reboot

* Click System, Control Center
      
* Click Sessions
      
* Click Startup Sessions Tab
      
* Click &#8220;New&#8221; and type &#8220;avant-window-navigator&#8221; in both name and command fields
      
* Click &#8220;OK&#8221;
      
* Click &#8220;Close&#8221;

And here is Avant Window Navigator in all it&#8217;s glory on Feisty Fawn on my main machine, running in 1920&#215;1080 on a Dell 24&#8243; monitor:

[<img src="https://i0.wp.com/farm1.static.flickr.com/160/393069776_1fe6806b7f.jpg?resize=500%2C313" width="500" height="313" alt="feisty-avant" data-recalc-dims="1" />][2]

 [1]: http://awn.wetpaint.com/page/UbuntuFeistyHowTo
 [2]: http://www.flickr.com/photos/silwenae/393069776/ "Photo Sharing"