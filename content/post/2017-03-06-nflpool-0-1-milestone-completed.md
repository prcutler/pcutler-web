---
title: NFLPool 0.1 milestone completed
author: Paul Cutler
type: post
date: 2017-03-07T02:05:08+00:00
url: /blog/2017/03/nflpool-0-1-milestone-completed/
categories:
  - Python
tags:
  - NFLPool
  - Pyramid
  - Python

---
I followed through on my [last blog post][1] and made a lot of progress over the weekend &#8211; the best way to learn is by doing.  I&#8217;ve updated my [roadmap][2] for [nflpool][3] and broke the development of the nflpool app into chunks:

  * 0.1: Database creation complete &#8211; write the Python code and SQL statements to create all the needed database tables using sqlite3.  This includes using the `requests` module to import all players in the NFL into the database from [MySportsFeeds][4].
  * 0.2: Import the 2016 statistics from MySportsFeeds into the database. This includes everything needed to calculate an NFLPool player&#8217;s score: individual player statistics, division standings, Wild Card seeds, etc.
  * 0.3: Scoring calculations are complete &#8211; the app works. The nflpool app can take every player&#8217;s picks, compare it to the final standings, and output everyone&#8217;s score for this past 2016 season.
  * 0.4: If 0.3 can calculate the final 2016 standings, 0.4 will add functionality to step through every week individually for 2016 from weeks 1 through 17. This will have to be different code as it won&#8217;t use the requests module to get real time data, it will use the JSON data I downloaded weekly last year. This will help me prepare for the 2017 season proving that it can calculate the score each week until the season ends.
  * 0.5: The nflpool app now lives on its website, [nflpool.xyz][5]. This will include an online form for the 2017 season where players can make their picks and these picks are inserted into the database. This will be built on [Pyramid][6] (after I complete the [Python for Entrepreneurs course from Talk Python][7] to do this.)
  * 1.0: Full nflpool.xyz integration. Players can browse by week for the current season and past seasons. 

After this weekend, the 0.1 milestone is complete. I ran into a few challenges, but the database is complete and I even have cumulative NFL Player stats imported as part of the 0.2 milestone. The first challenge I ran into was I could not get the CSV file imported into the sqlite3 database. We originally used a Google Form to capture each player&#8217;s picks. I saved that in Google Docs as a CSV file to be imported. I kept getting a too many values to unpack error and no matter how many times I compared the CSV columns to the SQL statement &#8211; it was expecting 47 and no matter how many times I checked and re-checked, I couldn&#8217;t find my mistake. After doing some Google searches, I came across this [Python script on Github][8] to import a CSV into sqlite &#8211; and it worked!

The second challenge I ran into today. I realized after importing the player&#8217;s picks and the NFL Player statistics that I was using NFL Player names in the CSV file but I was using the player\_id, an integer, from MySportsFeeds for the database. Using the player\_id is the correct way to do this, but I needed to modify the CSV and re-import. No problem, but after doing this, I realized I would need to do the same thing again for the Team picks &#8211; I need to use the team_id not the team name.

This is all now done and I can move on to the 0.2 milestone. Starting with the five picks for individual stats (passing yards, rushing yards, receiving yards, sacks and interceptions &#8211; all already imported using `requests`!), I&#8217;ll write a function that will compare a player&#8217;s picks to if the NFL player finished in the top three of that category and assign the correct points. I&#8217;ll then add an `if` statement to see if the nflpool player made a unique pick in that category, and if so, double the points earned.

From there I&#8217;ll move on to all the other categories such as Division Standings or Points For and use the same logic.

This is huge progress. The point calculations will be the hardest part of the app (outside of building the website) and now it&#8217;s time to see how much Python I&#8217;ve learned.

 [1]: http://paulcutler.org/blog/2017/03/writing-python-to-learn/
 [2]: https://github.com/prcutler/nflpool/blob/master/ROADMAP.md
 [3]: https://github.com/prcutler/nflpool
 [4]: https://www.mysportsfeeds.com
 [5]: https://nflpool.xyz
 [6]: https://trypyramid.com/
 [7]: https://training.talkpython.fm/courses/explore_entrepreneurs/python-for-entrepreneurs-build-and-launch-your-online-business
 [8]: https://github.com/rufuspollock/csv2sqlite