---
title: Foresight Bug Week Wrap-Up
author: Paul Cutler
type: post
date: 2008-09-08T18:37:09+00:00
url: /blog/2008/09/foresight-bug-week-wrap-up/
categories:
  - Foresight
tags:
  - bugs
  - JIRA

---
Foresight Bug Week wrapped up yesterday. I was pretty excited as it seemed we touched a number of issues. Upon further review, we still have a lot of work to do!

Some stats on the last 9 days of working on the issues (hope the formatting works):

9/1/2008 9/8/2008 Net Change
  
Total issues: 1644 1661 17
  
Open issues: 597 546 -51
  
In progress: 19 26 7
  
Resolved: 578 614 36
  
Closed: 322 372 50
  
Needs QA: 106 116 10

Open Issues (By Priority)

Blocker: 2 2 0
  
Critical 22 20 -2
  
Major: 66 56 -10
  
Normal: 505 491 -14
  
Minor: 57 53 -4
  
Trivial: 9 10 1

I&#8217;m happy to report that Package Requests, which make up about 20% of all issues in JIRA, have been assigned to the new Packagers ID, making it easy for our crack team of packaging experts to search for stuff to do. (Which I blogged about last week).

I personally spent some time porting packages from the fl:1 repo and user contributed repos to Foresight, and closed those package requests. (It&#8217;s so much easier when someone has already written the recipe for me!)

What the stats above don&#8217;t show is the number of total issues touched, which a report I ran in JIRA puts at 275 (about 30% of all issues in JIRA, both opened and closed). This includes linking duplicates, commenting on bugs if more information is needed, etc. At the end of the day, 5% of all bugs (86) were closed and / or resolved last week, which is a good start.

Next steps:

Out of the open issues, 30% (191) remain assigned to Distro &#8211; which means they need to be assigned to a developer to be addressed. Issues needing QA &#8211; which means the packages need to be tested, is 7% (116). We also have 19% (123) open package requests assigned to the Packagers ID. Poor Ken (138) and doniphon (82) have the most issues assigned to them, so give &#8217;em a hand and help them out! Test some packages that need QA, and comment on the issue, or if you have time, package some applications that our users have requested.

This is just the beginning of a more regular QA / Bug Triaging process. It was a good first step, and thank you to everyone who lent a hand last week to help out, and I look forward to more help in the future.