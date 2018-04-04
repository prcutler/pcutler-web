---
title: NFLPool is live
author: Paul Cutler
type: post
date: 2017-08-18T13:53:28+00:00
url: /2017/08/nflpool-is-live/
categories:
  - Python
tags:
  - NFLPool
  - Pyramid
  - Python

---
It’s been a long journey, but the first release of NFLPool is now live at [NFLPool.xyz][1].

We’ll call it a 0.5 release. Features include:

  * New installation service: 
      * Upon starting the Pyramid app for the first time, the database and all of its tables are created.
      * I’ve built an admin panel where the administrator log into and kicks off the installation service: 
          * Downloads all of the team information from MySportsFeeds including NFL team names, conference, and division information and inserts it into the database. 
          * The admin is then directed to the next page to enter the season year. This page is also used each year to start a new season. The NFL schedule is then downloaded from MySportsFeeds and entered into the database.
          * Lastly the admin then downloads all of the active players in the NFL and this is inserted into the database.
  * NFLPool 
      * Users can register and create an account. Thanks to Python’s ```passlib``` module, the user password is hashed and salted over 150,000 times to keep it secure. A lot of the functionality of the site requires you to be logged in.
      * Once a user is logged in, they can make their picks for the new season. 
          * I’ve hardcoded the time allowed to make your picks. Picks need to be submitted by 6:59 p.m. the date of the first game (Thursday night kickoff before Labor Day.)
          * The picks are displayed to the user for a drop down box for each pick. Lots of coding to make this happen to query the database and then only display the right information. For example, when making the AFC East Division winner picks, only the Bills, Dolphins, Jets and Patriots are available in the drop down box. I’m not going to pretend I’m even close to understanding Chameleon templates, but it’s pretty cool how you can iterate over a list and display it dynamically in the template page.
          * After a user makes their picks, they can view them from their account page. It took a lot of coding and help from my wife to make the SQL query in SQLAlchemy &#8211; the SQL query itself is four left joins in SQL (four `OUTERJOIN`) in SQLAlchemy. The ```#sqlalchemy``` IRC channel on Freenode was helpful in getting to done on the query. Using Chameleon templates, it’s pretty cool that I can dynamically create the pages for each season for the user to view their picks. Personally, I think it will be cool after we have two or three years of data. Unfortunately, I haven’t figured out a way to iterate over the object that’s created yet to display it correctly. It’s #1 on the to-do list to get fixed. Most users won’t be submitting their picks until the day or two before kickoff in three weeks, so I’m telling myself I have a little time.

Now the hard work begins. I’m only calling it a 0.5 release because I still have to write all the code to import all of the player and team stats each week of the season from MySportsFeeds and then write the code to calculate each player’s score. Once that is done, we’ll call it 1.0.

One of the fun (or frustrating things) as I’ve come close launching is all of the stuff I keep thinking of that I could add. For example, after sending out the email yesterday to last year’s players that the new site was up and the new process, I realized I should build an admin panel page to view all accounts created on the site. I was pretty darn happy that I could knock that out in ten or fifteen minutes &#8211; I feel that I’ve got a handle on Pyramid’s viewmodels and services. I wrote the query and the template page and voila. The hardest part was where to put the ```tal:repeat``` call in the Chameleon template and table to make it pretty! (Which I got right on the second try.) I have a whole list of to-do items grouped by the Admin Panel, the app, creating the standings calculations and a future wish list that I don’t even want to think about. That doesn’t even get into the fact that a lot of my code is definitely not Pythonic &#8211; I’m guessing I could be using list comprehensions and a number of things to make the code better. I still have a lot to learn, but it’s working.

Lastly, I won’t even go into deployment. It was difficult at best. Lots of challenges with getting the nginx web server to work and I still don’t think I have the systemd service working exactly right. I’m very grateful for the help in the Pyramid IRC channel on Freenode &#8211; the Pyramid developers were super helpful in troubleshooting nginx. But I do have the whole site running SSL and redirects working to make it secure, so I have that going for me.

 [1]: https://www.nflpool.xyz