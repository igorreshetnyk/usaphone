<?php

class Comment {

    public static function addComment($product_id, $name, $mail, $rating, $message) {
        // Соединение с БД
        $db = Db::getConnecton();
        // Текст запроса к БД
        $sql = 'INSERT INTO comments (product_id, name, email, rating, message, public)' . 'VALUES
                    (:product_id, :name, :mail, :rating, :message, 0)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':mail', $mail, PDO::PARAM_STR);
        $result->bindParam(':rating', $rating, PDO::PARAM_INT);
        $result->bindParam(':message', $message, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function editComment($comment_id, $rating, $message, $public) {
        // Соединение с БД
        $db = Db::getConnecton();
        // Текст запроса к БД
        $sql = 'UPDATE comments
            SET
                rating = :rating,
                message = :message,
                public = :public
            WHERE id = :comment_id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':comment_id', $comment_id, PDO::PARAM_INT);
        $result->bindParam(':rating', $rating, PDO::PARAM_INT);
        $result->bindParam(':message', $message, PDO::PARAM_STR);
        $result->bindParam(':public', $public, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function showComment($product_id) {

        $db = Db::getConnecton();

        $result = $db->query("SELECT * FROM comments WHERE product_id LIKE $product_id AND public = 1 ORDER BY created DESC");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $comments = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $comments[$i]['product_id'] = $row['product_id'];
            $comments[$i]['name'] = $row['name'];
            $comments[$i]['created'] = $row['created'];
            $comments[$i]['rating'] = $row['rating'];
            $comments[$i]['message'] = $row['message'];
            $i++;
        }
        return $comments;
    }

    public static function showOneComment($comment_id) {

        $db = Db::getConnecton();

        $result = $db->query("SELECT * FROM comments WHERE id LIKE $comment_id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    public static function getRatingFromUser($product_id) {

        $db = Db::getConnecton();

        $result = $db->query("SELECT rating FROM comments WHERE product_id LIKE $product_id AND public = 1");

        $i = 0;
        $rating = 0;

        while ($row = $result->fetch()) {
            $rating += $row['rating'];
            $i++;
        }
        $rating = round($rating / $i, 0);
        return $rating;
    }

    public static function countComent($product_id) {

        $db = Db::getConnecton();

        $result = $db->query("SELECT * FROM comments WHERE product_id LIKE $product_id AND public = 1");

        $i = 0;
        while ($row = $result->fetch()) {
            $i++;
        }
        return $i;
    }

    public static function getNewComments() {

        $db = Db::getConnecton();

        $result = $db->query("SELECT * FROM comments WHERE public = 0 ORDER BY created DESC");

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $comments = array();
        $i = 0;

        while ($row = $result->fetch()) {
            $comments[$i]['product_id'] = $row['product_id'];
            $comments[$i]['name'] = $row['name'];
            $comments[$i]['created'] = $row['created'];
            $comments[$i]['rating'] = $row['rating'];
            $comments[$i]['message'] = $row['message'];
            $comments[$i]['id'] = $row['id'];
            $i++;
        }

        return $comments;
    }

    public static function deleteCommentById($comment_id) {

        $db = Db::getConnecton();

        $sql = 'DELETE FROM comments WHERE id = :id';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $comment_id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getLastComment($count) {

        $db = Db::getConnecton();

        $sql = 'SELECT * FROM comments WHERE created > NOW() - INTERVAL :count DAY;';

        $result = $db->prepare($sql);
        $result->bindParam(':count', $count, PDO::PARAM_INT);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $comments[$i]['product_id'] = $row['product_id'];
            $comments[$i]['name'] = $row['name'];
            $comments[$i]['created'] = $row['created'];
            $comments[$i]['rating'] = $row['rating'];
            $comments[$i]['message'] = $row['message'];
            $comments[$i]['id'] = $row['id'];
            $comments[$i]['public'] = $row['public'];
            $i++;
        }
        return $comments;
    }

}
