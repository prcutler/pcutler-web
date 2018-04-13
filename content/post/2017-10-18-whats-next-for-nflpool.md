---
title: What’s next for NFLPool
author: Paul Cutler
type: post
date: 2017-10-18T12:59:42+00:00
url: /blog/2017/10/whats-next-for-nflpool/
categories:
  - Python
tags:
  - Pytest
  - Python

---
[NFLPool][1] has been up for six weeks and everything is working great. I’ve been updating the standings every Tuesday without any issues. I’ve taken the last month to catch my breath after my massive coding spree to get it launched and I’ve been thinking about what’s next. I have a few options:

  * Add some tests (all Python projects should have tests written, right?)
  * Adding documentation in reStructured Text to NFLPool
  * Re-visit some of the Python trainings now that I have a basic grasp of Python and learn some more “advanced” concepts (generators, list comprehensions, etc.)
  * Work more on the NFLPool admin panel (manage users better, add the ability to manage if a user has paid for the season, and a few more ideas)
  * Port NFLPool from SQLite to MySQL
  * Start working on [MLBPool2][2] based on the NFLPool codebase

The choice became an easy one as a couple of weeks ago I was asked by [Brian Okken][3] if I would like to review a copy of his new book, [Python Testing with pytest][4].
  
<img class="alignnone size-full wp-image-6783" src="https://i0.wp.com/paulcutler.org/blog/wp-content/uploads/2017/10/pythontesting.jpg?resize=190%2C228&#038;ssl=1" width="190" height="228" data-recalc-dims="1" />
  
I shared with Brian that I’m coming at this from the perspective of someone new to Python &#8211; I’ll be digging into the book this weekend and I’ll be blogging my progress on adding tests to my project with what I’ve learned.

Thanks Brian for the review copy and I’m excited to learn about testing in Python!

 [1]: https://www.nflpool.xyz
 [2]: http://www.mlbpool2.com
 [3]: http://pythontesting.net
 [4]: https://pragprog.com/book/bopytest/python-testing-with-pytest