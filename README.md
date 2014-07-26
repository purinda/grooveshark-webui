#Grooveshark Server Web UI Project

Get Grooveshark to run on a Raspberry Pi, Let your friends connect to and vote for their favourite songs.
Let the majority rule what you hear at home or office :)

This application is the front-end of [Grooveshark Server](https://github.com/purinda/grooveshark-server) project.
Developed to be light weight as possible and can be run on single board embedded computers easily, such as Beagleboards or Raspberry PIs using Apache2 server or similar.

This application is developed using PIP, a tiny MVC framework for PHP.
Visit [http://gilbitron.github.com/PIP](http://gilbitron.github.com/PIP/) for more information and documentation.

#Configuration
Getting the UI up and running should be straight forward if you are familiar with setting up LAMP stack based web apps.
The same principles apply here.

 - You need Apache2 (I tested on v2.4) installed on your computer (Raspberry Pi for an example) with mod_rewrite enabled.
 - php5 and mod_curl is required.

You can get above packages installed on a Debian based distribution by typing 'sudo aptitude install apache2 php5 php5-curl libapache2-mod-php5' without quotes.
Once the packages are installed you are ready to configure the grooveshark web ui
 
 - use the virtual host file available in the /config/grooveshark-ui.conf to use with the apache2 server. refer to Apache documentation on how to setup a virtual host.
 - edit the /application/config/config.php and set 'grooveshark_player_ip' to point to the host where the Grooveshark server is running (look for the server repo in my github profile). If the server is running on the same computer use '127.0.0.1'.
 Also set the 'grooveshark_player_port' to point to the port used by the server, default port is 16444.
 - make sure the apache rewrite module is enabled 'sudo a2enmod rewrite'



#Todo
 - Add a database for persistant playlists
 - Implement votes for songs, so songs in the playlist will be played frequently based on popularity of the song.

#Demo
[![Demo using a Raspberry Pi](http://theredblacktree.files.wordpress.com/2013/12/screenshot-from-2013-12-09-002915.png)](https://www.youtube.com/watch?v=hrwOu0XkkJg)

#Screenshots
![Front Page](https://raw.github.com/purinda/grooveshark-webui/master/screenshots/frontpage.png)

![Top Navigation Menu](https://raw.github.com/purinda/grooveshark-webui/master/screenshots/navmenu.png)

![Search Results](https://raw.github.com/purinda/grooveshark-webui/master/screenshots/search_results.png)
