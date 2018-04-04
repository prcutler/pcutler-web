---
title: Google Gadgets on Foresight
author: Paul Cutler
type: post
date: 2008-06-05T03:19:04+00:00
url: /2008/06/google-gadgets-on-foresight/
categories:
  - Foresight
tags:
  - Foresight
  - Google Gadgets

---
With [Google&#8217;s announcement][1] this morning of [Google Gadgets][2] being available for Linux, [Ken][3] wasted no time in adding it to the QA branch tonight.

To install: `sudo conary update google-gadgets` (assuming you&#8217;re running the QA version of Foresight). If you&#8217;re running the standard version: `sudo conary udpate google-gadgets=@fl:2-qa`

Google Gadgets is meant to be run during an active session, so you won&#8217;t see a menu entry for them. Use GNOME-DO or Alt-F2 to run them, and type ggl-gtk, or add it to your sessions to automatically start on login in System -> Preferences -> Sessions (also by adding ggl-gtk).

Google Gadgets are the gadgets, such as stock quotes, clocks, calculators and more that are available on your iGoogle webpage, or desktop gadgets that Windows users can use, similar to widgets on a Mac OS X desktop, or similar in Vista.

They&#8217;re fun, but I don&#8217;t know if I&#8217;d keep them. When running, you&#8217;ll see the Google Gadgets icon in your panel (it&#8217;s the icon on the far left side):

[<img src="https://i2.wp.com/farm4.static.flickr.com/3150/2552080461_dff8cca5c6_o.png?resize=330%2C24" width="330" height="24" alt="goog-gadgets-panel" data-recalc-dims="1" />][4]

Just browsing through fairly quickly, I added some to my desktop to take a screenshot (click through to Flickr for bigger sizes):

[<img src="https://i2.wp.com/farm4.static.flickr.com/3257/2552080467_54e9ff090f.jpg?resize=500%2C387" width="500" height="387" alt="google-gadgets" data-recalc-dims="1" />][5]

Running, left to right by row:

Row 1: Weather, Election News, Amazon Search, Youtube Search
  
Row 2: (Don&#8217;t remember)
  
Row 3: NASA Image of the Day, ESPN News, XBox Live Gamertag, Clock
  
Row 4: CPU Usage, Stock Ticker, Google Calendar

There are literally hundreds of different gadgets to choose from, including dozens of clocks, many different kinds of news tickers, and even games you can add right to your desktop, such as Pacman, Tetris or Bejeweled.

Thanks to Ken for quickly packaging. Eye candy is always fun.

 [1]: http://google-opensource.blogspot.com/2008/06/google-gadgets-for-linux.html
 [2]: http://code.google.com/p/google-gadgets-for-linux/
 [3]: http://ken.vandine.org
 [4]: http://www.flickr.com/photos/silwenae/2552080461/ "goog-gadgets-panel by silwenae, on Flickr"
 [5]: http://www.flickr.com/photos/silwenae/2552080467/ "google-gadgets by silwenae, on Flickr"