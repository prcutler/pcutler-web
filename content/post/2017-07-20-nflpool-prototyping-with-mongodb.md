---
title: NFLPool Prototyping with MongoDB
author: Paul Cutler
type: post
date: 2017-07-20T20:52:04+00:00
url: /blog/2017/07/nflpool-prototyping-with-mongodb/
categories:
  - Python
tags:
  - mongoDB
  - mysportsfeeds
  - NFLPool
  - Python

---
Yesterday was a good day.

With the static pages for nflpool.xyz complete, I started thinking about the dynamic pages. These are going to require access to the database and I’ll be using MongoDB. I had started the [MongoDB course][1] from Talk Python, but put that aside to go back to the [Python for Entrepreneurs][2] course to get the site up using Pyramid.

I took a step back and did some brainstorming about the data model I’ll need for the database. I grabbed a spare whiteboard and started scribbling.

<div id="attachment_6691" style="max-width: 3274px" class="wp-caption aligncenter">
  <a href="https://i1.wp.com/paulcutler.org/blog/wp-content/uploads/2017/07/2017-07-19-18.44.45-3.jpg"><img class="size-full wp-image-6691" src="https://i1.wp.com/paulcutler.org/blog/wp-content/uploads/2017/07/2017-07-19-18.44.45-3.jpg?resize=700%2C525" alt="" width="700" height="525" data-recalc-dims="1" /></a>
  
  <p class="wp-caption-text">
    nflpool whiteboard brainstorming
  </p>
</div>

Using MongoDB requires you to shift your mental model from traditional SQL and joining tables as MongoDB doesn’t technically do joins. I needed to think about what a collection looks like and do I embed more documents within a collection or have multiple collections?

I went back through the MongoDB course chapter on Modeling and Document Design. Mr. Kennedy has you ask 6 questions when it comes to embed or not embed:

  1. Is the embedded data wanted 80% of the time?
  2. How often do you want the embedded data without the containing document?
  3. Is the embedded data a bounded set?
  4. Is that bound small?
  5. How varied are your queries?
  6. Is this an integration DB or an application DB?

The answers that I came up (that are hopefully correct):

  1. Yes
  2. Almost always
  3. I’m such a newbie I don’t even know what a bounded set is.
  4. I think so.
  5. Not very.
  6. This is an application database.

Keeping in mind that MongoDB has a 16MB limit, which sounds a lot smaller than it really is as I’m only dealing with text and not embedding images or anything like that, the answer is to embed everything.

The next step was to go back through the [MySportsFeeds APIs][3] and figure out which ones I’ll be using. In no particular order:

  * Cumulative Player Stats (for individual player picks, such as the passing yards leader)
  * Roster Players (used for the league players to pick who the individual player leaders are)
  * Playoff Team Standings (Used for wildcard playoff picks)
  * Division Team Standings (Used for which teams will finish 1st, 2nd and last in each division)
  * Conference Team Standings (Used for the team that will lead its conference in points for as well as some team data, such as the team name, abbreviation, etc.)

I may want the full game schedule at some point, but that’s a bigger challenge than I need to get into right now.

I ended up deciding that I need two collections within my database:

  * Users: this will store the registration information for each player in the league and be used for logging into the website
  * Seasons: Here I will embed all of the data for each season of play and have a document for 2016, 2017, etc. Within each year I’ll embed the league player’s picks and then a document for each of the APIs above that has 17 embeds &#8211; one for each week of the NFL season. One of my goals is that player can go back to 2016 and look at their progress for each week and see their point total versus the rest of the league. Getting ahead of myself, this will _not_ be available in MLBPool2 (if and when I ever build that) as that will only be a real time look at your score and then show the final year results.

So it may look something like this, with two collections: _Users_ and _Seasons_:

nflpooldatabase
  
&#8211;Users (embed a document for each player in the league in this collection)
  
&#8211;Seasons (Example: &#8220;2016&#8221; &#8211; and then embed the following in the 2016 document:)

  * 2016 
      * player-picks 
          * 1 document for each player’s picks
      * Week 1 through 17 (17 documents total) with the NFL stats for that week embedded here: 
          * AFC East
          * 11 more documents for division picks like AFC East above
          * 6 documents for individual leaders
          * Tiebreaker
          * Documents for Points For, Wildcard, etc.
  * 2017 
      * player-picks
      * Weeks 1-17 (One document per week) 
          * NFL stats with all the embedded documents above

Now it was time to re-build the functions to go get the data from the MySportsFeeds API. I had this working in the last iteration of the app when I was using SQLite, but I’ve never used MongoDB before. Over my lunch hour, I successfully prototyped taking one query and putting it into my MongoDB running locally.

<blockquote class="twitter-tweet" data-lang="en">
  <p dir="ltr" lang="en">
    Eureka moment: Spending the lunch hour successfully prototyping importing data from an API over the internet to a local MongoDB using Python
  </p>
  
  <p>
    — Paul Cutler (@prcutler) <a href="https://twitter.com/prcutler/status/887740666540961805">July 19, 2017</a>
  </p>
</blockquote>



The feeling of euphoria in successfully using MongoDB was huge.

Last night after work, I took the next step. Keeping in mind the size limitation of MongoDB, I could take steps to filter the API calls, especially for cumulative stats. I only need a few key stats for a subset of all players in the NFL. For example, I just need passing yards for quarterbacks. The MySportsFeeds API provides a ton of stats for every player &#8211; such as fumbles, passes over 20 yards, QB Rating, completions, and defensive stats (even though they’re an offensive player).

Thankfully, [Brad Barkhouse of MySportsFeeds][4] is always available in the MSF Slack channel. I couldn’t figure out how to build a filter for just certain positions _and_ a specific stat. (It turns out it’s just an & sign). So if I just want sacks for defensive players, it looks like this:

`https://api.mysportsfeeds.com/v1.1/pull/nfl/2016-2017-regular/cumulative_player_stats.json?position=LB,SS,DT,DE,CB,FS,SS&amp;playerstats=Sacks`

So my task for the weekend is to figure out if I want to just embed a document for each individual category or one document with all of the cumulative stats and then just build queries for each category I care about (sacks, interceptions, passing yards, etc.)

I probably should just focus on the next phase of the Python for Entrepreneurs training though, and get the user login and authentication built and then go through the Albums part of the training, which I’ll mimic for the the league players to submit their picks. I’m running out of time as I really have only a few weeks before I need the player picks to be submitted before the start of the season.

Prioritizing is fun. But I’m so happy with some of the breakthroughs and progress and not trying to think of all the challenges ahead and just take it one step at a time.

 [1]: https://training.talkpython.fm/courses/explore_mongodb_for_python_developers_course/mongodb-for-python-for-developers-featuring-orm-odm-mongoengine
 [2]: https://training.talkpython.fm/courses/explore_entrepreneurs/python-for-entrepreneurs-build-and-launch-your-online-business
 [3]: https://www.mysportsfeeds.com/data-feeds/api-docs/
 [4]: https://www.mysportsfeeds.com/about-us/