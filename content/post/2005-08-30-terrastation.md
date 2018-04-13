---
title: TerraStation
author: Paul Cutler
type: post
date: 2005-08-30T13:34:32+00:00
url: /blog/2005/08/terrastation/
categories:
  - Hardware
  - Technology

---
I recently received a [Buffalo 600gig Terrastation][1] to test from work.

I&#8217;ve been looking for a NAS / SAN storage solution for a while, but most USB NAS solutions I&#8217;ve looked at don&#8217;t support Linux. The Terrastation is a work of art. Full support for every OS, including Windows, Mac & Linux, easy setup, multiple RAID options, and a very easy setup.

It has default Samba settings, and in Windows shows up as a network share, unlike SAN&#8217;s which will show up as a drive letter. (Mirra only supports backing up from a drive letter, but oh well, wasn&#8217;t happy with Mirra as it was a Windows only solution).

It&#8217;s pretty slick &#8211; a very basic setup from Windows, but like routers on the market today, a full-fledged web page for setting it up on the box itself. It&#8217;s basically a Linux box, running off a PPC processor. Full support for users and groups, Raid 0, 1 and 5 (5 default out of the box!), FTP access, drive spanning and user secured shares.

I&#8217;ve had it about two weeks, and lo and behold, I see on [Planet Gnome][2] this morning, a Gnome developer [blogged his experiences with it][3], including hacking at it. He has the upgrade from mine, the 1 Terrabyte (I have the 600 gig), and points to a nice [hacker&#8217;s Wiki at terastation.org][4] all about adding customized firmware to the Terrastation, including SSH and NFS support. I&#8217;m looking forward to getting SSH up so I can use SCP as well.

Overall, the machine is pretty cool. Pretty quiet, but 4 drives and their vibrations make some noise, and the lights on the front, including 4 seperate places for each drive to show status is very cool.

 [1]: http://www.buffalotech.com/products/product-detail.php?productid=99&categoryid=19
 [2]: http://www.planetgnome.org
 [3]: http://www.chipx86.com/blog/archives/000117.html
 [4]: http://www.terastation.org/wiki/Main_Page