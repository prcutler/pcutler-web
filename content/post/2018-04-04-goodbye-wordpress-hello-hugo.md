---
title: Goodbye Wordpress, Hello Hugo
author: Paul Cutler
type: post
date: 2018-04-04
categories:
  - Blog
tags:
  - Hugo
  - Wordpress

---


I’ve been using [Wordpress](https://www.wordpress.org)for over 15 years.  In fact, I started blogging before Wordpress existed, and even used b2 / cafelog, from which Wordpress was forked.

But over the last couple of years as I’ve maintained three separate Wordpress sites (the first for paulcutler.org, then [Stone Open](http://www.stoneopen.com), and later MLBPool2 (which is now using Pyramid instead), I’ve had constant crashes and memory issues.  I don’t know if it’s because of the number of blog posts I have, but both my personal blog and Stone Open have tables corrupted and I have to go in and fix them whenever the site crashes.

That, combined with the constant updates for Wordpress and it’s plugins, as well as security fixes, made me say enough is enough.

I’ve been looking at [Hugo](https://gohugo.io) (written in [Go](https://golang.org/)) for the last month or so to replace Wordpress with.  I also looked briefly looked at Jekyll and [Pelican](https://blog.getpelican.com/), which are also both static site generators.  Pelican interested me, as it is written in Python, but Hugo seems to be a bit more actively maintained.

As of this morning, paulcutler.org is now running Hugo.  I updated the web server, installed a new SSL certificate (thanks [Let’s Encrypt](https://letsencrypt.org/)!) and moved it to my other DigitalOcean droplet that serves [MLBPool2.com](https://mlbpool2.com) and [NFLPool.xyz](https://nflpool.xyz).

One of the advantages of using Hugo is that all of the blog posts are written with Markdown.  I’ve been using Markdown more and more, as most of the daily apps I use on macOS use Markdown ([Day One](https://dayoneapp.com), [Bear Notes](https://bear-writer.com), and [Ulysses](https://www.ulyssesapp.com) (which I’m using to write this now with).  

I’m a little worried I’m going to lose some Google search magic for the old URLs, but we’ll see.  I also need to see if this theme I’m using has search functionality to use.  The site should be faster now as there is no database in the middle and I’m just serving static HTML pages.  I’m sure I’ll continue to tweak it over time as I learn more about Hugo.  Now to get automated deployment working!