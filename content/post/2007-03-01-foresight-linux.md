---
title: Foresight Linux
author: Paul Cutler
type: post
date: 2007-03-02T03:20:13+00:00
url: /blog/2007/03/foresight-linux/
categories:
  - Linux
  - Technology
  - Ubuntu

---
As I mentioned in my last post, I installed [Foresight Linux][1] on my second box last week. (Don&#8217;t worry Ubuntu fans, I&#8217;m still running Feisty on my main machine). To set expectations, this post is part mini-review of Foresight, part comparison to Ubuntu, and just my opinions and thoughts on Foresight after using another distribution for almost 3 years.

[Foresight&#8217;s website][1] and IRC channel sum up Foresight well:

> _Foresight Linux is a Distribution which showcases some of the latest and greatest from GNOME. Ah! Some of the things that may not be mature enough for some of the other distros. Some of the more innovative things are included, like beagle , f-spot , avahi (zeroconf), and the latest hal . All of this plus some nice, clean default themes and artwork._

.

And their IRC channel: &#8220;Your distro should be cool&#8221;. And that&#8217;s a great way to sum up the applications included on their CDs.

**Installation**

It was weird seeing an option to download more than 1 CD &#8211; Foresight comes on 2 CDs or one DVD image. I used bittorrent to spare rPath some bandwidth, and it was fast &#8211; 600k down, which makes me wonder how many folks are out there using this and sharing the ISO.

I burned the DVD on my Ubuntu box, popped it in to my second box, and was greeted with a blast from the past: the Anaconda installer. Prior to becoming an Ubuntu user, I mostly used Red Hat and later Fedora for almost 5 years. Going through Foresight&#8217;s installation GUI, while branded Foresight, is a re-branded Fedora install, and there&#8217;s nothing wrong with that, it worked great. My box is pretty standard hardware &#8211; P4 3.0ghz, Intel stock 865 board, Nvidia (BFG) 6800, 2 DVD drives, 2 IDE Hard drives, and 2 gigs of RAM.

Installation was quick, a reboot, a little more configuration, and I was presented with the Foresight desktop.

**Visuals**

It&#8217;s a nice clean look &#8211; it looks to be a custom theme, with Tango-ified icons everywhere. I&#8217;ve been using Ubuntu so long, I&#8217;m not sure, but I&#8217;m guessing this is very close to a default GNOME install. The GNOME footsteps are in the upper left corner with the Applications menu &#8211; it&#8217;s been a while since I&#8217;ve seen those.

There were a couple new icons I haven&#8217;t seen before in my notification area in my panel &#8211; one is Glipper, a clipboard manager for GNOME, which I&#8217;m excited to see. GNOME&#8217;s lack of unified copy / paste is a constant minor annoyance, so that program is slick. The other icon was Desktop Drapes, a tool for managing your wallpapers. It&#8217;s a slick application, but I&#8217;m not sure the necessity of having it on my panel. The last was a window selector button on the far right of the panel that has uses the icon of the application in the foreground. Clicking on the window selector brings up a menu of all active applications to make it quicker to switch between them.

**Customizing Foresight**

Once installed, I need to feed my addiction to eye-candy. It was time to get my Nvidia drivers installed. Foresight uses a new package manager called Conary, which is developed by rPath to create their appliances. Conary is unlike any other package manager in that it keeps every version of a file every made, so you can just rollback if you encounter a problem. It also does incremental updates, and from I understand, when you&#8217;re updating a package, Conary is just pulling down the changed bits of the file &#8211; you don&#8217;t need a whole binary.

But back to the Nvidia drivers &#8211; I followed the wiki and added the binary drivers to my group:
  
`<br />
sudo conary update group-dist=['!ati, nvidia']` 

And then I sat there at a terminal. It was probably about 5 minutes, but felt like about 15. I pinged some developers as I was lurking in the #foresight channel on Freenode, and sure enough, soon as I asked after a few minutes, it started. The delay was caused because my system needed to be updated as it was a fresh install. So all kinds of packages had updates available since the ISO I burned was built.

As part of the updates, the Nvidia drivers were installed, so I restarted X, got the Nvidia splash screen, was able to change my resolution from 800&#215;600 to 1280&#215;1024, and lo and behold, I had a new icon on my panel. It looked like some paint splattered &#8211; it was new to me. Compiz! Installed and able to run as soon as the binary drivers were installed &#8211; very slick. I enabled a GL desktop, and voila &#8211; there it was. I had a couple edits to make to my X.org file [per the Foresight Wiki][2] for Nvidia cards, applied those changes and had a fully enabled GL desktop running without really lifting a finger. I&#8217;ve been using Beryl pretty exclusively with my Edgy and Feisty desktops, but after using Compiz for the last few days here, I don&#8217;t see why I would go back to Beryl. This is what Ubuntu users have to look forward to with this week&#8217;s announcement of Compiz being installed by default in Feisty &#8211; same as this, just enable it and away you go.

**Applications**

I&#8217;ve installed a few other programs, including Bluefish and Mugshot. Foresight&#8217;s default choice for applications are perfect for me:

  * Banshee is the only music manager (no Rhythmbox, and even better it&#8217;s not the default like Ubuntu)
  * Xchat
  * Brasero for burning (haven&#8217;t used that yet, but looking forward to it as I&#8217;ve primarily used Gnomebaker up until now),
  * gDesklets
  * Epiphany and Firefox (I think Firefox is default, at least that&#8217;s what comes up when you start the Foresight System Manager which is a web-based app)
  * Last-exit for listening to Last.fm streams
  * F-spot, my favorite photo manager

These are applications I use every day, and every time I complete an Ubuntu installation, my first task is to add these. And they&#8217;re out of the box on Foresight.

I did try to install avant-window-navigator, and it&#8217;s in my menu, but it Segfaults when i run it. I&#8217;m not sure if it&#8217;s because I&#8217;m using Compiz instead of Beryl, a dependency issue, or something else I&#8217;ve done. AWN is also in an extremely early alpha stage, so it&#8217;s probably a bad example to even bring up. But my real point is wow! It&#8217;s a package that&#8217;s actually available for automagical installation, that&#8217;s cutting edge. It&#8217;s an advantage a smaller distro with active package maintainers can bring. [Click here][3] to browse Foresight&#8217;s available packages.

**System Management**

Foresight comes with the Foresight System Manager installed in your System menu on your panel as well in Applications under Foresight. It&#8217;s a web based app installed locally on your machine, that gives you some basic status information about y our machine. Accessing the Logs resulted in an &#8220;unrecoverable error&#8221; in my web browser, but everything else seemed to work. For users scared of the command line, probably the most useful tool is the ability to search for other packages and software, and install them right from your browser.

From the command line, adding and removing applications is a breeze &#8211; consistent with my experiences with Apt.

**Other**

Codecs appear to just work. I could play and rip MP3s, a couple different video files I tried just played. That&#8217;s a huge win for users. I understand some folk&#8217;s in the open source community&#8217;s feelings on the matter, but it&#8217;s a necessary evil. Just &#8220;making it work&#8221; is big.

**Summary**

Foresight has been around for about 2 years, and had their 1.0 release this past January. It appears to be a very active community, especially in their IRC channel, where folks are helpful, friendly and the conversation is always going. Their wiki is up to date with helpful howtos, and for what appears to be a small team of developers, the number of packages being maintained and able to install in Foresight is surpisingly large. The development team is working on a new release to sync up with the upcoming GNOME 2.18 release in March, and is also working on a LiveCD.

I&#8217;m really impressed &#8211; as a long time Ubuntu user, this is the first distro that really makes me consider switching. I want to get much more active in the Linux communities, and Foresight is one I could see myself helping out, as it has a great bunch of people working on it who were friendly to folks asking questions, and shared information about their distro even with newbies who knew nothing about Linux as I witnessed just a few hours ago tonight.

One of the advantages of using Linux is choice, and Foresight would make a great choice for a lot of users.

I&#8217;d like to thank a few folks hanging out in the IRC channel who shared information about Foresight I used in this article, including kenvandine, smithj, pscott and bertux.

Update: Here&#8217;s a screenshot of my current Foresight desktop, fairly vanilla from the installation, running Nvidia binary drivers and Compiz:

[<img src="https://i0.wp.com/farm1.static.flickr.com/183/407438623_8e5912f68c.jpg?resize=500%2C400" width="500" height="400" alt="foresight-screenshot" data-recalc-dims="1" />][4]

 [1]: http://www.foresightlinux.org/
 [2]: http://wiki.foresightlinux.org/confluence/display/docs/How+to+install+ATI+or+nVidia+Binary+Drivers
 [3]: http://www.rpath.org/rbuilder/repos/foresight/browse
 [4]: http://www.flickr.com/photos/silwenae/407438623/ "Photo Sharing"