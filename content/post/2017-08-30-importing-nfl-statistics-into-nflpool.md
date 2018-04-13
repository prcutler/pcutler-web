---
title: Importing NFL statistics into NFLPool
author: Paul Cutler
type: post
date: 2017-08-30T13:03:17+00:00
url: /blog/2017/08/importing-nfl-statistics-into-nflpool/
categories:
  - Python
tags:
  - NFLPool
  - Pyramid
  - Python
  - SQL

---
NFLPool has been live for almost two weeks &#8211; and hasn’t crashed (yet!) After the rush to get the site up and allow a user to make their picks before I left on vacation, there is one more large chunk of work to get to 1.0 release: calculate the score for all players every week of the NFL season.

I spent all of last week in the middle of Minnesota at a friend’s cabin. It was great to get away from both my day job and NFLPool, but I was loathe to ruin my daily coding streak on Github:

<img class="alignnone size-full wp-image-6753" src="https://i0.wp.com/paulcutler.org/blog/wp-content/uploads/2017/08/Screenshot-2017-08-30-06.32.32.png?resize=700%2C197&#038;ssl=1" width="700" height="197" data-recalc-dims="1" />

I did bring my laptop to the cabin, and the first couple of mornings I did some minor work, mostly starting the process to add docstrings to the code to document the different methods. Being a former documentation contributor to [GNOME][1] you would think that I would include documentation in both the code and the project, but no. I now understand why some developers don’t include documentation in the rush of getting something built. If you look closely, you’ll see in the second last column on the right of the screenshot I did stop coding for a few days and enjoyed my vacation.

Kelly’s help was invaluable (again) in creating the data model to store the picks. There are three tables used. In my last post, I had mentioned that Kelly had me re-do the way we store a player’s picks. To do this, we created a “pick type” table. This is a reference table for the different kids of picks the players make:

  * Individual Player Stats (passing leader, rushing leader, etc.)
  * Team Stats (Division winners, 2nd place, last place)
  * Wildcard playoff teams
  * Tiebreaker

`<br />
class PickTypes(SqlAlchemyBase):<br />
<strong>tablename</strong> = 'PickTypes'<br />
pick_id = sqlalchemy.Column(sqlalchemy.Integer, primary_key=True, autoincrement=True)<br />
name = sqlalchemy.Column(sqlalchemy.String)<br />
` 

<img class="alignnone size-full wp-image-6754" src="https://i1.wp.com/paulcutler.org/blog/wp-content/uploads/2017/08/Screenshot-2017-08-30-06.57.54.png?resize=472%2C716&#038;ssl=1" width="472" height="716" data-recalc-dims="1" />

When a player makes their picks, it’s stored in the PlayerPicks database table:

`<br />
class PlayerPicks(SqlAlchemyBase):<br />
<strong>tablename</strong> = 'PlayerPicks'<br />
pick_id = sqlalchemy.Column(sqlalchemy.Integer, primary_key=True, autoincrement=True)<br />
user_id = sqlalchemy.Column(sqlalchemy.String, sqlalchemy.ForeignKey('Account.id'))<br />
season = sqlalchemy.Column(sqlalchemy.Integer, index=True)<br />
date_submitted = sqlalchemy.Column(sqlalchemy.DATETIME)<br />
conf_id = sqlalchemy.Column(sqlalchemy.Integer, sqlalchemy.ForeignKey('ConferenceInfo.conf_id'))<br />
division_id = sqlalchemy.Column(sqlalchemy.Integer, sqlalchemy.ForeignKey('DivisionInfo.division_id'))<br />
rank = sqlalchemy.Column(sqlalchemy.Integer)<br />
team_id = sqlalchemy.Column(sqlalchemy.Integer, sqlalchemy.ForeignKey('TeamInfo.team_id'))<br />
multiplier = sqlalchemy.Column(sqlalchemy.Integer, default=1)<br />
player_id = sqlalchemy.Column(sqlalchemy.Integer, sqlalchemy.ForeignKey('ActiveNFLPlayers.player_id'))<br />
pick_type = sqlalchemy.Column(sqlalchemy.Integer, sqlalchemy.ForeignKey('PickTypes.pick_id'))<br />
` 

There are 41 total picks a player makes stored as 41 rows in the database:

<img class="alignnone size-full wp-image-6755" src="https://i0.wp.com/paulcutler.org/blog/wp-content/uploads/2017/08/Screenshot-2017-08-30-07.02.43.png?resize=700%2C186&#038;ssl=1" width="700" height="186" data-recalc-dims="1" />

The next part I just couldn’t wrap my head around. Kelly recommended I make a table with just four columns:

