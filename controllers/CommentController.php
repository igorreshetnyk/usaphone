<?php

/**
 * Description of CommentController
 *
 * @author igor
 */
class CommentController {

    public function actionViewForm($id) {
        $productId = $id;
        require_once(ROOT . '/views/layouts/comment_form.php');
        return TRUE;
    }

    public function actionAdd($product_id) {
//        // Этот блок кода нужен для корректной работы Ajax скрипта
//        sleep(1);
//        //header("Content-type: text/plain; charset=windows-1251");
//        header("Cache-Control: no-store, no-cache, must-revalidate");
//        header("Cache-Control: post-chek=0, pre-check=0", false);
//        //Преобразуем полученые данные в нужную кодировку
////        while (list ($key, $val) = each($_POST)) {
////            $_POST[$key] = iconv("UTF-8", "CP1251", $_POST[$key]);
////        }
// Устанавливаем параметры валидации
        $nl = strlen($_POST['name']);
        $ml = strlen($_POST['mail']);
        $tl = strlen($_POST['text']);
        $name = $_POST['name'];
        $mail = $_POST['mail'];
        $rating = $_POST['rating'];
        $message = $_POST['text'];
        $capcha = $_POST['capcha'];

        
        $errors = FALSE;

        if ($nl < 0 or $nl > 60 or $ml < 0 or $ml > 60 or $tl < 2 or $tl > 1000) {
            $errors[] = 'Неравильный ввод';
        } elseif (!preg_match('^[a-z0-9]+(([a-z0-9_.-]+)?)@[a-z0-9+](([a-z0-9_.-]+)?)+\.+[a-z]{2,4}$^', $_POST['mail'])) {
            $errors[] = 'Не правильны email';
        }
        if (!User::checkCapcha($capcha)) {
            $errors[] = 'не правильно введены цифры с изображения';
        }

        if ($errors !== FALSE) {
            require_once(ROOT . '/views/layouts/comment_form.php');
        }
// Если прошли валидацию
        else {
// Добавляем комментарий
            Comment::addComment($product_id, $name, $mail, $rating, $message);
            echo '<font color="green">Комментарий добавлен и ожидает проверки!</font>';
        }
        return TRUE;
    }

}
