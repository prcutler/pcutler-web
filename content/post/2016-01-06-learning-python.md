---
title: Learning Python
author: Paul Cutler
type: post
date: 2016-01-07T00:33:29+00:00
url: /blog/2016/01/learning-python/
categories:
  - Python

---
_(Orginally written in Day One on November 30th, 2015)_

I’ve decided to learn Python.

Not only do I have an itch to scratch, but I need a hobby (as I’ve said many times over the last few years since leaving the open source world.)

Python is supposedly one of the easier languages to learn as a complete beginner. It also is supposed to be good at web scraping, which fulfills a specific need I have.

I started the Codeacademy class for Python last week over the Thanksgiving holiday. I was about 15% of the way through it and then got hung up on Boolean operators. Not only did I find them confusing, but I have an issue with the way Codeacademy structured that chapter. They basically had you copy and paste the code into their editor, which for me, didn’t teach me anything. When it came time to do the quiz, I was hopelessly lost. After swearing about that for a few hours and taking a break, my subconscious kicked in and started thinking about it. I then realized that the Boolean operators are going to be exactly what I need to define if a player’s pick is a unique choice in our pool and to double the points for that particular pick.

But I’m getting ahead of myself.

In 2013, my friend Stone and I resurrected MLBPool, with the creative name of MLBPool2. This was a baseball pool he had been in for ten years that came to an end in 2011. You pick which teams will win and lose their division, individual leaders in hitting and pitching categories and that’s it. You earn double points if your pick is unique and no one else chose that team or person for that category. You can change your picks at the All-Star break, but those changes are only worth half points. That’s it &#8211; no daily lineups like fantasy. I call it _fantasy sports for the lazy_. Which is perfect for me.

This year we also started an NFL version, which I’m managing. It’s identical except there is no changing your picks at the half way point. I [manage the website for both at MLBPool2.com][1].

Every Tuesday morning I have to manually update the Google Sheet. The original MLBPool site was written in ASP and was doing web scraping to update the leaders. I have to believe there is a way to do that again and I’m hoping Python is the answer.

O’Reilly had a 60% sale over Black Friday, so I bought four books:

  * Introducing Python
  * Learning Python
  * Think Python
  * Python Pocket Reference

I’m all in.

The biggest challenge is that there are two versions of Python: 2.7 and 3.5. 2.7 is legacy and 3.x is the future. I even emailed an old friend that I haven’t talked to in a few years that I know uses Python. (I’m terrible about staying in contact with people, but that’s a different story for another day). My CentOS server on Digital Ocean runs 2.7, as does my Mac. He also recommended I start with 2.7. But of course the books are focused on the latest and greatest. I’m hoping I don’t get too confused and can write clean code that works in both, but we’ll see. Worst case scenario is I learn 3.x code from the books and have to upgrade the server, but we all know how that usually turns out…

I need a hobby. I’m hoping I can stick with this. Even writing in my journal isn’t something I’ve stuck with for as long as I’ve liked, but I have to give it a go. I’m hoping by the 2017 season I’ll have a beta that’s working, so I have a year and a half.

With the updates to Day One, maybe I should start a Python journal to document how it’s going. (Update: I have started a new journal in Day One called _Python_. I may even start blogging my adventures in Python on my personal blog or via DayOne.me).

_January 6th, 2016: And, look! I even started blogging my adventures!_

 [1]: http://mlbpool2.com