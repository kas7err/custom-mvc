<?php

require dirname(__DIR__) . '/vendor/autoload.php';

// define("HOST",  "localhost");
// define("DBUSER",  "root");
// define("DBPASSWORD",  "");
// define("DBNAME",  "workproject");

define("CONTROLLERS",  "\\App\\Controllers\\");


new Core\Router();
