---
title: Ubuntu 6.10 Burning Problem
author: Paul Cutler
type: post
date: 2007-02-04T13:24:21+00:00
url: /blog/2007/02/ubuntu-610-burning-problem/
categories:
  - Hardware
  - Linux
  - Technology
  - Ubuntu

---
Since I built my new computer a few months back, and installed Ubuntu 6.10 Edgy Eft, I have only been able to burn using sudo. My old machine burned fine without sudo, so I was guessing it was because I&#8217;m using a SATA DVD-RW drive.

I [found this tip on the Ubuntu forums and it fixed my burning problem][1] &#8211; Gnomebaker has no problem working as a normal user after applying this fix.

Step 1:

As root (or in a terminal type: `sudo gedit  /etc/udev/rules.d/15-local.rules` This will create a new file called 15-local.rules. Add a new rule in the file:

`# SCSI devices<br />
BUS=="scsi", KERNEL=="sg[0-9]", NAME="%k", GROUP="cdrom"`

Step 2:

Reboot.

Step 3:

In a terminal type the following (hit enter after each):

`sudo chmod 4755 /usr/bin/cdrecord<br />
sudo chmod 4755 /usr/bin/cdrecord.mmap<br />
sudo chmod 4755 /usr/bin/X11/cdrecord.mmap<br />
sudo chmod 4755 /usr/bin/cdrdao<br />
sudo chmod 4755 /usr/bin/X11/cdrdao`

That should fix it, especially if you&#8217;re running Gnomebaker. If you&#8217;re running K3B, run K3Bsetup and hit the above link for more if you&#8217;re a KDE user.

Thanks to wilko on the [Ubuntu Forums][2] for posting this fix.

 [1]: http://www.ubuntuforums.org/showthread.php?t=217472&highlight=gnomebaker+root
 [2]: http://www.ubuntuforums.org/index.php