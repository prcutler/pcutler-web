---
title: 32 bit Firefox on 64 bit Foresight
author: Paul Cutler
type: post
date: 2008-02-10T18:14:14+00:00
url: /blog/2008/02/32-bit-firefox-on-64-bit-foresight/
categories:
  - Foresight
  - Linux
  - Technology
tags:
  - firefox
  - Foresight

---
We&#8217;re still at [SCALE][1], manning the Foresight booth and introducing [Foresight][2] to lots of new users. (I&#8217;ll need to check download statistics and see if we made an impact).

While here, Ken helped me get 32 bit Firefox running on my laptop, which is running 64 bit Foresight. (I missed having Flash).

There has been [some discussion on the mailing list lately][3], and we are leaning towards including 32 bit Firefox by default, and leaving Epiphany at 64 bit for those users who want a 64 bit browser.

To get 32 bit Firefox installed, run the following commands:

`sudo conary erase firefox`

`sudo conary update firefox['is: x86']` 

`sudo conary erase nspluginwrapper['is: x86_64']`

`sudo conary update gtk-engines:lib['is: x86']`

`sudo conary erase nspluginwrapper['is: x86']`

Reboot.

And voila, Firefox is now runnning 32 bit, and Flash should just work.

Thanks to Ken for walking me through it this morning.

 [1]: http://www.socallinuxexpo.org/
 [2]: http://www.foresightlinux.org
 [3]: http://lists.rpath.org/pipermail/foresight-devel/2008-February/000456.html