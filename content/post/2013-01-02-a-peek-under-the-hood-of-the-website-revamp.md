---
title: A peek under the hood of the website revamp
author: Paul Cutler
type: post
date: 2013-01-02T15:48:44+00:00
url: /2013/01/a-peek-under-the-hood-of-the-website-revamp/
categories:
  - Websites
  - Wordpress
tags:
  - bootstrap
  - coda
  - github
  - linode
  - wordpress

---
[<img alt="Under the hood" src="https://i0.wp.com/farm4.staticflickr.com/3255/5755474003_14d085e773.jpg?resize=500%2C375" width="500" height="375" data-recalc-dims="1" />][1]
  
_<small>Image by <a href="http://www.flickr.com/photos/riversidetransportdotcom/">riversidetransport</a> under a CC-BY-NC-SA license<small></em></p> 

<p>
  I am not a web developer. My HTML is rudimentary at best and you should be very afraid when I start poking at CSS and Javascript. Though things might be a bit prettier than they were, I&#8217;m going to take this opportunity to highlight the tools I used to give my website a makeover.
</p>

<h2>
  Homepage
</h2>

<p>
  For 5 years, I left up a <a href="http://paulcutler.org/index-old.html">&#8220;Coming Soon&#8221; webpage</a> with some links to Twitter, LinkedIn, etc. I am the definition of lazy!
</p>

<p>
  <img alt="Bootstrap" src="https://i0.wp.com/jetstrap-site.s3.amazonaws.com/images/feature_bootstrap.jpg?w=700" align="right" data-recalc-dims="1" />For anyone looking to quickly get a webpage up, be it for a homepage or a project page for a personal project, I highly recommend <a href="http://twitter.github.com/bootstrap/index.html">Bootstrap</a>. <a href="https://dev.twitter.com/blog/bootstrap-twitter">Originally created by Twitter to help them standardize</a>, Twitter later <a href="https://github.com/twitter/bootstrap">made Bootstrap open source</a> and it&#8217;s been widely adopted and extended. Bootstrap features the latest in web development &#8211; it&#8217;s grid based, responsive and uses a combination of HTML, CSS and Javascript to help you quickly build web pages.
</p>

<p>
  <img alt="Jetstrap" src="https://i0.wp.com/si0.twimg.com/profile_images/2640135694/6b051ec01defad8731f6b1026dff0ad0_bigger.png?w=700&#038;ssl=1" align="right" data-recalc-dims="1" />Being even lazier, I used <a href="http://jetstrap.com/" title="Jetstrap">Jetstrap</a>, a web based interface to build Bootstrap pages. Log in using your favorite service, pick from a couple of default page templates, customize them and Jestrap will take it from there. Pressing download, Jetstrap will give you the HTML, CSS and Javascript in one zip file. Quickly edit the text in the HTML files and you&#8217;re ready for deployment.
</p>

<p>
  <a title="Bootswatch" href="http://bootswatch.com/">Bootswatch</a> has created a number of themes for Bootstrap. The homepage is using the <a title="Spacelab" href="http://bootswatch.com/spacelab/">Spacelab</a> theme. Pick a theme, save the CSS file, replace the Bootstrap CSS with the new CSS file, and done! Couldn&#8217;t be easier.
</p>

<p>
  The social media icons are by <a href="http://fairheadcreative.com/blog/fc-webicons-set-launched/">Fairhead Creative</a>. They use a combination of SVG icons and CSS to display and are <a href="https://github.com/adamfairhead/webicons">available on Github</a>.
</p>

<h2>
  Blog
</h2>

<p>
  <img alt="Wordpress" src="https://i1.wp.com/s.wordpress.org/about/images/wordpress-logo-notext-bg.png?w=700" align="right" data-recalc-dims="1" />WordPress has been powering this blog for almost 10 years. I started with the original b2/cafelog ten years ago, migrating to WordPress months later when WordPress was first released.
</p>

<p>
  The blog theme is a <a href="http://320press.com/wpbs/">WordPress Twitter Bootstrap theme by 320press</a>. It features sub-themes built on the Bootswatch themes for Bootstrap and I&#8217;m using the Spacelabs theme, similar to the homepage. The theme doesn&#8217;t feature a header image that I&#8217;ve been able to find, so I&#8217;ve turned off the hero feature, which allows you to get to the blog content faster. The theme, like the homepage, is responsive, so if you&#8217;re viewing on a tablet or a mobile phone, the page will scale to the device you&#8217;re viewing it on.
</p>

<p>
  WordPress plugins that are being used:
</p>

<ul>
  <li>
    <a href="http://www.fastsecurecontactform.com/">Fast Secure Contact Form</a>
  </li>
  <li>
    <a href="http://flagrantdisregard.com/feedburner/">Feedburner Plugin</a>
  </li>
  <li>
    <a href="http://wordpress.org/extend/plugins/jetpack/">Jetpack by WordPress.com</a>
  </li>
  <li>
    <a href="http://mailchimp.com/social-plugin-for-wordpress/">Social</a>
  </li>
  <li>
    <a href="http://crowdfavorite.com/wordpress/plugins/twitter-tools/">Twitter Tools</a>
  </li>
</ul>

<h2>
  Tools
</h2>

<p>
  <img alt="Github" src="https://i0.wp.com/github.com/github/media/blob/master/octocats/octocat_fluid.png?w=700&#038;ssl=1" align="right" data-recalc-dims="1" />Github is the magic that ties it all together. I try and do everything in Git using source control, making it easier to do development from any computer I might be using. I&#8217;ve been using Git for a few years, but I barely scratch the surface with what Git can do. You can <a href="https://github.com/pcutler">find my repositories on Github</a>.
</p>

<p>
  I&#8217;ve been a very happy <a href="http://www.linode.com/" title="Linode">Linode</a> customer for a few years. If you&#8217;re in the market for a new webhost, Linode&#8217;s Linux virtual private servers are the way to go.
</p>

<p>
  Last, and definitely not least, all of the code was written and edited in Panic&#8217;s <a href="http://panic.com/coda/">Coda 2</a> web editor. A brilliant text / code editor, with a built-in FTP client, terminal, version control support and more, it makes it all too easy.
</p>

 [1]: http://www.flickr.com/photos/riversidetransportdotcom/5755474003/ "Under the hood by riversidetransport, on Flickr"