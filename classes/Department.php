<?php

class Department {

    public static function checkDepartment($department_id)
    {
        global $db;

        $department_id = intval($department_id);
        $db->query("SELECT * FROM `department` WHERE `id` = ".$department_id. " LIMIT 1");
        if($db->affected_rows === 1) {
            return true;
        }
        return false;
    }

}