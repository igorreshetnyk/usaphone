<?php

class News {

    const SHOW_BY_DEFAULT = 6;

    public static function getNewsItemById($id) {
        $id = intval($id);

        if ($id) {

            $db = Db::getConnecton();

            $result = $db->query('SELECT * from news WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $newsItem = $result->fetch();

            return $newsItem;
        }
    }

    public static function getNewsList($page = false) {
        
        $count = self::SHOW_BY_DEFAULT;

        $page = intval($page);
       

        $offset = ($page - 1) * $count;

        $db = Db::getConnecton();

        $newsList = array();

        $result = $db->query('SELECT id, title, date, content
                FROM news
                ORDER BY date DESC
                LIMIT ' . $count .
                ' OFFSET ' . $offset);
        $i = 0;

        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['content'] = $row['content'];
            $i++;
        }
        return $newsList;
    }
    
    public static function addNews() {
        
        $db = Db::getConnecton();

       $sql = 'INSERT INTO news '
                . '(name, code, price, category_id, brand, avallability,'
                . 'description, is_new, is_recommend, status)'
                . 'VALUES '
                . '(:name, :code, :price, :category_id, :brand, :avallability,'
                . ':description, :is_new, :is_recommend, :status)';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':avallability', $options['avallability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommend', $options['is_recommend'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return FALSE;
    }
    
    public static function  getTotalPublicNews () {
        
        $db = Db::getConnecton();
        
        $result = $db->query('SELECT count(id) AS count FROM news WHERE status = "1"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['count'];
    }

}
