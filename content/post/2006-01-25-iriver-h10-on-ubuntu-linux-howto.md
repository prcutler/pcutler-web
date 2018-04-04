---
title: iRiver H10 on Ubuntu Linux Howto
author: Paul Cutler
type: post
date: 2006-01-26T04:23:33+00:00
url: /2006/01/iriver-h10-on-ubuntu-linux-howto/
categories:
  - Hardware
  - Linux
  - Technology
  - Ubuntu

---
I&#8217;m pleased to announce that after looking into it off and on for the last 6 months, I&#8217;ve got my iRiver H10 5GB fully working in Linux for the first time.

The H10 comes in MTP mode &#8211; Microsoft Transfer Protocol, insead of being a UMS &#8211; USB Media Storage device. MTP is needed for Plays for Sure compatibility, so it will work with Napster-To-Go or Yahoo, for example. A UMS device, when plugged in, just shows up as a drive letter on your PC, so you can drag and drop files on to it. Sacrificing Napster-to-go (which I haven&#8217;t used in 6 months) is a small price to pay to use this on Linux &#8211; especially as no modern online music store has a Linux client yet.

The steps needed update your firmware, convert your iRiver to UMS mode, and then you need to install EasyH10 to rebuild your music database. Do this at your own risk!

How I did it, and be prepared to lose any music on your H10:

  1. I updated my firmware from 2.03 to 2.51 MTP, [version 2.51 at iRiver.com][1].
  2. Go to the [Misticriver.net H10 Wiki][2]
  3. Follow the [instructions to convert your H10 from MTP to UMS][3].
  4. Download EasyH10: [Windows or Linux tarball][4] or [Debian / Ubuntu package][5]. (I used the [i386 Debian package][6] on Ubuntu 5.10 with no problems).
  5. If installing on Ubuntu or Debian, at a terminal, type: 
    `sudo dpkg -i easyh10_1.2.1-1_i386.deb`</li> 
    
      * Plug in your H10 to your Ubuntu box. It should mount in /media/H10 (if it didn&#8217;t, for the purpose of this, I&#8217;m going to use that going forward).
      * At a command line type:
  
        > `cd /usr/share/easyh10/model` (On Ubuntu, could be /usr/local/share/easyh10/model on other distributions) and then `ls`
        > 
        > Find your model in the list, I have a H10UMS\_5GB\_FW2.04-2.51.model so we&#8217;ll use that in the next step.
    
      * From a terminal, type in the following: 
        `cp /usr/share/easyh10/model/H10UMS_5GB_FW2.04-2.51.model /media/H10/easyh10.model` (Or whichever corresponding version you have, copy it over as easyh10.model in the root directory of the H10).</li> 
        
          * Unmount your H10 (right click and click unmount), unplug the USB cable, let it reboot and install, and then plug it back in to your PC.
          * Copy some music in to your H10/Media/Music directory. Not Music the directory!
          * From a terminal type `easyh10 -Un -on /media/H10` to rebuild your database.
        That should be it! However, if you run in easyh10 and see this, like I did:
        
        `EasyH10 [CUI] 1.2.1  Copyright (c) 2005 by Nyaochi</p>
<p>H10 model template: /media/H10/easyh10.model<br />
Path to database: /media/H10/System\DATA/<br />
Path to music: /media/H10/Media\Music/<br />
Path to playlist: /media/H10/Media\Playlist/<br />
Playlist extension: .plp</p>
<p>Enumerating music files:<br />
  236 files found.</p>
<p>Reading H10 model template:<br />
  H10 (UMS) 5GB firmware 2.04 - 2.51</p>
<p>Obtaining media information from 236 files:<br />
  236 files obtained.</p>
<p>Updating database</p>
<p>Writing H10 media database:<br />
Failed to write the H10 database (code = 8). <em> (That smiley face should be an 8 )</em><br />
ERROR: Database update.`
        
        Per [this thread on the EasyH10 forums][7], delete all your files in the H10/System/DATA folder. Run it again, and you should see:
        
        `silwenae@shaftoe:/usr/share/easyh10/model$ easyh10 -Un -on /media/H10<br />
EasyH10 [CUI] 1.2.1  Copyright (c) 2005 by Nyaochi</p>
<p>H10 model template: /media/H10/easyh10.model<br />
Path to database: /media/H10/System\DATA/<br />
Path to music: /media/H10/Media\Music/</p>
<p>Enumerating music files:<br />
  236 files found.</p>
<p>Reading H10 model template:<br />
  H10 (UMS) 5GB firmware 2.04 - 2.51</p>
<p>Obtaining media information from 236 files:<br />
  236 files obtained.</p>
<p>Updating database</p>
<p>Writing H10 media database:<br />
  100%: (H10DB.hdr)<br />
` </ol> 
        
        It&#8217;s my understanding that after every time you add music files to your H10, you need to run EasyH10 to update your database to let your H10 know that the music is there. You could choose to play songs through the Browser on the H10, but it&#8217;s easiest in Music.
        
        Unfortunately, the H10 isn&#8217;t recognized in [Banshee][8], but with how the database needs to be updated each time, I doubt it will ever work. Though this is a great start for using in Linux, as this was the last thing that required me to have a Windows box.

 [1]: http://iriver.com/html/support/download/sudw_view.asp?searchProductIdx=&searchCategoryIdx=&searchString=&page=1&idx=739&tmpSearchProductIdx=&tmpSearchCategoryIdx=&tmpSearchString=
 [2]: http://www.misticriver.net/wiki/index.php/H10
 [3]: http://www.misticriver.net/wiki/index.php/H10_Firmware_Conversion:_MTP/UMS
 [4]: http://easyh10.sourceforge.net/download.html
 [5]: http://webb.ens-cachan.fr/debian/pool/main/e/easyh10/
 [6]: http://webb.ens-cachan.fr/debian/pool/main/e/easyh10/easyh10_1.2.1-1_i386.deb
 [7]: http://easyh10.sourceforge.net/forum/index.php?topic=39.0
 [8]: http://www.banshee-project.org