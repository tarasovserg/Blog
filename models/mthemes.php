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
        $sql = "SELECT id, name FROM `themes`;";
        return $this->fetchAssoc($sql);
    }
    
    function getThemesList() {
        $sql = "SELECT id, name, description FROM `themes`;";
        return $this->fetchAssoc($sql);
    }
    
    function getAllArticles() {
        $sql = "SELECT ar.header, ar.description, ar.id, ar.content, usr.login, th.name, "
                . " ar.date FROM articles AS ar "
                . "LEFT JOIN users AS usr ON ar.creator = usr.id "
                . "LEFT JOIN themes AS th ON ar.theme_id = th.id";
        
        return $this->fetchAssoc($sql);
    }
    function getArticlesForTheme($id) {
        $sql = "SELECT ar.header, ar.description, ar.id, ar.content, usr.login, th.name, "
                . " ar.date FROM articles AS ar "
                . "LEFT JOIN users AS usr ON ar.creator = usr.id "
                . "LEFT JOIN themes AS th ON ar.theme_id = th.id"
                . " WHERE th.id=$id";
        return $this->fetchAssoc($sql);
    }
    function deleteTheme($id) {
        $sql = "DELETE FROM `themes` WHERE `id`={$id};";
        $result = $this->sql($sql);
    }
    function updateTheme($data) {
        $sql = "UPDATE `themes` SET `name`='{$data['name']}',
                    `description`='{$data['description']}'
                        WHERE `id`={$data['id']};";
        $result = $this->sql($sql);
        return true;
    }
    function getArticleById($id) {
        $sql = "SELECT ar.header, ar.content, ar.description, ar.id, ar.content, usr.login, "
                . "th.name, ar.date FROM articles AS ar "
                . "LEFT JOIN users AS usr ON ar.creator = usr.id "
                . "LEFT JOIN themes AS th ON ar.theme_id = th.id "
                . "WHERE ar.id = ".$id;
        
        return $this->fetchSolo($sql);
    }
    function getThemeById($id) {
        $sql = "SELECT id, name, description 
            FROM themes
            WHERE id = ".$id;       
        return $this->fetchSolo($sql);
    }

    
    function addTheme($data) {
        $sql = "INSERT INTO `themes` (`name`, `description`) 
                    VALUES (?, ?);";
                    
        $state = $this->getStatement($sql);
        $state->execute(array($data['name'], $data['description']));
        return $this->lastInsertedId();
    }
        function addArticle($data) {
        $sql = "INSERT INTO `articles` (`theme_id`, `header`, `description`,
               `content`, `date`, `creator`) 
                    VALUES (?, ?, ?, ?, ?, ?);";
                    
        $state = $this->getStatement($sql);
        $state->execute(array($data['theme_id'],
            $data['header'],$data['description'],$data['content'],
            $data['date'], $data['creator']));
        return $this->lastInsertedId();
    }
        function updateArticle($data) {
        $sql = "UPDATE `articles` SET `theme_id`={$data['theme_id']},
                    `header`= '{$data['header']}',
                    `description`='{$data['description']}',
                    `content`='{$data['content']}',
                    `date`='{$data['date']}',
                    `creator`={$data['creator']} 
                        WHERE `id`={$data['id']};";                       
        $result = $this->sql($sql);
        return $data['id'];
    }
    function deleteArticle($id) {
        $sql = "DELETE FROM `articles` WHERE `id`={$id};";
        $result = $this->sql($sql);
    }
    
    function addComment($data) {
        $sql = "INSERT INTO `comments` (`article_id`, `author_id`, `date`,
               `content`) 
                    VALUES (?, ?, ?, ?);";
                    
        $state = $this->getStatement($sql);
        $state->execute(array($data['article_id'], $data['author_id'], 
            $data['date'], $data['content']));
        return $this->lastInsertedId();
    }
    function deleteComment($id) {
        $sql = "DELETE FROM `comments` WHERE `id`={$id};";
        $this->sql($sql);
        
        return true;
        
    }
    
        function getCommentsForArticle($article_id) {
        $sql = "SELECT cm.id, cm.date, cm.content, us.login as author "
                . " FROM comments AS cm "
                . "LEFT JOIN articles AS ar ON ar.id = cm.article_id "
                . "LEFT JOIN users AS us ON us.id = cm.author_id"
                . " WHERE ar.id=$article_id"
                . " ORDER BY cm.date";
        return $this->fetchAssoc($sql);
    }
}
?>
