---
title: Foresight 2 (Alpha 1) Released!
author: Paul Cutler
type: post
date: 2007-11-10T21:21:18+00:00
url: /2007/11/foresight-2-alpha-1-released/
categories:
  - Foresight
  - Linux

---
The Foresight team [released the first alpha of Foresight 2][1] last night.

I had installed a couple of test versions over the last week or two on my test machine, but now we believe Foresight 2 is ready for wider testing. Note I say testing &#8211; this isn&#8217;t necessarily ready to be your everyday desktop, unless you&#8217;re very, very daring.

I&#8217;m very daring.
  
**
  
The good:**

  * The installer is fast. 7 minutes or less to install on 3 different machines. 
  1. Main Desktop: Core 2 Duo (E6300), 2 gigs RAM, Nvidia 7950FGTOC
  2. Test desktop: P4 3.0, 2 gigs RAM, ATI 800XT
  3. Laptop: Toshiba A135-S4467, Centrino Duo, 1 gig RAM, Intel video, wireless and sound

  * x86 and our first x86_64 release 
  * Compiz Fusion is installed by default, but you need to run fusion-icon manually at startup, or add it to your session. This includes Emerald as well. 
  * Avant-Window-Navigator is installed in a default installation &#8211; just need to remove your bottom panel and run it from Applications -> Accessories. Very cool! 
  * Package Kit is the default GUI for installing updates and packages 
  * If you liked Foresight 1.x, you&#8217;ll like Foresight 2.0. Your favorite apps including Banshee, F-Spot, Brasero and more. Codecs like Divx and MP3 working out of the box. 

**What needs to be worked on:
  
** 

  * The Intel video card drivers don&#8217;t work with Compiz Fusion on my laptop. It loads the window manager, but depending on the program, I either can&#8217;t see it&#8217;s contents (You don&#8217;t see any text inside X-Chat) or you can&#8217;t see the text you type, such as in the GNOME Terminal. Switching to Metacity, you&#8217;ll see the text you typed you couldn&#8217;t in Compiz. 
  * Why is sound muted after a default install? 1.x was like that too. 
  * The Nvidia drivers aren&#8217;t available in the repo. Stop by #foresight and ask for them, and either doniphon or myself can email them to you. 
  * Off kernel drivers aren&#8217;t included yet, such as the IPW3945 Intel wireless driver for notebooks. (I have a 25 foot ethernet cable going to behind my TV as I type this on my laptop). 
  * GIMP is not included in the default install. Using PackageKit or a simple conary update gimp will add it, but there&#8217;s no menu icon for it yet. (Yes, I filed a bug report). 
  * No sound on my laptop (Intel HDA sound card). I had sound in 1.3 with the 2.6.19 kernel, but the 2.6.22 kernel with 1.4 and 2.0 I don&#8217;t have sound. 
  * No flash on x86_64 installed by default (haven&#8217;t tried to install it yet) 
  * Lots of packages need to be re-packaged from 1.4 to 2.0. (Now is a great time to come join the community!) 

Please, please, please file bug reports on issues you run into with Foresight 2.0. While it&#8217;s quite usable, I wouldn&#8217;t recommend it for everyday use, yet. Expect things to break and lots of updates to become available.

I copied my xorg.conf file from my old install, and have Twinview working perfectly, here is your obligatory screenshot of 3560&#215;1200:

[<img src="https://i1.wp.com/farm3.static.flickr.com/2251/1953663274_cf4e894ff9.jpg?resize=500%2C170" width="500" height="170" alt="fl2-alpha1" data-recalc-dims="1" />][2]

A big congratulations to all my fellow developers, volunteers and contributors to getting this first alpha out.

And remember: Use Foresight. Because your desktop should be cool.

 [1]: http://www.foresightlinux.org/releases/2-alpha-1/
 [2]: http://www.flickr.com/photos/silwenae/1953663274/ "Photo Sharing"