---
title: NFLPool Progress 8/13/17
author: Paul Cutler
type: post
date: 2017-08-14T14:02:11+00:00
url: /blog/2017/08/nflpool-progress-81317/
categories:
  - Python
tags:
  - NFLPool
  - Pyramid
  - Python

---
We’re a day away from launch. The NFL season starts in just over three weeks and players will need to submit their picks for NFLPool for the 2017 season. The majority of the picks won’t come until days before the season kickoff, but it would be nice to iron out some bugs… like the last one that might prevent me from launching for a few more days (but more on that later).

The last few days have been filled with big and little things. I had three big things to finish at the end of last week:

  * Get the email service working (welcome email and password resets)
  * Fix password resets (which I broke)
  * Add logging

Getting the email service working was harder than expected. To use a third party email service, like Amazon’s Simple Email Service, you have to update your website’s DNS records. My first problem was Amazon couldn’t create my account. After getting that resolved, I couldn’t get it to recognize my DNS changes no matter what I tried. I ended up going with [Mailjet][1], which is working great. Just a bit more expensive, but it works.

Next was a day lost to password resets, and when I asked Kelly for help, needing a second set of eyes, it turns out the change I made to Pyramid’s routing broke it. I should have never, ever changed it. This was another case of me thinking I’m clever than I really am.

The good news with the routing, is that I think I might be starting to understand it, which is going to help with showing picks and standings once NFLPool has more than one season under its belt. More on that in a bit.

Lastly, I added logging. I followed the Python for Entrepreneurs class exactly, and now I’m using the ```logbook``` module successfully and am a happy [Rollbar][2] customer. (Thanks again, Talk Python!) Of course this means every time I break something while in development, I get an email from Rollbar that I have an error in my site, but it will be worth it.

I also finished a few smaller things, including importing the NFL schedule from MySportsFeeds and adding it to the installation process. This allowed me to write a check that if the first game has started to redirect the user to a page telling them it’s too late to submit picks. (Sorry, not sorry).

Once those things were complete, I moved on to the last big piece of functionality I needed to complete: showing the player the picks they just submitted. And things completely spiraled out of control after that.

Months ago Kelly sketched out what my data model should look like for storing a user’s picks.

<img class="alignnone size-full wp-image-6743" src="https://i2.wp.com/paulcutler.org/blog/wp-content/uploads/2017/08/2017-08-14-08.12.13.jpg?resize=700%2C525&#038;ssl=1" width="700" height="525" data-recalc-dims="1" />

I didn’t understand it then and it was the major reason development stalled this past spring. I thought I knew better and coded it the way that made sense to me. And of course, she was right. So this weekend was all about starting over. She helped me understand what I needed to do, and I had to add a number of new tables to the database and re-write dozens of methods to create the pics submission form and process it to store in the database. (But the good news is that if and when I convert NFLPool to MLBPool2, this fixes a major issue with MLBPool2 as users can change their picks at the All Star Break. I can now capture those changes **and** assign the points half value per the rules).

Then it was on to trying to show the user their picks. And that’s where we are &#8211; it’s hopelessly broken. I did figure out two cool things in Pyramid, which is auto-creating the pages for picks based on the season (this is related to routes from above) and after another quick query fix from Kelly, that works great. She was able to write a SQL query in SQL that does correctly pull all of a user’s picks, but I can’t seem to convert that a SQLAlchemy query that actually works. I’ve asked for help on Reddit and next up will be on StackOverflow. It’s all about the ```_and``` operator in SQLAlchemy which is way beyond my rudimentary understanding of Python and SQLAlchemy.

The last challenge is that every time I start working on something, whether it’s the admin installation process, user picks, or the user account page, I think of something cool that I want to add before I launch. I keep having to stop myself and instead I’ve started adding them to a to-do list in Wunderlist. Tom Clancy once wrote: _If you don’t write it down, it never happened_ as Jack Ryan’s wife told him and it’s something that has always stuck with me. At some point I’ll convert them to Github issues and label them as bugs or feature enhancements and add them to milestones, but for now there is just too much to do.

And this is just to get the site launched and be able to have users register and submit their picks. I haven’t even started on the ability to compute a user’s score…. So much to do, so little time.

But I did change the homepage of [NFLPool][3] to reflect I’m launching tomorrow. It’s time.

 [1]: https://www.mailjet.com/
 [2]: https://www.rollbar.com
 [3]: https://nflpool.xyz