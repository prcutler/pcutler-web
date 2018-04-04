---
title: 'Foresight 20/20 Recap: Development Process'
author: Paul Cutler
type: post
date: 2008-04-26T19:18:48+00:00
url: /2008/04/foresight-2020-recap-development-process/
categories:
  - Foresight
tags:
  - Foresight

---
One of the first sessions on Saturday was a discussion on [defining the development process][1] for Foresight. (Unfortunately this was a session I missed, but it sounded fairly technical anyway!)

Most developers have been committing packages to the 2-devel label (rather than :devel) and the decision was made to stick to 2-devel. Additionally, one big change is the concept of creating a new repository outside of Foresight for true development and big changes that are tested in this sandbox beore moving to fl:2-devel. In my opinion, this is a great idea, as it&#8217;s fairly easy for users to install packages from the 2-devel label. (Epiphany is a great example &#8211; right now in 2-devel it&#8217;s based on Webkit &#8211; a few users have encountered errors based on the Webkit dependencies needed). This should make it better for users, as the chance to break their desktop will diminish.

Labels for these new sandboxes will be based on the JIRA issues that define what the work being done is.

For more details, [see the JIRA issue discussing the new development process][1].

 [1]: https://issues.foresightlinux.org/browse/FP-7