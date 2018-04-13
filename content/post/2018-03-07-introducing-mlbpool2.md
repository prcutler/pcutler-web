---
title: Introducing MLBPool2
author: Paul Cutler
type: post
date: 2018-03-07T14:02:31+00:00
url: /blog/2018/03/introducing-mlbpool2/
featured_image: /wp-content/uploads/2018/03/mlbpool2-1.png
categories:
  - Python
tags:
  - MLBPool
  - NFLPool
  - Pyramid
  - Python

---
After learning Python and creating [NFLPool][1], it was time for another project. This time it was building the site for MLBPool2, which inspired NFLPool. MLBPool was the brain child of former commissioner Jason Theros who created the league and rules.  Sadly, MLBPool came to an end after the 2011 season. The original site was written in ASP and none of the code was available and for the last few years after my friend resurrected the league he did almost everything by hand. I had created a Google spreadsheet / form to get all of the player’s pool picks, but scoring was a manual process and he was only able to do it a handful of times throughout the season. I had a WordPress site but as I wasn’t playing in MLBPool2, I never really updated it. ([It’s still up][2] for another week or so &#8211; and if you’re curious, you can look at the [rules on how to play][3]).

That all changes with MLBPool2. Like NFLPool, the app is written in Python (3.6) and [Pyramid][4]. I debated about starting from scratch or just modifying NFLPool and opted for the latter. I’ve been hip deep in development for the last two months and the finish line is almost in sight. I should have been writing about the development more, but that takes away from my coding time. (Shame on me!)

The major difference from NFLPool is that players have the ability to change up to 14 of their picks at baseball’s All-Star Break. This was much more complex than I thought it would be and I realized if I was going to do it, I might as well add more and more functionality to make it easier for the player. This included:

  * Players can change their picks before the season starts without penalty
  * When changing a pick, the drop down menu defaults to the original pick a player made
  * I added a column when changing a pick that shows if the original pick was unique or not

The hardest part was all of the `datetime` calculations around changing picks. If the season hadn’t started, let the user change their picks; if the season has started, redirect the user that it’s too late to change a pick; if it’s during the All-Star Break, let them change their pick and then have the system make that pick worth half the points; and if it’s after the All-Star Break, redirect them again that it’s too late to change anything.

For whatever reason, I have a hard time working with Python’s `datetime` module. I had planned to use Kenneth Reitz’s [Maya &#8211; Datetime for Humans,][5] but unfortunately the documentation is offline. I ended up going with the [Pendulum][6] module, which has been fantastic to work with and has _excellent_ documentation. (It’s so good I emailed the developer a couple weeks ago with a thank you note). I even created a service just to deal with the date and time manipulations, rather than have Pendulum instances throughout the code. A great side benefit is that it makes testing so much easier.

    class TimeService:
        @staticmethod
        def get_time():
            """Create a service to get the time - there were too many instances of getting the current time in
            the codebase making testing difficult."""
            # Change now_time for testing
            # Use this one for production:
            # now_time = pendulum.now(tz=pendulum.timezone('America/New_York')).to_datetime_string()
            # Use this one for testing:
            now_time = pendulum.create(2017, 3, 17, 18, 59, tz='America/New_York')
    
            return now_time
    

As you can see in the code above, I can just create one instance for testing and change the date to before the season starts, the All-Star Break or after the break. This also fixes an issue I had with NFLPool where I did not do the `datetime` manipulation correctly because of timezone differences with my web server and a user was locked out of submitting picks before the deadline. This worked out so well I even added an alert to the page where you submit picks showing how much time is left until picks are due:

<img class="alignnone size-full wp-image-6819" src="https://i2.wp.com/paulcutler.org/blog/wp-content/uploads/2018/03/Screenshot-2018-02-20-06.44.30.png?resize=700%2C263&#038;ssl=1" width="700" height="263" data-recalc-dims="1" />

There are two major pieces of functionality that need to be finished. There are two complex SQL queries. One to update the unique picks and one to calculate the scoring. I couldn’t figure out how to do this in SQLAlchemy and my wife Kelly wrote direct SQL statements in the code. I was able to re-write the first one to calculate unique picks after the season started but haven’t figured out how to update it for after the All-Star Break. I don’t have the patience to learn SQL right now, so she is going to help me with those when she’s on spring break from the University of Minnesota next week. From there, it will be time for deployment &#8211; and just in time, as players will have about ten days from deployment to when picks are due and the Major League Baseball season starts.

[Pyramid][4] is just a joy to work with and I’m so thankful for the [Talk Python course][7] that taught me to use it. (I wish Pyramid had 20% of mindshare that Flask does. Maybe it does where it matters, but there is just so much on the web about Flask that it feels like it doesn’t).

The best part about writing MLBPool2 though is my confidence level in coding in Python has increased greatly. I’m doing things in MLBPool2 that I didn’t do in NFLPool &#8211; from manipulating datetimes, string manipulation, a lot more if / else statements, Slack integration, and more advanced Chameleon templates. I’m sure there are lot of areas that are still not Pythonic enough, but I feel more confident and I know the learning won’t stop. I’ll try and write some more blog posts about what I’ve learned and how MLBPool2 differs from NFLPool (and what I want to add back into NFLPool.)

 [1]: https://nflpool.xyz
 [2]: http://mlbpool2.com/
 [3]: http://mlbpool2.com/rules/mlbpool2-rules/
 [4]: https://trypyramid.com
 [5]: https://github.com/kennethreitz/maya
 [6]: https://pendulum.eustace.io/
 [7]: https://training.talkpython.fm/courses/explore_entrepreneurs/python-for-entrepreneurs-build-and-launch-your-online-business