---
title: Foresight Linux on a Toshiba A135-S4467 Laptop
author: Paul Cutler
type: post
date: 2007-03-27T01:36:30+00:00
url: /2007/03/foresight-linux-on-a-toshiba-a135-s4467-laptop/
categories:
  - Foresight
  - Linux
  - Technology

---
I mentioned in my last post, that I purchased a Toshiba A135-S4467 laptop yesterday. The following is a very long post, including the laptop&#8217;s specs, installing Foresight, and some of the challenges I have figured out or am trying to overcome in getting Foresight Linux.

If you don&#8217;t want to read a very long post, you can stop now. The short version of this story, is that after a user error in getting wireless to work, performing `sudo conary updateall` fixed my two major issues, including the wired ethernet and my sound. I wasn&#8217;t even done typing this blog post, when after performing updateall and then rebooting, all was fixed. If you would like to read about my user errors, and challenges from an out of box experience with a new computer and a default Foresight installation, read on. As I mention at the end of this post, my experience definitely gives me perspective as I help write documentation for Foresight, such as the upcoming Getting Started guide. I&#8217;m not an expert Linux user by an means, but I can poke around, and if I had problems with a default install such as below, imagine what a new user to Linux might feel like.

**Installing Foresight Linux 1.1 on a Toshiba A135-S4467 Laptop**

The laptop is a little larger than I wanted, 5.8 pounds and a 15.4&#8243; widescreen, but the price was definitely right. Speeds and feeds:

  * Intel Core 2 Duo T5200
  * 15.4&#8243; Widescreen (1280&#215;800)
  * 1 GB RAM
  * 160 GB 5400 RPM Hard Drive
  * DVD-RW/DL
  * Intel 3945ABG wireless
  * Realtek 8101E 10/100 NIC
  * 4 in 1 card reader
  * 1394 mini / 4 USB

In researching a laptop purchase, I knew I wanted a Core 2 Duo, even a lower end one, at least 1 GB Ram, a widescreen screen, and as many Intel components as I could. The hard drive is much bigger than what I&#8217;ll need in a laptop, and I love having a DVD-RW. According to some reviews I read, I basically traded a larger hard drive for a weaker battery against a comparable Dell, and that&#8217;s a trade-off I&#8217;ll take, as my primary purpose is to use it in the family room. I plan on keeping up on my writing for Foresight, including Wiki pages, things such as the Getting Starting guided, and contributing to the marketing efforts (and a surprise to be named later) as I camp out on the couch in front of the big TV. Secondary use will be portable, to the local LUG, or for trips home to Milwaukee.

I&#8217;ll preface this next section by saying, even after using only Linux for the last two years and off and on for 6 years before that, I&#8217;m still not an expert by any means. Google and how-to&#8217;s are my friend, and I barely can work my way around the command line in loading modules in to the kernel or what not.

I&#8217;ve run in to a couple of gotcha&#8217;s along the way. It turns out a couple are user error so far, and a few I haven&#8217;t figured out yet. They could be issues with Foresight, as I did test the latest Ubuntu Feisty Fawn LiveCD, which did work. This isn&#8217;t a criticism of Foresight &#8211; I love Foresight, and I love being on the cutting edge. That, and Ubuntu has an army of developers and volunteers, and we don&#8217;t&#8230;yet. I mention this as maybe they&#8217;re a few things to work on in the future, as one reason I bought this laptop is it appeared to use fairly standard hardware.

Installation took just over an hour, about 80 minutes, using the 2 Foresight CDs. As I mentioned in yesterday&#8217;s post, I just blew away Vista without ever booting in to it, formatted the hard drive and away we went. Installation appeared to be as normal as it was on the 3 other desktops I&#8217;ve installed Foresight on, if just a touch longer.

On my first boot, it hangs for 3 minutes on the sound card, with the error appearing on the screen:

`EIP: [<f89f7e63>]  get_input_type+0x59/0x80 [snd_hda_codec] SS:ESP 0068:f7563e7c<br />
udevd-event[952]: run_program: ;/sbin/modprobe' abnormal exit<br />
</f89f7e63>`

It then continues to load modules, and tells me the Intel 3945ABG module not found &#8211; this is the built-in wireless. I knew from past Foresight installs that the firmware is included in the default install, I&#8217;ve even seen it checking to see if the module should be loaded on my desktop. It&#8217;s one reason I bought this laptop as I knew it should be compatible. We&#8217;ll come back to this in a bit.

