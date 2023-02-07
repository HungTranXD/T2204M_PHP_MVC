<?php
session_start();
include_once ("controllers/HomeController.php");
include_once ("controllers/StudentController.php");

$ctr = isset($_GET["module"]) ? $_GET["module"] : "/";

switch ($ctr) {
    case "/":
        $home = new HomeController();
        $home->action();
        break;
    case "student":
        $st = new StudentController();
        $st->action();
        break;
    default: die("404 not found");
}