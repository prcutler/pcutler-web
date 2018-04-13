---
title: GNOME Documentation – Irony 101
author: Paul Cutler
type: post
date: 2007-05-27T22:44:52+00:00
url: /blog/2007/05/gnome-documentation-irony-101/
categories:
  - Foresight
  - GNOME
  - Linux
  - Technology

---
Now that I have a few newsletters under my belt for Foresight Linux and completed the Getting Started user guide on the wiki, my next two big projects for Foresight are porting the Getting Started guide from the wiki to Docbook for inclusion in Yelp on a default Foresight installation, and getting some screencasts recorded and posted to the Foresight wiki.

With newsletter #3 out the door, and an hour or two on my hands, I decided to jump in and start learning some basics of Yelp, Docbook and contributing to GNOME documentation. I started off keeping track of some interesting links I was coming across in Tomboy, and as my frustrations grew, it became a live journal of my research in to contributing to GNOME documentation. What follows is the unedited thoughts that ran through my brain for just over an hour as I looked for content on where to start on this journey.

The good thing I&#8217;ve learned in this process is what needs to be updated to make it easier for folks who want to help out GNOME and it&#8217;s documentation. Docs are one of the easiest areas for a new volunteer to get involved with, and now that I&#8217;ve complained publicly about my experiences, I&#8217;ve added it to my to-do list to try and make this better. (But it&#8217;s down on my to-do list after Foresight documentation in Yelp and screencasts. And maybe the new Foresight website, we&#8217;ll see).

Without further adieu, here are my notes:

**
  
GNOME Documentation**

Documenting my learnings on contributing to YELP

15:45 &#8211; Start looking on the GNOME wiki and Google

<http://live.gnome.org/DocumentationProject>

(last update in October 2006)

<http://live.gnome.org/ProjectMallard> (next generation GNOME docs tool in development)

15:55 join IRC (#docs on GIMPnet)

Continue to use the Wiki and Google:

<http://live.gnome.org/DeveloperGuides> (could be a gold mine, lots of links)

<http://live.gnome.org/IdealDeveloperDocumentation> (A wishlist of perfect documentation, last updated last August)

<http://developer.gnome.org/projects/gdp/handbook/gdp-handbook/index.html> (last update 2003, this had to be the bible for doc developers once upon a time)

[http://www.ibiblio.org/oswg/oswg-nightly/oswg/en\_US.ISO\_8859-1/articles/DocBook-Intro/docbook-intro/][1] (Linked from the GDP handbook above, it&#8217;s from 1999!)

16:05: Edit the GNOME wiki with a broken link to the non-existent style guide:

<http://live.gnome.org/DeveloperGuides>

16:10 Ask for help in IRC (no response, but I&#8217;m patient)

16:15 Find new links that look helpful:

<http://live.gnome.org/DocumentationProject/Contributing>

<http://live.gnome.org/DocumentationProject/Contributing/SubmittingPatches>

16:18 Complain in #foresight about the irony in that getting started with the GNOME documentation team isn&#8217;t really documented

16:24 Realize the link above on SubmittingPatches is also horribly outdated as GNOME has moved to subversion

Make mental note that I should be probably updating the GNOME documentation personally with these learnings. Add to to-do list in Tomboy

16:29 Thilo agrees with me in IRC, and reinforces an opinion I have too:

thilopfennig: pcutler_: yeah
  
thilopfennig: thats true
   
even simple links are broken
   
and nobody cares really

That last sentence bothers me, as I had the same thought. Perception is reality.

16:31 Pull up the GNOME SVN wiki page and prepare to checkout some help files to browse through as a base:

<http://live.gnome.org/SubversionFAQ>

16:36 first 2 projects svn co doesn&#8217;t work, try with epiphany, but it pulls the whole source, and not the help files. keep reading through LGO. Quite frustrated.

16:43 Pull down Gedit files. Realize that I was pulling the help files correctly with SVN, but still can&#8217;t find english versions. Mistakenly ask for help in IRC, when I did do it right.

16:46 Remind self it&#8217;s a holiday weekend in US on a Sunday afternoon, of course no one is going to respond.

16:48 Open Gedit, and start browsing through source files. In the Help directory, the &#8220;C&#8221; subdirectory has &#8220;gedit.xml&#8221; &#8211; I found the file! Why is it in the C directory if it&#8217;s American English? Who thinks of these things? All the other files I pulled down were correct as well.

16:55 Finish scrolling through gedit.xml after opening the files in Yelp for comparison. Docbook looks fairly sane, if just overly, well, there&#8217;s a lot to it, but it&#8217;s fairly logical. Overwhelmed by the sheer amount of work porting the userguide from the wiki to Docbook will be, but it&#8217;s doable.

16:56 Walk away. Remind self to blog this.

 [1]: http://www.ibiblio.org/oswg/oswg-nightly/oswg/en_US.ISO_8859-1/articles/DocBook-Intro/docbook-intro/