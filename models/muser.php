<?php

class UserModel extends Db {

    function fetchAssoc($sql) {
        $result = $this->sql($sql);
        $return_result = array();

        foreach($result as $res){
            $return_result[] = $res;
        }
        return $return_result;
    }
    
    function fetchSolo($sql) {
        $result = $this->sql($sql);
        $return_result = array();
        foreach($result as $res){
            $return_result = $res;
        }
        return $return_result;
    }

    function addUser($data) {
        if($this->already_exists($data['login']) || $this->already_exists($data['email'])){
            echo 'Already Exists';
            return false;
        }
        $sql = "INSERT INTO users (login, email, password) 
                    VALUES (?, ?, ?);";
        
        $state = $this->getStatement($sql);
        $state->execute(array($data['login'], $data['email'], $data['password']));
       
        return true;
    }
    function authorize($login, $password) {
        $sql = "SELECT id, role FROM `users` WHERE login='{$login}' and
            password ='{$password}';";
        $result = $this->sql($sql);       
        $return_result  = array();
        foreach ($result as $row) {
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
        $sql = "SELECT id, login, email, password,role FROM `users`"
                . " WHERE id='{$id}';";
        return $this->fetchSolo($sql);
    }

    function getAllUsers() {
        $sql = "SELECT id, login, email, role FROM `users`;";
        return $this->fetchAssoc($sql);
    }

    function updateUser($data) {
        $sql = "UPDATE `users` SET `login`=
                    '{$data['login']}',
                    `email`='{$data['email']}',
                    `role`='{$data['role']}' WHERE `id`='{$data['id']}';";
        $result = $this->sql($sql);
        return TRUE;
    }

    function deleteUser($id) {
        $sql = "DELETE FROM `users` WHERE `id`='{$id}';";
        $result = $this->sql($sql);
    }
    function already_exists($value) {
        $sql = "SELECT COUNT(*) FROM `users` 
                WHERE `login` = '$value' OR `email` = '$value';";
        $result = $this->sql($sql);
        $result = $result->fetchColumn();
        if(( $result == 0) ||($result == false )) {
            return false;
        }
        return true;
    }
}

?>
