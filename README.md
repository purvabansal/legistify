Legistify
==============

#Pre-requisites
 * xampp amd mysql for windows
 * apache and mysql for linux users

#Steps to use
* Windows users
	1. Windows users should download this repository
	2. Copy the 'ci' folder in htdocs.
	3. Import sql file in phpmyadmin or in mysql
	4. Modify various details in the code according to your need, including email server details in ci/application/controllers/upload.php

* Linux users
	1. They should download this repository and use this in the simila way, codeigniter is used.
	2. Copy the 'ci' directory in 'var/www/html' directory or follow the guide to use codeigniter in linux
	3. Import sql file in mysql by
    mysql -u username -p legistify < legistify.sql
    
*Note: replace username with your username and according to this, you will have to modify details in config file in ci/applications/config/config.php

Run the server, url will be "http://localhost/index.php/upload"
