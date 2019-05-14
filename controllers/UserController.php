<?php

class UserController {

    public function actionRegister() {
        $categores = array();
        $categores = Category::getCategoriesList();


        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $capcha = $_POST['capcha'];


            $errors = [];

            if (!User::checkName($name)) {
                $errors[] = 'Имя должно быть не ментше 2 символов';
            }

            if (!User::checkEmail($email)) {
                $errors[] = 'Введите правильный @mail';
            }

            if (!User:: checkPassword($password)) {
                $errors[] = 'Пароль должен быть не менее 6 символов';
            }

            if (User::checkEmailExist($email)) {
                $errors[] = 'Такой email уже используется';
            }
            if (!User::checkCapcha($capcha))
                $errors[] = 'Введите правильный код с изображения';

            if (empty($errors)) {
                User::register($name, $email, password_hash($password, PASSWORD_DEFAULT));
                $register = $email;
            }
        }
        require_once ROOT . '/views/user/register.php';

        return true;
    }

    public function actionLogin() {
        $categores = array();
        $categores = Category::getCategoriesList();



        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $capcha = $_POST['capcha'];
        }

        $errors = false;

        if (!User::checkEmail($email)) {
            $errors[] = 'не правильный @mail';
        }

        if (!User:: checkPassword($password)) {
            $errors[] = 'Пароль должен быть не менее 6 символов';
        }

        $userId = User::checkUserData($email, $password);

        if ($userId == false) {
            $errors[] = 'Неправильные данные для входа на сайт';
        }

        if (!User::checkCapcha($capcha)) {
            $errors[] = 'Введите правильный код с изображения';
        }

        if ($errors == FALSE) {
            User::auth($userId);

            header("Location: /cabinet/");
        }

        require_once ROOT . '/views/user/login.php';

        return true;
    }

    public function actionAuthVk() {

        define(APP_SHARED_SECRET, '2MjkkwyQybLUin4dV8J0');
        define(APP_ID, '5817369');

        $session = array();
        $member = FALSE;
        $valid_keys = array('expire', 'mid', 'secret', 'sid', 'sig');

        $app_cookie = $_COOKIE['vk_app_' . APP_ID];
        
       // print_r($app_cookie);

        if ($app_cookie) {
            $session_data = explode('&', $app_cookie, 10);
            foreach ($session_data as $pair) {
                list($key, $value) = explode('=', $pair, 2);
                if (empty($key) || empty($value) || !in_array($key, $valid_keys)) {
                    continue;
                }
                $session[$key] = $value;
                ;
            }



            foreach ($valid_keys as $key) {  //проверка или есть все ключи в массиве
                if (!isset($session[$key]))
                    return $member;
            }

            ksort($session);


            $sign = '';
            foreach ($session as $key => $value) {
                if ($key != 'sig') {
                    $sign .= ($key . '=' . $value);
                }
            }

            //print_r($sign);
            $sign .= APP_SHARED_SECRET;

            $sign = md5($sign);

//            echo $session['sig'] . '<br>';
//            echo $sign . '<br>';




            if ($session['sig'] == $sign && $session['expire'] > time()) {
                $member = array(
                    'id' => intval($session['mid']),
                    'secret' => $session['secret'],
                    'sid' => $session['sid']
                );
            }

            return TRUE;
        }
    }

//        $member = authOpenAPIMember();
//
//        if ($member !== FALSE) {
//            /* Пользователь авторизован в Open API */
//        } else {
//            /* Пользователь не авторизован в Open API */
//        }
//    }

    public function actionLogout() {
        unset($_SESSION['user']);
        header("Location: /");
    }
}
