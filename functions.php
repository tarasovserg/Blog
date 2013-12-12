<?php
require_once 'config/db.php';

function validate($data) {
    $errors = array();
//    print_r($data);exit();
    if( $data['action'] == 'add') { 
        if(!$data['login'] || !$data['email'] || !$data['password'] || !$data['repass']) {
            $errors[] = 'Tous les champs sont obligatoires';
        }
    } elseif($data['action'] == 'eddit') {
        if(!$data['login'] || !$data['email']) {
            $errors[] = 'Le login et l\'email  sont nécessaires';
        }
    }
    if($data['login'] === $data['email']) {
            $errors[] = 'Le login et l\'e-mail doit être différent';
    }
    if($data['password'] !== $data['repass']) {
        $errors[] = 'Les mots de passe ne correspondent pas';
    }
    if(!preg_match('|([a-z0-9_\.\-]{1,20})@([a-z0-9\.\-]{1,20})\.([a-z]{2,4})|is',
            $data['email'])){
        $errors[] = 'L\'email n\'est pas valide';
    }
    if(strlen($data['login']) > 60) {
        $errors[] = 'Login est trop long';
    }
    if(strlen($data['email']) > 60) {
        $errors[] = 'L\'email est trop long';
    }
    if(count($errors)>0) {
        return $errors;
    }
    return true;
}

function clean( $str ) {
    return htmlspecialchars(stripcslashes(strip_tags($str)));
    
}
