---
title: Setting up Azure Pipelines - Part 2
author: Paul Cutler
type: post
date: 2019-06-20T21:00:00
categories:
  - Python
tags:
  - SilverSaucer
  - Python
  - Testing
  - Azure

---

[In Part 1, I covered the challenges I had in setting up my SSH key with Azure Pipelines](https://paulcutler.org/blog/learning-pytest-using-continuous-integration-with-azure-pipelines-or-ssh-key-hell-part-1/) 
to work with my existing Github repository, which contains a new Pyramid project without any customization (yet).

Now that Azure Pipelines could build my project, I spent the last week after that trying to figure out why builds 
would fail on Azure with Python 3.7, not with Python 3.6 or on my local development machine.

One question I was asked: *[Why continuous integration if I’m just a hobbyist?](#)*  I have two answers:

1. *Test-Driven Development with Python* by Harry Percival recommends it:  

	> “Rather than let that happen, we can automate the running of functional tests by setting up a “Continuous Integration” or CI server. That way, in day-to-day development, we can just run the FT that we’re working on at that time, and rely on the CI server to run all the tests automatically and let us know if we’ve broken anything accidentally. The unit tests should stay fast enough that we can keep running them every few seconds.”
	> 
	> Excerpt From: Harry Percival. “Test-Driven Development with Python.” Apple Books. 


2.  It’s cool.  And that’s the real reason.  Having the little “Azure Pipelines Succeeded” badge on the Github 
repo page; hooking up the Slack integration to get a message when a build builds or fails; and knowing I’m doing 
things like a “real” developer might.  

But I digress.  I set up Azure Pipelines to run two builds - one in Python 3.6 and one in Python 3.7.  After I make a commit to the SilverSaucer Github repository, Azure Pipelines automatically starts a job and builds the project.  

![Azure Builds](/images/failed-builds.png)


Two of the four tests passed.

The good news:  The two tests using Python 3.6 pass and it builds! 

The bad news:  The exact same two tests fail on Python 3.7. ([Log](https://gist.github.com/prcutler/2d2aa67280600f183cd27609b48af4e8))

I made sure my development machine’s version of Python matched Azure’s and upgraded from Python 3.7.1 to 3.7.3 
just to make sure - still failed.

I poked at it here and there for a few days and then asked for help in the Pyramid IRC channel.  Right away, I received advice to add `pysqlite3` and it worked!  I used `pip freeze` to update 
my `requirements.txt` file and made sure `pysqlite3` was in there, committed, and now I have a shiny badge on my repo.

I still don’t understand *why* it built on Python 3.6 but not Python 3.7.  But it’s working and time to move on.

*Coming in part 3:  Hooking up Dependabot and the Python 3.7 builds fail again.*