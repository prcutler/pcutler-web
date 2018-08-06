---
title: There is No Offseason (or writing my Python apps never ends and that's ok)
author: Paul Cutler
type: post
date: 2018-08-06
categories:
  - Python
  - NFLPool
tags:
  - NFLPool
  - Python

---

The blogging might slow down some, but the coding never stops.  Ok, well maybe a little.  After creating and launching [MLBPool2](https://mlbpool2.com) this past spring, I took a small break and then back at it for the upcoming season of [NFLPool](https://nflpool.xyz).

I have two big goals for NFLPool before the 2018 season starts:

1. Fix the time / timezone issue where a player tried to submit his picks before the first game of the season started to, but was denied.  Rip out all references to Python’s `datetime` module and replace it with the `Pendulum` module instead.
2. Allow NFLPool players to make changes to their picks if the season hasn’t started yet.  This build on existing functionality in MLBPool2.

And a few smaller things to add including some updated admin functionality.  I didn’t get to a few of the big things I wanted to do this offseason, which included unit tests and porting to MySQL.  But it’s good to have goals for next offseason.

I’ll be writing about some of the changes over the few weeks leading up to this season’s kickoff.