---
title: Studying vs. Learning
author: Paul Cutler
type: post
date: 2017-08-04T11:33:08+00:00
url: /2017/08/studying-vs-learning/
categories:
  - Python
tags:
  - NFLPool
  - Pyramid
  - Python

---
I came across a thread on [/r/LearnPython][1] a few weeks ago that summed up my experience with Python. The thread was the typical “I’m learning Python, but I feel stuck and I’m not learning”. Someone replied with encouragement, and pointed out that studying Python is very different than learning Python and how it works.

I can relate. It’s been just over a year since I started down this path and almost two years (where does the time go!) since I decided I wanted to learn Python.

I started by buying a couple of books. That didn’t work for me at all &#8211; I don’t learn from reading and trying to apply the exercises. The Python for Everybody specialization at Coursera that I took last summer, with the video lectures and online exercises was the first time I felt I was actually learning. But in actuality, I was still studying. The same with the Python Jumpstart course. Having gone through Python for Entrepreneurs, and finally starting to apply what I’ve studied, I feel that I’m now learning.

Even though a large chunk of what I’m building in the NFLPool web app using Pyramid is copying and pasting from Python for Entrepreneurs, I’m starting to feel confident that the concepts are sticking.

As of Wednesday, I had a couple of the bigger components working. Users can visit the website and register, and the site recognizes when they’re logged in and out. I also created an admin panel that creates a new install and imports the NFL team information into one of the database table. This information is static and never needs to be updated. It uses a GET / POST / REDIRECT pattern and then redirects to the next page to insert all of the active NFL players for the new season.

Yesterday I sat down and needed to change this. Mr. Kennedy is always talking about the GET / POST / REDIRECT pattern , and though I thought I understood it, when I built the first one above, it took me a bit to get the redirect working. But I needed to change it so the next redirect would create a form to update the database for a new season and then redirect to import the active players.

I sat down and wrote the template and HTML code for the page, then wrote the controller for the GET / POST / REDIRECT routes, and then the service to interact with the database. I did this for the first time without referencing the training materials! The sense of accomplishment was huge. Not only was I writing code for the Pyramid web framework correctly, I was using requests and JSON to get the data MySportsFeed, manipulate it, and then put it in the database.

Of course, later yesterday, I wanted to write it so when you updated to a new season, it took a variable from a form rather than be hardcoded, and was stuck for two hours when it work. But it turned out it wasn’t the Python code &#8211; after my wife helped me for an hour, we realized it was the HTML form that had the error. So that was big, too &#8211; the Python code was right! It was just my lack of knowledge around HTML causing the latest headache.

Now I have two big things for the weekend:

  1. Re-write all of the requests so they’re not hardcoded and pass the season attribute from the database to the request so every year I don’t have to update the code.
  2. Right the controller and service for players to make their picks. This one is going to be tough &#8211; I’ll need to grab the user ID from their logged in session (which I’m not 100% sure how to do yet) and then grab a lot of stuff from the database and put it into a dropdown box for selection &#8211; which I also have no idea how to do. I feel ok that I know how to do the query, but putting the query results into a dropdown box is scary.

Either way, for the first time, I’m applying what I’ve studied &#8211; and I finally feel that after over a year I’m actually _learning_ Python.

 [1]: https://www.reddit.com/r/LearnPython