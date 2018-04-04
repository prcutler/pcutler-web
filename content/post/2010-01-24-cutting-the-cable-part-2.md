---
title: Cutting the Cable, Part 2
author: Paul Cutler
type: post
date: 2010-01-24T21:53:44+00:00
url: /2010/01/cutting-the-cable-part-2/
categories:
  - Apple
  - Entertainment
  - Linux
  - Movies
  - TV
tags:
  - boxee
  - hd homerun
  - mythtv
  - TV

---
A few weeks ago [I blogged about buying the hardware][1] to set up a MythTV PC to record off air high def TV and integrate it with [Boxee][2].

The hardware arrived and I&#8217;ve been working on on the setup off and on over the last few weeks. Some random thoughts:

  * The [HD Homerun tuner][3] is pretty cool. Fedora has the HD Homerun configuration tool in their repos. Installing that through PackageKit and yum made it easy to test out that it was working and had a good signal.
  * I had to install [MyTV][4] 3 times before I could get it to work. On a vanilla [Fedora 12][5] install and then adding MythTV from the repos, only one tuner of the HD Homerun would work. Trying [Mythdora][6], my MythTV front ends on my desktop PC and my laptop wouldn&#8217;t connect. Also there was a nasty bug in Mythdora&#8217;s kernel that wouldn&#8217;t let me mount a NFS share. Using [Mythbuntu][7] everything just worked.
  * [Schedules Direct][8] is a pretty cool service. I remember hearing about the story a couple years ago when it all went down, but when Zap2It started charging users for the scheduling data, a group of MythTV users started Schedules Direct and licensed the data. $20 / year is more than reasonable to pay to get all the scheduling data.
  * I love the fact that I can browse to the IP address of the MythTV PC from any computer and see the scheduling data and record a show. It took a few minutes to find the setting to only record new episodes, but it&#8217;s there! 
    Obligatory screenshot:
  
    [<img src="https://i0.wp.com/farm3.static.flickr.com/2722/4300849661_6b61aacff8_m.jpg?resize=240%2C180" width="240" height="180" alt="mythtv-schedule" data-recalc-dims="1" />][9]</li> 
    
      * The first recordings I made were the second night of the 24 season premiere and an episode of How I Met Your Mother. A one hour recording is about 6 GB.
      * I only have a 100GB hard drive in the MythTV backend, so I mounted my NAS via NFS . I would then in Boxee use the File Browser and surf to my tv recording directory. One downside to this method is that MythTV records the file, such as last week&#8217;s 24 as 1091_2010011819000mpg. The File Browser also displays a PNG file so it&#8217;s easy to tell what show is what, but it&#8217;s not intuitive at all.
      * There are plugins for XBMC, such as [MythSExx][10] and [MythicalLibrarian][11] that will rename your TV recordings into a S01E01 format and create a symlink for you to make it easier to browse your recordings. I couldn&#8217;t get the former script to run, but I didn&#8217;t spend a lot of time troubleshooting either.</ul> 
    
    And then yesterday while idling in #boxee on Freenode IRC, user SpaceBass mentioned that MythTV support was working for him in the Boxee Beta. There are a number of threads in the Boxee forums that the [&#8220;mythtv://&#8221; protocol doesn&#8217;t work][12] &#8211; but it appears to be working now.
    
    In the Boxee settings, add a manual souce, and make it: myth://IPADDRESS where IPADDRESS is the IP address of your Myth backend and give the source a name &#8211; I used &#8220;DVR&#8221;.
    
    Now use the File Browser in Boxee and when you first choose it you&#8217;ll have a list of your sources:
    
    [<img src="https://i2.wp.com/farm3.static.flickr.com/2764/4300673861_e849b7a98a_m.jpg?resize=240%2C160" width="240" height="160" alt="IMG_4870.JPG" data-recalc-dims="1" />][13]
    
    Select DVR and you&#8217;ll be presented with &#8220;All Recordings&#8221;, &#8220;Guide&#8221;, &#8220;Live Channels&#8221;, &#8220;Movies&#8221; and &#8220;TV Shows&#8221;:
    
    [<img src="https://i2.wp.com/farm3.static.flickr.com/2697/4300674439_b53fae9a6d_m.jpg?resize=240%2C160" width="240" height="160" alt="IMG_4871.JPG" data-recalc-dims="1" />][14]
    
    Note: Guide doesn&#8217;t work for me.
    
    If you choose &#8220;All Recordings&#8221; you&#8217;ll see everything that MythTV has recorded:
    
    [<img src="https://i1.wp.com/farm5.static.flickr.com/4031/4301421426_aabd8ea4a0_m.jpg?resize=240%2C160" width="240" height="160" alt="IMG_4872.JPG" data-recalc-dims="1" />][15]
    
    (TV Shows and Movies will just show the MythTV recordings based on those filters). I haven&#8217;t looked into using MythTV&#8217;s built-in commercial skip as Boxee has a 30 second skip that just works too. I also like that Boxee remembers to resume where I left off watching if I stop playback.
    
    To watch Live TV streaming from your Myth backend to Boxee, choose Live TV from the menu I mentioned above. You&#8217;ll be presented with a list of TV channels by station ID, not number:
    
    [<img src="https://i0.wp.com/farm3.static.flickr.com/2745/4300675473_9f5bcb4d0b_m.jpg?resize=240%2C160" width="240" height="160" alt="IMG_4873.JPG" data-recalc-dims="1" />][16]
    
    And here&#8217;s a screenshot of the NHL game on NBC in HD earlier this afternoon:
    
    [<img src="https://i0.wp.com/farm5.static.flickr.com/4005/4301422304_ed5c08621d_m.jpg?resize=240%2C160" width="240" height="160" alt="IMG_4874.JPG" data-recalc-dims="1" />][17]
    
    There are two bugs I&#8217;m experiencing that I need to spend some time with:
    
      * When playing back a recording or starting a live TV stream, it will sometimes start as if it&#8217;s being fast-forwarded, including the audio. Hitting pause and then unpausing fixes it.
      * I think this may be related to signal strength as I&#8217;m seeing it on NBC and CBS, but not Fox, but I&#8217;m seeing jagged edges around an object, such as a person, when it&#8217;s moving quickly. If it&#8217;s a fairly static image, there are no jagged edges. But even someone quickly sitting down will have the distortion. But I don&#8217;t see this problem when accessing the recording from a Myth frontend on another computer, so it needs more investigating.
      * My other theory is it could have something to do with saving the content on the NAS and not on a hard drive in the Myth backend, so I bought a larger hard drive to throw in there too. I&#8217;d also rather have it on a hard drive than the NAS just to save wear and tear.
    
    I&#8217;m almost done &#8211; if I had to guess, I&#8217;m about a week away from telling DirecTV to pound sand. I&#8217;ll poke at the distortion issue some more and install that hard drive when it arrives but this has been a pretty cool project to work on so far.

 [1]: http://www.paulcutler.org/blog/?p=1269
 [2]: http://www.boxee.tv
 [3]: http://www.silicondust.com/products/hdhomerun_atsc
 [4]: http://www.mythtv.org
 [5]: http://fedoraproject.org/
 [6]: http://mythdora.com/
 [7]: http://www.mythbuntu.org/
 [8]: http://www.schedulesdirect.org/
 [9]: http://www.flickr.com/photos/silwenae/4300849661/ "mythtv-schedule by silwenae, on Flickr"
 [10]: http://xbmc.org/wiki/?title=MythSExx
 [11]: http://xbmc.org/forum/showthread.php?t=65769
 [12]: http://forum.boxee.tv/showthread.php?t=8663
 [13]: http://www.flickr.com/photos/silwenae/4300673861/ "IMG_4870.JPG by silwenae, on Flickr"
 [14]: http://www.flickr.com/photos/silwenae/4300674439/ "IMG_4871.JPG by silwenae, on Flickr"
 [15]: http://www.flickr.com/photos/silwenae/4301421426/ "IMG_4872.JPG by silwenae, on Flickr"
 [16]: http://www.flickr.com/photos/silwenae/4300675473/ "IMG_4873.JPG by silwenae, on Flickr"
 [17]: http://www.flickr.com/photos/silwenae/4301422304/ "IMG_4874.JPG by silwenae, on Flickr"