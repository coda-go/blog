<?php
/**
 * Created by PhpStorm.
 * User: coda
 * Date: 20.07.17
 * Time: 0:41
 */

require_once "./sql/db.php";
require_once "./function/function.php";


require_once 'vendor/autoload.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('templates/');
$twig = new Twig_Environment($loader, array('cache' => '/tmp/','auto_reload' => true,));

