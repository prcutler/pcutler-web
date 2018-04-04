---
title: Ubuntu Feisty Fawn First Impressions
author: Paul Cutler
type: post
date: 2007-02-04T17:27:16+00:00
url: /2007/02/ubuntu-feisty-fawn-first-impressions/
categories:
  - Linux
  - Technology
  - Ubuntu

---
I installed Ubuntu&#8217;s latest alpha release, the [Feisty Fawn Herd 3][1], this morning on my development machine. Herd 2 had a bug that wouldn&#8217;t install, but Herd 3 installed like a champ.

I&#8217;m not going to put up any screenshots &#8211; since the release on Thursday, there are plenty of sites that have screenshots up.

Some random thoughts and first impressions:

  * Network Manager comes installed default now. The icon on the taskbar caught be my surprise. I installed on a desktop with a wired connection, but now I&#8217;m itching to go install Herd 3 on my extra laptop.
  * Control Center is more intuitive than I expected. For whatever reason, I had in my head that Control Center was just going to be a knockoff of Window&#8217;s Control Panel, but it&#8217;s not. I like how it groups Hardware, System and Other. The Filter box works very well as well.
  * The Ubuntu color scheme is the same as usual. It is what it is.
  * I installed Compiz from the Ubuntu repositories instead of Beryl, which I&#8217;m running on my Edgy Eft / main desktop. I wanted to give Compiz a try and see how it&#8217;s different. The best way I can explain it, after only using it for an hour or two now, and not knowing the in&#8217;s and out&#8217;s of Compiz, is that it seems more vanilla than Beryl. With Beryl being actively developed by the community (not that Compiz isn&#8217;t) Beryl seems to have much more eye candy and bells and whistles. I don&#8217;t have the stability problem or resources issues others have complained about on Edgy, and Compiz seems to do fine on my Feisty box using the Nvidia binary drivers in the Ubuntu repository. However, installing Compiz out of the box, including the packages compiz, compiz-gnome, and desktop-effects, along with the required dependencies, I had no window borders. The first thread on the Feisty Fawn forums on Ubuntuforums.org didn&#8217;t fix it, nor did a post 3 pages in. One post did [link to the Compiz forums][2], and doing the following got it to work:
  
    > `sudo nvidia-xconfig --composite<br />
sudo nvidia-xconfig --render-accel<br />
sudo nvidia-xconfig --allow-glx-with-composite<br />
sudo nvidia-xconfig --add-argb-glx-visuals`

  * [Banshee&#8217;s][3] latest release, 0.11.5, is included and feels quite snappy. 
  * Other than that, it doesn&#8217;t seem too different from Edgy (yet), but there&#8217;s still 2 months of development time to go.

 [1]: http://www.ubuntu.com/testing/herd3?highlight=%28feisty%29%7C%28fawn%29
 [2]: http://forum.go-compiz.org/viewtopic.php?t=270
 [3]: http://www.banshee-project.org/Main_Page