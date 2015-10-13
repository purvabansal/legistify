Legistify
==============

#Pre-requisites
 * xampp for windows users
 * apache, mysql, php for linux users

#Steps to use
* Windows users
	1. Windows users should download this repository
	2. Copy the 'ci' folder in htdocs.
	3. Import sql file in phpmyadmin or in mysql
	4. Modify various details in the code according to your system, including email server details in ci/application/controllers/upload.php and database password in ci/applications/config/config.php
	5. Run the server, url will be "http://localhost/index.php/upload"

* Linux users
	1. They should download this repository and use this in the similar way as that of windows users.
	2. Copy the 'ci' directory in 'var/www/html' or 'var/www'directory. You can also follow any guide to use codeigniter in linux
	3. Import sql file in mysql by
    mysql -u username -p legistify < legistify.sql
    4. Run the server, url will be "http://localhost/index.php/upload"
    
*Note: replace username with your username and according to this, you will have to modify details in config file in ci/applications/config/config.php