`<br />
class WeeklyPlayerResults(SqlAlchemyBase):<br />
<strong>tablename</strong> = 'WeeklyPlayerResults'<br />
pick_id = sqlalchemy.Column(sqlalchemy.Integer, primary_key=True, autoincrement=True, index=True)<br />
season = sqlalchemy.Column(sqlalchemy.Integer)<br />
week = sqlalchemy.Column(sqlalchemy.Integer)<br />
points_earned = sqlalchemy.Column(sqlalchemy.Integer)<br />
` 

It took me a few minutes, but `pick_id` in this table contains (embeds?) the ` user_id``` `, `pick_type`, `season`, and the pick data. It made my head hurt.

The other thing she pointed out to me is I did a poor job implementing the data model with some inconsistent column names across tables. For example, the `Account` table uses `id` as the column name to store a user’s unique id &#8211; this should have been `user_id`. In other tables I use a generic `id` to store a primary key. I spent some time yesterday fixing almost all of these, with the exception of Accounts. The `id` used in Accounts has too many references in the code already, but where I could I changed `id` to `primary_key` and some other changes to make the column names more explicit. I then had to update the database in production, which always makes me extremely nervous. But if I’m going to do it, now is the time when I only have a handful of users and can touch all of the tables outside of `Account` in production.

But anyway, it was time to start working on the ability import statistics every week of the NFL season from [MySportsFeeds][2]. Here is where things get ugly. Calculating a player’s score weekly for 17 weeks over the course of the season is going to take a lot of testing. My goal is to use the data from last year’s players in 2016 to compare the app’s scoring mechanism to what I did by hand. If I do it right, they should match (unless I made mistakes last year). But MySportsFeeds changed the API from version 1.0 in 2016 to 1.1 in 2017 and the URL to pull the stats differs. I had hoped to start a new branch called 2016 in git to do testing, but I then lost a day when I screwed up my branches trying to merge between master, 2016 and pyramid (where I do all of the development work before merging to master, which I treat as production). So I’m doing it all in my development branch, pyramid, which results in a big if / else statement:

`<br />
        if season == 2016:<br />
            response = requests.get('https://api.mysportsfeeds.com/v1.1/pull/nfl/2016-2017-'<br />
                                    'regular/cumulative_player_stats.json?position=QB&playerstats=Yds',<br />
                                    auth=HTTPBasicAuth(secret.msf_username, secret.msf_pw))<br />
        else:<br />
            response = requests.get('https://api.mysportsfeeds.com/v1.1/pull/nfl/' + str(season) +<br />
                                    '-regular/cumulative_player_stats.json?position=QB&playerstats=Yds',<br />
                                    auth=HTTPBasicAuth(secret.msf_username, secret.msf_pw))</p>
<p>`

After the season is over, I’ll probably remove all 2016 references like this, but for now, I need them.

I had hoped to make one API call to MySportsFeeds in `weekly_msf_data.py` for all five of the individual NFL player stats (rushing, passing, etc) but to save a little database space, I wrote five methods for each category. That was easy enough: it pulled the right data and saved it to the database.

But doing the team stats (division winners, points for leaders by conference, etc.) was not nearly as easy. The `division_team_standings.json` from MySportsFeeds is a dictionary containing two lists. The first list is for NFL conference (AFC and NFC) and each conference has a list inside it for the four divisions. There has to be a more Pythonic way of iterating over this than what I did. (Maybe using a generator?) But I just don’t have the Python knowledge yet. I have it working, but I do this four times, once for each division:

`<br />
        while x < len(team_data):<br />
            rank = (team_data[x]["teamentry"][1]["rank"])<br />
            team_id = (team_data[x]["teamentry"][1]["team"]["ID"])</p>
<pre><code>        x += 1
` </pre> 

</code>

Using </code>`x`, `y`, `z`, and `a`this returns 8 results four times, which includes both conferences. Ugly, but it works.

But when I added this to the `WeeklyTeamStats` table, I was creating 96 rows &#8211; the 32 NFL teams three times. I only wanted 32 rows &#8211; and it took me three hours of reading through the SQLAlchemy documentation and examples on StackOverflow to figure out how to do an update to the table instead of an insert. That’s one way to learn.

Now that I can store NFL data, next steps include:

  * Add picks for the 8 players from the 2016 season to test results
  * Then add a method to iterate through those picks and figure out which picks a player made are unique and assign it a multiplier of two (for the unique bonus)
  * Lastly, and most importantly, then calculate each player’s score based on the real results. And figure out how to display them.

I have two weeks before the first week of the 2017 NFL season when NFLPool players will want to see their results. No problem. I think.

 [1]: https://www.gnome.org
 [2]: https://www.mysportsfeeds.com