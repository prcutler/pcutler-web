---
title: 'Talk Python Training: Consuming HTTP Services in Python Review'
author: Paul Cutler
type: post
date: 2017-02-23T17:17:07+00:00
url: /2017/02/talk-python-training-consuming-http-services-in-python/
categories:
  - Python
tags:
  - '&quot;Talk Python&quot;'
  - Python

---
**_Summary / tl;dr_**_: Consuming HTTP Services in Python is a great addition to the training courses from Talk Python and Michael Kennedy. You’ll come away with a thorough knowledge of the best way to get data from the internet using the requests module; you’ll use real world examples and APIs from Basecamp, Github and a custom API Michael built just from the course; Michael will explain and show the concepts in an easy to learn manner with a little humor and recap each concept to make sure you understand._

In addition to being host of the well known Talk Python podcast, Michael Kennedy has also created a number of Python training courses. The first, [Python Jumpstart by Building 10 Apps][1], [launched its Kickstarter][2] exactly a year ago this month, and was quickly followed later in the year with [Python for Entrepreneurs][3] on [Kickstarter][4] and [Write Pythonic Code Like a Seasoned Developer.][5]

I [started][6] and finished Python Jumpstart by Building 10 Apps late last year and loved it. It was a very different [learning experience than the University of Michigan’s Python for Everybody class on Coursera][7]. There is an assumption with the Talk Python training courses that you have some basic understanding of computer science or programming. I don’t, so I typically go a little slower and take my time with the courses.

Looking back. there are a few things I liked about the Jumpstart by Building 10 Apps course and I was glad to see continue in this latest course:

  * Michael makes it very easy to follow along in the beginning of the courses. Everyone learns differently, but one of the ways I learn best is to follow along by typing the code as he does in the video, helping me commit it to memory.
  * After teaching you a core concept and coding it into one of the apps, Michael recaps what you’ve just learned in its own “Concept” video. This summarizes the concept you just put into practice and reinforces what you’ve learned.
  * Compared to some of the other online courses I’ve taken, I really like that I know I’m learning from someone well known in the community and I believe I’m not just learning how to code, but coding best practices. I don’t know if I’m explaining this right, but as an example: A few of the online classes I’ve taken haven’t had me put the code into functions and then call them in a main(): function, for example.
  * The source code to the examples Michael teaches you is on Github. You can download it, star it, fork it &#8211; but it’s available if you want to follow along, code along as the course goes, or just save it for reference for the future.

I’ve shared my enthusiasm for the Talk Python training courses here and on Twitter and when Michael reached out to me last week asking if I was interested in having a sneak peek at his latest course, [Consuming HTTP Services in Python][8], I jumped at it (after making sure he knew I was still a novice early in my Python learning curve). I took a look at the course overview and this is right in my wheelhouse of what I need to learn. A core part of the app I want to build is exactly what this course is about &#8211; using the requests module to download at least a half dozen JSON feeds and then building my app around that. (My app is to build the scoring for a custom [NFL Pool league][9] &#8211; it’s not a fantasy league, it’s different. All of the data comes from [MySportsFeeds,][10] who provides sports data via JSON or XML which I will consume, store in a database, and then write a Python program to calculate the league and player scores to be displayed on the [league website][11].)

What I really liked about this course was that it was focused on one thing: consuming services. I’ve taken a few different Python courses online as I try and learn Python, and most are throwing all the basics that you need to know &#8211; everything you’d expect in a beginner course, but it does get overwhelming. This was the first course I’ve taken that was focused on getting you really good at one thing, and in a few different ways that you might need to do it.

Immediately, I learn something new. I only knew of requests from I learned using Google and Stack Overflow. When I started playing around and putting together the building blocks of my app, I wrote the following code. MySportsFeed currently using HTTP Basic Authentication, so I have a separate file called secret.py that stores my username and password &#8211; I may be new to Python, but I’m smart enough to have created that, import it and add it to my .gitignore file!

This code polls the Playoff Team Standings feed on MySportsFeeds and then I have [some (ugly) Python code][12] that runs a for loop to rank each of the two NFL Conferences teams from 1 to 16.

    response = requests.get(
        'https://www.mysportsfeeds.com/api/feed/pull/nfl/2016-2017-regular/playoff_team_standings.json?teamstats',
        auth=HTTPBasicAuth(secret.msf_username, secret.msf_pw))
    
    rawdata = response.content
    data = json.loads(rawdata.decode())
    

And what did I learn? As I tweeted last week:

<blockquote class="twitter-tweet" data-lang="en">
  <p dir="ltr" lang="en">
    I can&#8217;t believe I didn&#8217;t know that the requests module in Python could handle JSON natively.
  </p>
  
  <p>
    — Paul Cutler (@prcutler) <a href="https://twitter.com/prcutler/status/832310669055819780">February 16, 2017</a>
  </p>
</blockquote>

Now my code looks like this:

    response = requests.get(
        'https://www.mysportsfeeds.com/api/feed/pull/nfl/2016-2017-regular/playoff_team_standings.json?teamstats',
        auth=HTTPBasicAuth(secret.msf_username, secret.msf_pw))
    
    data = response.json()
    

