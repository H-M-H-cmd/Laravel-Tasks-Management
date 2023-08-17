# Laravel-Tasks-Management App

## That app has those functions: 
* Create new tasks.
* Delete those tasks.
* Edit each task.
* Create new projects ( as categories to filter the tasks according to them).
* Delete project ( can't delete the projects that have tasks related to it ).
* Show tasks that are only related to that project (category).

##installation
1. clone the repository into your local machine (if you are using XAMPP, clone it into "htdocs" folder).
2. in the app root folder execute the commands:
   * npm install
   * composer install
4. To set up your .env, duplicate your .env.example file and rename the duplicated file to .env and update the connection credentials.
5. Then in the app root folder execute the commands:
   * npm run dev
   * php artisan key:generate
   * php artisan migrate
   * php artisan serve    
