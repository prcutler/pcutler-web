---
title: A month with Quod Libet
author: Paul Cutler
type: post
date: 2007-10-15T15:50:50+00:00
url: /blog/2007/10/a-month-with-quod-libet/
categories:
  - Foresight
  - GNOME
  - Linux
  - Music

---
For the last month I&#8217;ve been runnign [Quod Libet][1] instead of Banshee. I had run in to two critical problems with [Banshee][2] about a month ago:

  * Banshee was taking 80 minutes to start. (Since fixed, I think it was something with Foresight, as Banshee hasn&#8217;t had a release in a while).
  * Banshee&#8217;s Last.fm reporting plugin hasn&#8217;t reported songs correctly to Last.fm for a long time. This is a known bug in the plugin, without a known fix that I&#8217;m aware of.

Banshee&#8217;s Last.Fm integration may sound like something trivial, but I really enjoy browsing [my profile][3] to see what I&#8217;ve listened to. Unfortunately, my profile isn&#8217;t close to accurate as all the music I listen to at night via Banshee isn&#8217;t being reported. Between that, the old data that is still in my Last.fm profile from my wife listening to music via the Xbox (yes, the James Taylor in my profile isn&#8217;t from **me** listening to it), and the Last.fm radio streams, it&#8217;s not really an accurate reflection of my music tastes.

[Quod Libet][1] is a GTK+ music player, that also includes Ex Falso, a tag editor. Quod Libet is a favorite of a couple of Foresight users, so I thought I&#8217;d give that a try. A simple:
  
`<br />
sudo conary update quodlibet`

And it&#8217;s installed in Foresight!

My first impressions of Quod Libet, is that it comes across with a basic view, but once you start digging, it&#8217;s quite the powerful player. The default view includes a search box, People (artist) Album, and then the song list. Search is fast, feels a touch faster than Banshee.

Other views you can choose from include Playlists, Search, File System, Album, Internet Radio and Media Devices.

I tend to listen to full albums at a time, and not create playlists or listen to random songs, so Quod Libet has worked well for me. I&#8217;ve been impressed with it&#8217;s simplicity, and as I&#8217;ve dug deeper, even more impressed with the number of features and advanced funtionality it has. While it doesn&#8217;t have the visual appeal of Banshee, it just works, and that&#8217;s all I&#8217;ve asked it to do.

The only minor complaint I had, was that due to a DDOS attach, the Quod Libet team lost some it&#8217;s website, and the documentation on plugins is non-existent. While there is a nice list of plugins available, I had to get some help to figure out how to setup the sub-directories on where to put the plugins, and only one or two have worked out of the five or six I&#8217;ve attempted to install. Granted I haven&#8217;t spent that much time trying to configure the plugins, but it was just a small disappointment.

If you&#8217;re looking for an alternative to Rhythmbox or Banshee on a GNOME desktop, give Quod Libet a chance, the best thing I can say about it is that it &#8220;just works&#8221;. And works well.

 [1]: http://www.sacredchao.net/quodlibet
 [2]: http://www.banshee-project.org
 [3]: http://www.last.fm/user/silwenae/