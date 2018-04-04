---
title: 'Blog Fixed & Flickr Update'
author: Paul Cutler
type: post
date: 2005-07-06T00:53:16+00:00
url: /2005/07/blog-fixed-flickr-update/
categories:
  - Photography
  - Technology
  - Wordpress

---
Seems since I did the security update late last week, that one of the fixes changed the permissions on the file that controls the comments, so it errored out and wasn&#8217;t accepting comments.

That&#8217;s now fixed. For the record, the error was:

`Warning: comments_template (wp-content/themes/default/comments.php):  failed to open stream: No such file or directory in (wp-includes/comment-functions.php on line 28)`

According to the [to the fix on the WordPress Codex][1] it required adding a line to the style.css sheet of a theme so it looked like:

`/*<br />
Template: mad1<br />
Theme Name: No Named Art Seed`

However, that didn&#8217;t work for me.

SSH&#8217;ing in, and going to my wp-content directory and typing:

`chmod -R 755 themes/` however did work. I don&#8217;t know if it&#8217;s a permission error on the comments file itself, or the directories, but comments are back.

In related news, I&#8217;ve come across some of last years digital photo&#8217;s and am in the process of uploading them to [Flickr][2], including the ones from [Packer Training Camp][3] last year. So some of the timelines will be out of date for a few days, as I upload them and I&#8217;ll finish &#8217;em off with this past weekends Fourth of July photo&#8217;s to back in to real-time.

My favorite Packer photo is Robert Ferguson making a spectacular one-handed catch at full extension in the air:

[<img src="https://i1.wp.com/photos18.flickr.com/23673180_7966f67eaf.jpg?resize=500%2C375" width="500" height="375" alt="dsc00120" data-recalc-dims="1" />][4]

 [1]: http://wordpress.org/support/topic/35638#post-216293
 [2]: http://www.flickr.com
 [3]: http://www.flickr.com/photos/silwenae/sets/544446/
 [4]: http://www.flickr.com/photos/silwenae/23673180/ "Photo Sharing"