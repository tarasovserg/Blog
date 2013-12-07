<?php

class ThemesModel extends Db {

    function fetchAssoc($sql) {
        $result = $this->sql($sql);
        $return_result = array();
        while ($row = mysql_fetch_assoc($result)) {
            $return_result[] = $row;
        }
        return $return_result;
    }
    
    function getAllThemesName() {
        $sql = "SELECT id, name FROM `elledirael`.`themes`;";
        return $this->fetchAssoc($sql);
    }
    
    
    /*
    
    
    function addUser($data) {
        if($this->already_exists($data['login']) || $this->already_exists($data['email'])){
            echo 'Already Exists';
            return false;
        }
        $sql = "INSERT INTO `elledirael`.`users` (`login`, `email`, `password`) 
                    VALUES ('{$data['login']}', '{$data['email']}', '{$data['password']}');";
        $result = $this->sql($sql);
        echo $result;
        return true;
    }

    function getUserById($id) {
        $sql = "SELECT id, login, email, password FROM `elledirael`.`users` WHERE id='{$id}';";
        $result = $this->sql($sql);
        $return_result = array();
        while ($row = mysql_fetch_assoc($result)) {
            $return_result = $row;
        }
        return $return_result;
    }

    function getAllUsers() {
        $sql = "SELECT id, login, email FROM `elledirael`.`users`;";
        $result = $this->sql($sql);
        $return_result = array();
        while ($row = mysql_fetch_assoc($result)) {
            $return_result[] = $row;
        }
        return $return_result;
    }

    function updateUser($data) {
//        if(!$this->validate($data)){
//            return FALSE;
//        }
        $sql = "UPDATE `elledirael`.`users` SET `login`=
                    '{$data['login']}',
                    `email`='{$data['email']}' WHERE `id`='{$data['id']}';";
        $result = $this->sql($sql);
        return TRUE;
    }

    function deleteUser($id) {
        $sql = "DELETE FROM `elledirael`.`users` WHERE `id`='{$id}';";
        $result = $this->sql($sql);
    }
    function already_exists($value) {
        $sql = "SELECT COUNT(*) FROM `elledirael`.`users` 
                WHERE `login` = '$value' OR `email` = '$value';";
        $result = $this->sql($sql);
        $result = mysql_result($result);
        print_r($result);
        if(( $result == 0) ||($result == false )) {
            return false;
        }
        return true;
    }
}*/
}
?>
