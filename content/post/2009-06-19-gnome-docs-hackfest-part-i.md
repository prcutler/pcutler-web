---
title: GNOME Docs Hackfest (Part I)
author: Paul Cutler
type: post
date: 2009-06-19T14:07:28+00:00
url: /blog/2009/06/gnome-docs-hackfest-part-i/
categories:
  - Documentation
  - GNOME
  - Linux
tags:
  - Mallard
  - woscon09

---
[<img src="https://i1.wp.com/farm3.static.flickr.com/2439/3633166450_7f71bbd875_m.jpg?resize=240%2C180" width="240" height="180" alt="dsc02277.jpg" data-recalc-dims="1" />][1]

_(A duck at Inglis Falls, in Owen Sound, Ontario, home of woscon09. If only it had been a mallard&#8230;)_

Milo Casagrande, who attended [woscon09][2] with the GNOME Docs team last week, has [written an introduction][3] to [Mallard][4].

Milo and Phil spent Sunday&#8217;s hackfest creating the first Mallard document for use as a help file within an application. We chose Empathy, for a few different reasons, including: it will be in GNOME in 2.28; the current documentation is not completed; we want to re-license it from GFDL to CC BY-SA 3.0 and Milo and one other collaborator were the only ones who had worked on it previously (though we fulfill our obligations in re-licensing by the exercise below).

Using the information we learned Friday and Saturday, we spent time planning the document and brainstorming what users want a messaging application to do, and what questions they might have: &#8220;How do I&#8230;.?&#8221;.

From there, and with great gusto, Phil and Milo spent the sprint creating a proof of concept help file for Empathy. Not only is it written in Mallard, which can dynamically link the pages, we are focusing on creating topic based help, rather than tasks that take a user step by step in performing an action. Phil and Milo will probably have words with me, but you can follow along on the [empathy-mallard branch in Gitorious][5].

You will need Yelp 2.27.1 and gnome-doc-utils 0.17.1 to see a Mallard doc in Yelp. And now I have to go figure out why Yelp isn&#8217;t cooperating with me.

 [1]: http://www.flickr.com/photos/silwenae/3633166450/ "dsc02277.jpg by silwenae, on Flickr"
 [2]: http://www.writingopensource.com
 [3]: http://milocasagrande.wordpress.com/2009/06/19/taming-the-duck/
 [4]: http://www.gnome.org/~shaunm/mallard/spec.html
 [5]: http://gitorious.org/empathy-mallard