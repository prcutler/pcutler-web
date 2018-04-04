---
title: 'NFLPool Progress: 8/1/2017'
author: Paul Cutler
type: post
date: 2017-08-02T14:53:08+00:00
url: /2017/08/nflpool-progress-812017/
categories:
  - Python
tags:
  - NFLPool
  - Pyramid
  - Python
  - SQL

---
I took the week off from work to see how much progress I could make on NFLPool this week (and to get some stuff done around the house, but really, for NFLPool). I told myself I’d blog my progress every day and here it is Wednesday already.

In my last blog post, I noted how I was going to have to move back to SQLite for the database. Over the weekend I ripped out most of the MongoDB code and started laying the groundwork for SQLite. The first thing I did Monday morning was going back through the SQLAlchemy chapter of Python for Entrepreneurs to learn how to properly set up classes in Pyramid using SQLAlchemy to create all the database tables. Back when I was building the first prototype for NFLPool, I had written a Python program that set up used the sqlite module and created all of the tables and then populated the database with the NFL teams information (Team ID, name of the team, city, etc.) and also populated the Active Players table with a list of all players in the NFL. This was all done using the SQL language &#8211; which I do not enjoy at all.

I won’t pretend that I still understand object oriented programming, especially the use of classes in Python. I’ve come a long way and I understand the concept of how a class creates an instance of the object, but putting it into practice is still a challenge. Using the Python for Entrepreneurs course examples, I was able to take my data model, write the SQLAlchemy classes, and get the database created.

[<img class="alignnone size-full wp-image-6719" src="https://i2.wp.com/paulcutler.org/blog/wp-content/uploads/2017/08/Screenshot-2017-07-31-08.42.02-3.png?resize=700%2C409" alt="" width="700" height="409" data-recalc-dims="1" />][1]

One of the nice things about the course is that it does touch on how to create an index in a table and making foreign keys to join two tables together, which I’ll need. If I don’t ever migrate to MongoDB, I may want to just use MySQL, which technically, I believe, doesn’t support foreign keys. So I’m not sure how portable this code will be, but like everything else I’m doing, Future Paul can deal with that.

Monday afternoon was all about re-learning the Pyramid concepts of routes, abstracting the database in the viewmodel, and then writing the code in the controller. That took longer than I thought it would. The concepts are originally taught very early in the course, but then you go a long time without touching that part of the code. After all of the hands-on work, I think I’ve got a handle on it. I do like how Mr. Kennedy has you separate the viewmodel from the controller &#8211; he makes a point in the training you don’t have to do it &#8211; but if you don’t, I don’t see how troubleshooting your code could be easy.

That night, I took the kids to the community center where they swim while I sit and watch them in the viewing area with my laptop and use the free WiFi. I pulled my code down from Github and then swore in my head for an hour when Pyramid would error out and wouldn’t create the database. Which it just should &#8211; when Pyramid starts, it looks and if the database doesn’t exist, it looks at the classes I’ve written in SQLAlchemy in my /data directory and creates the database and those tables from the classes. But it wouldn’t. It wasn’t until I was back home later that night that I had an epiphany, created the /db directory manually where the database should live, re-started Pyramid, and voila, my database was there. Now I don’t have to worry about not being portable and can code both at home and on the go.

Tuesday was all about what happens when you first install and setup NFLPool. Since I’m using SQLite, I want to make it easy for me and other to set it up. The easiest thing to do with SQLite is when you need to make changes to the database during development to just delete it and have the app re-create it. Since I’m constantly developing it, I just wanted it easy to re-create and in the case my code is ever used by anyone (it’s on Github, licensed under the GPLv3), it’s better to do this now than try to add this functionality later. (Why GPLv3 and not MIT? My code is so bad being so new to programming, that I want any changes to the source available so I can look at it and learn. Though I’ll probably make it MIT at some point because no one is ever going to use my code, to be honest. Though I could digress on a business model I have brewing&#8230;)

Well, the first step in NFLPool is to set up the tables with the team information, which is static &#8211; it’s just the team name, the abbreviation, the city, and the division and conference they play in. So I thought I’d make an admin webpage where the admin goes, presses a button, and that database table is populated. It would then re-direct to the next page to create a new season. You enter “2017” for example, and it would reach out to MySportsFeeds and pull all active players in the NFL. Now you’re ready for the players in NFLPool to make their picks.

Sounds easy, and then the next thing I knew it was 7pm and I was asking my wife for help. Using the original prototype, which had working Python code to populate the team info table and the active players, I couldn’t get the team info to populate. I thought this tweet summed it up pretty well:

[<img class="alignnone size-full wp-image-6728" src="https://i2.wp.com/paulcutler.org/blog/wp-content/uploads/2017/08/Screenshot-2017-08-02-09.56.26.png?resize=700%2C320" alt="" width="700" height="320" data-recalc-dims="1" />][2]

Turns out I had a return statement at the end of my loop that shouldn’t be there. Took her five minutes &#8211; sometimes you just need another set of eyes. The loop itself is terrible code, but it&#8217;s working.

The other problem I had was with the template and styling of the Admin page to create the first table. The Chameleon template engine kept crashing on me in my browser &#8211; again, she looked at it, pointed out I was missing two divs to close it, and that was working. Coding is fun, I keep telling myself.

After the table populates, which works now, I still don’t have the re-direct working correctly either. I can’t get it to re-direct to a new page &#8211; I’m pretty sure it’s how I have the POST and the routes set up in the admin controller. I _can_ get it to redirect back to the same page though after it populates the first table. I need to keep pushing forward as vacation is almost half over, so there’s another thing on the TODO list for Future Paul.

Today is about doing some code cleanup. This includes adding an admin or settings table in the database to store the current season. From there, I can set up a baseurl function that connects to MySportsFeeds and using the season variable above to create the URL needed to get the JSON data needed for that entire season. This way, at the beginning of each season, you don’t have to go in and manually change all this code. I’m hopeful to get this done this morning, but will probably get stuck, but who knows. From there, I have two major pieces to get done:

  1. Start the code to allow players to make their season picks. From the **Active Players** table, query the database and get a list of all players in a certain position. Then create a form or Javascript to store those in a drop down box. I have no idea how to make a drop down box.</p> 
  2. Account creation / login / authentication. The course has a great chapter on this, I’m not too worried about it.

If I can get these done, then players can create their accounts and start making their picks (though I have to store those picks in the database, but I’m feeling confident). In theory, I could launch next week, which is tight. And then the hard part starts: writing all the code to calculate the scores for each player.

Until then, I’ll just keep telling myself this:
  
[<img class="alignnone size-full wp-image-6723" src="https://i1.wp.com/paulcutler.org/blog/wp-content/uploads/2017/08/Screenshot-2017-08-02-08.54.40-4.png?resize=700%2C570" alt="" width="700" height="570" data-recalc-dims="1" />][3]

 [1]: https://i2.wp.com/paulcutler.org/blog/wp-content/uploads/2017/08/Screenshot-2017-07-31-08.42.02-3.png
 [2]: https://i2.wp.com/paulcutler.org/blog/wp-content/uploads/2017/08/Screenshot-2017-08-02-09.56.26.png
 [3]: https://i1.wp.com/paulcutler.org/blog/wp-content/uploads/2017/08/Screenshot-2017-08-02-08.54.40-4.png