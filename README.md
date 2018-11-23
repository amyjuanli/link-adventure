# Link Adventures
View the site in 
<a href="https://linkadventure.herokuapp.com/">The Legend of Zelda: Link Adventure</a>
## Story 
It is a Zelda mini game which helps Link get some Rupees. Link can do different things, cut grass, open a chest, do a mission or battle to earn Rupees.  
## Techniques
LAMP stack: 
Linux
PHP Codeigniter 
MySQL
Apache 

## Steps to deploy to heroku
* Step 1: download and install Heroku CLI  to your machine(https://devcenter.heroku.com/articles/heroku-cli#download-and-install)
* Step 2: $ heroku login
* Step 3: git clone your project to your local device
* Step 4: navigate to the project folder 
* Step 5: $git add . $ git commit ..
* Step 5: create a Heroku git repository through command: $ heroku create
* Step 6: push to this Heroku repository through command: $ git push heroku master
* Step 7: If the project has MySQL database, migrate database to heroku hosting. (change hostname, username, password, to database.php file)
  
### Trouble shooting of Errors when deploying your project
ERROR: No 'composer.lock' found!   
Solution: delete the code 
 "require": {
  "php": ">=5.3.7"
 },
from ‘composer.json’ file 

ERROR: session error  
Solution: add this to config.php file: 
*$config['sess_save_path'] = sys_get_temp_dir();*