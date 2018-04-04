---
title: MLBPool2 is live!
author: Paul Cutler
type: post
date: 2018-03-23T01:18:13+00:00
url: /2018/03/mlbpool2-is-live/
categories:
  - Python
tags:
  - MLBPool
  - Pyramid
  - Pytest
  - Python

---
I deployed [MLBPool2][1] on Monday. I had a flurry of activity over the weekend to fix a scoring bug. No matter how hard I tried, I couldn’t get MLBPool2 to match the 2017 results that were done by hand. I learned that I don’t have the patience to hand enter the picks for 16 players and then all of their All-Star Break changes. I did it three times and every time I would catch a mistake that I made. And with the way the UniquePicks service works, one mistake is all it takes to throw off the entire score. I also decided to add the ability to add an administrator and let him or her update the database if a player had paid the league fee.

Once that was done, it was time to test my mediocre (at best) sysadmin skills. Adding the server blocks to nginx was easier than expected and it took me a half hour to figure out why the app wasn’t loading &#8211; when using nginx with Waitress for the wsgi server, the app name has to be an exact match. (Note to self: The app name is mlbpool, not mlbpool2).

I changed the DNS to point from one DigitalOcean droplet to another and Let’s Encrypt made it a breeze to get a new SSL certificate. (Of course https is served by default. I haven’t been a member of the EFF for 14 years for nothing).

The database hasn’t crashed yet, so I’m hopeful all my `session.close()` statements are where they should be, though Bing’s webcrawler apparently crawls by IP and not domain and I woke up to a Rollbar notification of an error thanks to Bing looking for a URL on NFLPool.

It’s been fun having Slack notifications for when a new user registers and makes their picks and seeing those roll in.

But the work doesn’t stop there. Yesterday I wrote user documentation using reStructuredText and Sphinx (yay, another markup language to learn. This is only the fourth language I’ve used to write user help.). I created an account on Read the Docs, connected my Github repo, and voila! [User documentation for MLBPool2][2] on how to create and manage an account, now to submit and change picks, league rules and scoring. This was all just a precursor to what I really want to do, which is write the developer documentation.

I also started working on tests for MLBPool2. I’m still so confused on testing, specifically what tests I need to right to improve code coverage. But I successfully wrote my first test using `pytest` today &#8211; just a small one to check the MySportsFeed API and make sure it’s up and returns a 200 status code. Baby steps.

I’ve already filed a bug and a couple of enhancements that I want to work on once the season is over. When I set out to learn Python to build these apps, I did it because I wanted a hobby, and I sure have one now.

 [1]: https://mlbpool2.com
 [2]: http://mlbpool2.readthedocs.io/en/latest/