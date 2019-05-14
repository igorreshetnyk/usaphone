<?php

class ErrorController {

    public function actionIndex() {

        require_once(ROOT . '/views/site/404.php');
        return TRUE;
    }

}
