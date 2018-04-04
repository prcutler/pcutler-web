---
title: That feeling of dread
author: Paul Cutler
type: post
date: 2007-09-07T01:13:29+00:00
url: /2007/09/that-feeling-of-dread/
categories:
  - Hardware
  - Technology

---
I&#8217;m watching TV this past Sunday, streaming TV shows from my networked hard drive (a [Buffalo Terrastation][1]) to my [Netgear EVA][2] as my DirecTV is still out. I had noticed that when I hit play, it was taking a much longer time to start the show, but they started, and then halfway through one show it stopped, and couldn&#8217;t connect.

Walking into my office, all the lights on the Terrastation are flashing. The web interface came up, and the diagnostics report that one of the hard drives has failed.

Ack. Ugh. Many bad words I don&#8217;t want my children repeating.

A feeling of dread. Panic setting in &#8211; what isn&#8217;t backed up? What am I going to lose? What will my wife think?

I run some more diagnostics, generic drive failure messages. The Terrastation won&#8217;t give me status on the raid array because of the drive failure. Why, oh why was I running in drive spanning mode and not in a raid configuration where if a drive failed I&#8217;d still be ok?

The Terrastation has 4 160GB drives with the option of drive spanning, RAID 0, 1 or 5. Running a small version of Linux, which I always meant to hack with a custom firmware but never did for SSH access, it has FTP and Samba. I had Samba shares set up storing all my music, photos, videos and backup shares for both my wife and me. The Terrastation streams that content to my Netgear EVA at my home theater, the Sonos music players all over the house, and the hacked Xbox in the family room.

The lost data appears to be minimal &#8211; I have a full backup of my music on my desktop&#8217;s hard drive, and it looks like I have a copy of most of the photo&#8217;s, though I need to double check. Ironically, I lost most of the video&#8217;s I&#8217;ve downloaded since my DirecTV dish has been down, but that is what Bittorrent is for.

I&#8217;m not sure what was in the backup directories, I know I haven&#8217;t backed up much lately.

Now the question is &#8211; when is redundant backup not redundant enough? Do I want to take one of the extra computers I&#8217;m not using and install [FreeNAS][3] or [Openfiler][4]? My good friend Mr. Holzer recently built a FreeNAS server using compactflash to boot the OS with a bunch of hard drives. The price of external drives keeps falling as well, do I want to just be lazy and buy another one of those?

I hate that feeling of dread &#8211; I&#8217;ve lost my personal music collection and had to re-rip it at least 3 times now. I know hard drives don&#8217;t last forever, and I&#8217;d rather be safe than sorry.

 [1]: http://www.terastation.org/wiki/Main_Page
 [2]: http://www.netgear.com/Products/Entertainment/DigitalMediaPlayers/EVA8000.aspx
 [3]: http://www.freenas.org/
 [4]: http://www.openfiler.com/