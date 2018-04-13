---
title: Writing Python to Learn
author: Paul Cutler
type: post
date: 2017-03-03T14:15:13+00:00
url: /blog/2017/03/writing-python-to-learn/
categories:
  - Python
tags:
  - NFLPool
  - Python

---
I&#8217;ve spent a lot of time on my Python journey watching videos, reading a lot of articles, reading Reddit and listening to podcasts trying to learn from osmosis. But everyone says the best way to learn is to have something you want to build and get to writing it.

I took a week of vacation in mid-February with a goal of buckling down and writing some code. That didn&#8217;t happen. I spent half a day getting my environment set up in Fedora; a half day researching Postgresql vs. MySQL and then getting MySQL set up on my development machine and on my server; a day of actual vacation (yay!), a day taking the latest [Talk Python course][1] ([helpful &#8211; and cool!][2]) and then a day spent trying to learn and figure out how to get MySQL working &#8211; which I was never able to.

Looking back, I wish I would have captured what worked well or wasn&#8217;t working in my journal at a minimum, so I could turn that into blog posts, or just blogged. When I started this journey to learn Python and build my two apps, I had every intention of doing exactly that. Everyone who has a blog has an intention to write in it &#8211; and how many actually do?

I find when sit down to code, one of two things happens. If things are going well, I lose track of time, and next thing I know I have to run the kids to hockey or basketball or it&#8217;s time for me to go to bed and I don&#8217;t recap what I&#8217;ve done. The other is I throw up my hands in frustration because it&#8217;s not working and I walk away &#8211; also not capturing where I&#8217;m stuck or why I&#8217;m frustrated.

So here we are again and I&#8217;m going to try harder to chronicle my journey. I had a good night last night in just sitting down and reviewing the [nflpool][3] code I had started. I&#8217;ve gone back to using SQLite as the SQL I had written to create the database tables works &#8211; making it work with MySQL wasn&#8217;t happening and I was sick of losing time and using it as an excuse.  Considering that there are less than 20 people in each of the two leagues, I &#8216;m not worried about performance right now.  The SQLite code works and I need to make some progress.

Three things I accomplished last night:

  * I created two additional branches in Git. I have a `scratchpad` branch &#8211; this is all my original code from six months ago. It&#8217;s terrible. I wasn&#8217;t writing functions, it&#8217;s not well organized, etc. This was my playground to experiment in trying to put the pieces together. I don&#8217;t want to lose these files, so I&#8217;ll store them in their own branch, but they won&#8217;t be used again. I created a `develop` branch &#8211; this is where I&#8217;m doing all my active development. When things are working as they should be, I&#8217;ll do a pull request and merge them into `master`. I don&#8217;t know if this is the &#8220;right&#8221; workflow, but it will work for me.
  * I had three or four different Python scripts to create the tables in SQLite. I [created one Python file][4] to create all of the tables I&#8217;ll need and created a function for each table. I tweaked some of the columns in a few of the tables after reviewing my data model, realizing that some tables didn&#8217;t capture the year or season. I added a main method to call all of these functions. I then deleted the Python scripts that did this individually and merged these changes into `master`.
  * Lastly, and maybe most important, when I was done for the night, I grabbed my notebook and made a to-do list of what to work on next. For example: one of the tables imports some information needed for the NFL Teams (their city, abbreviation, etc.) This data never changes, but I was importing it from JSON data I downloaded from [MySportsFeeds][5]. This needs to be re-written to make a request to the MySportsFeeds API to get the data rather than loading a file into memory. (Just in case anyway ever wants to re-use this code to run the same pool &#8211; I don&#8217;t ever see that happening, but it&#8217;s best to do it right the first time). This way I know where to pick up when I start again and should reduce the time reviewing the code to figure out what to work on next.

Progress!

 [1]: https://training.talkpython.fm/courses/explore_http_reset_client_course/consuming-http-and-soap-services-in-python-with-json-xml-and-screen-scraping
 [2]: http://paulcutler.org/blog/2017/02/talk-python-training-consuming-http-services-in-python/
 [3]: https://github.com/prcutler/nflpool
 [4]: https://github.com/prcutler/nflpool/blob/master/create_tables.py
 [5]: https://www.mysportsfeeds.com/