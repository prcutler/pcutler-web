---
title: Microblogging on Foresight
author: Paul Cutler
type: post
date: 2009-04-08T20:22:34+00:00
url: /2009/04/microblogging-on-foresight/
categories:
  - Foresight
tags:
  - Foresight
  - gwibber
  - identica
  - microblogging
  - pidgin
  - twitter

---
I&#8217;m a big fan of microblogging, using both [Twitter][1] and [identi.ca][2]. Microblogging, if you don&#8217;t know, is sending a short message that is 140 characters or less &#8211; so you have to be short and sweet in your message. (Did I mention it&#8217;s been 2 years since I started using Twitter? Where does the time go!?)

My favorite microblogging client for the Linux desktop is [Gwibber][3]. Unfortunately there is a [nasty bug with WebKit and Gwibber][4] that has caused Gwibber to stop working. This is affecting most distributions, not just Foresight. Unfortunately, when we ship Foresight 2.1.1 (probably) later this week, Gwibber won&#8217;t work anymore, as I found out Monday when I updated to the QA version of Foresight.

Thanks to misa, I found out earlier this afternoon that there is a stopgap solution using [Pidgin][5] and the [microblog-purple plug-in][6] for Pidgin.

In Foresight, click on Applications -> Add / Remove Software and search for &#8220;pidgin-microblog&#8221; or in a terminal, do:

`sudo conary update pidgin-microblog`

Then in Pidgin, go to Tools &#8211; Plugins and enable the &#8220;Twitgin&#8221; plugin. Then go to Accounts -> Add, and add your Twitter or Identi.ca account like you would add a new IM account.

When Twitter or Identi.ca updates, it will open a new window, just like any other IM conversation, with your friends&#8217; updates. I just leave the window open, and notify-osd shows me the updates in my notification window. You can also post your updates from within that same window.

If you, like me, were or will go through withdrawal from microblogging when you get hit with the Gwibber / Webkit bug, try the Pidgin plugin out, works pretty well. (And if you&#8217;re daring, there is a newer version in the fl:2-devel repo you can try too).

If you want to follow my microblogging, I&#8217;m on Twitter as paul_cutler and identica as pcutler. (Giving my silwenae nick a rest for the moment).

 [1]: http://www.twitter.com
 [2]: http://identi.ca
 [3]: https://launchpad.net/gwibber
 [4]: https://bugs.edge.launchpad.net/gwibber/+bug/304033
 [5]: http://www.pidgin.im/
 [6]: http://code.google.com/p/microblog-purple/