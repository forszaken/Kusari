<?php

use Kusari\App;

define("COREPATH", dirname(__DIR__));

$app = App::getInstance(COREPATH);

return $app;
