---
title: Writing GNOME Docs, Part II
author: Paul Cutler
type: post
date: 2009-03-26T18:03:39+00:00
url: /2009/03/writing-gnome-docs-part-ii/
categories:
  - GNOME
  - Linux
tags:
  - docbook
  - docs
  - documenation
  - GNOME
  - GNOME docs
  - subversion

---
So you&#8217;ve decided you want to contribute to GNOME and write some documentation. [In Part I][1], I wrote about the steps I went through to prepare to write GNOME documentation and picking a project.

In Part II, we will take a look at the final preparation stage, including checking out the project&#8217;s source code via GNOME Subversion and finding documentation that needs updating. I am still fairly new to the process myself, but these are some of the steps I take in writing documentation.

Part III will cover updating the Docbook XML file, reviewing your changes and submitting a patch with the updated docs.

Now that you&#8217;ve picked a project to work on, I recommend subscribing to the project&#8217;s mailing list, and, if they have one, hang out in their IRC channel. A list of all [GNOME mailing lists is here][2], and be aware of the [GNOME Code of Conduct][3] when sending an email to a list.

Personally, I recommend letting the project or lead developer(s) know you want to help out. This is helpful for a couple of reasons, including:

  * If you, like me, are new to contributing to GNOME, you probably don&#8217;t have SVN access to commit your changes. A developer on the project, or a member of the GDP if you&#8217;re working on a project the GDP can commit, will have to submit your changes to the project.
  * You might have a question on how a feature works, and want clarification. If you&#8217;ve introduced yourself, other project members will understand why you&#8217;re asking.
  * Help is always appreciated! You have nothing to worry about &#8211; almost all projects will welcome you with open arms. Especially doc writers, as it sometimes considered unglamorous work.

As I mentioned in Part I, I&#8217;ll be working on the [Tomboy][4] documentation, and I sent an email to the list letting the developers know, and asking if there were any areas of the docs that also needed changes or updates. (The Tomboy mailing list is generating a 404 error when I try and click on my email which can be [found here][5]).

In a terminal, create a directory where you will to checkout the source code of the project too. GNOME uses Subversion, and will be moving to git in the future. The GNOME Wiki has a [great page on using Subversion][6]. Move to the directory where you want the source code, and per the GNOME SVN wiki page, checkout the project:

`svn co http://svn.gnome.org/svn/[module]/trunk [module]`

For Tomboy, I would do:
  
`<br />
svn co http://svn.gnome.org/svn/tomboy/trunk tomboy`

The Tomboy source code is now checked out to the &#8220;tomboy&#8221; directory in the directory I&#8217;m currently in. For the purpose of this example, we will assume you checked out the source code to $/home/source/tomboy

Now it&#8217;s time to find some documentation that needs updating. Good sources to find documentation updates include:

  * Projects&#8217;s Bugzilla
  * Reviewing the projects current documentation
  * Project&#8217;s release announcement of new features
  * Mailing list

I recommend starting by doing a query in the project&#8217;s Bugzilla (bug tracker) and see if any users have filed bugs or requests against the project&#8217;s existing documentation.

Log in to [GNOME Bugzilla][7], and click the &#8220;[Browse][8]&#8221; button in the top menu. On the Browse page, click on the drop down menu next to &#8220;Browse:&#8221; and click on the project you want to view, and &#8220;Show product&#8221;. You will be taken to the project&#8217;s Bugzilla page, which provides an overview of the number of bugs, type, and severity, among other information.

In the search box towards the top, you will see &#8220;project:Tomboy&#8221; already entered (or the project you chose), after that type documentation and hit search. The results will show any bugs that have a keyword of documentation, and you can browse through any open bugs to see if there are any changes that need to be added to the project&#8217;s documentation.

You will want to keep notes of any bugs you come across, or changes and updates the documentation file needs. Ironically, Tomboy is a great tool for this, and even supports the ability to drag and drop a GNOME Bugzilla link from your browser into Tomboy and converts it to an easy to use link.

I also recommend reviewing the project&#8217;s current documentation. Open the application, and hit F1 to bring up the help in the GNOME Help Browser (Yelp). With GNOME being on a 6 month release cycle, it may be possible that new features were added without being documented, which is why it&#8217;s also helpful to see if there was a Release announcement that outlines those new features.

Review the sections in the documentation, and compare to the behavior of the application. Do they match? If not, it might be useful to ask the developers in IRC or on the mailing list to double check, and make a note that the documentation needs to be updated to reflect those changes. This process can be time intensive, which is why you may want to start working on documentation with an application you&#8217;ve used and are familiar with.

If you introduced yourself on the project&#8217;s mailing list, the community members may have pointed out some areas that need updates as well.

Hopefully this has helped in getting you ready to (finally!) update the documentation. In Part III, I&#8217;ll cover updating the documentation&#8217;s Docboox / XML file and submitting your changes to the project.

 [1]: http://www.paulcutler.org/blog/?p=1074
 [2]: http://mail.gnome.org/mailman/listinfo/
 [3]: http://mail.gnome.org/
 [4]: http://projects.gnome.org/tomboy/
 [5]: http://lists.beatniksoftware.com/pipermail/tomboy-list-beatniksoftware.com/2009-March/001052.html
 [6]: http://live.gnome.org/SVN
 [7]: http://bugzilla.gnome.org/
 [8]: http://bugzilla.gnome.org/browse.cgi