<?php

class HomeController
{
    public function action() {
        $act = isset($_GET["action"]) ? $_GET["action"] : "";
        switch ($act) {
            case "": return $this->home();
            case "about-us": return $this->aboutUs();
            default: die("404");
        }
    }

    public function home() {
        echo "home";
    }

    public function aboutUs() {
        echo "about-us";
    }
}