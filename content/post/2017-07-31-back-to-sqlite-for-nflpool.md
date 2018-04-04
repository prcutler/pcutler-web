---
title: Back to SQLite for NFLPool
author: Paul Cutler
type: post
date: 2017-07-31T12:47:48+00:00
url: /2017/07/back-to-sqlite-for-nflpool/
categories:
  - Python
tags:
  - mongoDB
  - Python
  - SQL

---
I’ve had to throw in the towel on MongoDB and move back to SQLite for the datastore. For now.

I was successful in being able to call an API, take the JSON object from the API, and store that JSON in MongoDB as a collection. But I what really wanted was to store that JSON object as an EmbeddedDocument within a collection.

My original goal was to stick JSON objects into MongoDB and then query against that. I envisioned two collections, one for _Users_ (registration) and the second for the NFL data, called _Stats_. Stats would have looked like:

Stats

<p style="padding-left: 30px;">
  —Season
</p>

<p style="padding-left: 60px;">
  —2016 (and one document this fall for 2017, one per year moving forward)
</p>

<p style="padding-left: 90px;">
  —Player Picks (Each User’s picks for the 2016 season)
</p>

<p style="padding-left: 90px;">
  &#8211;Week (1 &#8211; 17, 17 different Documents, each embedded with:)
</p>

<p style="padding-left: 120px;">
  —Individual Player Stats
</p>

<p style="padding-left: 120px;">
  —Division Standings, etc
</p>

I read dozens of articles on StackOverflow, Reddit, and others. I tried to code it as an EmbeddedDocument, DynamicFields, and more. Everything ended up as an error. I needed to put the JSON object as an embedded document in each _Week_ document above. But I couldn’t figure out.

I’m out of time. I’ve procrastinated enough and I really want to get a prototype and / or minimum viable product up in the next two weeks. There are two things that are a must:

  1. User registration and login system
  2. User pick submission

The first one shouldn’t be a problem as how to build a secure user registration system with ```passlib``` is included in the [Python for Entrepreneurs course][1]. The second requirements shouldn’t be that hard, but every time I think that, I’m proven wrong.

When I was using SQLite previously, I had all the code written to create the tables and do the initial import of the data needed. I’ll need to re-use some of that code and port the rest from the pure SQL statements I was using to SQLAlchemy.

I was also stuck on what the weekly results table should look like. My wife had some thoughts on it that thoroughly confused me, but when we chatted about it yesterday, neither of us could remember why she was recommending the design she did. I gave it some more thought and I think I have a database model that will work. I’ve written all the class files I need for SQLAlchemy and have taken the week off work to see how much progress I can make.

The big think I need to do is figure out the Javascript within Pyramid and the Chameleon template language to allow a user to make their picks. I have a table that stores all the active players in the NFL with columns for their first name, last name, player ID, team ID and position. I will need to create drop down boxes allowing them to choose, for example, which quarterback they think will lead the league in passing. That part of I have no idea how to do…. yet.

But one thing at a time.

 [1]: https://training.talkpython.fm/courses/explore_entrepreneurs/python-for-entrepreneurs-build-and-launch-your-online-business