---
title: 'Writing Docs:  Part 2'
author: Paul Cutler
type: post
date: 2007-06-03T20:06:40+00:00
url: /blog/2007/06/writing-docs-part-2/
categories:
  - Foresight
  - GNOME
  - Linux
  - Technology

---
Last week, I [kicked off the first][1] blog post in my ongoing adventures to learn how to write GNOME documentation, posted as a long rant about my frustrations in the tools and information available. This week in part two, I&#8217;ll cover the start of porting the Userguide to Docbook, the tools I&#8217;m using, how I&#8217;m learning, and my unanswered questions.

After downloading the source for gedit, banshee and seahorse, I started browsing through the XML files to learn the structure and tags. I was using Gedit, but then on Tuesday [Og posted about Geany][2] and I decided to give that a try. (And of course it&#8217;s in the Foresight repos!) I mentioned it in IRC Thursday night as my new favorite tool for writing Docbook, and Ken recommended I use Mercurial for revision control.

[<img src="https://i1.wp.com/farm1.static.flickr.com/226/528361955_623f2453ea.jpg?resize=500%2C313" width="500" height="313" alt="geany-gedit" data-recalc-dims="1" />][3]

Ken set up a Mercurial [repo for the userguide][4] with the other [Foresight repos][5], and answered my questions on using Mercurial as I quickly scanned the Mercurial documentation. Over the next couple of days I tweaked my Mercurial setup, fixing the author link with a tip from Ken, and getting Nano to be my default text editor as set in my .bashrc file.

One of the weird things I learned with Docbook, is that the section tags, <sect2> and <sect3> as you can see in the Gedit screenshot, having nothing to with creating sections in the documentation, rather they are the sublevels within a given chapter. I still don&#8217;t understand a number of the tags used by default, such as `guilabel`, which appears to be a bold tag. I fired off an [email][6] to the GNOME-docs mailing list this morning, and Leonardo Fontenelle posted links to the Subversion repositories with the handbook and styleguide, which I&#8217;m slowly going through today.

For the [Userguide][4] itself, we are creating a folder for each [chapter][7], rather than creating one big XML file for Yelp in Mercurial. I&#8217;m hopeful a script can be written to tie the XML files together, but I haven&#8217;t even started looking at how you take these files and get them to display in Yelp. I&#8217;ve only finished chapter one, and chapter 2 is just over halfway done. There&#8217;s a lot of copy / paste going on, as I build the docbook structure for the chapter, then copy from the wiki to a text file, and copy chunks from that to the XML file. It&#8217;s slow going as I have to review the tags, and I&#8217;m just re-using the structure and tags I see used in other GNOME help files. But I learn best by doing, and repetition. At this point I have no idea if it&#8217;s working or not, or how many errors each file may have, which I won&#8217;t know until they&#8217;re displayed in Yelp. My goal is after I finish chapter 3 to ask for help in tackling that piece, in getting the files to display in Yelp, I&#8217;m assuming in a FL-1.

I&#8217;ve also mentioned this in IRC, but it&#8217;s really interesting for me on a personal level to be putting in to practice all the development practices I&#8217;ve read about over the years. From creating the source XML file to pushing the files in to a revision control system, it&#8217;s an interesting feeling building something from scratch. And this is just the beginning &#8211; once I have a few chapters I&#8217;ll need to learn how to package them for inclusion in Foresight, and then update the userguide with each release.

The only downside? With the Mercurial repository being public, you&#8217;ll be able to see if I&#8217;m working on the userguide or slacking off! No pressure there at all&#8230;.

</sect3></sect2>

 [1]: http://www.paulcutler.org/blog/?p=749
 [2]: http://www.ogmaciel.com/?p=354
 [3]: http://www.flickr.com/photos/silwenae/528361955/ "Photo Sharing"
 [4]: http://hg.foresightlinux.org/hg/foresight-user-guide/
 [5]: http://hg.foresightlinux.org/hg
 [6]: http://mail.gnome.org/archives/gnome-doc-list/2007-June/msg00001.html
 [7]: http://wiki.foresightlinux.com/confluence/display/docs/Getting+Started+with+Foresight+Linux