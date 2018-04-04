---
title: "Lovin' Feedburner"
author: Paul Cutler
type: post
date: 2007-05-19T22:53:35+00:00
url: /2007/05/lovin-feedburner/
categories:
  - Foresight
  - Linux
  - Technology
  - Websites
  - Wordpress

---
About 6 months ago, I burned my blog&#8217;s RSS feed to Feedburner. I was using WP-Shortstat as a WordPress plugin, and the RSS feed subscribers didn&#8217;t look realistic (and they weren&#8217;t!) as it was over reporting on the number of subscribers. I&#8217;ve been happy with Feedburner since, and it provided a very simple view to my feed&#8217;s statistics, and there was a [plugin to view the statistics][1] right in my WordPress dashboard.

When I was syndicated on Planet Foresight, I created a Linux feed on Feedburner so those users weren&#8217;t subject to my entertainment and copyright rants, and later I burned a feed of the Foresight Linux Newsletter as well.

Since then, I continue to learn more about Feedburner and its features, in no particular order:

  * [Feedburner takes over][2] Steve Smith&#8217;s WordPress plugin for Feedburner stats, renames it Feedsmith.
  * [Rick @ Feedburner recaps why partial feeds are a bad thing][3]. I couldn&#8217;t agree more &#8211; I&#8217;m too lazy to follow links out of my feedreader just because a site wants hits. I&#8217;ll usually end up unsubscribing after a while unless the site has really, really good content, like TV Squad.
  * It might be fun to create a [Headline Animator][4] &#8211; if I could do a non-cheesy looking one, might be a good way to market the Foresight newsletter
  * I can&#8217;t believe I didn&#8217;t know about [FeedFlares][5] until today &#8211; what a great concept. Add little tags to the end of your posts, such as &#8220;add to del.icio.us&#8221;, &#8220;email author&#8221; etc. See the [whole list here][6]. I&#8217;ve already updated my feed. And the have an open [FeedFlare API][7] to create your own.

I also use Feedburner as tool combined with the [Foresight Wiki][8] based on Confluence. Confluence gives you the ability to build a feed right from the dashboard, but it&#8217;s really only useful for tracking a whole space, and not independent pages.

The first feed I built was the Foresight Linux Newsletter. Using Confluence, I created a RSS 2 feed based on any news post in the Newsletter space. Confluence gave me me a feed that looks like this:

`<br />
http://issues.foresightlinux.org/confluence/createrssfeed.action?types=blogpost&statuses=created<br />
&spaces=newsletter&labelString=&rssType=rss2&maxResults=10&timeSpan=180<br />
&publicFeed=true&title=Foresight+Linux+Newsletter+RSS+Feed`

Not necessarily human readable, or easy for a subscribe to type in to their feedreader, though possible using cut and paste.

I took that feed, and burned it in Feedburner, and got this:

<http://feeds.feedburner.com/foresightnewsletter>

Much better, and now I have statistics tracking for our subscribers (Which we need more of!)

The second feed I created in Confluence, was for the [Package Request][9] page on the Wiki. On this page, users can request software packages to be added to the Foresight repository, so they can install them via Conary, instead of building and compiling the software by hand.

Confluence doesn&#8217;t give you an option, at least that I could find, to build a feed for a specific page. First, I gave the the wiki page a specific label, &#8220;package-requests&#8221;. I then went to the Feed Builder, and chose to build a feed in the Developer space, with a label &#8220;package-requests&#8221; and to show all new edits and comments on the page. Confluence gave me the feed:

`http://issues.foresightlinux.org/confluence/createrssfeed.action?types=page&types=comment<br />
&statuses=created&statuses=modified&spaces=kitchen&labelString=package-requests<br />
&rssType=rss2&maxResults=10&timeSpan=5&publicFeed=true&title=Foresight+Linux+Package+Requests+RSS+Feed<br />
` 

I burned that in Feedburner and came up with:

<http://feeds.feedburner.com/fl-packagerequests>

So if you want to add that to your feedreader, you will see all requests and comments for new packages, as well as edits to the page when someone marks a package as added to the repository.

I&#8217;m really starting to dig the power of Feedburner.

 [1]: http://orderedlist.com/articles/feedburner-feedsmith
 [2]: http://blogs.feedburner.com/feedburner/archives/2007/05/feedburner_adopts_twoyearold_r_1.php
 [3]: http://blogs.feedburner.com/feedburner/archives/2007/04/ricks_ruminations_full_feeds.php
 [4]: http://www.feedburner.com/fb/a/publishers/headlineanimator
 [5]: http://www.feedburner.com/fb/a/publishers/feedflare
 [6]: http://www.feedburner.com/fb/a/help/flarecatalog
 [7]: http://www.feedburner.com/fb/a/developers/feedflare
 [8]: http://wiki.foresightlinux.com/confluence/dashboard.action
 [9]: http://wiki.foresightlinux.com/confluence/display/kitchen/Requests