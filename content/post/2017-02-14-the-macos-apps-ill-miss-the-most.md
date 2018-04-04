---
title: The macOS apps I’ll miss the most
author: Paul Cutler
type: post
date: 2017-02-14T14:24:53+00:00
url: /2017/02/the-macos-apps-ill-miss-the-most/
categories:
  - Apple
  - GNOME
  - Linux
  - Technology

---
I have been considering switching back to GNOME full-time and finally pulled the trigger last week and did, [installing Fedora 25 on both my iMac and MacBook Pro][1]. I installed [GNOME][2] on my iMac a couple months ago, but didn’t do the installation correctly and screwed up my MBR, resulting in only GNOME being an option. I’ve fixed that this time and have kept dual boot (for just in case and for iTunes on my iPhone and iPad).

The more I’ve thought about this over the last couple months, the more I have wanted to go back to GNOME. The privacy concerns I have about the big tech companies continues to nag at me and there is something about the open source ethos that appeals to me. I may even switch back to Android from iOS if this works well.

I will still be tied to the Apple ecosystem with my work laptop. That’s both good and bad as I think about the few apps that have held me back from making the switch full time. The only alternative would be to switch to Windows, which is never going to happen. I haven’t used Windows since 2004 and considering what Microsoft has done with tracking in Windows 10…

There are a handful of apps on macOS that just don’t have a Linux equivalent, or if they do, aren’t close from a usability experience. The last three are the big ones for me. I also see the irony in that those three apps are some of most expensive applications I’ve purchased through the Mac App Store. You do get what you pay for and I really shouldn’t be comparing these, especially the last two which Apple has featured as apps of the year previously, to free and open source apps. I should be grateful that there are programmers out in the open source world making applications and offering them without charge rather than trying to compare them to Mac equivalents.

In no particular order, the apps I&#8217;ll most the most:

## Messages

I love text messaging from my desktop (and the immediacy of the notifications). I&#8217;m old, shouting _Get Off My Lawn_ and just don&#8217;t like tapping on virtual keyboards compared to a real keyboard hooked up to a computer. But I can live without this.
  
_Status: Can live without this._

## Pocket

The web client is pretty good and I’ll probably continue to use the iPad as the primary reading device for Pocket. I can live without this. Firefox has a save to Pocket add-on that works just fine.
  
_Status: Can live without this._

## Reeder

Reeder is my RSS reader of choice, and there are a number of RSS readers available on Linux. Feedbin, the replacement service for Google Reader that I pay for annually, also has a decent web interface. New links open in a tab in the browser instead of Reeder’s readability feature. I’ll miss Reeder.
  
_Status: Can live without it._
  
**Update:** I’ve found [FeedReader][3] in the Fedora 25 repositories. Version 1.6 is in the repo, but the developer has also made a [Flatpak][4] available for [version 2.0 that was released two days ago and I’m now running][5]. A few thoughts:

  * This has fantastic usability. Almost to the level of Reeder. This is a slam dunk as far as RSS readers go.
  * I installed the Flatpak because version 2.0 adds support for both Feedbin and Pocket as a read it later service. Feedbin suport is working great and after upgrading from the 2.0 beta to 2.0 final, Pocket support is working flawlessly. FeedReader automatically added Pocket as a service since I had it configured in GNOME Online Accounts.
  * A big thank you and shout out to the developers for taking the time to release a Flatpak making it easy for users to upgrade to the latest version.

_Updated Status: Found a replacement that is just as good as one of the best Mac apps._

## 1Password

Considering all the work I did over the Christmas holiday to change weak passwords to strong passwords and removing duplicates, and also the integration with iOS, this is a big loss as there is no Linux client for 1Password. There are a few password management alternatives on Linux, but I don’t know how good they are. Ryan C. Gordon aka icculus did write a 1Password script for Linux that may be worth checking out: https://icculus.org/1pass/
  
_Status:_ _More research needed and may just need to switch to Encryptr or Enpass._

## Tweetbot

Ouch. This one hurts. I love Twitter, it’s the only social network I’m active on. I love syncing my Twitter reading experience between all my devices, which Tweetbot does better than any other application out there, regardless of platform or operating system. I’ve installed Corebird on Fedora and it’s ok, but it’s not Tweetbot.
  
_Status: This one hurts. I can probably confine myself to Twitter on iOS and use Pocket to save and read links._

## Ulysses

I love, love, love writing in Ulysses. It’s hands down the best writing app I’ve ever used after trying Scrivener, Hemingway and others. The iCloud integration is great, making it easy to jump to and from other devices, including iOS. I am using Ulysses to not only write for my blog and journal (then importing into Day One) but also as an Evernote replacement after Evernote screwed everyone over with their privacy settings (though they would later backtrack, I’ve lost all trust in them). Like most of the great Mac apps, they’re Apple only. If I’m writing anything, I’m always starting in Ulysses.

I’m using Dropbox Paper right now to try it out as a replacement for Ulysses, and while Paper is close, it’s lack of true Markdown support while writing bugs me. It’s not too bad if I open it in its own browser window and then use it in its own workspace &#8211; this makes it feel like more of a writing app and not a browser. I’ve spent significant time learning Markdown for both Ulysses and Day One, so Dropbox Paper missing real keyboard shortcuts for Markdown kind of sucks (some work, like strong and italics, but others, like headings, don’t). I’ve installed the Markdown plugin in WordPress, making it easy to copy and paste drafts from Ulysses to my blog or to Day One. It is possible to export Dropbox Paper as Markdown and after a cursory glance there are some decent looking Markdown editors available on Linux, so there may be hope.
  
_Status: Can probably live without it. But I’m not happy about it._

## Day One

This is probably the biggest one for me. If I love Ulysses, I love Day One more. And like Ulysses, Day One is exclusively in the Apple ecosystem. Ironically, I don’t write in my journal nearly as much as I should. But I love the integration with IFTTT and use it to track all of my exercise entries from Endomondo. I spent an hour looking at journaling options on Linux last week, and there are a couple, but I don’t see a way to sync the entries between computers, which is a must have feature. One option is to continue to use Day One on my work laptop or use a Markdown editor on Linux, save in Dropbox, and then import. I’ve also come across [jrnl][6], a command line journaling app that says it works with Day One, but I really love the user experience of Day One’s app. This one hurts the most &#8211; Day One was one of the first apps I ever bought in the Mac App Store and I have years of journal entries in there.
  
_Status: Ouch. I really don’t want to miss this. I’m not ready to start journaling in another app, so I’ll probably just write drafts in Dropbox Paper and then use my work laptop for journal entries._

## 

##

 [1]: http://paulcutler.org/blog/2017/02/why-im-going-back-to-linux-after-five-years-of-using-macos/
 [2]: http://www.gnome.org
 [3]: https://jangernert.github.io/FeedReader/
 [4]: http://flatpak.org/
 [5]: https://github.com/jangernert/FeedReader/releases
 [6]: https://github.com/maebert/jrnl