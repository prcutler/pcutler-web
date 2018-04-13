---
title: Foresight Bug Week
author: Paul Cutler
type: post
date: 2008-09-02T18:45:11+00:00
url: /blog/2008/09/foresight-bug-week/
categories:
  - Foresight
tags:
  - bugs
  - Foresight
  - JIRA

---
Foresight Bug Week kicked off Sunday, and we&#8217;re off to a good start.

As I mentioned in my [last bug week post][1], Foresight has just under 600 issues open in some status or another. (Issues can be improvements, tasks, bugs or package requests).

In the first two days:

  * 15% of all open issues have been touched (about 90)
  * 34, or just over 33% of those touched, were marked as resolved or fixed
  * 56 were triaged and assigned

Out of the 56 that were triaged, the majority of them were package requests that moved from fl:2-devel to fl:2-qa for testing. This means after some testing, these can be promoted to Foresight 2 and closed as well! You can easily search for issues assigned to Foresight QA Team to see which packages need testing.

The other major change to Foresight&#8217;s issue tracker, JIRA, was that I created a new generic user, Packagers. Foresight&#8217;s JIRA has two generic users &#8211; _Distro_ (jira-distro), which all issues are assigned to by default (which makes it easy to triage), and now _Packagers_ (jira-packagers). This way, Foresight contributors who want to help out and create packages, can easily search by this user to see what package requests are outstanding. Most package requests still need to be triaged and assigned to _Packagers_.

In creating the Packagers user, I realized this weekend that we both of those users use a private mailing list we created. A number of core developers are subscribed to this list, and all issues created in JIRA are automatically emailed to this list. The same is true for the Packagers list, though it only emails those issues assigned to the _Packagers_ user. If you would like to be added to either the JIRA mailing list (high volume) or Packagers mailing list, please drop me an email at pcutler at foresightlinux dot org and I will add you. This makes it easy to keep up in real time on JIRA activity if you so choose.

How you can help during Foresight Bug Week:

  * Join the Foresight QA team! Add your name to the list on the [QA space in the wiki][2], and read through the QA documentation.
  * Triage, triage, triage! Are issues assigned to the right developer? Including package requests to Packagers. For a list of what developers should be assigned certain issues, take a look at the [Foresight QA triaging wiki page][3]. Is the issue assigned to the right person, is the component correct (for example I just fixed an issue that was assigned to the PackageKit component, but it was a Package request), is the serverity correct?
  * Test packages! Once a package request has been made, a few different things can happen. The packager might have built it and committed it to their personal repo, as they may not have access yet to Foresight&#8217;s repo. Install it and test it! Maybe the packager only could build it for x86, and not x86_64. Check out the recipe, and build it against both arches. (Give the original packager credit in the recipe file and bug report). Commit it to Foresight&#8217;s 2-devel repo or your personal repo and update the issue accordingly. When it&#8217;s ready to be tested, make sure it&#8217;s assigned to the Foresight QA team. Once it&#8217;s tested, it&#8217;s assigned to Ken to promote to fl:2.
  * Confirm bugs. Can you reproduce it? Comment on the issue with your findings. Check upstream &#8211; almost all packages will have their own issue tracker, and search to see if it&#8217;s been reported. If so, link to it in the Foresight issue tracker. Good story &#8211; Banshee has a bug that the first time you run it, it won&#8217;t run from the menu, only the terminal. I searched for about 15-20 minutes in Banshee&#8217;s bugzilla, but couldn&#8217;t find it, so created a bug in Banshee&#8217;s bugzilla and linked to Foresight&#8217;s issue and forums, as well as an Ubuntu forum post confirming the bug. Sure enough, it was closed almost right away in Banshee&#8217;s bugzilla as a duplicate, I just hadn&#8217;t searched hard enough. I linked to it, and within hours Ken applied the patch in Banshee&#8217;s bugzilla, and Foresight&#8217;s Banshee is now fixed. And the issue is closed!
  * Can you write code? We have lots of improvements filed, from Extlinux boot themes ([FL-1532][4]) to adding Encryption / LUKS support ([FL-313][5]) to [PackageKit improvements][6]. While Ken and doniphon may do the majority of Foresight development, it doesn&#8217;t have to be this way, and I know for a fact they would love more volunteers.
  * Need help or have a question? Ask! Join the QA team in #foresight-qa on Freenode IRC. We won&#8217;t bite, I promise.

As we continue to improve Foresight&#8217;s JIRA, my goal in the future is to publish bug stats bi-weekly. From there, I can better use JIRA&#8217;s features and build a roadmap to document how we will continue to improve Foresight.

I&#8217;d like to thank everyone who has helped out so far this week in lending a hand. A special shout out to pscott, zodman and jayson\_r. Pscott for the cool IRC bot that is talking to JIRA, zodman for a number of recipes I was able to cook in x86\_64 and get in to Foresight, and Jayson has dived right in and helped triage. I will be traveling the next two days, but will be back Thursday to help with more issues!

 [1]: http://www.paulcutler.org/blog/?p=1027
 [2]: https://wiki.foresightlinux.org/display/teams/Quality+Assurance
 [3]: https://wiki.foresightlinux.org/display/teams/HowTo+Triage+Bugs+in+JIRA
 [4]: https://issues.foresightlinux.org/browse/FL-1532
 [5]: https://issues.foresightlinux.org/browse/FL-313
 [6]: https://issues.foresightlinux.org/secure/IssueNavigator.jspa?reset=true&mode=hide&pid=10000&sorter/order=DESC&sorter/field=priority&resolution=-1&component=10040