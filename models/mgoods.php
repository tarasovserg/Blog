<?php

class Model extends Db {

    function validate($data) {
        //Delete if necessary
        /*if (filter_var($data[''], FILTER_VALIDATE_EMAIL)===FALSE) {
            echo 'Неверный формат email';
            return FALSE;
        }
        $options = array(
            'options' => array(
                'min_range' => 0,
                'max_range' => 3,
                ));
        if (filter_var($data[''], FILTER_VALIDATE_INT, $options) === FALSE) {
            echo 'Неверный интервал';
            return FALSE;
        }*/
        
        $options = array(
            'options' => array(
                'min_range' => 0.0,
                'max_range' => 100000.0,
                ));
        if(strlen($data['good_name'])> 55){
            echo "Преувеличено количество символов!";
            return FALSE;
        }
        if(strlen($data['sort'])> 55){
            echo "Преувеличено количество символов!";
            return FALSE;
        }
        if (filter_var($data['price'], FILTER_VALIDATE_FLOAT, $options) === FALSE) {
            echo 'Неверный интервал';
            return FALSE;
        }
        return TRUE;
    }

    function addGood($data) {
        if(!$this->validate($data)){
            return FALSE;
        }
        $sql = "INSERT INTO `exam`.`goods` (`good_name`, `sort`, `id_enterprise`, `price`) 
            VALUES ('{$data['good_name']}', '{$data['sort']}', '{$data['id_enterprise']}', '{$data['price']}');";
        $this->sql($sql);
        return TRUE;
    }

    function getGoodById($id) {
        $sql = "SELECT * FROM `exam`.`goods` WHERE id_good='{$id}';";
        $result = $this->sql($sql);
        $return_result = array();
        while ($row = mysql_fetch_assoc($result)) {
            $return_result = $row;
        }
        return $return_result;
    }

    function getAllGoods() {
        $sql = "SELECT * FROM exam.goods LEFT JOIN exam.enterprises ON goods.id_enterprise = enterprises.id_enterprise;";
        $result = $this->sql($sql);
        $return_result = array();
        
        while ($row = mysql_fetch_assoc($result)) {
            $return_result[] = $row;
        }
        return $return_result;
    }

    function updateGood($data) {
        if(!$this->validate($data)){
            return FALSE;
        }
        $sql = "UPDATE `exam`.`goods` SET `good_name`=
            '{$data['good_name']}', `sort`='{$data['sort']}', `id_enterprise`='{$data['id_enterprise']}', 
                `price`='{$data['price']}' WHERE `id_good`='{$data['id_good']}';";
                echo $sql;

        $this->sql($sql);
        return TRUE;
    }

    function deleteGood($id) {
        $sql = "DELETE FROM `exam`.`goods` WHERE `id_good`='{$id}';";
        $result = $this->sql($sql);
    }
    
    function getEnterprisesList(){
        $sql = "SELECT id_enterprise, enterprise_name FROM `exam`.`enterprises`;";
        $result = $this->sql($sql);
        $return_result = array();
        while ($row = mysql_fetch_assoc($result)) {
            $return_result[] = $row;
        }
        return $return_result;
    }

}

?>
