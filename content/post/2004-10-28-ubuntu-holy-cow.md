---
title: Ubuntu – Holy Cow
author: Paul Cutler
type: post
date: 2004-10-29T01:39:16+00:00
url: /blog/2004/10/ubuntu-holy-cow/
categories:
  - Linux
  - Technology

---
So I knew [Ubuntu][1] was good, just see my last two posts. But I had no idea it was **this good.**

I took the liberty of installing it on my HP ze4600 laptop tonight. Popped in the CD, booted it up, clicked enter, and it hung. Repeat, hangs again. Guessing it&#8217;s an APCI problem, add a noirq to the boot command line, no go. Google around, see the F1 key is options before boot, and there it says add &#8220;noapic nolapic&#8221; to the boot command. Voila.

Normal install, quick and dirty. Boot up for the first time after installation is complete.

What&#8217;s this? My Synaptic touchpad is working? Double-clicking the pad is just like double tapping the mouse button. Awesome! I never did get this to work on FC2.

Looking up at the panel I see the wireless networking strength meter. Interesting, mouse over shows it sees device ath0, my D-Link AG660 PC Card that&#8217;s in there! (I don&#8217;t use the Broadcom builtin 54G, bad Broadcom for not supporting linux!) Fire up the networking settings, add the ath0 and WEP key, disable the ethernet, and wham! bang! **Full wireless network support!**

I spent days hacking at madwifi getting that to run on FC2. The first FC2 install I had it worked fairly easily, but after a reinstall I couldn&#8217;t get madwifi / atheros support to work to save my life. And here&#8217;s a distribution that installs this stuff **by default**.

I am going to make it a priority to get my music re-tagged, organized, backed up, and migrate my server over to Ubuntu in the next month or two. I&#8217;m in love, swept off my feet, by a polished, linux distribution run by Canonical, powered by Debian. I&#8217;m in awe of the work they&#8217;ve done, and am going to support them as much as I can.

 [1]: http://www.ubuntulinux.org