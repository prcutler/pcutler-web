---
title: Importing Team Data into NFLPool
author: Paul Cutler
type: post
date: 2016-10-13T14:31:20+00:00
url: /blog/2016/10/importing-team-data-into-nflpool/
categories:
  - Python
tags:
  - Python
  - SQL

---
Last weekend I discovered how to pretty print the five JSON files I get from MySportsFeeds. This was helpful to understand just how much data is nested within each file. I also spent a good chunk of the weekend writing in a notebook. I mostly did some data modeling on what each table in the database should store and what their primary keys would be. I also captured things I need to research and started breaking the project into chunks. As I tweeted out over the weekend:

<blockquote class="twitter-tweet" data-lang="en">
  <p lang="en" dir="ltr">
    I never imagined building a web app would require so much planning with paper and pencil.
  </p>
  
  <p>
    &mdash; Paul Cutler (@prcutler) <a href="https://twitter.com/prcutler/status/784511753493151744">October 7, 2016</a>
  </p>
</blockquote>



Monday was a holiday so I did the first four courses of Python Jumpstart. I took a break and went back to the JSON files I had worked with. My goal was to build with what should be the easiest table and pull the team data out. This is a dictionary that includes the team name (Texans), city (Houston), abbreviation (HOU) and id (64). The ID number is supplied in the JSON feed and is unique, so I will use that as the primary key. There will be two more columns in the table for conference and division, but I wanted to deal with that later.

I wrote a for loop to try and pull out each team’s information. I quickly got stuck and nothing was working. At one point, the loop I had written worked, but only pulled out the data for the first ranked team. I showed my wife my code and she pointed out that it wasn’t iterating in a loop.

I was stuck for two nights working on this after dinner. I finally stepped back and modified my pretty print Python program and started breaking down all of the information in the JSON file again. I figured out what was a list and what was a dictionary and what was nested where. (It looks like I didn’t commit this to the [git repo][1], oops! Will have to fix that.)

After doing this last night, I found the list I needed to work with. I then re-wrote my for loop and I was able to iterate through all 16 teams in the AFC:

    for afc_team_list in teamlist:
    
    afc_team_name = data["conferenceteamstandings"]["conference"][0]["teamentry"][x]["team"]["Name"]
    
    afc_team_city = data["conferenceteamstandings"]["conference"][0]["teamentry"][x]["team"]["City"]
    
    afc_team_id = data["conferenceteamstandings"]["conference"][0]["teamentry"][x]["team"]["ID"]
    
    afc_team_abbr = data["conferenceteamstandings"]["conference"][0]["teamentry"][x]["team"]["Abbreviation"]
    
    print((afc_team_name),",",(afc_team_city),",",(afc_team_id),",",(afc_team_abbr))
    
    x = x + 1
    

I then [copied and pasted and did it again for the NFC][2]. I did try, unsuccessfully, to modify the conference list &#8211; [&#8220;conference&#8221;][3][][3] &#8211; so I could just write one for loop instead of one for each of the two conferences. But it was working, so I’ll leave it for now. (I’m sure my code is ugly, but hey, I’m just starting).

After that it was all about writing the SQL insert statements to put this into a SQLite3 database. (For now, later it will go into MySQL). That took me a an hour, but at the end, I got it working and was even able to add the conference name to each row.

Next up, I need to take the data in the Division standings JSON file. In it is stored the division name for each division in a conference: `AFC/AFC-East`. I’ll need to write a for loop to grab it, slice it to remove the “AFC/“ and then stick that in the Division field for each team in the Teams table. I’ll also need to stop dropping and re-creating the table each time I insert data, but it’s working.

Progress!

 [1]: https://github.com/pcutler/nflpool
 [2]: https://github.com/pcutler/nflpool/blob/master/import_team_info.py
 [3]: #