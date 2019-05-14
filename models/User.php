<?php

class User {

    public static function register($name, $email, $password) {

        $db = Db::getConnecton();

        $sql = 'INSERT INTO user (name, email, password) '
                . 'VALUES (:name, :email, :password)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function checkName($name) {
        if (strlen($name) >= 2 and strlen($name) <= 30) {
            return TRUE;
        }
        return FALSE;
    }

    public static function checkPhone($phone) {
        if (preg_match("/^\d[\d\(\)\ -]{4,14}\d$/", $phone)) {
            return true;
        }
    }

    public static function checkPassword($password) {
        if (strlen($password) >= 6 and strlen($password) <= 30) {
            return TRUE;
        }
        return FALSE;
    }

    public static function checkEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return TRUE;
        }
        return FALSE;
    }

    public static function checkEmailExist($email) {
        $db = Db::getConnecton();

        $sgl = 'SELECT COUNT(*) FROM user WHERE email = :email';

        $result = $db->prepare($sgl);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return TRUE;
        return FALSE;
    }

    public static function checkCapcha($capcha) {
        if ($capcha === $_SESSION['capcha']) {
            return TRUE;
        }
        return FALSE;
    }

    public static function checkUserData($email, $password) {

        $db = Db::getConnecton();

        $sql = 'SELECT * FROM user WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();

        if (password_verify($password, $user['password'])) {

            return $user['id'];
        }
        return FALSE;
    }
    
    public static function checkUserDataSocial($hash, $user_name) {

        $db = Db::getConnecton();

        $sql = 'SELECT * FROM user WHERE name = :user_name AND hash = :hash';

        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $user_name, PDO::PARAM_INT);
        $result->bindParam(':hash', $hash, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();
        if ($user) {

            return $user['id'];
        }
        return FALSE;
    }

    
    
    
    public static function auth($userId) {
        $_SESSION['user'] = $userId;
    }

    public static function checkLogged() {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location:/user/login");
    }

    public static function isGuest() {
        if (isset($_SESSION['user'])) {
            return FALSE;
        }
        return TRUE;
    }

    public static function getUserById($id) {

        $db = Db::getConnecton();
        $sql = 'SELECT * FROM user WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    public static function edit($id, $name, $password) {

        $db = Db::getConnecton();
        $sql = "UPDATE user SET name = :name, password = :password WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);


        return $result->execute();
    }

    public static function createToken() {

    }

}
