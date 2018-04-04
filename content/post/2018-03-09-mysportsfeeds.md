---
title: 'Where I get stats for MLBPool and NFLPool: MySportsFeeds (and it’s awesome)'
author: Paul Cutler
type: post
date: 2018-03-09T13:24:35+00:00
url: /2018/03/mysportsfeeds/
categories:
  - Python
tags:
  - MLBPool
  - MLBPool2
  - NFLPool
  - Python

---
A few years ago I started to look into how I could build apps to manage MLBPool and NFLPool. The key would be how to integrate all of the team and player statistics and where to get that data. I was floored when I saw the pricing of how much companies charge to provide those stats &#8211; it was hundreds to thousands of dollars per month to get access to baseball or football stats. The closer you got to real time statistics, the more it was. Most of these companies are providing statistics to commercial services that run fantasy leagues (I&#8217;m guessing), which is why fantasy leagues charge a fee to host your fantasy league.

It’s been a couple years now and I don’t remember how I came across [MySportsFeeds][1], but they offer a [commercial service][2] for companies like I mentioned above, but they also have a key differentiator. For educational purposes, developers or research, they offer a free service to access stats for completed seaons. Best of all, you can also subscribe for a very low price to their [Patreon][3] to get access to live data. I’m happy to say I was one of the first Patreon subscribers and for $5 / month I get access with a 3 minute delay. (I really only need data overnight and not real time for my apps, but what an awesome price). MySportsFeeds currently offers statistics for the NHL, NBA, MLB and NFL and statistics are available in JSON, XML or CSV.

There are a few different things I love. One, there is a [Slack channel][4] where the owner and lead developer, Brad Barkhouse, helps out. He’s extremely responsive to community questions and is always around. Two, the service is always getting better. Last summer they launched [wrapper libraries][5] for popular programming languages including Python, Ruby, R, NodeJS and more. Three, they have fantastic documentation that includes all the parameters you can pass to the different feeds to help filter what information or statistics you might need.

There are a couple quirks. For NFLPool, the Team Standings feeds don’t account for tiebreakers. I can’t fault them for that as the NFL tiebreaker calculations can be complex. After the NFL season ended, I pinged Mr. Barkhouse and he quickly updated the feed to match the NFL standings, which I needed for my app.

In baseball, I started to enter all of the 2017 MLBPool picks for testing. I need to make sure that the app works and matches the scoring that was done by hand last year. When entering picks, one player had chosen [Yu Darvish][6] for one of the pitching categories. When I went to make the pick in MLBPool, he wasn’t available as an American League pitcher. MySportsFeeds showed him on the Los Angeles Dodgers &#8211; but he wasn’t traded from the Rangers to the Dodgers until July 31, 2017. Brad will fix his roster information, but MySportsFeeds uses a cumulative player statistics so the feed shows Darvish’s stats for the entire year. But in Major League Baseball by rule, a player’s stats when traded between leagues are NOT cumulative. This is obviously an edge case for MySportsFeeds, but something I’m going to have to account for before MLBPool launches. (I currently store all baseball player statistics in one table &#8211; I’m going to need to split this and have two tables, one for the American League and one for the National League to account for this).

MySportsFeeds is under constant development and always improving. Mr. Barkhouse and team updated the API last year from version 1.1 to 1.2 and work is underway for 2.0. They added Daily Fantasy data last year. Users can also file issues in Github or ping him in Slack to get items added to the roadmap. Overall I am extremely happy with the service and highly recommend MySportsFeeds.

 [1]: https://www.mysportsfeeds.com/
 [2]: https://www.mysportsfeeds.com/feed-pricing/
 [3]: https://www.patreon.com/mysportsfeeds
 [4]: https://mysportsfeeds-slackinvite.herokuapp.com/
 [5]: https://github.com/mysportsfeeds
 [6]: https://www.baseball-reference.com/players/d/darviyu01.shtml