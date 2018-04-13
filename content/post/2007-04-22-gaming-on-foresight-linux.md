---
title: Gaming on (Foresight) Linux
author: Paul Cutler
type: post
date: 2007-04-23T01:01:15+00:00
url: /blog/2007/04/gaming-on-foresight-linux/
categories:
  - Entertainment
  - Foresight
  - Games
  - Linux
  - PC Games
  - Technology

---
Linux seems to always get a knock when it comes to gaming. I know personally I believed the FUD, before making the switch to Linux full time 2 years ago and learning otherwise. What Linux doesn&#8217;t have in quantity as a gaming platform, it does make up in quality.

A lot of the open source and freeware [get the publicity][1], but [id software][2] and [Epic][3], among other developers, makers of Quake and Unreal Tournament respectively, continue to put out native Linux binaries of their software.

With the upcoming [Enemy Territory: Quake Wars][4] release, I installed Quake IV, Doom 3 and the original Wolfenstein: Enemy Territory on my desktop today. Since I did a clean install of Foresight a couple months ago, I wanted to make sure I work out any kinks before ET:QW&#8217;s release.

Everything worked like a champ &#8211; I downloaded the Linux installation files from [id software&#8217;s bittorrent server][5], installed those in /home/silwenae/games (I&#8217;m lazy, didn&#8217;t feel like chmod&#8217;ing /usr/games), copied the pak files over, and ran Doom 3 and Quake IV. Mapped my keys, cranked the video settings, and I was online in minutes fragging away.

The only small glitch I ran into with Quake IV, and this hasn&#8217;t happened in my two or three previous installs, was that it started in Spanish. A quick Google search [turned up the fix][6]: Go into your home folder, and in the .quake4 directory (which is hidden, hit ctrl-h in Nautilus to view hidden files and directories), and then the q4base directory, and edit the Quake4Config.cfg file with your favorite text editor, and change the value of sys-lang to english, and you&#8217;re all set.

Everything worked great out of the box, I didn&#8217;t have the funky [Alsa / OSS sound issue][7] I had in the past with Ubuntu, even that worked flawlessly.

Who said you couldn&#8217;t game on Linux? Come get some!

 [1]: http://www.bit-tech.net/gaming/2007/04/09/Linux_has_game/1.html
 [2]: http://www.idsoftware.com/
 [3]: http://www.epicgames.com/
 [4]: http://www.enemyterritory.com/
 [5]: http://zerowing.idsoftware.com:6969/
 [6]: http://www.linuxgames.com/forums/index.php?t=msg&goto=715&rid=0&S=ad78e96a24b77c7ea080dcb2f2e47d1a
 [7]: http://zerowing.idsoftware.com/linux/doom/#head-8c36163f1dfc3a253ef72c0f821b0b0dd2fc17b1