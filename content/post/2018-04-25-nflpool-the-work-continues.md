---
title: NFLPool - The Work Continues
author: Paul Cutler
type: post
date: 2018-04-25
categories:
  - Python
tags:
  - Python
  - NFLPool
  - Pyramid

---

For once in my life, I’m not procrastinating.  With the NFL season just over four and a half months away, I’ve already started on working to update [NFLPool](https://nflpool.xyz).

I’m really enjoying working with Python and don’t want to let the few things I’ve learned get rusty.  This includes back porting a number of updates from [MLBPool2](https://www.mlbpool2.com).

I've updated the Standings page to display all seasons played (before it defaulted to just the current season).  This uses traversal in Pyramid to create a GET request based on the season year and automatically creates the links.  This feature within Pyramid is so cool, I guess I should expand on it:

I have a ```standings_controller.py``` that creates all of the routes for the pages in Standings:


```
class StandingsController(BaseController):
    @pyramid_handlers.action(renderer='templates/standings/standings.pt')
    def index(self):
        """Get a list of all seasons played from the database and display a bulleted list for the user to
        choose which season to view standings for"""
        seasons_played = StandingsService.all_seasons_played()

        return {'seasons': seasons_played}
```


I call the StandingsService to get a list of all the seasons that exist in the database to create the index page and it shows a bullet list of each season.  (Currently, this returns the one season that has been played, 2017).  You can [see it in action here](https://nflpool.xyz/standings).

You can then click on the *2017* bullet to see the player standings for the 2017 season.  The code for the player standings in each season looks like:

```
    @pyramid_handlers.action(renderer='templates/standings/season.pt',
                             request_method='GET',
                             name='season')
    def season(self):
        current_standings = StandingsService.display_weekly_standings()

        season = self.request.matchdict['id']

        session = DbSessionFactory.create_session()
        # season_row = session.query(SeasonInfo.current_season).filter(SeasonInfo.id == '1').first()
        # season = season_row.current_season

        week_query = session.query(WeeklyPlayerResults.week).order_by(WeeklyPlayerResults.week.desc()).first()
        week = week_query[0]

        if week >= 17:
            week = 'Final'
        else:
            week = 'Week ' + str(week_query[0])

        return {'current_standings': current_standings, 'season': season, 'week': week}
```

The cool thing is ```season = self.request.matchdict['id']``` above - when the user clicks on 2017, that’s passed to this method, that passes *2017* and makes season equal to whatever bullet the user clicked on in the list on the Standings index page, which is 2017 in this example and returns the 2017 Standings.  The rest of the code passes the `season` variable (which is now 2017) to the database to show all of the players and their score for the 2017 season.  I also updated the template that if the week is 17 or greater (there are only 17 weeks in an NFL season), the header on the page now says *2017 Final Standings*, otherwise it would return *2017 Week x Standings*, where x is equal to whatever week the standings have been updated through.  This was helpful as last year there was an issue with how division standings were pulled from MySportsFeeds because they don’t calculate the tiebreakers in their API and they had to fix it - after they fixed it, I updated the stats from their API, but now it was “Week 18”, which technically doesn’t exist in the NFL.  Now it just says final.

I also added Slack messaging that is present in MLBPool2.  When a new user registers or submits their picks, I get a message in my NFLPool Slack channel.

A minor thing, but when players are selecting the NFL player they think will win in a category (such as who has the most passing yards), the dropdown box that shows a list of all NFL players now includes the player’s team and position in addition to the player’s name.  Another small thing is the site administrator can update when a player has paid the annual league fee and when the admin updates to a new season the list players who have paid is reset.

Last, but not least, I’ve been working on documentation.  I had already written the User Guide on how to play and make your picks, and over the last week I’ve added an Administrator’s Guide, including how to install, first time setup, how to update to a new season and how to manage NFLPool players.  This is all written in reStructured Text and uses Sphinx to create the documentation and is hosted on [ReadTheDocs](http://nflpool.readthedocs.io/).  I still need to write the developer documentation - I have no idea how to write developer docs and am still looking for some good examples of developer documentation to crib from.

It’s a good thing I’m using [Github’s issue tracker](https://github.com/prcutler/nflpool/issues?utf8=%E2%9C%93&q=is%3Aissue+is%3Aall+) - a couple of those fixes above I had added last September after NFLPool launched and probably would have forgotten about.  Between that and the documentation, it’s almost like I’m running a real open source project!

The work doesn’t end there, though.  The big one I need to add the TimeService and GamedayService to make datetime management easier, especially for calculating when picks are due and displaying it on the pick submission page.  I also have a couple of more bug fixes to get to and I’d like to add Twitter support to the app as well.  The journey never ends.