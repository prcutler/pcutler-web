---
title: Finishing Setup (with Dependabot and Pytest reporting) and Project Goals - Part 3
author: Paul Cutler
type: post
date: 2019-06-24T15:00:00
categories:
  - Python
tags:
  - SilverSaucer
  - Python
  - Testing

---

Part 1: [Setting up Azure Pipelines with SSH keys](https://paulcutler.org/blog/learning-pytest-using-continuous-integration-with-azure-pipelines-or-ssh-key-hell-part-1/)
Part 2: [Setting up Azure Pipelines](https://paulcutler.org/blog/setting-up-azure-pipelines-part-2/) (or watching it work on Python 3.6 and fail on Python 3.7)

## Using Dependabot to manage Python dependencies

I just want to start coding and learning how to write a Pyramid app the correct way and start learning `pytest`.  I’m going to do one more thing before getting to the fun part, the coding and that is setup Dependabot to help manage my Python dependencies.

Last year I bought a Python bundle on [Humble Bundle](https://humblebundle.com) that included a one year subscription to [Pyup.io](https://pyup.io).  I’ve been using it for both NFLPool and MLBPool2 as it’s free for open source projects (both of those projects are licensed under a MIT license).  I haven’t decided what license the content on SilverSaucer.com, but knowing me, it will probably be open source.  But on the off chance it’s not, I’m going to try out [Dependabot](https://dependabot.com/).

Github recently purchased Dependabot and made it free.  Visit [Dependabot](https://dependabot.com/), sign in with your Github profile and link which repositories you want Dependabot to help manage.

That’s it - Dependabot will keep an eye on your `requirements.txt` and send you Pull Requests when it finds a new version of a Python module for you to merge.

As I’ve integrated with Azure Pipelines for continuous integration, it builds the pull request and tells me if it failed or succeeded, which is nice to know before I merge it:

![Dependabot Details](/images/20190624/dependabot-merge-details.png)

But of the five pull requests Dependabot created, three of the five failed to build in Azure Pipelines:

![Dependabot failed builds](/images/20190624/dependabot-ci-failed.png)

And it’s the *exact* same error as I ran into in part 2 - the builds in Python 3.6 work and they don’t in 3.7 due to some kind of (and I’m guessing) SQLAlchemy / pysqlite3 problem.  (Log)

After even more troubleshooting, and if I had any hair (which I don’t, thankfully) I would have pulled it out.  I finally gave up and just merged them all.  It built locally and I figured future me could deal with it.  And then all the builds worked again.  I have no idea why.  I don’t know how real developers do this stuff.  But it’s working now, even with a couple smaller commits to update the README.

But when it does work, it feels great.  I had updated the README, which kicked off a build, and since I hooked up Slack to Azure Pipelines, I saw this:

![Azure working build](/images/20190624/azure-build-worked.png)

So now it’s setup just like the Test-Driven Development with Python says it should be.  From Chapter 24:

> “As our site grows, it takes longer and longer to run all of our functional tests. If this continues, the danger is that we’re going to stop bothering.
> Rather than let that happen, we can automate the running of functional tests by setting up a “Continuous Integration” or CI server. That way, in day-to-day development, we can just run the FT that we’re working on at that time, and rely on the CI server to run all the tests automatically and let us know if we’ve broken anything accidentally. The unit tests should stay fast enough that we can keep running them every few seconds.”
> 
> Excerpt From: Harry Percival. “Test-Driven Development with Python.” Apple Books. 

## Additional Tasks in Azure Pipelines

The Azure Pipeline docs are pretty great, including different things to configure based on the programming language you’re using.

For Python projects in [Azure Pipelines](https://docs.microsoft.com/en-us/azure/devops/pipelines/languages/python?view=azure-devops), there are two tasks to add:
1. Publish Test Results
2. Publish Code Coverage

I have a feeling these will come in handy later.

I’ve only played around with the HTML report code coverage generates a couple of times.  Looking at Azure DevOps, it looks kind of cool how they integrate testing into your dashboard.

In your project’s dashboard on Azure DevOps, go to *Test Plans* -\> *Runs*:  

![Azure Test Plans / Runs](/images/20190624/azure-test-runs.png)

Choose which test results you want to look at it and there are pretty reports for you to view, and if you keep scrolling down on the right hand side it will give you different outcomes for review.  It might save me a few clicks from the manual HTML code coverage builds, so I have that going for me.

![Pytest Results](/images/20190624/pytest-results.png)

## Project Goals

Now it’s finally time to start coding.  I have two goals:

1. Build a web app with the [Pyramid](https://trypyramid.com) web framework the correct way.   My first two projects used a module called `pyramid_handlers` to manage views.  This is an outdated way of writing code with Pyramid and I need to learn the modern way.
2. Use Test Driven Development methodology to *finally* learn how to write tests using `pytest`.  I’m going to write the test and then the code.

I’m not quite sure how I’m going to do this yet.  I think it’s going to be a lot of jumping around a couple different [Talk Python training courses](https://training.talkpython.fm).  (If you have a rudimentary knowledge of Python, I highly recommend Talk Python’s training courses). 

The course [Building data-driven web apps with Pyramid and SQLAlchemy]([https://training.talkpython.fm/courses/details/building-data-driven-web-applications-in-python-with-pyramid-sqlalchemy-and-bootstrap]) contains the knowledge on Pyramid and also includes a chapter on testing.  The recently launched [\#100DaysOfWeb in Python](https://training.talkpython.fm/courses/details/100-days-of-web-in-python) has a bunch of chapters that will be useful in my quest, including Pyramid, Selenium, and Unit Testing Web Apps.  That doesn’t even include things I want to eventually learn, like a Javascript introduction, CSS and more.  (Yes, I saw the recent Jetbrains survey results and 40%+ of Python developers are using Flask for web development- but I’d like to get *good* at Pyramid before I switch to a different framework.  And I really, really like the Pyramid community.  The same could be said about my Python knowledge before diving into Javascript).

So while I’m going to kind of Frankenstein my courses, I’m going to do it using TDD.  I’m not going to build a PyPI clone like [Building data-driven web apps with Pyramid and SQLAlchemy]([https://training.talkpython.fm/courses/details/building-data-driven-web-applications-in-python-with-pyramid-sqlalchemy-and-bootstrap]) teaches.  Silversaucer.com is just an online playground for me to keep learning, and the first thing I’m going to build is a Randomizer for my vinyl record collection using the Discogs API.  I’m going to work through the two courses above and I’ll also be using the following books to learn more about testing:

*[ Test-Driven Development with Python](https://www.obeythetestinggoat.com/) by Harry Percival
* pytest Quick Start Guide: Write better Python code with simple and maintainable tests by Bruno Oliveira
* [Python Testing with pytest](https://pragprog.com/book/bopytest/python-testing-with-pytest) by Brian Okken

I’ll keep blogging what I learn and where I get stuck.   I *need* to learn testing, especially if I want to continue maintaining and improving [NFLPool](https://nflpool.xyz) and [MLBPool2](https://mlbpool2.com).  And learning how to code is fun, in a frustrating kind of way (at times).  


