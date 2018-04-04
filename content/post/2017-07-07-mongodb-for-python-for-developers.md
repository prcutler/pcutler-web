---
title: MongoDB for Python for Developers
author: Paul Cutler
type: post
date: 2017-07-07T13:55:06+00:00
url: /2017/07/mongodb-for-python-for-developers/
categories:
  - Python
tags:
  - mongoDB
  - Python

---
I’m taking the latest training course that just launched a couple of weeks ago from Michael Kennedy at Talk Python: [MongoDB for Python for Developers][1]. This is my first exposure to NoSQL. Over the last year, I’ve searched Google a few different times trying to understand what NoSQL without any success &#8211; it always went over my head. Within ten minutes of starting this course, I think I might understand what a document database is.

I took a break from coding the nflpool app a few months ago after my wife gave me some feedback on how I was designing the data model for the SQLite database I was using. I was pretty frustrated, not with her, but just my lack of knowledge. I still hadn’t figured out how to import the individual player pick’s from the Google Sheet I was using, though I did find some open source code that did it perfectly. The challenge was if I changed the data model, the import functionality was going to change significantly and I couldn’t figure it out.

Here it is, early July, and I feel the panic of not having the app built for the upcoming NFL season for the second year in a row. That’s ok &#8211; it’s a marathon, not a sprint, to learn Python and build the app. Everyone needs a hobby.

I’m going to create a new branch in nflpool and see if I can use MongoDB instead of SQLite. I need to sit down this weekend and give some thought and sketch out the data model for the Users collection, but I think it could (should?) work better than what I was planning. It’s already obvious that importing the the NFL statistics from [MySportsFeeds][2] via JSON directly into MongoDB should be a slam dunk.

The challenge in switching is twofold: First, I’ll need to understand how that changes the [Python For Entrepreneurs][3] course &#8211; as I’m going to use Pyramid for the web framework, I’ll need to understand how those will work together. This is especially true for the user accounts and database sections of the course.

The second risk is by switching to MongoDB from a SQL language, there will be no help available from my wife. I might drive her crazy with my questions and the way I ask them, but she has a lot of knowledge of SQL and it might be even more of challenge doing the database on my own, in addition to the Python.

I’m enjoying the MongoDB for Python for Developers course. To be fair, it’s definitely over my head &#8211; I’m not a real developer nor do I have any kind of database experience or know any Javascript, so I’m taking it slow and in chunks. I’m not coding the examples as I follow along yet &#8211; I’m going to audit the whole course, give some thought to confirm this is what I want to do, and then I’ll go through it again. It’s probably in my best interest to finish Python for Entrepreneurs and get the Pyramid web app up and running. I do enjoy Mr. Kennedy&#8217;s courses &#8211; the way the courses are structured, how each lecture builds on the others and his delivery makes them worth the money.  Even for some of the topics where I don&#8217;t have the prerequisite knowledge I probably should, I find myself learning.  I&#8217;m on vacation next week and plan to spend a good chunk of time going through both the Python for Entrepreneurs course and the new MongoDB course.

 [1]: #
 [2]: https://www.mysportsfeeds.com/
 [3]: https://training.talkpython.fm/courses/explore_entrepreneurs/python-for-entrepreneurs-build-and-launch-your-online-business