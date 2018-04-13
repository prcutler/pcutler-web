---
title: Conary Packaging System
author: Paul Cutler
type: post
date: 2007-03-06T14:02:26+00:00
url: /blog/2007/03/conary-packaging-system/
categories:
  - Foresight
  - Linux
  - Technology

---
[Linux.com has a good article up][1] with an overview of the [Conary packaging system][2], developed by rPath and in use by [Foresight Linux][3]. The article covers a high level overview, managing packages with Conary, and it&#8217;s future prospects.

> Conary relies upon a repository that is also a source control system, complete with branches and diff-like files called changesets that identify differences between the available versions of a package. Where the leading package systems identify packages only by version number, each name in a Conary repository is a unique identifier that includes such information as a package&#8217;s location in the repository, the upstream version number, the source revision, the number of the binary build, and the specific hardware architecture for which it is intended.

That might sound like a lot of technical mumbo-jumbo, but what I&#8217;ve taken away from my brief time in the #foresight IRC channel on Freenode, is Conary is really about updating packages based on the new file changes &#8211; not having to compile from source the entire package to get to a binary, but just the changes needed to update that package or file.

Conary is the backbone behind [rPath][4] &#8211; and if you have an opportunity, poke around [rPath][4] and see how many different people are using it to create their own customized distributions and software deployment solutions (or as rPath calls them, appliances). From a NAS project to Foresight Linux to Wiki applications to LAMP, mail or VOIP servers, users, developers and companies are finding that [rPath][4] has made a toolset and packaging system to enable appliances everyone can use.

The article closes with a good summary, and a great shout out to [Foresight Linux][3]:

> So far as rPath is concerned, Conary seems less an end in itself than a tool to help build the virtual appliances that are the company&#8217;s main business. Conary is used in rPath Linux, but because rPath Linux is primarily a tool that others can use to create customized distros, the best place to see Conary action is with one of the distributions built using rPath Linux and rBuilder Online, rPath&#8217;s tool that distros can use to manage the production of their versions. Of these distributions, one of the most advanced is Foresight, which specializes in providing bleeding-edge versions of GNOME.

 [1]: http://enterprise.linux.com/enterprise/07/02/26/219240.shtml?tid=129&tid=23
 [2]: http://wiki.rpath.com/wiki/Conary
 [3]: http://www.foresightlinux.org
 [4]: http://www.rpath.org