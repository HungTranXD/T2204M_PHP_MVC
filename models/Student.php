<?php
include_once ("database.php");
include_once ("IModel.php");
class Student implements IModel
{
    protected $table = "students";
    protected  $primaryKey = "id";
    public $id;
    public $name;
    public $email;
    public $mark;
    public $gender;
    //Constructor (PHP khong co overloading)
    public function __construct()
    {
    }

    function get()
    {
        $sql = "SELECT * FROM $this->table";
        $rs = querry($sql);
        foreach ($rs as $item) {
            $sv = new Student();
            $sv->id = $item["id"];
            $sv->name = $item["name"];
            $sv->email = $item["email"];
            $sv->mark = $item["mark"];
            $sv->gender = $item["gender"];
            $data[] = $sv;
        }
        return $data;
    }

    function create()
    {
        $sql = "INSERT INTO $this->table(name, email, mark, gender) VALUES ('$this->name', '$this->email', $this->mark, '$this->gender')";
        return execute($sql);
    }

    function update()
    {
        $sql = "UPDATE $this->table SET 
                 name = '$this->name', 
                 email = '$this->email',
                 mark = $this->mark,
                 gender = '$this->gender'
                WHERE $this->primaryKey = $this->id";
        return execute($sql);
    }

    function delete()
    {
        $sql = "DELETE FROM $this->table WHERE $this->primaryKey = $this->id";
        return execute($sql);
    }

    function find($id)
    {
        $sql = "SELECT * FROM $this->table WHERE $this->primaryKey = $id";
        $rs = querry($sql);
        foreach ($rs as $item) {
            $sv = new Student();
            $sv->id = $item["id"];
            $sv->name = $item["name"];
            $sv->email = $item["email"];
            $sv->mark = $item["mark"];
            $sv->gender = $item["gender"];
            return $sv;
        }
        return null;
    }
}