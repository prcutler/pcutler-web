---
title: I Hate SQL (Or how my wife finished NFLPool)
author: Paul Cutler
type: post
date: 2017-09-06T12:33:39+00:00
url: /blog/2017/09/i-hate-sql-or-how-my-wife-finished-nflpool/
categories:
  - Python
tags:
  - NFLPool
  - Python
  - SQL

---
I mentioned in my last post (and a couple others) how invaluable my wife has been in my journey to learn Python. That was turned up to 11 last week and I (we) started working on the scoring calculations.

I started to write the scoring calculations exactly as you would expect a newbie coder to &#8211; step by step. With the changes to the data model Kelly recommended, I still have a hard time wrapping my head around how we’ve abstracted the pick information. For scoring, the first goal is find the top three players in their position. I made a SQL query using SQLAlchemy which returned with the NFL Player’s `player_id` and the needed stats &#8211; in this case interceptions, which I knew had resulted in a tie that I would have to account for. This returned a tuple: `(123456, 1)`. I then used a list comprehension (yay, me!) to turn that into a list and quickly realized I had to reverse the tuple to sort it by interception and not player ID. Thanks to Stack Overflow, I even found a function that added rank to the list that even accounted for [standard competition ranking][1].

My wife looked at that, shook her head, and told me there had to be a better way and it could all be done in SQL. That started a process that lasted a few hours to figure out how to do SQL directly in the app instead of using SQLAlchemy. After she spent hours coding all the SQL queries, I now have a hundreds of line of code that I can read, but don’t really understand. But it works! As she doesn’t really know Python, I have some clean up to do to conform to PEP8, but I’m not complaining at all.

The other thing I did a terrible job with was naming my database columns &#8211; they weren’t consistent. I fixed all those over the weekend, but I also had to change them all in production. Changing the database in production scares the hell out of me, especially as a handful of players have already created their accounts, but thankfully haven’t submitted their picks yet. The first round of changes to the production database went fine and Sunday night I made the second round of changes to accommodate the player picks table so we could correctly do scoring.

And of course things broke. I had just arrived in the office when [Rollbar ][2]notified me in Slack and via email that the production website had errors. I am so grateful that Michael Kennedy included adding Rollbar support in the Python for Entrepreneurs course. Within ten minutes I had fixed both the fact that the submit picks page requires you to be logged in (instead of displaying an error) &#8211; not sure how I forgot to add it to that page &#8211; and second I fixed the database table that needed an update to correctly let a player submit their picks. I need to improve my QA skills.

I need to finish the QA testing on the scoring calculations by simulating the 2016 season, but it’s looking good so far. We’re 36 hours from picks locking and the season kicking off and I’m excited.

 [1]: https://en.wikipedia.org/wiki/Ranking#Strategies_for_assigning_rankings
 [2]: https://www.rollbar.com