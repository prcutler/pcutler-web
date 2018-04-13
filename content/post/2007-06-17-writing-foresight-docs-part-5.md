---
title: 'Writing Foresight Docs:  Part 5'
author: Paul Cutler
type: post
date: 2007-06-18T01:18:20+00:00
url: /blog/2007/06/writing-foresight-docs-part-5/
categories:
  - Foresight
  - GNOME
  - Linux
  - Technology

---
No, your eyes aren&#8217;t fooling you, the Getting Started with Foresight Linux User Guide is complete, and ported to Docbook. (Click through to see a larger picture at flickr.com):

[<img src="https://i0.wp.com/farm2.static.flickr.com/1124/561739487_b15d9f82c5.jpg?resize=500%2C450" width="500" height="450" alt="foresight-userguide1" data-recalc-dims="1" />][1]

I was traveling for most of the week for my day job, but I did a little writing after last weeks post, then a flurry of activity Friday and Saturday. Last week, I was mostly content complete, with tons of formatting left to complete in almost every document, including:

  * Linking all URLs
  * Fixing all bullet points
  * Adding arrows to directions for clicking in the menu
  * Fixing the indentation errors
  * Resizing all screenshots to 510 pixels wide

The above items were almost all completed Friday, but I still hadn&#8217;t started the biggest challenge, which was writing a Table of Contents. Looking through the source code of various other Yelp / Docbook files, I had seen a number of pages calling other Docbook pages, such as the GNOME Documentation Project Handbook, for inclusion using this tag:

`[include href="filename.xml" xmlns="http://www.w3.org/2001/XInclude"/]`

In the end, I ended up using the ENTITY tag, as found in the GNOME Documentation Style Guide, which consists of listing all the files in alphabetical order at the top, and then calling each one in the order you want within the `[book]` tag:

 `[!ENTITY APPLICATIONS SYSTEM "applications.xml"]`

`&APPLICATIONS;`

I borrowed heavily from the GNOME Documentation Style Guide&#8217;s structure and code, in writing the default page (foresight-user-guide.xml) and create a Preface chapter. This chapter is new as of yesterday, and includes an &#8220;About&#8221; section, &#8220;What&#8217;s in this Guide&#8221; with links to each Chapter and it&#8217;s summary, and a &#8220;Who Should Read this Guide&#8221; which breaks out by chapter for new or experienced Linux users the chapters they might find the most relevant.

This required me to rewrite the first 75 lines of each of the 9 Docbook files that currently make up the userguide, and change them from using sect1 tags, to using chapter tags. This actually makes it much more simpler for future contributors to add to the book, as they write their chapter and don&#8217;t have to worry about filling out all the revision history in each file, it&#8217;s updated in the foresight-user-guide.xml file instead of each individual one. I got in the zone and knocked all the files out last night, and submitted them to the Mercurial repo.

There is one bug I have yet to solve:

[<img src="https://i2.wp.com/farm2.static.flickr.com/1336/561739489_ba4309f370.jpg?resize=500%2C450" width="500" height="450" alt="foresight-userguide-helpbug" data-recalc-dims="1" />][2]

In two different sections of the Userguide, the &#8220;Help&#8221; section is called, both in the Preface chapter, and it references the IRC help sub-topic instead. A bug-hunting we will go.

I am sure that I haven&#8217;t done everything in the right order or by the book &#8211; for example, I&#8217;ve found references that GNOME developers use `make` to write documentation files, I can guess to why, but I&#8217;m not sure, nor can I figure out how they&#8217;re set up. I&#8217;m also not sure on the translation process, other than editing the files by hand but I&#8217;ve never created a program either that has had to use a `po` file.

I&#8217;m also darned if I can find where Yelp, when you start the GNOME Help from System > Help, is calling the files on the right side under &#8220;Welcome to the GNOME Help Browser&#8221;. That&#8217;s where I want to put the userguide, but when you open /usr/share/yelp/toc.xml it only appears to be calling the links under &#8220;Desktop&#8221; on the left.

This has been a great experience so far, and isn&#8217;t even close to over. After I track down the bug and find a place for the userguide to live in the default documentation, it&#8217;s time to take Foresight documentation to the next level. The content written so far is not set in stone. In some cases, it only skims the top of what should be included in a given chapter, there are huge holes of information not even presented in the current guide, such as a better installation overview or printing, and more screenshots could be sprinkled throughout. Other sub-chapters could be written on specialized topics, such as installing on a Macbook or running OpenBox.

A process still needs to be developed to cull documentation on the wiki to live offline in the userguide. Documentation should be a living, breathing thing that grows with the operating system, not something that grows stale. (_Quick sidenote &#8211; the fact that GNOME still ships with the GNOME 2.14 Desktop Accessibility Guide and the GNOME 2.14 Desktop System Administration Guide in the default help page ticks me off to no end. Now that I have some limited experience with Docbook, it&#8217;s time to give back_). Taking user contribution submissions to the wiki and putting them in the userguide should be a high priority. Hopefully, the work done on the userguide so far can serve as a base for future contributors to continue to add content to, and people will find it useful as they use Foresight Linux.

 [1]: http://www.flickr.com/photos/silwenae/561739487/ "Photo Sharing"
 [2]: http://www.flickr.com/photos/silwenae/561739489/ "Photo Sharing"