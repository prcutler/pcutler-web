---
title: Foresight Packages
author: Paul Cutler
type: post
date: 2008-09-21T14:36:21+00:00
url: /blog/2008/09/foresight-packages/
categories:
  - Foresight
tags:
  - Foresight
  - QA

---
We are getting ready to release Foresight GNOME edition in the next week, once GNOME 2.24 is out.

Foresight is a rolling release distro &#8211; our packages are almost always up to date, and we keep them up to date, unlike most distributions that have 2 big releases a year, which is when they update packages.

Being a rolling release, this means that a Foresight &#8220;release&#8221; is just a snapshot in time of what is available in the repository.

With a big release coming up, how can you help? I&#8217;m glad you asked!

We have over 100 issues in our issue tracker (JIRA), of package requests that are complete, but need testing before we send them to the stable branch of Foresight.

To do a search in JIRA:

  1. [Click here to go to the Foresight issue tracker][1]
  2. Click on Find Issues under the Foresight logo, third from the left.
  3. Under Project, select &#8220;Foresight Linux&#8221;
  4. Under Issue Type, select &#8220;Package Requests&#8221;
  5. Now scroll down, and under Issue Attributes and Status select &#8220;Needs QA&#8221;
  6. Click View, and all the package requests that have been built and need testing will appear

Then do a couple of things:

Make sure the package hasn&#8217;t been promoted to fl:2 already:

`sudo conary rq packagename=@fl:2`

If it hasn&#8217;t, make sure it&#8217;s not in the QA branch:
  
`<br />
sudo conary rq packagename=@fl:2-qa`

If it&#8217;s in QA, install it:
  
`<br />
sudo conary update packagename=@fl:2-qa`

And test it!

It&#8217;s possible it might have been built and needs to be promoted from fl:2-devel, and tested:

`sudo conary rq packagename=@fl:2-devel`

`sudo conary update packagename=@fl:2-devel`

In both cases, after testing, please comment on the Issue in JIRA whether the package worked or not, or any other relevant information, for example if it&#8217;s missing a .desktop file or menu entry.

That&#8217;s it! The QA team and I watch all bug reports via email or the the #foresight-qa and #foresight-alerts channels on Freenode IRC. From there we&#8217;ll make sure it gets added to the groups and promoted to the stable branch.

Happy testing, and thank you for the help! Let&#8217;s see how many packages we can test in the next few days before Foresight 2.0.5 is released.

 [1]: https://issues.foresightlinux.org/secure/Dashboard.jspa