---
title: Stay on Target (or why my Python app still isn’t built)
author: Paul Cutler
type: post
date: 2017-07-09T15:17:58+00:00
url: /2017/07/stay-on-target-or-why-python-app-still-isnt-built/
featured_image: /wp-content/uploads/2017/07/target.jpg
categories:
  - Python
tags:
  - NFLPool
  - Python

---
One of the things I’m not doing well is focusing on one task at a time. As I continue to learn Python, every time I across a way to do something, I want to implement it right away without thinking ahead of how all the different things work together. Then I’ll get stuck, and frustrated, and my pace slows.

I need to find a task, stay on target, and just finish it, rather than jumping from feature to feature. With this in my mind, I’ve taken a step back to think about what needs to get done.

There are two major things that need to be built:

## nflpool.xyz

Using [Pyramid][1], I need to get the website up &#8211; even if this is just a skeleton. [The Python for Entrepreneurs][2] will get me there. I need to follow through and finish the course._
  
_ 

Major features for the website include:

  1. User creation / management: This includes creating an account, resetting passwords and login / logout. The course does an awesome job of how to properly hash and salt the passwords &#8211; I just watched and worked on this chapter yesterday.
  2. Yearly Player Picks: I will need to create a form for each player, after they have created an account, to submit their picks. This form will need to talk to the database to display the list of teams in each conference and the players available in each of the positions. I briefly looked at the Pyramid documentation Friday night and something like WTForms might work for this, but I really know nothing about it at this point. From there the player will need to hit submit, then review their picks or make changes, and then submit their picks which are stored in the database.
  3. Scoring: The last section of the website is the most important part to each player &#8211; how are their picks doing against everyone else? One of the reasons I’m using a database is that the cumulative player stats that MySportsFeeds provides are just that &#8211; cumulative through the season. There isn’t a way to just get the quarterback stats for week 5 of the 2016 season &#8211; so I need to store each weeks stats in the databases. This way a player can track their progress in nflpool through the year. Want to see where they stand right now? Check. Versus two weeks ago? Check. So the website will need to default to the latest week and then let the player choose the year and the week to see past history.

The only downside at this time for creating the website is if I want to use sqlite vs mongodb &#8211; I’d prefer to use mongodb as I’m stuck on how to create the individual player picks table and wanted to try it as a key / value store in a mongodb collection. The course is focused on SQLite with SQLAlachemy &#8211; something I’d like to learn but I think mongodb might also be easier for taking the JSON from [MySportsFeeds][3] and just sticking it right in the database.

## nflpool app

The app has two major features that need to be completed:

  1. Import data via JSON from MySportsFeeds into the database: I had all of this done using SQLite. If I choose to switch databases, I’ll need to rewrite this this code.
  2. Scoring calculations: This isn’t done at all. This depends on the player picks table in the database, which is where I was stuck a few months ago when I took a break. I can’t figure out the data model for it no matter how many times my wife tries to explain it to me and I don’t know if I’m just being optimistic when I think a key value store in mongodb would work better. I’m going to give this a bit more thought and actually write out what the document would look like. This would probably be an embedded document in each user’s account.

## Next Steps

With all that said, I think working on the website and getting a skeleton up is the best next step. If I can get the site up, then start to work on the submission form for the picks (which will require a bit of importing team data into a database, so I’ll have to make a decision there), I think I’ll feel a lot better. In a perfect world &#8211; and I know this isn’t going to happen in the next 30 &#8211; 45 days when I really need it, would be to have the submission form working prior to the 2017 season starting. Even if I have to still calculate the points weekly like I’ve been doing for the last two years, at least I’d have the picks in the database this time instead of having to work with the challenge of Google Sheets.

 [1]: https://trypyramid.com/
 [2]: #
 [3]: http://www.mysportsfeeds.com