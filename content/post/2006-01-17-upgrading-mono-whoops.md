---
title: Upgrading Mono – whoops!
author: Paul Cutler
type: post
date: 2006-01-17T20:18:39+00:00
url: /blog/2006/01/upgrading-mono-whoops/
categories:
  - Linux
  - Technology
  - Ubuntu

---
I wanted to upgrade the to the latest [Banshee][1] music player something fierce. I&#8217;ve been meaning to blog about Banshee for forever and a day, but with the latest tarball out, that includes plugin support, especially [Audioscrobbler][2], I tried to upgrade.

Well, Banshee wants the latest and greatest [Mono][3]. I checked the [Ubuntu Backports][4], but they didn&#8217;t have the latest Banshee nor Mono.

So I tried something that worked when I was running Ubuntu 5.04 and wanted the latest VLC to stream [89.3 The Current][5] &#8211; I changed my sources.list to the latest Ubuntu (Dapper Drake), upgraded the Mono and Banshee packages, and then downgraded my sources.list back to Ubuntu 5.10.

Mono seems to be working fine, and the Mono apps I have loaded (Tomboy, F-Spot) with one exception &#8211; Banshee. Banshee segfaults if you just look at it funny. I can&#8217;t listen to music, import my library, or restart it after a crash.

Ah well, back to XMMS for listening to music.

 [1]: http://www.banshee-project.org
 [2]: http://www.last.fm
 [3]: http://www.mono-project.com/Main_Page
 [4]: http://ubuntuforums.org/forumdisplay.php?f=47
 [5]: http://minnesota.publicradio.org/radio/services/the_current/