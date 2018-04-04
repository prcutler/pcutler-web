---
title: 'Foresight 2.0 Bittorrent Client: Deluge'
author: Paul Cutler
type: post
date: 2007-12-27T16:24:12+00:00
url: /2007/12/foresight-20-bittorrent-client-deluge/
categories:
  - Foresight

---
One of the criticisms Foresight 1.x and 2.0 have been dinged for is lack of a good bittorrent client included in the official repositories.

Yesterday [Antonio][1] (aka doniphon) officially committed [Deluge][2] to the Foresight 2.0 (still alpha!) repository. I am happy to report after a night of testing, it works wonderfully! Thank you Antonio!

Get it: `sudo conary update deluge`

[pscott][3] has maintained Deluge in his personal repository for 1.x (due to some Boost issues, I believe), which has also worked well for Foresight 1.x. (Thanks pscott!) If you&#8217;re using Foresight 1.4.2, you can install it via:
  
`<br />
sudo conary update deluge=asylum.rpath.org@fl:1`

Enjoy!

 [1]: http://sbin.reboot.sh/
 [2]: http://deluge-torrent.org/
 [3]: http://pscott.wordpress.com/