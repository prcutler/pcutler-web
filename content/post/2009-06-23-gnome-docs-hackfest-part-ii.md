---
title: GNOME Docs Hackfest Part II
author: Paul Cutler
type: post
date: 2009-06-23T02:47:20+00:00
url: /blog/2009/06/gnome-docs-hackfest-part-ii/
categories:
  - Documentation
  - GNOME
  - Linux
tags:
  - docs
  - woscon
  - wosdocs

---
Day three of the [Writing Open Source][1] conference was our hackfest. I previously [showed off Milo&#8217;s work in Part I][2], but it&#8217;s probably best to start at the beginning.

We started day three by applying some of what we had learned over the first two days. When writing, especially documentation, it is best to plan your work. This includes knowing your audience, their personas, and understanding their needs.

[Lynda Chiotti][3], with help from [Janet Swisher][4], led us through a brainstorming exercise. [Using a mind mapping tool, we brainstormed][5] what users want to do (and might need help with) when using their computer.

This was important for a few different reasons. For GNOME 3.0, we want to re-write the GNOME User Guide as topic based help using Mallard. Re-creating might be a better word, as we are going to switch licenses from the GFDL to CC-SA 3.0, and it&#8217;s probably easier to re-write it from scratch than to contact all the previous authors over the years to get permission. More importantly, we need to think like our users. How many times do we, as GNOME power users and developers, talk to ourselves, and not think like the average computer user? If this user needs help, does our documentation help them? Do they get frustrated and stop using GNOME or GNOME applications? We have a unique opportunity to use both our tools and the launch of GNOME 3.0 to radically improve our documentation and help our users.

After that, Phil, Milo, Shaun and I spent some time talking about how we could improve the GNOME Documentation Project. There were no sacred cows, and we&#8217;ve launched an effort to overhaul the docs team, including:

  * Adding simple tasks that new contributors can do and then build on (thanks Emma!)
  * Focusing the docs team on writers, editors, and translators. Each perform different, but similar roles, including crossover. We need to improve our tools for each team, and communication.
  * Holding more regular meetings, including a monthly project meeting, and weekly community sessions to encourage participation
  * Developing a roadmap of tasks we want to accomplish, including both the documentation itself and the tools 
  * Understanding Shaun&#8217;s role as our fearless documentation project leader, and how we can help him to free him up and not having the team be blocked on any one person.
  * Make a significant effort to coordinate with downstream distributions, including meetings and communication, introducing Mallard, and better comments within documentation.

And that&#8217;s just the recap! Our wiki space is going through a revamp as we bring this to life, and there is a lot more to come.

Lastly, while Phil and Milo started hacking on Empathy docs using Mallard, I jumped into Bugzilla. Almost half of our open bugs in gnome-user-docs were touched ([36][6] of 80), and of those 36, 23 were closed. Finally, 16 commits were made to update the current User Guide, including reviewing and patches from contributors. Fun fact (or embarrassing) &#8211; the oldest bug fixed was from July, 2006.

Overall, woscon was an amazing experience, and we all learned a lot. A few years from now, we&#8217;ll be able to look back and say: &#8220;We were there when this began&#8221;.

I think I speak for all of the GNOME Docs team members who were there, including Phil, Milo, and Shaun when I say we are sincerely thankful for the GNOME Foundation&#8217;s sponsorship of our travel to the Writing Open Source conference. This conference was the brain child of [Emma Jane Hogbin][7], and we are very grateful for all the time and effort she put in to organizing and hosting woscon.

 [1]: http://www.writingopensource.com
 [2]: http://www.paulcutler.org/blog/?p=1167
 [3]: http://www.chiotti.com/
 [4]: http://www.janetswisher.com/
 [5]: http://mail.gnome.org/archives/gnome-doc-list/2009-June/msg00006.html
 [6]: http://bugzilla.gnome.org/buglist.cgi?query_format=advanced&short_desc_type=allwordssubstr&short_desc=&product=gnome-user-docs&long_desc_type=substring&long_desc=&status_whiteboard_type=allwordssubstr&status_whiteboard=&keywords_type=allwords&keywords=&bug_status=UNCONFIRMED&bug_status=NEW&bug_status=ASSIGNED&bug_status=REOPENED&bug_status=NEEDINFO&bug_status=RESOLVED&bug_status=VERIFIED&bug_status=CLOSED&emailassigned_to1=1&emailtype1=substring&email1=&emailassigned_to2=1&emailreporter2=1&emailqa_contact2=1&emailcc2=1&emailtype2=substring&email2=&bugidtype=include&bug_id=&chfieldfrom=2009-06-14&chfieldto=Now&chfieldvalue=&cmdtype=doit&order=Reuse+same+sort+as+last+time&field0-0-0=noop&type0-0-0=noop&value0-0-0=
 [7]: http://www.emmajane.net/