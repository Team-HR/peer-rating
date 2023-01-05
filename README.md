## About
This repository is for the development of Integrated HRIS rebooted for other LGU's use developed since the first period of 2022. 

## Server Requirements
- Ubuntu 20.04 LTS Server
- PHP >= 7.3
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- NODEJS v12.22.12
- NPM 6.14.16

## Installing Nodejs and NPM 
Installing Node.js and npm from NodeSource
1. Enable the NodeSource repository by running the following  [`curl`](https://linuxize.com/post/curl-command-examples/)  command as a  [user with sudo privileges](https://linuxize.com/post/how-to-create-a-sudo-user-on-ubuntu/)  :
`curl -sL https://deb.nodesource.com/setup_12.x | sudo -E bash -`
2. Once the NodeSource repository is enabled, install Node.js and npm by typing:
`sudo apt install nodejs`
The nodejs package contains both the  `node`  and  `npm`  binaries.
3. Done


## Installation for Production
Note: All commands below must be ran on the application's root folder. Any changes on the pages and command `npm run prod` must be done on development local machine and commited and pushed to the `main` branch of the repo prior pulling in the production root folder. 
- Clone the main branch of this repository.
- Run command `sudo chown -R $USER:www-data ihris.hrmdo-lgubayawan.online`
- Run command `composer install`
- Run command `npm install`
- Run command `sudo cp .env.example  .env`
- Run command `nano .env` and make changes to the config parameters like database name, user, password and also don't forget to change `APP_DEBUG=true` to `APP_DEBUG=false`. 
- Run command `php artisan key:generate`
- Make sure, using any database management software (e.g. phpmyadmin), create a new database with name `ihris.hrmdo_lgubayawan.online`
- Run command `php artisan migrate`
- Refer to this link: https://laravel.com/docs/8.x/deployment#introduction on how to fully optimize app for production.
- To prevent routing error do the following:
    - `sudo a2enmod rewrite`
    - `sudo nano /etc/apache2/apache2.conf`
    - Find the following code inside the editor:
        ```
        <Directory /var/www/> 
           Options Indexes FollowSymLinks
           AllowOverride None
           Require all granted
        </Directory> 
        ```
        Change to 
        ```
        <Directory /var/www/> 
           Options Indexes FollowSymLinks
           AllowOverride All
           Require all granted
        </Directory> 
        ```
    - `sudo /etc/init.d/apache2 restart`
    - Done
 
 ### Setting Vhost Configuration File
 Note: Make sure on the domain's record, `ihris` is added as `CNAME` which directs to `hrmdo-lgubayawan.online`
 - Run command `cd /etc/apache2/sites-available`
 - Create a new configuration file `sudo nano ihris.hrmdo-lguabayawan.online.conf`
 - Enter the following:
 ```
 <VirtualHost *:80>
    ServerName ihris.hrmdo-lgubayawan.online
    ServerAdmin webmaster@localhost
    DocumentRoot /var/www/ihris.hrmdo-lgubayawan.online/public
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
 ```
 - Run command `sudo a2ensite ihris.hrmdo-lguabayawan.online.conf`
 - Run command `sudo systemctl reload apache`
 - Run command `sudo certbot --apache` and select `ihris.hrmdo-lgubayawan.online` and enable redirect.
 - Done

 ### System Account Registration
 - On `users` database table
 - Add a system administrator user with 
   - username `sys_admin` 
   - roles `["sys_admin"]` emphasis on double quotes
   - password (`sys_admin`) `$2y$10$3MbYI9WQUE9gEblpxGPbyOujmDNxwmjvWmQat.JLaeJKCyMIupf.q`
 
 

## License
NProgress, (c) 2013, 2014 Rico Sta. Cruz - http://ricostacruz.com/nprogress
 @license MIT 

   Bootstrap v5.1.3 (https://getbootstrap.com/)
   Copyright 2011-2021 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
  Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)


 Lodash <https://lodash.com/>
 Copyright OpenJS Foundation and other contributors <https://openjsf.org/>
 Released under MIT license <https://lodash.com/license>
 Based on Underscore.js 1.8.3 <http://underscorejs.org/LICENSE>
 Copyright Jeremy Ashkenas, DocumentCloud and Investigative Reporters & Editors


The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
