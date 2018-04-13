---
title: Python for Entrepeneurs Progress
author: Paul Cutler
type: post
date: 2017-07-11T12:57:06+00:00
url: /blog/2017/07/python-for-entrepeneurs-progress/
categories:
  - Python
tags:
  - '&quot;Talk Python&quot;'
  - CSS
  - Pyramid

---
I sat down excited at dinner last night excited to share with my wife the two things I learned in my Talk Python course yesterday. The first was learning the basics of CSS, something I’ve avoided for years. I’m not going to even pretend I understand CSS, but it’s a base knowledge to work with and there is still a whole chapter of applied front-end frameworks, so I’m sure there will be more on CSS.

The second was a cache-busting technique, making it easy to both develop a website and see the changes right away without having to clear the browser cache and great for users that they’ll see the updates in production when it happens.

As I follow along in the [Python for Entrepreneurs][1] class, I’m trying something different this time. Rather than code along with the examples and do the examples as Mr. Kennedy does them, I’m trying to build [nflpool.xyz][1] using similar code as to what is is in the training. There has been a couple gotchas doing it this way, as you’ll start a chapter doing something one way and then learn a different and better way to do it. Overall, I kind of like doing it the way I’m doing it as the hands-on applications is one of the ways I learn best.

Unfortunately, the cache-busting code broke Pyramid and I got a myriad of errors in my Chameleon templates. I didn’t realize this until after I had started the routing section of the training and then lost an hour or two trying to trouble shoot the cache-busting. I finally gave up and ripped out cache-busting code from the templates and everything is working again. Well, working without the cache-busting code.

As I worked on the routing section, I’m not going to say I truly understand it yet, but it started to click for me why using a framework like Pyramid using Python makes sense. When I’ve mentioned to a couple of people that I’m going to use Python and Pyramid to build a site, I’m usually asked why I just wouldn’t use Javascript like everyone else these days. For me, focusing on one language at a time and not trying to learn too much is key. I’m pretty sure that I could do everything I want to do with nflpool in Javascript (including both the game calculations and website), but Python’s readability and reputation for being a good language to start with really appeals to me. So why wouldn’t I build it in Python? It gives me more hands-on experience with the language, which I need, and I can include the code needed for the scoring right into the application and don’t have to build two things &#8211; the game scoring and a website.

I still have a **lot** to get through this week. I need to finish the applied web development including forms (yay! Maybe I will have the ability to take user picks up by next month. Now, don’t get ahead of myself&#8230;); then front-end frameworks with CSS and Bootstrap; the biggest of them all &#8211; databases (more on that in a second); as well as account management; and finally, deployment. I skimmed the deployment chapter Sunday night &#8211; lots of good stuff (even if they use an Ubuntu VPS in the training) and I’m excited to give Ansible a chance.

One of the nice things about the trainings from Talk Python is that Michael Kennedy offers office hours for a Q&A section if there is something you’re stuck on. The next one is tomorrow, which is perfect. I’m going to see if I can solve my cache-busting problem, and if not, maybe ask for help. I also want to ask him his thoughts on using MongoDB instead of SQLite after taking his [MongoDB training][1] last week, while Python for Entrepreneurs uses SQLite.

I’m really enjoying the class and glad I’m making time for it. I don’t know if I’m going to have a skeleton up by the end of the weekend or not, but it’s coming along.

 [1]: #