It then hangs on trying to load eth0 for about 2-3 minutes. (Which always seems longer than it really is). It gets past that with an &#8220;OK&#8221;, tries to load video, and just hangs for about 10 minutes at which I reboot.

Similar process, pause on the sound, Intel PRO/Wireless 3945ABG not found, pause at eth0, and then X loads, and I&#8217;m prompted to finish the installation by creating a user.

Success! I&#8217;m in. I&#8217;m quite happy to see that the Battery Applet is installed by default, as Foresight and GNOME recognize I&#8217;m running on a laptop.

Network manager doesn&#8217;t see an eth0, and wireless doesn&#8217;t work. That&#8217;s ok, I&#8217;m all about the eye candy, so I go to work on getting my xorg.conf setup. After using Google, I edit my xorg.conf and replace &#8220;vesa&#8221; with &#8220;i810&#8221;, and also add the 1280&#215;800 resolutions. I ctrl-alt-backspace to restart X, and I&#8217;m still in 800&#215;600, but my xorg.conf looks right. I reboot, same thing. Asking for help in IRC, Thilo points me at System &#8211;> Display. I&#8217;ve never seen that before, but I choose the Intel i810 driver there, restart X, run it again, choose my resolution, and I&#8217;m now using the Intel driver. Compiz works as normal &#8211; just enable the applet, set a couple preferences for wobby windows and such, and I have my eye candy! Performance is better than expected &#8211; I can grab a window and throw it around the screen with animations, and you really have to know what you&#8217;re looking for to see it hiccup at all.

I have my visuals, so it&#8217;s time to go for sound. I click on the Volume applet, and two dialog boxes immediately pop up:

Dialog box 1:
  
`The volume control did not find any elements and / or devices to control.  This means eitehr that you don't have the right GStreamer plugins installed, or that you don't have a sound card configured.`

Dialog box 2:
  
`No volume control GStreamer plugins and / or devices found`

At this point it was getting late, so I threw in the latest Ubuntu Feisty Beta LiveCD, and my wired NIC and sound worked. It was nice to confirm the laptop wasn&#8217;t defective, but showed I still had a way to go in getting the laptop working with Foresight.

I got home from work today, and went back at it. The default kernel in a Foresight Linux 1.1 installation is 2.6.19.2-0.2 &#8211; according to one forum posting I found, this should control my NIC just fine, as it was added in 2.6.19.1. I&#8217;m stumped on that one, but you can see my [dmesg output][1]. It recognizes the right card, but it&#8217;s not active in NetworkManager or System &#8211; Admin- Network. Doing a &#8220;lspci | grep Ethernet&#8221; also shows RTL8101E PCI Express Fast Ethernet Controller (rev 01).

In browsing through dmesg, lo and behold, it tells me my wireless radio is off. Aha! So I hit function &#8211; F8 to turn it on, but Network Manager doesn&#8217;t see it. I reboot twice, and still nothing. I flip through the user manual, which is absolutely worthless, as it doesn&#8217;t cover any of the function keys on the laptop, nor does it bother to tell me there is a toggle switch under the keyboard out of sight, that by default is turned off, which just happens to be the wireless radio. Flip that on, a pretty green light turns on, reboot, and voila, wireless. Choose my network in Network Manager, enter the WEP key and now we are in business. I then proceed to grumble under my breath about Toshiba&#8217;s default configuration out of the box.

With the exception of the sound and wired NIC issue, I&#8217;m pretty happy so far. I have 3D effects working, after some user error, the wireless is working (and I&#8217;ve done my conary updateall), and the laptop feels quite snappy. I haven&#8217;t ventured into suspend and resume yet, as we all know how challenging that can sometimes be in Linux. The other item on my to-do list is to get scrolling working on my Synaptics touchpad.

As I mentioned above, my first updateall made this the sound and wired ethernet work perfectly. A big shout out to the Foresight developers for how fast they update the distro in being able to fix those kind of issues. This is just my story and experience, and yours will vary. This experience, and the things I learned, definitely give me perspective as I start to write a Getting Started with Foresight guide &#8211; if I learned new things, such as setting up the Display, imagine what a person totally new to Linux might feel like.

 [1]: http://www.paulcutler.org/misc/gnome/dmesg.txt