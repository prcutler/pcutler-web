---
title: Building the NFLPool webapp – Starting with JSON
author: Paul Cutler
type: post
date: 2016-10-10T13:22:08+00:00
url: /2016/10/nflpool-json/
categories:
  - Python
tags:
  - NFLPool
  - Python

---
I’m glad I started with the Python for Everybody specialization at Coursera before jumping into Python Jumpstart by building 10 Python Apps by Michael Kennedy. Mr. Kennedy moves _fast_. I’ve completed the first four apps and it’s good to get a refresher on the information I learned in Python for Everybody.

I also spent part of the weekend sketching in a notebook. I did some brainstorming about the database design I’ll need for NFLPool. I learned one of the bigger differences between MySQL and Postgresql is that MySQL does not have the ability to use foreign keys but MySQL is much faster. The lack of foreign keys may make the design a bit tougher, but more on that later in a different blog post.

I also sketched out some ideas for the functions I’m going to need to write so I’m not writing the same bit of code over and over again. From there, I created a to-do list of things to start working through. I find this whole process of building an app overwhelming. I never thought I’d be using paper and pencil so much, but I’ve found it helpful to break this into smaller chunks and attack them one at a time.

Then I started working on the import process for the JSON. This quickly derailed as I realized just how many stats MySportsFeeds captures from an NFL game. That quickly turned in to writing a JSON pretty print statement so I could see how the five different JSON files nested their dictionaries.

I currently download five JSON files every Tuesday via a cron job with all the statistics. I know my app won’t be ready for the 2016 season and my hope is by having 17 weeks of data, I can re-create the season to test my app to make sure it’s scoring each player correctly as we move through the season week by week. When I download the JSON via curl, it includes all the web headers, such as:

    HTTP/1.1 200 OK
    Date: Wed, 21 Sep 2016 12:16:07 GMT
    Server: Apache-Coyote/1.1
    Cache-Control: must-revalidate, no-store, s-maxage=0, max-age=0, private
    Access-Control-Allow-Headers: Origin, Content-Type, Accept, Accept-Encoding, Accept-Language, Authorization
    Access-Control-Allow-Origin: *
    Access-Control-Allow-Credentials: true
    Content-Encoding: gzip
    Access-Control-Allow-Methods: GET, OPTIONS
    Content-Type: application/json
    Set-Cookie: JSESSIONID=B7548F2309747418749B5421282A5E08; Path=/leaguemanager-web/; HttpOnly
    Vary: User-Agent
    Connection: close
    Transfer-Encoding: chunked
    

And then the JSON starts right after that with curly braces. I was proud of myself as I wrote an if statement to load the file, read the lines, and load the JSON when finding the curly braces. Then I wrote code to first print out all the statistics categories (commented out below) and pretty print all the JSON:

    import json
    import pprint
    import os
    
    #Open the JSON file that includes headers
    
    
    #Change the name of the file to open to match the query below:
    with open(&#039;json/20160921-division-team-standings.json&#039;) as file:
        alltext = file.readlines()  #Put each line into a list
    
    # division-team-standings.json
    for lines in alltext:
        if lines.startswith(&#039;{&#039;):
            rawdata = lines
            data = json.loads(rawdata)
    #        for stat_categories in data["divisionteamstandings"]["division"][0]["teamentry"][0]["stats"]:
    #            pprint.pprint(stat_categories)   #Print all the categories in "stats"
            pprint.pprint(data)  #Print the JSON
    

I had five files to review and I just manually changed the code to the file I wanted and had a code block for each of the files. I know I probably should have just wrote a function, but I was in the zone. (My code probably isn’t very Pythonic either, but I have to start somewhere on this journey). I also know that when it comes time to build the real app I’ll be loading the JSON across the network and not from a local file, but future Paul gets to deal with that.

I also spent some time playing around with the [nflgame][1] and [mlbgame][2] Python modules. I need to spend some more time with them and I’ll share some thoughts on those in another blog post.

 [1]: https://github.com/BurntSushi/nflgame
 [2]: https://github.com/zachpanz88/mlbgame