<?php

class Person
{
    public $id;
    public $name;
    public $gender;

    public function __construct($personal_code)
    {
        global $db;

        $user = $db->query("SELECT * FROM `user` WHERE `personal_code` = '".$personal_code."' LIMIT 1");

        if($db->affected_rows === 0) {
            return null;
        }

        $result = $user->fetch_assoc();

        $this->id = $personal_code;
        $this->name = $result['fio'];
        $this->gender = $result['gender'];
    }

    public function addToDepatment($department_id) {
        if(!Department::checkDepartment($department_id)) {
            die("Department does not exists");
        }

        global $db;

        $db->query("
            INSERT
              INTO `department_user_registry`
              SET
                `user_id` = '".$this->id."',
                `department_id` = ".$department_id);


    }
}