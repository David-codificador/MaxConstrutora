<?php

use App\App;
use App\Lib\Erro;

session_start();
date_default_timezone_set('America/Fortaleza');

error_reporting(E_ALL & ~E_NOTICE);

require_once("vendor/autoload.php");

try {

    $app = new App();
    $app->run();
} catch (\Exception $e) {
    $oError = new Erro($e);
    $oError->exibe();
}
