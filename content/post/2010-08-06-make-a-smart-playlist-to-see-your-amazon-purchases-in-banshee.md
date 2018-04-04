---
title: Make a smart playlist to see your Amazon purchases in Banshee
author: Paul Cutler
type: post
date: 2010-08-06T15:39:49+00:00
url: /2010/08/make-a-smart-playlist-to-see-your-amazon-purchases-in-banshee/
categories:
  - GNOME
tags:
  - Amazon
  - banshee

---
[Jorge Castro][1] and I were talking this morning in #banshee as Jorge asked if it was possible to create a smart playlist to see your music purchases.

And it is!

Jorge&#8217;s idea was for the UbuntuOne music store from 7digital.com. I don&#8217;t use Ubuntu, but I do buy (too many) songs from Amazon.

Amazon adds a comment in the metadata of each song you buy, such as: Amazon.com Song ID: 216030141 (If you&#8217;re curious, it&#8217;s the song _Drunk Girls_ by [LCD Soundsystem][2] that I bought this morning for only $5!)

Create a smart playlist in Banshee by choosing from the menu Media -> New Smart Playlist.

Name your playlist (I used &#8220;Amazon&#8221;) and select &#8220;`Match all of the following`&#8221; and

&#8220;`Comment`&#8221; &#8220;`contains`&#8221; and enter &#8220;`Amazon.com Song ID:`&#8221; and press &#8220;`Save`&#8220;.

Voila! One smart playlist is created that shows all of your Amazon purchases. And since it&#8217;s so smart, when you buy new music it automatically updates the playlist (Yes, I bought another album this morning, don&#8217;t tell my wife). You can do the same for the UbuntuOne store using &#8220;Purchased from 7digital.com&#8221; instead of the Amazon Song ID: in the smart playlist comment.

<img src="https://i0.wp.com/people.gnome.org/~pcutler/screenshots/playlist.png?w=700" alt="Amazon Smart Playlist Screenshot in Banshee" data-recalc-dims="1" />

 [1]: http://castrojo.tumblr.com/
 [2]: http://www.amazon.com/dp/B003HY3530/ref=nosim?tag=gnomestore-20&linkCode=sb1&camp=212353&creative=380549