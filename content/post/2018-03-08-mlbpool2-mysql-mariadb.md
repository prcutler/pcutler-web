---
title: 'MLBPool2 & MySQL / MariaDB'
author: Paul Cutler
type: post
date: 2018-03-08T17:21:17+00:00
url: /blog/2018/03/mlbpool2-mysql-mariadb/
categories:
  - Python
tags:
  - Mariadb
  - MLBPool2
  - mysql
  - NFLPool
  - Python

---
When I wrote yesterday introducing MLBPool2, I buried the lede. One of the biggest changes between NFLPool and MLBPool2 is the fact I’m now using MariaDB and MySQL as the backend instead of SQLite, which NFLPool uses. (I did look at PostgreSQL since so many Python developers seem to prefer it, but I’ve never been able to get a PostgreSQL server up and running on Linux or Mac. My sysadmin skills are nonexistent.)

Since I’m using SQLAlchemy for 90% of the SQL interactions, setting it up was pretty easy, I just needed to make sure when creating the tables I added things like string length where needed. A basic example that shows the difference between the two is the table that stores the division information. In football, it’s the NFC East, AFC North etc, and in baseball it’s the AL East, NL Central, etc.

In NFLPool it was:

    class DivisionInfo(SqlAlchemyBase):
        __tablename__ = 'DivisionInfo'
        division_id = sqlalchemy.Column(sqlalchemy.Integer, primary_key=True)
        division = sqlalchemy.Column(sqlalchemy.String)
    

And in MLBPool2:

    class DivisionInfo(SqlAlchemyBase):
        __tablename__ = 'DivisionInfo'
        division_id = sqlalchemy.Column(sqlalchemy.Integer, primary_key=True)
        division = sqlalchemy.Column(sqlalchemy.String(8))
    

Easy enough. But since SQLite is a persistent database, I learned the hard way that I need to close each session in MySQL with a `session.close()` statement or I see lots of fun errors like this:

    OperationalError: (pymysql.err.OperationalError) (1040, 'Too many connections') (Background on this error at: http://sqlalche.me/e/e3q8)
    

It’s taken a lot of trial and error figuring out where I need these. I’ve learned they have to go before any `return` statements and even when I think I have them in all the right places, it turns out I don’t. Yesterday I was entering all of the picks for everyone who played in 2017 to do some testing (to see if the app’s results and scores match what was done by hand) and after entering six player’s picks, I ran into it again. Sure enough, in the PlayerPicks service, I didn’t have any `session.close()` statements when I returned all of the lists that make up the picks. I had just added [Rollbar][1] functionality to the site to keep track of errors and I was pleasantly surprised to learn that when you connect Rollbar to your Github repo, it automatically opens an issue for you on Github with the error. (Pretty cool, Rollbar!)

I’m still a little worried that after I deploy and the site has been up for a while that the “Too many connections” error is going to happen.

The other thing I forget to share was a link to the [Github repo for MLBPool2][2]. It’s open source under the MIT X11 license. I originally had NFLPool under the GPL but changed it to MIT as well. I liked the idea of it being under the GPL in case anyone ever used it and I could have access to the changes, but let’s be honest, the chances that anyone is going to use the codebase is slim to none and I’d rather be more permissive (and I have issues with the Free Software Foundation, but no need to get into that.) The key takeaway is I’m a big believer in open source and I think making it more permissive is the right thing to do.

I’m undecided if I’m going to port NFLPool to MySQL. I think it’s probably a better option, but the few how-to’s I’ve read give me pause on how to import the data from SQLite to MySQL. I’m not sure if it’s worth the effort considering all of the features I want to back port and / or add to NFLPool. (But that’s a different discussion for a different blog post).

 [1]: https://www.rollbar.com
 [2]: https://github.com/prcutler/mlbpool2