---
title: Tasky on Foresight 2
author: Paul Cutler
type: post
date: 2008-02-28T15:24:05+00:00
url: /blog/2008/02/tasky-on-foresight-2/
categories:
  - Foresight
tags:
  - Foresight
  - GTD
  - tasky
  - tomboy

---
[Tasky][1] is a new task management application for the GNOME desktop. Written by [Boyd Timothy][2] and [Calvin Gaisford][3], Tasky features syncing with [Remember the Milk][4], but doesn&#8217;t feature the ability to use RTM tags yet. Tasky is a great way to help implement and use [Getting Things Done][5].

I went on the adventure last night of packaging Tasky for Foresight 2 in my personal repository on rBuilder, the first package I&#8217;ve added to my own repo. After some initial hiccups with my build setup, the light bulb finally went off and I think I&#8217;ve finally figured out Conary contexts after all this time. I can&#8217;t thank Ken enough for all his help last night, from figuring out my setup to troubleshooting the rMake logs on what dependencies Tasky was missing.

Building packages using [Conary][6] is, on one hand, at times frustrating, but on the other hand, exhilarating when it finally works. And though I may say frustrating, I packaged up 4-5 Ubuntu .debs before I switched to Foresight a year ago, and Conary is still ten times easier (at least).

I started with my [recipe][7], this is the final version:

`<br />
#<br />
# Copyright (c) 2007 Paul Cutler <pcutler>
# This file is distributed under the terms of the MIT License.<br />
# A copy is available at http://www.rpath.com/permanent/mit-license.html<br />
#</p>
<p>class Tasky(AutoPackageRecipe):<br />
    name = 'tasky'<br />
    version = '0.1.3'<br />
    buildRequires = ['GConf:runtime', 'banshee:lib', 'desktop-file-utils:runtime',<br />
    'f-spot:lib', 'gettext:runtime', 'gnome-sharp:devellib', 'gtk-sharp:cil', 'gtk-sharp:devellib',<br />
    'gtk:runtime', 'mono:cil', 'mono:devel', 'mono:runtime', 'ndesk-dbus:cil', 'notify-sharp:devellib', 'ndesk-dbus:devellib',<br />
    'ndesk-dbus-glib:devellib',<br />
    'perl:runtime', 'pkgconfig:devel', 'intltool:runtime', 'ndesk-dbus-glib:cil', 'notify-sharp:cil']</p>
<p>    def unpack(r):<br />
        r.addArchive('http://tasky.googlecode.com/files/tasky-0.1.3.tar.gz')
</pcutler>`

When I first cooked it, I didn&#8217;t have any of the buildRequires listed. [cvc cook][8] kicked back the recommendations it had to add to buildRequires, and I added them. I was then given a changeset file I was able to install using Conary. And Tasky worked! The first time you run it, and choose RTM, it will open RTM in your browser, and ask you to authorize the application. After that, I had a Tasky icon on my panel, and opening Tasky I was presented with all my tasks that I&#8217;ve entered into RTM (which I need to update). Choosing the Foresight tag, I saw:

[<img src="https://i0.wp.com/farm4.static.flickr.com/3058/2297654639_6fefa23a6e.jpg?resize=500%2C500" width="500" height="500" alt="Screenshot-Tasky" data-recalc-dims="1" />][9]

Very pleased with myself, the next step was to [rMake][10] Tasky, and commit to my repo. However, rMake would fail. Ken showed me what to look for in the rMake log, and the Conary command to find the missing package and add to my buildRequires in the above recipe. This was the frustrating part, as it became trial and error. rMake would tell me I was missing a package, I&#8217;d figure out which one, and then rMake again (And usually pinging Ken for more help). After running rMake seven times and adding the missing dependencies, the 8th time worked, and Tasky was created by rMake in it&#8217;s chroot. The pride and excitement you feel when it works is quite the rush.

I then did a rMake commit, and now anyone can install Tasky for testing, and I committed x86 and x86_64 versions. From a command line in Foresight 2, type:

`sudo conary update tasky=silwenae.rpath.org@fl:2-devel`

Leave your feedback on how it works for you!

Tasky also features a Tomboy plugin, but I&#8217;m not an advanced enough developer to even think about how I would go about patching Tomboy to make it work. More information on the Tomboy patch and plugin [at the bottom of Boyd&#8217;s blog post][2].

Now it&#8217;s time to make sure my Tasks are up to date.

 [1]: http://code.google.com/p/tasky/
 [2]: http://boyd.musipal.com/2008/02/tasky-cracks-whip.html
 [3]: http://calvinrg.blogspot.com/
 [4]: http://www.rememberthemilk.com/
 [5]: http://www.davidco.com/what_is_gtd.php
 [6]: http://wiki.rpath.com/wiki/Conary
 [7]: http://wiki.rpath.com/wiki/Conary:Recipe
 [8]: http://wiki.rpath.com/wiki/Conary:cvc_cook
 [9]: http://www.flickr.com/photos/silwenae/2297654639/ "Screenshot-Tasky by silwenae, on Flickr"
 [10]: http://wiki.rpath.com/wiki/Conary:About_rMake