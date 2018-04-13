---
title: 'NFLPool: a (kind of) Post Mortem'
author: Paul Cutler
type: post
date: 2017-10-02T13:09:44+00:00
url: /blog/2017/10/nflpool-a-kind-of-post-mortem/
categories:
  - Python
tags:
  - NFLPool
  - Pyramid
  - Python

---
I’m now four weeks into NFLPool being live. The week leading up to and after the launch of NFLPool for NFL week 1 was kind of a blur. I wish I had taken better notes or wrote down everything that happened, but now being a month into it, here are some random thoughts.

## Submitting Picks

Somewhere in my code, I screwed up the function to disallow making picks. The code should have refused to let a user make picks after 7pm CST on the Thursday kickoff of the first game, about twenty minutes before the game starts. Of course, that morning I headed up north for my annual guy weekend and didn’t have a computer. I got a few panicked text messages that one user couldn’t make his picks. I was able to manually take care of it when I came back the following Monday, but I have to track it down and fix it. It’s hard coded and I thought I did a midnight stop to account for the fact my server is on UTC time, but it obviously didn’t work. Listening to a Talk Python podcast just last week with the famous Kenneth Reitz, I might have to look into his Maya package (time zones for humans).

## Registration

I added a Twitter field to the user registration page and made it optional. I have an idea for the future that I might add Tweepy support that would DM a player every week after the points have been updated with their score and rank. It turns out that if you make the field unique in SQLite that leaving the field blank only allows one person to _not_ fill in the Twitter field. Who knew? I had to remove the unique requirement.

## Scoring

Kelly continued to work on the scoring calculations while I was gone that weekend. She had it working when I came back, but using the 2016 data there was a difference in what NFLPool was showing and what I had done by hand last year. Sure enough, the program was right. I had mistakenly given the person who won twenty extra points that he didn’t earn and he should have come in second place. The kicker? The person who was in second place and should have won NFLPool in 2016 was me. The good news is that since it was me and my mistake, I wasn’t out the $300 delta I should have won in the pool. But it sure would have been nice to have pocketed the extra $300…

## Misc.

There were some other gotchas at launch. I had PHP working on Nginx before installing NFLPool, but however I did it using FastCGI was getting in the way of Pyramid serving NFLPool. Disabling FastCGI fixed Pyramid. I also created a systemd service to manage NFLPool. Of course SELinux doesn’t like it and I have to run it as sudo. I still need to fix that at some point.

There’s a couple little things I want to work on as well, but I’ve taken the last few weeks to recover. The big thing I need to address is updating the stats every week. Right now, it’s a manual process. I’ve got administrative access built in, so I visit the admin panel and hit a button to update the stats. I need to figure out how I can do this via a cron job by calling a POST request, but I have no idea how I can use curl to automate this as it requires being logged in. I have some ideas on how to do this, but it’s going to require some research and planning and when I do implement it, I’ll write it up.

Lastly, with NFLPool successfully launched and running for a few weeks, I submitted it to the [Talk Python Student Showcase][1]. I just can’t speak highly enough of the [Python for Entrepreneurs][2] training that Michael Kennedy created. I would have ended up creating scripts to calculate the points &#8211; not a full featured website. If you’re looking to learn Python, look no further then all of the courses available on Talk Python.

NFLPool might be in maintenance and enhancement mode now that it’s launched, but this isn’t the end of my Python journey. I can’t and won’t claim that I know Python. I’ve only scratched the surface and I still find myself following tutorials to get stuff done. I have a number of things I still want to add to NFLPool, and I’m sure as we play additional seasons even more ideas will come to me. Plus, I need to do it all over again for MLBPool2….

 [1]: https://training.talkpython.fm/showcase
 [2]: https://training.talkpython.fm/courses/explore_entrepreneurs/python-for-entrepreneurs-build-and-launch-your-online-business