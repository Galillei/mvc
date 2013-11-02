<?php

defined('APPLICATION_PATH')
|| define('APPLICATION_PATH', realpath(dirname(__FILE__)));
//don't change constant 'APPFILE', it use in Config.php
defined('APPFILE')
    || define('APPFILE',APPLICATION_PATH.'/configure/application.ini');
require_once "bootstrap.php";
$a = Lib_Application::getInstance();
$a->set('entityManager',$entityManager);
$a->run($argument);
