<?php
include_once ("models/Student.php");
class StudentController
{
    public function action() {
        $act = isset($_GET["action"]) ? $_GET["action"] : "";
        switch ($act) {
            case "": return $this->get();
            case "create": return $this->create();
            case "save": return $this->save();
            case "edit": return $this->edit();
            case "update": return $this->update();
            case "delete": return $this->delete();
            default: die("404");
        }
    }

    public function get() {
        $st = new Student();
        $data = $st->get();
        include ("views/liststudent.php");
    }
    public function create() {
        include ("views/createstudent.php");
    }

    public function save() {
        $sv = new Student();
        $sv->name = $_POST["name"];
        $sv->email = $_POST["email"];
        $sv->mark = $_POST["mark"];
        $sv->gender = $_POST["gender"];

        $rs = $sv->create();
        if($rs) {
            header("Location: ?module=student");
            return;
        }
        header("Location: ?module=student&action=create");
    }

    public function edit() {
        $sv = new Student();
        $data = $sv->find($_GET["id"]);
        include ("views/editstudent.php");
    }

    public function update() {
        $sv = new Student();
        $sv->id = $_POST["id"];
        $sv->name = $_POST["name"];
        $sv->email = $_POST["email"];
        $sv->mark = $_POST["mark"];
        $sv->gender = $_POST["gender"];

        $rs = $sv->update();
        if ($rs) {
            header("Location: ?module=student");
            return;
        }
        header("Location: ?module=student&action=edit&id=$sv->id");
    }

    public function delete() {
        $sv = new Student();
        $sv->id = $_POST["id"];
        $rs = $sv->delete();
        if ($rs) {
            header("Location: ?module=student");
            return;
        }
        header("Location: ?module=student");

    }

}