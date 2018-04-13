---
title: Setting up a Foresight 2 build environment, Part 1
author: Paul Cutler
type: post
date: 2007-12-01T05:04:22+00:00
url: /blog/2007/12/setting-up-a-foresight-2-build-environment-part-i/
categories:
  - Foresight

---
I don&#8217;t fancy myself a Linux developer, thought I aspire to be one someday. I can barely manage my own systems, and consider myself more of a power user.

One of the advantages of Foresight Linux though, is how easy it is to get started, both in creating and managing packages, and in how open the community is in welcoming you when you decide to start, and answering your (dumb) questions.

The upcoming 2.0 release of Foresight requires a slightly different setup and methodology for packaging. Here is a brief overview of how I set up my PC for creating packages on Foresight 2. (And if I&#8217;m doing something wrong, please leave a comment!)

[
  
Visit the Foresight 2.0 Developer page on the wiki.][1] (A big thanks to thilo and doniphon for the information on this page).
  
**
  
Step one**: Add the development packages to your system. From a terminal type:

`sudo conary update group-devel`

**Step two**: Create a .conaryrc file. Open Gedit (Applications -> Accessories -> Text Editor) and copy the .conaryrc example from the wiki link above and save it in your user&#8217;s home directory as .conaryc

**Step three**: Create a .rmakerc file. Open a new tab in Gedit and copy and paste the .rmakerc example from the above wiki page.

**Step four**: Edit your .bashrc file. In Gedit click Open, and hit Ctrl-H to show hidden files, and double click .bashrc. At the bottom of the file, copy and paste the .bashrc group cooks from the wiki page above.

**Step five**: Create the directories needed. From your user&#8217;s home directory:

mkdir conary
  
mkdir -p ~/conary/foresight.rpath.org ~/conary/builds ~/conary/cache

**Step six**: Create your context. In a terminal type:

`cvc context fl:2-devel`

And that&#8217;s it! I wouldn&#8217;t be surprised if there are quicker and / or easier ways to do this, but this is what worked for me, with pointers from Ken.

Next time: Checking out and updating a package.

Other sources:
  
[
  
Foresight 1.x build environment howto][2]

[Conary wiki][3]

 [1]: http://wiki.foresightlinux.org/display/DEV/Foresight+Linux+2.x
 [2]: http://wiki.foresightlinux.org/display/DEV/HOWTO+set+up+a+build+environment
 [3]: http://wiki.rpath.com/wiki/Conary