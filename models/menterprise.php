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
        if(strlen($data['name'])> 55){
            echo "Преувеличено количество символов!";
            return FALSE;
        }
        if(strlen($data['address'])> 55){
            echo "Преувеличено количество символов!";
            return FALSE;
        }
        return TRUE;
    }

    function addEnterprise($data) {
        if(!$this->validate($data)){
            return FALSE;
        }
        $sql = "INSERT INTO `exam`.`enterprises` (`enterprise_name`, `address`) 
                            VALUES ('{$data['name']}', '{$data['address']}');";
        $result = $this->sql($sql);
        return TRUE;
    }

    function getEnterprisesById($id) {
        $sql = "SELECT id_enterprise, enterprise_name, address FROM `exam`.`enterprises` WHERE id_enterprise='{$id}';";
        $result = $this->sql($sql);
        $return_result = array();
        while ($row = mysql_fetch_assoc($result)) {
            $return_result = $row;
        }
        return $return_result;
    }

    function getAllEnterprises() {
        $sql = "SELECT * FROM `exam`.`enterprises`;";
        $result = $this->sql($sql);
        $return_result = array();
        while ($row = mysql_fetch_assoc($result)) {
            $return_result[] = $row;
        }
        return $return_result;
    }

    function updateEnterprise($data) {
        if(!$this->validate($data)){
            return FALSE;
        }
        $sql = "UPDATE `exam`.`enterprises` SET `enterprise_name`=
                            '{$data['name']}', `address`='{$data['address']}' WHERE `id_enterprise`='{$data['id_enterprise']}';";
        $result = $this->sql($sql);
        return TRUE;
    }

    function deleteEnterprise($id) {
        $sql = "DELETE FROM `exam`.`enterprises` WHERE `id_enterprise`='{$id}';";
        $result = $this->sql($sql);
    }

}

?>
