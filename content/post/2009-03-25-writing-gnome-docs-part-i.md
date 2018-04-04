---
title: Writing GNOME Docs, Part I
author: Paul Cutler
type: post
date: 2009-03-25T14:22:06+00:00
url: /2009/03/writing-gnome-docs-part-i/
categories:
  - GNOME
  - Linux
tags:
  - docbook
  - Documentation
  - GNOME

---
It&#8217;s been just over a year since I submitted my first patch to GNOME, for updated Tomboy documentation.

In that time, Shaun McCance of the GNOME Documentation team has been doing a lot of work to make it easier to get involved with the GNOME docs team.

Though Shaun is trying to make it easier to see which projects might need help with documentation updates, it&#8217;s still kind of overwhelming to try and figure out where to get started, especially as some of the information on the GNOME Docs team is outdated.

The [Docs Team page][1] on the GNOME wiki is a great place to start. Let&#8217;s take a look at a number of the steps it lays out, and I&#8217;ll try out point out where, in my opinion, some of the important steps lay and additional tools available, such as Pulse.

**Step 1 & 2**: Join the [mailing list][2] and IRC, as it refers to.

**Step 3 & 4**: Choose a project and document to work on. First, you should choose a project that interests you, and that you may know a little about. Here is a quote from Shaun McCance to the GNOME Docs mailing list on 5/8/08:

> My general recommendation to new writers is to pick
  
> an application manual for something you use frequently.
  
> It&#8217;s easier to write documentation for an application
  
> you&#8217;re familiar with. Smaller manuals will allow you
  
> to go through the entire writing process and actually
  
> finish something. Finishing things feels nice.

The good news is that this is one area Shaun is making easier with the [Pulse][3] project. Pulse isn&#8217;t officially released yet, and is run manually by Shaun. Pulse tracks all of the software in GNOME, including documentation and translations.

In January, [Shaun sent an email][4] to the GNOME Docs list that helps understand this process better, especially as it relates the GNOME 2.26 process, and with some updated steps that aren&#8217;t covered in the wiki:

When looking for documentation to work on, you can use Pulse to help sort:

Use Pulse to view all GNOME 2.26 documentation: [http://www.gnome.org/~shaunm/pulse/web/set/gnome-2-26-desktop#documents
  
][5] 
  
Pulse can show which docs don&#8217;t have a specific individual as a maintainer, and will display GDP (GNOME Documentation Project) if it doesn&#8217;t. It&#8217;s recommended to start with a document maintained by the GDP to work on. Follow this link: <http://www.gnome.org/~shaunm/pulse/web/team/userdocs#documents> and click on &#8220;Maintainer&#8221;. That shows the list of all projects maintained by the GDP. One of the advantages of working on a document maintained by the GDP is once your documentation move to the final state, the GNOME Docs team can commit the changes for you, as they are pre-approved with the maintainers of that project.

For my example though, wanting to update the Tomboy docs that I worked on a year ago, Tomboy is not maintained by the GDP. That&#8217;s ok &#8211; I&#8217;ve worked with one of the lead developers before, and I let him know in IRC that I was going to being working on documentation.

Going back to the [Pulse list of documents][5], and clicking all, I then will choose and click on Tomboy.

Looking at the upper right hand corner of the Tomboy page in pulse, you will see:

> Release Info
  
> Status:
  
> None

Familiarize yourself with the Status definitions that Pulse will display: <http://live.gnome.org/DocumentationProject/StatusTracking>

None &#8211; great! This is the document I&#8217;ll start working on as no one has started working on it yet.

**Step 5**: Going back to the [GNOME Docs Wiki][1], step 5 is familiarizing yourself with the [GNOME Style Guide][6].

The sections I found most useful, was [Chapter 1, Fundamental Concepts][7], especially the sections on Tone and the Golden Rules. [Chapter 7, Writing for GUIs][8], is good to cover as well.

When it comes to writing Docbook though, the best advice I can give is to jump in to a document &#8211; you&#8217;ll quickly learn the syntax with or without prior programming experience. I have zero programming experience outside of some very basic HTML , and by looking at a couple of different pieces of GNOME documentation, was able to write the Foresight User Guide in Docbook.

**Steps 6 & 7**: Create accounts in [GNOME Bugzilla][9] and the [GNOME Wiki][10] (aka live.gnome.org).

The only other advice I can give, especially as it relates to IRC and the mailing list, is to drop a note and introduce yourself, and let the community know you want to help out. All of this might sound complicated, but instead of spending hours wading through all of the documentation and webpages available (some of it really out of date), I think if you read the above steps it will start to make sense (at least it did for me!)

In Part 2, I&#8217;ll cover my experience in some of the basics around using SVN to check out a project, updating the status and the documentation, and submitting a patch.

 [1]: http://live.gnome.org/DocumentationProject/Join
 [2]: http://mail.gnome.org/mailman/listinfo/gnome-doc-list
 [3]: http://www.gnome.org/~shaunm/pulse/web/
 [4]: http://mail.gnome.org/archives/gnome-doc-list/2009-January/msg00028.html
 [5]: http://www.gnome.org/~shaunm/pulse/web/set/gnome-2-26-desktop#documents
 [6]: http://library.gnome.org/devel/gdp-style-guide/2.26/
 [7]: http://library.gnome.org/devel/gdp-style-guide/2.26/fundamentals.html.en
 [8]: http://library.gnome.org/devel/gdp-style-guide/stable/gui-1.html.en
 [9]: http://bugzilla.gnome.org/
 [10]: http://live.gnome.org/action/login/DocumentationProject/Join?action=login