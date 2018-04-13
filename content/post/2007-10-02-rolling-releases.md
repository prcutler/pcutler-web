---
title: Rolling releases
author: Paul Cutler
type: post
date: 2007-10-02T22:08:09+00:00
url: /blog/2007/10/rolling-releases/
categories:
  - Foresight
  - Linux
  - Technology

---
Over the next month or two, you may hear a lot of news about [upcoming][1] [releases][2] of [various][3] Linux distributions.

But what if you could do things differently? What if you could have a Linux distribution that wasn&#8217;t tied to a specific date twice a year to update your packages and your distribution? What if you wanted access to the latest Banshee for example that will be out later this year and not wait until next spring? Why mess around with backports or unstable respositories just to gain access to the latest release of a package that features a bug fix you need?

Try a Linux distribution that features a rolling release. Try [Foresight Linux][4]. Yes, we have a &#8220;formal&#8221; release when GNOME releases every 6 months, but when a package has an update, it&#8217;s probably updated before you even notice, and just one conary updateall away from being included in your desktop. The latest packages will give you access to the latest features, and better yet, the latest bug fixes of any given package. With Foresight Linux 2.0 on the horizon, we will be adding a more formal QA process, so don&#8217;t let the &#8220;but we need months of testing&#8221; stop you from updating. Point releases come out every couple months, but mostly to update the downloadable media including install CDs / DVD and live media such as Live CDs or VMWare images. The magic of conary will keep all of your installed packages up to date.

Additionally, if something doesn&#8217;t work, Conary is an innovative package manager that features a rollback feature &#8211; from the command line type sudo conary rollback 1 and you&#8217;ll be right back to where you were before you installed that last package.

There can be better ways of doing things. And a rolling release **is** a better way.

 [1]: http://www.ubuntu.com/getubuntu/download
 [2]: http://fedoraproject.org/wiki/DocsProject/Schedule
 [3]: http://en.opensuse.org/Roadmap
 [4]: http://www.foresightlinux.org