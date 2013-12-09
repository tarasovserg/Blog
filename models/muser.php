<?php

class UserModel extends Db {


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
    function authorize($login, $password) {
        $sql = "SELECT id, role FROM `elledirael`.`users` WHERE login='{$login}' and
            password ='{$password}';";
        $result = $this->sql($sql);       
        $return_result  = array();
        while ($row = mysql_fetch_assoc($result)) {
            $return_result['id'] = $row['id'];
            $return_result['role'] = $row['role'];
        }
        if(( $return_result['id'] == 0) ||
                ($return_result['id'] == false )) {
            return false;
        }
        return $return_result;
    }
    function getUserById($id) {
        $sql = "SELECT id, login, email, password,role FROM `elledirael`.`users` WHERE id='{$id}';";
        $result = $this->sql($sql);
        $return_result = array();
        while ($row = mysql_fetch_assoc($result)) {
            $return_result = $row;
        }
        return $return_result;
    }

    function getAllUsers() {
        $sql = "SELECT id, login, email, role FROM `elledirael`.`users`;";
        $result = $this->sql($sql);
        $return_result = array();
        while ($row = mysql_fetch_assoc($result)) {
            $return_result[] = $row;
        }
        return $return_result;
    }

    function updateUser($data) {
        $sql = "UPDATE `elledirael`.`users` SET `login`=
                    '{$data['login']}',
                    `email`='{$data['email']}',
                    `role`='{$data['role']}' WHERE `id`='{$data['id']}';";
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
        if(( $result == 0) ||($result == false )) {
            return false;
        }
        return true;
    }
}

?>
