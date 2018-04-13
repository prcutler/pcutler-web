---
title: Web Scraping and Python
author: Paul Cutler
type: post
date: 2016-09-30T14:43:54+00:00
url: /blog/2016/09/web-scraping-and-python/
categories:
  - Python
tags:
  - Coursera
  - Python

---
<img class="alignnone size-full wp-image-6405" src="https://i1.wp.com/paulcutler.org/blog/wp-content/uploads/2016/09/Screenshot-2016-09-28-11.04.44.png?resize=700%2C493" width="700" height="493" data-recalc-dims="1" />

I’m flying along in the Coursera course [Python for Everybody][1], from the University of Michigan taught by [Dr. Charles Severance][2]. I’ve completed the first two of four courses which give you an introduction to Python.

I’m now on the third course, [Using Python to Access Web Data][3]. This and the fourth course focused on databases, are the two key foundations for the web app I want to build. I just finished Chapter 12, which introduces the [BeautifulSoup library][4] for scraping web pages. This is going to be huge &#8211; I’ll be able to scrape ESPN to find which MLB or NFL teams lead their divisions or leading in the wild card races.

Being on vacation this week, I’ve been able to complete a few chapters and am now a couple weeks ahead of schedule. I’m tempted to pause and see if I can take what I’ve learned with BeautifulSoup and actually write some small Python programs to actually scrape and print the results. It might be good practice to reinforce what I’ve learned.

The next two chapters are key as well. XML and then the one I’m most looking forward to: JSON. I’ve already signed up for a developer account with [MySportsFeeds][5] and am receiving JSON data for player stats, teams and conference standings. I’ve spoken in the past with one of their lead developers and they don’t currently keep statistics for wildcard or playoff standings, so I’m going to need to use BeautifulSoup in my app to get those. I’ll also need to make a decision if I’m going to use that JSON data for player stats and query against it myself or just use the [nflgame][6] or [nfldb][7] libraries that have already been built. The biggest challenge their is that both of those libraries are written in Python 2.7 and I really want to write my apps in Python 3.x.

I know I’m getting ahead of myself. Every time I learn something that will be applicable to the app I want to build and I talk to my wife about it, she tells me to slow down. My mind is always racing with how I can apply what I’m learning and how it will affect the architecture of the app. Some people say the best way to learn a programming language is to build something and learn as you go. I can’t wait to put all this Python learning to practice.

 [1]: https://www.coursera.org/specializations/python
 [2]: http://dr-chuck.com/
 [3]: //www.coursera.org/learn/python-network-data/home/welcome
 [4]: https://www.crummy.com/software/BeautifulSoup/
 [5]: https://www.mysportsfeeds.com/
 [6]: https://github.com/BurntSushi/nflgame
 [7]: https://github.com/BurntSushi/nfldb