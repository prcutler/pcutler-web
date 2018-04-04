---
title: "Writing GNOME Docs, Part III (Let's write some code!)"
author: Paul Cutler
type: post
date: 2009-03-28T01:44:34+00:00
url: /2009/03/write-gnome-docs-part-iii-lets-write-some-code/
categories:
  - GNOME
  - Linux
tags:
  - docbook
  - docs
  - GNOME

---
I&#8217;ve been chronicling my learning on writing documentation for GNOME. In [Part I, I covered][1] getting up to speed on GNOME documentation and the tools available; and in [Part II I wrote][2] about picking a project that you want to help, getting involved, and setting up your environment and finding updates that need to be made.

Now it&#8217;s time to apply those needed updates to the documentation and write some actual code in Docbook.

As the Tracking Documentation Status page on LGO mentions, there are a few different ways writers can update a doc, including getting the relevant content in, but not updating all of the markup; writing the chapter headings to capture sections that need to be updated, but not adding the content yet; or working through the document step by step updating the content and markup.

I do the latter &#8211; I work sequentially through the document updating the markup and content. As I mentioned in Part II, I use Tomboy to capture my research on what updates the document needs, such as new features or bugs filed in Bugzilla.

Let&#8217;s start at the beginning of a document and work our way through it. I&#8217;m going to assume you&#8217;ll pickup the Docbook markup as you go, or have some familiararity with it. When I first started working on the Foresight User Guide a year and a half ago, I had no experience with it either. I would not claim I know it well at this point either &#8211; most of my experience comes from doing what we are about to do &#8211; just editing existing documentation, or at least using that as a base.

In Part II, you checked out the Tomboy source code out of GNOME Subversion. In your favorite text editor, open the Tomboy help file located in $/home/source/tomboy/help/C/tomboy.xml

Working through tomboy.xml section by section:

**Description**
  
    <code markup="none">&lt;abstract role="description">&lt;/abstract></code>

Find the above code snippet in tomboy.xml. This is the description of the project. Why is this important you may ask? Did you know that all of GNOME&#8217;s help files are also available online at <http://library.gnome.org/users/> ?

If you click on that link and scroll down under &#8220;Utilities&#8221;, you will find Tomboy, and it&#8217;s description:

> Tomboy Notes Manual
> 
> Tomboy is a simple desktop note-taking application, with some powerful built-in features to help you organise your ideas. 

As part of [Bug 500803][3], the above description needs to be updated, and this is the section where that change will be applied.

In the xml file, you will see:

    <code markup="none">&lt;abstract role="description">
      &lt;para>Tomboy is a simple desktop note-taking application, with some powerful built-in features to help you organise your ideas.
&lt;/para>
    &lt;/abstract></code>

Change the text inside the `<para></para>` tags to:

<code markup="none">&lt;br />
    &lt;abstract role="description">
      &lt;para>Tomboy is a simple desktop note-taking application, with many features designed to help organize ideas, such as spell checking, highlighting, auto-linking URLs, lists, font stylizing, quick access with a table of contents for notes, and plug-ins to extend Tomboy's capabilities.
&lt;/para>
    &lt;/abstract>&lt;br />
</code>

Bug fixed!

**Pulse Compatibility**

Let&#8217;s make the Tomboy docs compatible with Pulse. As mentioned in Part I, familiarize yourself with the [Status Tracking][4]. Update the status by adding this block of code, as [show in this example][5]. This will add a status to the document, that [Pulse][6] can show, that lets other documentation writers know that the document is in the process of being updated, needs a review, or has been finalized.

**Copyright & Author Information**

Next, take credit for the work you&#8217;re doing &#8211; add your name to the copyright and author information. This is helpful to other doc writers as well, especially if you don&#8217;t have commit access, that other doc writers can reach out to you if they have a question with the last changes made. After the last <copyright> tag, update with your name and year:

    <code markup="none">&lt;copyright>&lt;br />
      &lt;year>2009&lt;/year>&lt;/p>
&lt;p>      &lt;holder>Paul Cutler&lt;/holder>&lt;br />
    &lt;/copyright></code>

Same under the  <code markup="none">&lt;authorgroup> &lt;/authorgroup></code> tag, this time also including your email address:

      <code markup="none">&lt;author>&lt;br />
        &lt;firstname>Paul&lt;/firstname>&lt;/p>
&lt;p>        &lt;surname>Cutler&lt;/surname>&lt;/p>
&lt;p>        &lt;affiliation>&lt;br />
          &lt;orgname>GNOME Documentation Project&lt;/orgname>&lt;/p>
&lt;address>&lt;email>pcutler@foresightlinux.org&lt;/email>&lt;/address>
&lt;p>        &lt;/affiliation>&lt;br />
      &lt;/author></code>