It’s not a lot, it’s just one line of code, but it’s these little things. I had no idea the power of requests &#8211; this is just one specific example of something I learned from this course. Another thing I learned? I should be taking the URL in the above eample, create a base_url variable and then append the feed name as another variable. This is covered in a later chapter of the course &#8211; [Consuming RESTful HTTP services.][13] This chapter has a ton of great examples I’m going to be referencing when writing my app and using.

The Consuming RESTful HTTP services chapter is where the course really starts to take off. I ran into this with the Jumpstart course as well &#8211; Michael does a great job in teaching you the building blocks and then the course seems to go from 0-60. This is where having previous programming experience is helpful as that jump from learning what each puzzle piece does to how you put the puzzle together clicks. For someone like me, without any programming experience, it’s a big jump, but possible.

With that said, this chapter is fantastic. While I had a cursory knowledge of HTTP commands like GET and PUT, the API Michael built for the course is awesome. You have the opportunity to create your own examples and interact with the API and blog explorer app &#8211; this isn’t something you see with most online courses out there.

I also learned that I only want to use requests, and not built-ins. Though I do now have an understanding of the urlib built-in for Python 3.x if I’m ever cornered and have to use it.

I will admit to skipping the chapter on SOAP. I’m a hobbyist, not an enterprise developer who may encounter SOAP. But it’s great this available for those who may need it as part of this course. This, combined with learning how to use JSON, XML, and screen scraping makes it a complete course.

The last chapter is on screen scraping. There are a ton of of tutorials and classes available on the web about screen scraping. I’ve taken a few of them &#8211; one of the challenges I have with my app is figuring out the playoff seeding and I thought about scraping NFL.com, but that’s a different story. This chapter kicks off with an example of using a site’s sitemap.xml &#8211; an example I’ve never seen before that makes so much sense once you learn about it. And if a website you want to scrape doesn’t have a sitemap.xml, shame on them for not being search engine friendly. But if they don’t, Michael goes through other ways to scrape a website using Beautiful Soup and does it in the most Pythonic way I’ve seen yet in a course.

I enjoyed Consuming HTTP Services in Python. With the requests module and JSON being a cornerstone of the app I hope to write, it was great to learn about everything I need to know to make that happen. Michael’s delivery is conversational and he makes it easy to follow along and do the code examples with him, if you choose to. If you have programming experience or are coming from a different language, the videos themselves will probably teach you what you need to do in Python. If you’re like me, a complete novice to Python, you’ll be able to follow along, but be prepared for the jump the course will make in the Consuming RESTful HTTP Services chapter &#8211; this moves pretty quickly, but if you’ve forked the Github repo you’ll have access to the program Michael has written and you can (and should) write your own examples to interact with the API on the blog explorer. For $39, you’re getting a well developed course from someone well known in the Python community teaching you the Pythonic way interact with services. While other online training sites might have “sales” that are cheaper, as someone new to Python who has taken some of those courses, trust me &#8211; the Talk Python courses are well worth the money.

I’m still early in my Python journey and the two courses I’ve finished from Talk Python have been the best learning resources I’ve used out of all the books and training I’ve purchased (and it’s a lot). I’m still working my way through Python for Entrepreneurs and am really [looking forward to two of the upcoming courses using SQLAlchemy][14] as this database stuff is way over my head right now. Thanks again to Michael for allowing me to have a preview of the Consuming HTTP Services course &#8211; now it’s time for me to take his advice from the last chapter of the course and write some code &#8211; the best way to actually learn.

 [1]: https://training.talkpython.fm/courses/details/python-language-jumpstart-building-10-apps
 [2]: https://www.kickstarter.com/projects/mikeckennedy/python-jumpstart-by-building-10-apps-video-course
 [3]: https://training.talkpython.fm/courses/details/python-for-entrepreneurs-build-and-launch-your-online-business
 [4]: https://www.kickstarter.com/projects/mikeckennedy/python-for-entrepreneurs-video-course?ref=profile_created
 [5]: https://training.talkpython.fm/courses/explore_pythonic_code/write-pythonic-code-like-a-seasoned-developer
 [6]: http://paulcutler.org/blog/2016/10/next-class-up-python-jumpstart-by-building-10-apps/
 [7]: http://paulcutler.org/blog/2016/09/python-for-everybody-at-coursera-with-dr-chuck/
 [8]: https://training.talkpython.fm/courses/explore_http_reset_client_course/consuming-http-and-soap-services-in-python-with-json-xml-and-screen-scraping
 [9]: http://mlbpool2.com/rules/nfl-pool-rules/
 [10]: https://www.mysportsfeeds.com/
 [11]: https://nflpool.xyz
 [12]: https://github.com/prcutler/nflpool/blob/master/team_rank_request.py
 [13]: https://training.talkpython.fm/player/start_chapter/3007
 [14]: https://training.talkpython.fm/courses/all