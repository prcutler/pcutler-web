---
title: MLBPool2 – Letting a Player Change their Picks
author: Paul Cutler
type: post
date: 2018-03-23T16:00:00+00:00
url: /2018/03/mlbpool2-letting-a-player-change-their-picks/
categories:
  - Python
tags:
  - MLBPool
  - NFLPool
  - Pyramid
  - Python

---
I’ve been blogging a little bit about MLBPool2 the last couple of weeks and now the last three months of work is complete.

I already touched on two of the biggest differences between NFLPool and MLBPool2 (the time service using Pendulum and using MySQL / MariaDB instead of SQLite).

The biggest difference between NFLPool and MLBPool2 though is players have the ability to change their picks. At the All-Star Break, MLBPool2 players can change up to 14 of their 37 picks, but those changes are only worth half points.

This required a major re-write in the way I capture and store each player’s picks. I also figured, based on how NFLPool went when I launched it, if a player was going to be able to change their picks at the All-Star Break, I might as well let them change their picks before the season starts. (I had a couple NFLPool players request to make a change, which required me to delete all their picks from the database and I just told them to do it again. But I **hate** touching the database.). I wrote a [new service][1] (`gameday_service.py`) that the app uses to figure out a few different things:

  * Season start
  * When picks are due
  * The All-Star Break (48 hours before and after the All-Star Game)
  * Season end

I already was using two methods &#8211; one for the initial picks submission and one for changes in the [PlayerPicks service][2]. If the player was changing their picks, I used an if / else statement that compared the current time to when the season started:

    now_time = TimeService.get_time()
    
    if GameDayService.season_opener_date() > now_time:
    """Update the picks passed from change-picks. If the season start date is later than the current time,
    make the new changed picks equal to the original picks, making original_pick equal to the new pick."""
    
    Update Pick Type 1
    Update the AL East Winner Pick - check to see if it has been changed
    if al_east_winner_pick != session.query(PlayerPicks).filter(PlayerPicks.user_id == user_id) \
    .filter(PlayerPicks.season == season) \
    .filter(PlayerPicks.pick_type == 1) \
    .filter(PlayerPicks.rank == 1) \
    .filter(PlayerPicks.league_id == 0) \
    .filter(PlayerPicks.division_id == 1):
    session.query(PlayerPicks).filter(PlayerPicks.user_id == user_id).filter(PlayerPicks.pick_type == 1) \
    .filter(PlayerPicks.season == season) \
    .filter(PlayerPicks.rank == 1) \
    .filter(PlayerPicks.league_id == 0) \
    .filter(PlayerPicks.division_id == 1) \
    .update({"team_id": al_east_winner_pick, "date_submitted": now_time,
    "original_pick": al_east_winner_pick})
    
    

And do a `session.update` to update the database.

But if it’s during the All-Star Break we need to capture that the pick has been changed (changing the value in the PlayerPicks table from 0 to 1) where the UniquePicks service will credit the player with half points:

    else:
    """If the season has started, update picks at the All-Star Break. Do not change the original pick column
    and update the changed column to 1."""
    
    Update the AL East Winner Pick
    for pick in session.query(PlayerPicks.team_id).filter(PlayerPicks.user_id == user_id) \
    .filter(PlayerPicks.season == season) \
    .filter(PlayerPicks.pick_type == 1) \
    .filter(PlayerPicks.rank == 1) \
    .filter(PlayerPicks.league_id == 0) \
    .filter(PlayerPicks.division_id == 1).first():
    
    if pick != int(al_east_winner_pick):
    session.query(PlayerPicks).filter(PlayerPicks.user_id == user_id) \
    .filter(PlayerPicks.pick_type == 1) \
    .filter(PlayerPicks.rank == 1).filter(PlayerPicks.league_id == 0) \
    .filter(PlayerPicks.division_id == 1) \
    .update({"team_id": al_east_winner_pick, "date_submitted": now_time, "changed": 1, "multiplier": 1})
    
    

When the change picks form is submitted, all 37 picks are sent from the form to the POST and viewmodel. In the controller, I checked if the number of changes was greater than 14 and would redirect them to an error page. But if there were 14 or less changes, the above code would run. If the new pick was not equal to the pick stored in the database, we’d update the pick, capture the time the player submitted changes and flag that the pick was changed. The code works, but there are 36 blocks like the one above &#8211; I couldn’t figure out a method that would work where I could pass it parameters. (36, not 37 as the tiebreaker pick can never be changed). But the key is that it works.

The multiplier is reset to 1 &#8211; if their original pick had qualified for the [double points bonus][3], it needs to reset back to one as the UniquePicks service is re-run after the All-Star Break and then will assign a multiplier of 2 if the new pick qualifies for the double points bonus.

I plan on porting the code to allow a player to change their picks before the season starts to NFLPool to make the player’s life easier. But really, it’s to make mine easier as I don’t want to have to manually delete their picks from the database.

 [1]: https://github.com/prcutler/mlbpool2/blob/master/mlbpool/services/gameday_service.py
 [2]: https://github.com/prcutler/mlbpool2/blob/master/mlbpool/services/playerpicks_service.py
 [3]: https://mlbpool2.com/rules