---
title: Joys of running an experimental OS
author: Paul Cutler
type: post
date: 2005-03-12T20:01:35+00:00
url: /2005/03/joys-of-running-an-experimental-os/
categories:
  - Linux
  - Technology

---
I&#8217;ve raved plenty in the past about Ubuntu, but finally had ran into a downer.

About 2 weeks ago, I did my normal apt-get upgrades to make sure Ubuntu had the latest and greatest updates, and the nvidia drivers were updated, but the kernel source didn&#8217;t map to the nvidia drivers as they should. Upon my first reboot a few days later after a power outage, the X server puked all over and wouldn&#8217;t load, so I was dropped to a command line.

Edited the X server configuration, turned off the Nvidia drivers and just had the 2d drivers loaded, everything seemed ok, but it was kinda ugly. You get used to the prettiness of binary drivers after a while, especially screen savers.

Being the daring person I am, I decided to upgrade from Ubuntu Warty (stable) to Ubuntu Hoary, which will be released in April. Changed my apt sources list, apt-get, and voila &#8211; Hoary! Gnome 2.92, and a whole bunch of new updated applications. There were a few bugs, but nothing I couldn&#8217;t manage. The industrial theme was gone from gnome-themes-extras, mouse icons were old-school Gnome icons, not the pretty updated Ubuntu ones, and a few other things. A few days later, I apt-get update to patch to the latest, and reboot and the system pukes all over everything &#8211; can&#8217;t even get into the OS.

I swallowed hard, bit the bullet, and reformatted the drive. This time I used Hoary Array 4 to install, and was up and running. Installed Thunderbird instead of Evolution (different story there), and everything was very similar to how it was.

This morning I apt-get upgrade again, and rebooted accidentally (hit the power button instead of the CD-ROM open button, oops) and I get kernel panics.

Swearing in my head, I download the brand spanking new Hoary disc that came out one day after I downloaded the other, this one is an actual preview of the upcoming Hoary release, supposedly more stable than an actual testing release. The just released Gnome 2.10, a new background, bittorrent clients and other goodness. So far so good &#8211; it looks more polished than the last 2 test releases I had installed, the new system updater as a front-end to apt seperate from Synaptic works well.

Once again, I&#8217;m impressed. A few weeks to the actual stable release, let&#8217;s see if I can keep this one running this time.