For the GNOME 2.26 cycle, I mostly added documentation to make the Tomoby docs reflect that it now works on both GNOME and Microsoft Windows. (Yes, I had to document an app to run on Windows! Who would have ever thought I&#8217;d be saying that&#8230;)

I&#8217;m not going to detail the markup of the changes I made; hopefully you&#8217;ll pickup Docbook&#8217;s syntax by editing changes inline in the document. (If you&#8217;re really curious, you can [see the changes here in Bugzilla][7] &#8211; the + denotes lines I added, and the &#8211; are lines I removed.) The above changes are changes you almost always want to make each time you update GNOME documentation.

As you document features for the application, think back to Part I, and revisit the [GNOME Style Guide][8]. Think about your audience, and focus on tone. Each documentation writer has their own strengths, whether that is tone, spelling, grammar, docbook markup, etc. Focus on your strengths and let the peer review process help you with the other areas.

Next is one of the most important parts &#8211; review your changes! Let&#8217;s fire up the xml file in Yelp, the GNOME Help Browser. To do this, Yelp has to call the file from the absolute path. For example, yelp tomboy.xml will not work.

<code markup="none">yelp /home/yourusername/source/tomboy/help/C/tomboy.xml</code>

And it should start. If Yelp starts, but doesn&#8217;t display anything, and an error pops up, close Yelp, and look at your console output. The console will tell you what line the syntax error is occurring that needs to be fixed. When I was first learning Docbook by writing the [Foresight User Guide][9], I would spend twenty to thirty minutes trying to debug where I made an error. It can be frustrating, but you&#8217;ll find it.

Check your grammar, your tone, capitalization, and spelling. I will run two instances of Yelp side by side &#8211; the version I created / edited, and the actual help file for the application. (Run the application and hit F1 to bring up the help). I will compare the original against the changes I made.

When you&#8217;re comfortable with the changes, and Yelp displays everything correctly, it&#8217;s time to create a patch to submit those changes. You are probably like me and don&#8217;t have commit access to GNOME. Don&#8217;t worry though &#8211; keep working on GNOME docs and submitting patches and before you know it someone will recommend you be added.

As mentioned in Part II, the [GNOME SVN wiki page][10] has the details:

<code markup="none">svn diff [filename] > [patch]</code>

For Tomboy, I did:

<code markup="none">svn diff tomboy.xml > docs-cross-platform.patch</code>

I then updated [Bug 576487][11] by choosing &#8220;Create a New Attachment&#8221; in Bugzilla, and filled out the form, noting the changes this patch made to tomboy.xml. I also let Sandy, one of the lead Tomboy developers, know in IRC that the patch was submitted and need a developer review and committed. You may also want to drop an email to the projects list to let them know the patch was submitted.

With that complete, it&#8217;s also recommended to have 3 peer reviews done by the GNOME Documentation team. I [sent an email to the Docs list][12] with a link to my bugs asking for peer reviews of my documentation changes.

As of this writing, I&#8217;m waiting to hear back from both my peers on the Docs team and Sandy on the Tomboy team. I&#8217;m sure there will be some changes that need to be made, as I&#8217;m nowhere close to knowing everything about how to write documentation, but I&#8217;m learning.

Once those changes are made, and the reviews are complete, the status will need to be changed to &#8220;candidate&#8221;. At that point, the GNOME Doc Team leaders will review it one more time, and with their approval, the document will be updated to &#8220;final&#8221; and committed! And you have officially helped to give back to the GNOME community and make GNOME better.

As I mentioned earlier, this may not be the best way for everyone, or the official way of doing things, but this is what works for me as I work on updating GNOME documentation. I hope you found this helpful, and feel free to leave me a comment below with your thoughts or questions.
  
</copyright>

 [1]: http://www.paulcutler.org/blog/?p=1074
 [2]: http://www.paulcutler.org/blog/?p=1081
 [3]: http://bugzilla.gnome.org/show_bug.cgi?id=500803
 [4]: http://live.gnome.org/DocumentationProject/StatusTracking
 [5]: http://svn.gnome.org/viewvc/gnome-devel-docs/trunk/gdp-style-guide/C/gdp-style-guide.xml?r1=581&r2=582
 [6]: http://www.gnome.org/~shaunm/pulse/web/
 [7]: http://bugzilla.gnome.org/attachment.cgi?id=131458&action=view
 [8]: http://library.gnome.org/devel/gdp-style-guide/2.26/
 [9]: http://www.foresightlinux.org/hg/foresight-user-guide-2/
 [10]: http://live.gnome.org/SVN
 [11]: http://bugzilla.gnome.org/show_bug.cgi?id=576487
 [12]: http://mail.gnome.org/archives/gnome-doc-list/2009-March/msg00054.html