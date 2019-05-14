<?php


/**
 * Проверка или является пользователь админом
 *
 * @return  boolean
 */
abstract class AdminBase {
    
    public static function checkAdmin(){
        $userId = User::checkLogged();
        
        $user = User::getUserById($userId);
        
        if ($user['role'] == 'admin'){
            return true;
        }
        die('Access denied');
    }
}
