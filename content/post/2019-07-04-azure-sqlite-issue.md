---
title: Azure DevOps SQLite Issue - Part 4
author: Paul Cutler
type: post
date: 2019-07-04T09:00:00
categories:
  - Python
tags:
  - Azure
  - Python
  - Testing

---
* Part 1: [Setting up Azure Pipelines with SSH keys](https://paulcutler.org/blog/learning-pytest-using-continuous-integration-with-azure-pipelines-or-ssh-key-hell-part-1/)
* Part 2: [Setting up Azure Pipelines](https://paulcutler.org/blog/setting-up-azure-pipelines-part-2/) (or watching it work on Python 3.6 and fail on Python 3.7)
* Part 3: [Finishing Setup](https://paulcutler.org/blog/setting-up-azure-pipelines-part-2)


It turns out that all the problems I was having for about ten days in trying to learn Azure Pipelines for continuous integration that I [briefly touched on in Part 2](https://paulcutler.org/blog/setting-up-azure-pipelines-part-2/) had nothing to do with me.  There was a bug in Azure’s hosted images of Ubuntu used in the CI pipeline that did not include SQLite, as Python lists it as an optional module.

It’s good to know I’m not crazy and I did set it up right and this answers the question of why my builds would work on Python 3.6 but not Python 3.7.  Kudos to Microsoft for the [detailed post-mortem](https://status.dev.azure.com/_event/130756107/post-mortem) outlining the problem, what they did to fix it, and what they’ll do in the future to avoid something like this happening again.

In other news, I was distracted for a week to help a co-worker out with my first hardware project.  I wrote a few lines of code to turn on and off a small pump that is controlled by a Raspberry Pi.  I even wrote a test for it!

Lastly, I *almost* have [CodeCov.io](https://codecov.io/) integrated into my CI.  I make a commit, Azure Pipelines builds it and runs the tests, and the coverage report generated from the build is uploaded to CodeCov.io.  

Next I’ll finally start going through some of Talk Python training courses and use a TDD approach to write tests for what I’m learning.