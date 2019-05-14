<?php

class CabinetController {

    public function actionIndex() {

        $userId = User::checkLogged();

        $user = User::getUserById($userId);
        
        $_SESSION['user_name'] = $user['name'];

        require_once(ROOT . '/views/cabinet/index.php');

        return TRUE;
    }

    public function actionSetup() {

        $categores = array();
        $categores = Category::getCategoriesList();


        $userId = User::checkLogged();
        $user = User::getUserById($userId);

        $name = $user['name'];
        $password = $user['password'];

        $result = FALSE;


        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];

            $errors = FALSE;

            if (!User::checkName($name)) {
                $errors[] = 'Имя должно быть не меньше 3 символов';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль должен быть не меньше 6 символов';
            }

            if ($errors == FALSE) {
                $result = User::edit($userId, $name, $password);
            }
        }

        require_once (ROOT . '/views/cabinet/setup.php');

        return TRUE;
    }


}
