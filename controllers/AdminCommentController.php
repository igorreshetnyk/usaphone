<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminComentController
 *
 * @author igor
 */
class AdminCommentController extends AdminBase {

    public function actionGetNewComment() {

        self::checkAdmin();

        $comments = Comment::getNewComments();

        require_once(ROOT . '/views/admin/admin_comment/index.php');
        return TRUE;
    }

    public function actionDelete($commnet_id) {

        self::checkAdmin();
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем товар
            Comment::deleteCommentById($commnet_id);
            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/comment/");
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin/admin_comment/delete.php');
        return true;
    }

    public function actionEdit($comment_id) {

        self::checkAdmin();

        $comment = Comment::showOneComment($comment_id);

        if (isset($_POST['submit'])) {
            echo $message = $_POST['message'];
            echo $public = $_POST['public'];
            echo $rating = $_POST['rating'];

            if (Comment::editComment($comment_id, $rating, $message, $public)) {
                header("Location: /admin/comment/");
            } else {
                die(stop);
            }
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin/admin_comment/edit.php');
        return true;
    }

    public function actionLastComments() {

        self::checkAdmin();

        if (isset($_POST['submit'])){
         
         $count = $_POST['count_day'];
            
        $comments = Comment::getLastComment($count);
        }
        require_once(ROOT . '/views/admin/admin_comment/last.php');
        return true;
    }

}
