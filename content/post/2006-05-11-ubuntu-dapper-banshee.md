---
title: Ubuntu Dapper + Banshee
author: Paul Cutler
type: post
date: 2006-05-11T15:17:52+00:00
url: /2006/05/ubuntu-dapper-banshee/
categories:
  - Linux
  - Technology
  - Ubuntu

---
Are you a fan of Banshee and using Ubuntu Dapper but frustrated because you can&#8217;t use all of the latest and greatest plugins that are available in CVS?

Well, Josiah has [put up a webpage][1] that includes a .deb file for Dapper, and the plugins to download, with instructions so you can use the latest and greatest version of Banshee. Included on the page are:

* The MiniMode Plugin
      
* The Podcast Plugin
      
* The Radio Plugin
      
* The Recommendation Plugin
      
* Banshee-daap plugin
      
* Banshee CVS
      
* Everything above

Hit the link to get &#8217;em. I decided to be daring, and installed the plugins in my .gnome2/banshee/plugins directory, but only the Recommendation plugin worked. Trying to use the Podcast or MiniMode Plugin would crash the default Dapper Banshee &#8211; so make sure you download the Banshee CVS deb!

Thanks Josiah! One of these days I should spend some time and take this the next step &#8211; compile CVS weekly and set up an apt repository for Dapper users.

 [1]: http://missions.ritchietribe.net/node/98