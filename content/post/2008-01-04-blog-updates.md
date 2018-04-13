---
title: Blog updates
author: Paul Cutler
type: post
date: 2008-01-04T16:42:04+00:00
url: /blog/2008/01/blog-updates/
categories:
  - Wordpress
tags:
  - last.fm

---
I&#8217;m in the process of changing servers at my current host, and the last website I had to do was this one. Over the course of last weekend, I decided to finish it, and did a mysqldump of my [WordPress][1] database, in addition to updating to the latest version to avoid a security flaw. I about had a heart attack when I saw my database (not gzipped) was 3.3 gigabytes. Sure, I&#8217;ve been blogging for 5 years (more on that later this month), but 3.3GB? My wife explained to me how it was possible, but I was still a bit stunned.

I&#8217;ve had a database plugin, [WP-DBManager][2], installed for some time to automate my database backup. It adds a Database tab to your WordPress admin panel. In addition to backing up your database, it can optimize, repair or drop tables. The default page it pulls up is a list of all tables in your database, with columns showing records, data usage, index usage, and overhead.

Sure enough, an old plugin I haven&#8217;t used in a long time, [EZ Scrobbler][3] for managing [my Last.fm feed][4], had it&#8217;s cache table in the database taking up 2.9GB. I used WP-DBManager&#8217;s tab to empty the table, and my database is down to a more manageable 300 MB. I&#8217;m glad I now use [Last.fm&#8217;s widget][5] to show recent tracks played.

I just wish I had remembered to check that before I spent 10 hours this weekend watching 3 gigs transfer over the &#8216;net.

 [1]: http://www.wordpress.org
 [2]: http://lesterchan.net/portfolio/programming.php
 [3]: http://fleshy.org.nz/yum/ez-scrobbler/
 [4]: http://www.last.fm/user/silwenae/
 [5]: http://www.last.fm/widgets/