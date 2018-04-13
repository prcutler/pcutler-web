---
title: Foresight 1.4 / GNOME 2.20.1 Appearance Issues
author: Paul Cutler
type: post
date: 2007-10-18T21:36:20+00:00
url: /blog/2007/10/foresight-14-gnome-2201-appearance-issues/
categories:
  - Foresight
  - GNOME

---
If you did a recent updateall in Foresight in the last day or two, there was a bug in libgnome that has been fixed.

On some default installations or a conary updateall, users would not see icons in the GNOME menu, no desktop background, and when you tried to change your theme (System -> Preferences -> Appearance) it would crash. It looks like it was a Gconf setting error upstream in GNOME. It would have looked something like this:

[<img src="https://i1.wp.com/farm3.static.flickr.com/2182/1595390798_712fc5d9b3_m.jpg?resize=240%2C180" width="240" height="180" alt="firstboot" data-recalc-dims="1" />][1]

It was set as `/etc/gconf/schemas/desktop_gnome_interface.schemas.in` and should have been `/etc/gconf/schemas/desktop_gnome_interface.schemas`

A big shout out to Ken VanDine who tracked this down and fixed it, and is filing the bug and patch upstream as well.

The groups will be updated in Foresight tonight, but until then, do a `sudo conary update libgnome` and it should be fixed. For some odd reason restarting X didn&#8217;t fix it, but it was fixed on reboot.

This means 1.4.1 with PackageKit will be released in the next day or two.

 [1]: http://www.flickr.com/photos/silwenae/1595390798/ "Photo Sharing"