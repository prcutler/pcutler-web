---
title: NFLPool Progess 8/8/17 – Making a user’s picks work
author: Paul Cutler
type: post
date: 2017-08-08T14:56:50+00:00
url: /2017/08/nflpool-progess-8817-making-a-users-picks-work/
featured_image: /wp-content/uploads/2017/08/Screenshot-2017-08-07-15.59.41-1.png
categories:
  - Python
tags:
  - NFLPool
  - Pyramid
  - Python

---
I’m not even sure where to start from last update on Friday. The last 48 hours have been a roller coaster of up and downs of getting stuck and then figuring it out.

After completing the the functionality to create a new installation and add a new season to NFLPoo (or update to a new season) l, I needed to start working on letting a user make their picks for the new season.

First, I had to revisit my data model on where I store all the team information about each NFL team, including the division and conference each team lives in. During the new install process, I’ve added some code that now automatically assigns this. For the most part, this information is static. The NFL hasn’t changed what teams are in each division since the 90s and the only thing that may change at some point is if a team relocates and their abbreviation changes. For example, with the Chargers moving from San Diego to Los Angeles, they went from SDC to LAC. The Raiders are still a few years away from moving to Las Vegas, so I’m just going to leave that hard coded as is.

Now it was time to start coding the form that shows to users to make their picks. I couldn’t decide if this should live within its own controller or in the account controller. In the end, I’ve moved all of the picks to its own controller. But to do so, I need to re-watch all of the training videos on the routes, controllers and services to make this happen in Pyramid. It just wasn’t clicking for me. I was stuck Sunday, had a breakthrough, and by Monday night I was stuck again with a similar, but different, issue. I just couldn’t wrap my head around why and how you have to pass a dictionary from the controller and how it interacts with the data layer in the service. But finally, it clicked.

I finished wiring that up and now I needed to dig deep into Chameleon templates and Bootstrap forms with the Bootstrap CSS. Talk about getting stuck and being frustrated. The example used in the Python for Entrepreneurs course is pretty basic and I needed to pass a lot of values from the controller &#8211; one for each pick. I don’t know if there is a better way to do it, but I’ve figured it out by calling the service and a given method for each of the queries. For example, you have to pick which teams will finish 1st, 2nd or Last in a division (four teams in a division). This is one method per division. The method looks at the database and does a `SELECT` on the `TeamInfo` table `WHERE` the conference is equal to AFC and the division is equal to East and return the four teams in that conference and division. I got that working and was able to return two of the divisions. I didn’t want to do them all as I just needed to prototype that I could have two queries working and stick them in the form.

After I got that working, I needed to learn and understand how I could pass those attributes (the team name) inside of a dropdown box. Let me tell you &#8211; Google results for Chameleon templates, even when adding some of the TAL markup, are few and far between. You sure do see a lot of Powerpoint templates featuring chameleons in the search results for some reason.

There was so much swearing involved. I could iterate over the list, but then it would display four objects and not the team name. I kept at it, realizing I needed to fix the query, and now the team name did display. This was just inside a paragraph tag. I needed this to display inside a dropdown box and instead I made four dropdown boxes appear. (Progress? At least I was still iterating over the list.) And then I was stuck and asked my wife for help. She’s never used Python or Chameleon templates, but after about ten or fifteen minutes, she figured out the issue. To make matters worse, I was using the wrong Bootstrap button group, so we fixed that and she also figured out in Chameleon how to make the `team_id` display as the `team_name` and pass the `team_id` back to the form when submitting. I’m not going to even pretend I understand Chameleon templates and using more than these values &#8211; I understand you can do all kinds of Python code right in the template, but I don’t need it right now and it makes my head hurt.

<img class="alignnone size-full wp-image-6736" src="https://i0.wp.com/paulcutler.org/blog/wp-content/uploads/2017/08/Screenshot-2017-08-07-15.59.41.png?resize=700%2C438&#038;ssl=1" width="700" height="438" data-recalc-dims="1" />

That was huge. I then spent the last couple of hours before bed trying to figure out how to capture the `user_id` of the person currently logged in and making their picks, so I could submit that to the database so I know who actually made the picks. Lots of review of the `BaseController` from the training and I got it.

By that time it was past my bedtime, but I had the pick submission process working. I could grab the `user_id` of the person submitting the picks, the date and time the picks were submitted, and the picks themselves all grabbed from the form and passed to the database. The form also needs a lot of styling, but I’ll take usability first.

I’m so close to launching I can taste it &#8211; and with no time to spare. This week I need to finish coding the picks form and get all the choices in there, and then I need to add the password reset functionality to Accounts and add logging from Rollbar. It would be nice to log when a pick is submitted and get a notification, as well as any errors. Then it comes time to deployment, of which I have many thoughts, but that’s for another post.