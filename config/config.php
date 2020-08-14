<?php

//DB Params
define('DB_HOST','localhost');
define('DB_NAME','myblog');
define('DB_USER','root');
define('DB_PASSWORD','');

/*URL Route: remember to remove / at the end of it if you have to include it in the files
This is the path to the index.php file which is the main entry point to the application*/
//define('URLROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
//App Route
define('APPROOT_REQUIRE', substr($_SERVER['SCRIPT_FILENAME'], 0 , -9));

//URL Route: remember to remove / at the end of it if to include it in href
define('URL_PATH', substr($_SERVER['PHP_SELF'], 0 , -9));
//print_r(URL_PATH); die();
//Website Name
define('WEBSITENAME', 'Mon Blog');
