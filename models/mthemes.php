<?php

class ThemesModel extends Db {

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
        $sql = "INSERT INTO `elledirael`.`themes` (`name`, `description`) 
                    VALUES ('{$data['name']}', '{$data['description']}');";
        $this->sql($sql);       
        return mysql_insert_id();
    }
}
?>
