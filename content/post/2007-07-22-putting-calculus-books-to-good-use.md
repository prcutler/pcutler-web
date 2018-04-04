---
title: Putting Calculus Books to Good Use
author: Paul Cutler
type: post
date: 2007-07-22T15:34:25+00:00
url: /2007/07/putting-calculus-books-to-good-use/
categories:
  - Foresight
  - Hardware
  - Linux
  - Technology

---
A good friend is letting me permanently borrow his 22&#8243; monitor that he doesn&#8217;t use anymore. The timing was perfect, as I was just talking to a buddy about a week ago about his impending monitor purchase, and I mentioned I wanted to try a dual monitor setup, and now I am:

[<img src="https://i2.wp.com/farm2.static.flickr.com/1185/865364663_a2858c1101_m.jpg?resize=240%2C160" width="240" height="160" alt="img_0053" data-recalc-dims="1" />][1]

(Click through to Flickr for larger versions, and note the Calculus books making a monitor stand on the 22&#8243; monitor on the right).

A Dell 2405 is on the left with a default resolution of 1920&#215;1200, a Samsung 213T is on the right running 1600&#215;1200, both powered by a single BFG Nvidia 7950GT with the Nvidia propietary drivers on Foresight Linux. This gives me a default resolution of 3560&#215;1200. Here&#8217;s a screenshot, click through to see a larger version on Flickr:

[<img src="https://i2.wp.com/farm2.static.flickr.com/1265/865140971_33c77d601f.jpg?resize=500%2C170" width="500" height="170" alt="3560" data-recalc-dims="1" />][2]

It was easier than I expected &#8211; looking at a couple seach results in Google showed me how to add to my xorg.conf to set this up.

I added a second monitor section in my xorg.conf with the Samsung information. I then added the following lines in the Section &#8220;Screen&#8221;:

        `Option 		"TwinView" "Yes"<br />
        Option 		"SecondMonitorVertRefresh" "39-85"<br />
   	Option 		"SecondMonitorHorizSync" "29-81"<br />
        Option 		"MetaModes" "1920x1200,1600x1200"`

I restarted X, and voila.

You can download or view my [xorg.conf here][3].

 [1]: http://www.flickr.com/photos/silwenae/865364663/ "Photo Sharing"
 [2]: http://www.flickr.com/photos/silwenae/865140971/ "Photo Sharing"
 [3]: http://www.paulcutler.org/misc/xorg.conf.twinview.txt