---
title: Quake Wars on Foresight Linux
author: Paul Cutler
type: post
date: 2007-10-22T01:21:22+00:00
url: /2007/10/quake-wars-on-foresight-linux/
categories:
  - Entertainment
  - Foresight
  - Games
  - Linux
  - PC Games

---
The [Enemy Territory:Quake Wars][1] Linux client was [released Friday by id][2]. The 17mb client and installer is using [Icculus][3]&#8216; [Mojo Setup][4] for installation. This is a welcome change from the Doom3 and Quake IV installers which required you to manually copy the .pak files from the CD or DVDs over to your hard drive. With Mojo Setup, you just run the executable file you download from id, pop the DVD in and it installs the client, Punkbuster and copies the necessary files over from the DVD.

With both the demo and the client, I was running in to keyboard lockups when playing. It didn&#8217;t matter if I was playing in full screen or windowed, the game would continue, but my keyboard was totally non-responsive. I tested Compiz enabled and disabled, windowed and non-windowed, and dual monitor and single monitor. It turns out that Pidgin, X-Chat and Mugshot would cause it to lock up. Basically, if anything appeared in the notification section Quake Wars would free the keyboard. Alt-tabbing to different applications and coming back to Quake Wars didn&#8217;t help. Disabling those applications before running Quake Wars has stopped the keyboard lockups.

Playing in full screen mode is definitely more immersive, and Quake Wars supports a native 1920&#215;1200 resolution. Playing windowed in dual monitors I was playing in 1680&#215;1250. It&#8217;s a pain though to switch xorg.conf and restart GNOME just to play a game, so I haven&#8217;t made up my mind.

The Quake Wars FAQ recommends a low latency kernel configured with CONFIG\_HZ\_1000=y. Foresight&#8217;s kernel does not include that setting, and using the Nvidia drivers currently in the repo, 100.14.03, performance has been smooth as silk. I&#8217;m running a Core 2 Duo E6300, 2 gigs of RAM and a Nvidia (BFG) 7950GT.

I&#8217;m enjoying the full game much more than the early beta client I played in Windows. While the game is definitely faster than Battelfield 2, it&#8217;s not as fast as I first thought. I still have a ton to learn (like joining a squad or learning to fly the air vehicles), but it&#8217;s fun. 2 out of 3 maps played this afternoon, and I was top Soldier, top kills, and close in top EXP. The promotions and unlocks by campaign is better than I expected, as I wasn&#8217;t sure how tempoary unlocks would be, but they work well. I thought I had played on a ranked server today, but [searching for my stats][5], I can&#8217;t find them. Guess I need to play some more!

Kudos again to id for releasing a Linux client. It&#8217;s nice to have a state of the art game to play on Linux. The next month or two should be great for the state of gaming on Linux, with the rumored Gears of War release, and the definite release of Unreal Tournament 3.

 [1]: http://www.enemyterritory.com
 [2]: http://zerowing.idsoftware.com/linux/etqw/
 [3]: http://icculus.org/
 [4]: http://http://icculus.org/mojosetup/
 [5]: http://stats.enemyterritory.com/