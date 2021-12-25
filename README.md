# COMP10120 First Year Team Project
## Contributers (Members of Group Y2)
1. Zahra Al Hubail
2. Sumaiyah Bhaiyat
3. Richard Lee
4. Rares Pirvu
5. Michael Short
6. Miranda Simmons

## Description
This web development project by team Y2 is part of The University of Manchester's first year syllabus. This application is a simple Snakes and Ladders game. 
The current implementation can only be played with varying number of bots and has no online multiplayer option. Understandably, the code is messy and unprofessional given that
this is the first web development project for all the members.

If you wish to run or make further changes to the application:
1. Download The Uniform Server and extract the contents (https://www.uniformserver.com/). Preferably place the contents on your desktop to reduce hassle.
2. Fork this repository. There should be a button on the top right of the page.
3. Pull the folders to your machine and copy/place them into -- UniServerZ > www. 
UniServerZ is the deafult name when you extract the downloaded content. (www should contain all the directories you wish to open in the browser using localhost)
4. In UniServerZ, run UniController application. There should be a popup window.
5. Press 'start Apache' and 'start SQL' to run the apache server (localhost) and the SQL server.
6. By starting the server, your default browser should automatically open 2 new tabs. Navigate to the tab that has a large unlocked 'lock' symbol. Below you should see 'Served Subdirectories'
with a link called 'y2_project' unless you have renamed it something else. Open it.
7. There should be a list of files in the newly opened tab. Open 'LandingPage.php'. Any other .php pages will bring you to the landing page as you have not signed it (excluding
about.php, signIn.php and register.php as they can be accessed without a registered profile).
8. The newly opened tab should contain our poster for our project. From here, you can navigate to the 'about' page to see the group members and a short description. The sign in
and register pages will help you set up a profile. (The SQL database can be seen using phpMyAdmin provided by The Uniform Server. You can open it through the popup window earlier)
9. Once signed it, you can play the game, view the scoreboard, see your statistics in the achievements page or read the instructions to Snakes and Ladders if you are unfamiliar with it.
10. Have fun!

## Credits
Thanks Michael and Rares for coding the entirety of the logic of the game in Javascript. Thanks Sumaiyah for providing the beautiful, copyright free graphics and poster for us.
Thanks Zahra for making the application look stunning using entensive CSS. Thanks Miranda for working with me to set up the database. Special thanks to lecturer Steward Blakeway
for helping me port over to The Uniform Server from MariaDB as there were problems with my university's virtual machine. Final thanks to Obediah Etitho, whom although dropped out due to Covid-19,
still provided moral support. Wherever you are now, I hope you are doing well.
