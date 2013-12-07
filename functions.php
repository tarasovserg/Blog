<?php
require_once 'config/db.php';

function validate($data) {
    $errors = array();
//$data['login'] = $_POST['login'];
//            $data['email'] = $_POST['email'];
//            $data['password'] = md5($_POST['pass']);
//            $data['repass'] = md5($_POST['repass']);
    if(!$data['login'] || !$data['email'] || !$data['password'] || !$data['repass']) {
        $errors[] = 'All fields are required';
    }
    if($data['login'] === $data['email']) {
        $errors[] = 'Login and Email should be different';
    }
    if($data['password'] !== $data['repass']) {
        $errors[] = 'Passwords do not match';
    }
    if(!preg_match('|([a-z0-9_\.\-]{1,20})@([a-z0-9\.\-]{1,20})\.([a-z]{2,4})|is',
            $data['email'])){
        $errors[] = 'Email is not valid';
    }
    if(strlen($data['login']) > 60) {
        $errors[] = 'Login is too long';
    }
    if(strlen($data['email']) > 60) {
        $errors[] = 'Email is too long';
    }
    if(count($errors)>0) {
        return $errors;
    }
    return true;
}
