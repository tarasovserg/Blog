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
    
    function fetchSolo($sql) {
        $result = $this->sql($sql);
        $return_result = array();
        while ($row = mysql_fetch_assoc($result)) {
            $return_result = $row;
        }
        return $return_result;
    }
    
    function getAllThemesName() {
        $sql = "SELECT id, name FROM `elledirael`.`themes`;";
        return $this->fetchAssoc($sql);
    }
    
    
    function getAllArticles() {
        $sql = "SELECT ar.header, ar.description, ar.id, ar.content, usr.login, th.name, "
                . " ar.date FROM articles AS ar "
                . "LEFT JOIN users AS usr ON ar.creator = usr.id "
                . "LEFT JOIN themes AS th ON ar.theme_id = th.id";
        
        return $this->fetchAssoc($sql);
    }
    
    function getArticleById($id) {
        $sql = "SELECT ar.header, ar.content, ar.description, ar.id, ar.content, usr.login, "
                . "th.name, ar.date FROM articles AS ar "
                . "LEFT JOIN users AS usr ON ar.creator = usr.id "
                . "LEFT JOIN themes AS th ON ar.theme_id = th.id "
                . "WHERE ar.id = ".$id;
        
        return $this->fetchSolo($sql);
    }
    

    
    function addTheme($data) {
//        if($this->already_exists($data['login']) || $this->already_exists($data['email'])){
//            echo 'Already Exists';
//            return false;
//        }
        $sql = "INSERT INTO `elledirael`.`themes` (`name`, `description`) 
                    VALUES ('{$data['name']}', '{$data['description']}');";
        $this->sql($sql);       
        return mysql_insert_id();
    }
/*
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
