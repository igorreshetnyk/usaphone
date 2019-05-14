<?php

class SiteController {

    public function action404() {
        require_once(ROOT . '/404.php');
        return TRUE;
    }

    public static function actionIndex() {
        $categores = array();
        $categores = Category::getCategoriesList();

        $latestProduct = array();
        $latestProduct = Product::getLatestProduct();


        require_once(ROOT . '/views/site/index.php');
        return true;
    }

    public function actionAbout() {
        $categores = array();
        $categores = Category::getCategoriesList();

        require_once(ROOT . '/views/site/about.php');
        return true;
    }

    public function actionPayment() {
        $categores = array();
        $categores = Category::getCategoriesList();

        require_once(ROOT . '/views/site/payment.php');
        return true;
    }

    public function actionContact() {

        $categores = array();
        $categores = Category::getCategoriesList();

        $userEmail = '';
        $userText = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];

            $errors = false;

            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }

            if ($errors == false) {
                $adminEmail = 'igor.reshetnyk@gmail.com';
                $message = "Текст: {$userText} . От: {$userEmail}";
                $subject = 'Тема письма';
                $headers = 'From: usaphone@usaphone.kl.com.ua' . "\r\n";
                $result = mail($adminEmail, $subject, $message, $headers);
                $result = true;
            }
        }

        require_once(ROOT . '/views/site/contact.php');
        return true;
    }

}
