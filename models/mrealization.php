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
        
        return TRUE;
    }

    function addRealization($data) {
        if(!$this->validate($data)){
            return FALSE;
        }
        $sql = "INSERT INTO `exam`.`realization` (`id_good`, `date`) VALUES ('{$data['id_good']}', '{$data['date']}');";
        $this->sql($sql);
        return TRUE;
    }

    function getRealizationById($id) {
        $sql = "SELECT * FROM `exam`.`realization` WHERE id_realization='{$id}';";
        $result = $this->sql($sql);
        $return_result = array();
        while ($row = mysql_fetch_assoc($result)) {
            $return_result = $row;
        }
        return $return_result;
    }

    function getAllRealizations() {
        $sql = "SELECT * FROM exam.realization LEFT JOIN exam.goods ON exam.realization.id_good = exam.goods.id_good;";
        $result = $this->sql($sql);
        $return_result = array();
        
        while ($row = mysql_fetch_assoc($result)) {
            $return_result[] = $row;
        }
        return $return_result;
    }

    function updateRealization($data) {
        if(!$this->validate($data)){
            return FALSE;
        }
        $sql = "UPDATE `exam`.`realization` SET `id_good`='{$data['id_good']}', 
            `date`='{$data['date']}' WHERE `id_realization`='{$data['id_realization']}';";
        $this->sql($sql);
        return TRUE;
    }

    function deleteRealization($id) {
        $sql = "DELETE FROM `exam`.`realization` WHERE `id_realization`='{$id}';";
        $result = $this->sql($sql);
    }
    function getGoodsList() {
        $sql = "SELECT id_good, good_name FROM exam.goods";
        $result = $this->sql($sql);
        $return_result = array();
        
        while ($row = mysql_fetch_assoc($result)) {
            $return_result[] = $row;
        }
        return $return_result;
    }
  

}

?>
