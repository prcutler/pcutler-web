---
title: Quack – An update on GNOME 3.0 Help
author: Paul Cutler
type: post
date: 2010-05-11T01:59:11+00:00
url: /blog/2010/05/quack-an-update-on-gnome-3-0-help/
categories:
  - Documentation
  - GNOME
tags:
  - docbook
  - docs
  - Mallard
  - user help
  - wosdocs
  - yelp

---
One of the big improvements for GNOME 3.0 is new user help.  The [Documentation Team][1] is using [Mallard][2] to re-write the GNOME User Guide and a number of applications help files as well.

In GNOME today, most help files are written in a very linear structure by chapter using Docbook XML.  If you&#8217;re a user looking for help, it&#8217;s not always easy to find the right chapter that contains the topic you&#8217;re looking for help with.

Topic based help aims to fix that.  And to write topic based help, the GNOME Docs team will be using Mallard, a new XML language written by [Shaun McCance][3] aka the GNOME Documentation Project&#8217;s Fearless Leader.

The hardest part about writing good help (in any markup) is **planning, planning, planning**.  _What feature might the user need help with?_ _Where will they get stuck?_ _How should the topics be organized?_

From there, you write help that&#8217;s in the second person in a conversational tone to help the user.  (And choosing the right words is important as well to help the localization teams out, too).

Let&#8217;s use [Tomboy&#8217;s][4] help to compare.

Tomboy help in GNOME 2.30 using Docbook:

[<img class="alignnone size-full wp-image-1354" title="tomboy2-30" src="https://i2.wp.com/www.paulcutler.org/blog/wp-content/uploads/2010/05/tomboy2-30.png?resize=514%2C491" alt="Tomboy 2.30 Help" width="514" height="491" srcset="https://i2.wp.com/paulcutler.org/blog/wp-content/uploads/2010/05/tomboy2-30.png?w=514 514w, https://i2.wp.com/paulcutler.org/blog/wp-content/uploads/2010/05/tomboy2-30.png?resize=300%2C286 300w" sizes="(max-width: 514px) 100vw, 514px" data-recalc-dims="1" />][5]

Tomboy help re-written into topic based help for GNOME 3.0:

<div id="attachment_1359" style="max-width: 619px" class="wp-caption alignnone">
  <a href="https://i0.wp.com/www.paulcutler.org/blog/wp-content/uploads/2010/05/tomboy-3-0.png"><img class="size-full wp-image-1359" title="tomboy-3-0" src="https://i0.wp.com/www.paulcutler.org/blog/wp-content/uploads/2010/05/tomboy-3-0.png?resize=609%2C724" alt="Tomboy Help for GNOME 3.0" width="609" height="724" srcset="https://i2.wp.com/paulcutler.org/blog/wp-content/uploads/2010/05/tomboy-3-0.png?w=609 609w, https://i2.wp.com/paulcutler.org/blog/wp-content/uploads/2010/05/tomboy-3-0.png?resize=252%2C300 252w" sizes="(max-width: 609px) 100vw, 609px" data-recalc-dims="1" /></a>
  
  <p class="wp-caption-text">
    Tomboy help re-written in Mallard
  </p>
</div>

(And there are a number of topics you can&#8217;t see in the screenshot such as Common Problems, Advanced Actions and What&#8217;s New.)

The goal is to help users get to the help they need fast.  There&#8217;s always been a bit of an in-joke that users don&#8217;t read the help.  We&#8217;re aiming to change that.  When they need help, we need to present it quickly and easily.  (Which also ties in to the work [Shaun is doing in Yelp 3.0][6]).

For GNOME 3.0, we are going to re-write the GNOME User Guide.  This will be a difficult challenge due to the amount of information currently in the guide as well as GNOME Shell and the user interface being in development and we need for it to stabilize before writing the docs.  Shaun, Milo and Phil did a lot of planning around the user guide at the Desktop Help Summit this past April in Chicago.

In addition to this herculean task, a number of applications are in process of getting new help or replacing their old help with topic based help, including:

  * Banshee
  * Brasero
  * Cheese
  * F-Spot
  * gLabels
  * Rhythmbox
  * Tomboy

On a personal note, I finished Tomboy&#8217;s help and started Banshee&#8217;s help this weekend on the plane coming back from the Marketing hackfest.  I&#8217;d also like to thank Harold Schreckengost who just joined the docs team last month and has already started, if not finished, topic based help for Brasero and F-Spot.  (I committed the F-Spot help tonight on his behalf in a new branch &#8211; _docs_).

If you&#8217;re an application developer and you know of your help being written or re-written in Mallard, please [add it to the list on the wiki][7].  App maintainers also may need to re-work the way help is called from the menu and help the doc writers review any new documentation for accuracy.  (_Thanks in advance!_)

If you&#8217;re a documentation writer, please visit the page above as well for examples on how we plan our writing for help and the Docs wiki has a lot of other great information for getting started too.  Take it from me, writing in Mallard is much easier than Docbook, and now is a great time to get involved with the Docs team and writing new user help as we&#8217;re all learning the new language and we can make a big impact on GNOME 3.0.

 [1]: http://live.gnome.org/DocumentationProject
 [2]: http://www.projectmallard.org
 [3]: http://blogs.gnome.org/shaunm
 [4]: http://projects.gnome.org/tomboy/
 [5]: https://i2.wp.com/www.paulcutler.org/blog/wp-content/uploads/2010/05/tomboy2-30.png
 [6]: http://blogs.gnome.org/shaunm/2010/03/11/more-yelp-3-0-location-entry/
 [7]: http://live.gnome.org/DocumentationProject/Planning