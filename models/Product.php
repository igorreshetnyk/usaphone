<?php

class Product {

    const SHOW_BY_DEFAULT = 6;

    public static function getLatestProduct($count = self::SHOW_BY_DEFAULT) {

        $count = intval($count);

        $db = Db::getConnecton();

        $productList = array();

        $result = $db->query('SELECT id, name, price, image, is_new, code, description FROM product'
                . ' WHERE status = 1 '
                . '  ORDER BY id DESC '
                . ' LIMIT ' . $count);

        $i = 0;

        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['image'] = $row['image'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['is_new'] = $row['is_new'];
            $productList[$i]['code'] = $row['code'];
            $productList[$i]['description'] = $row['description'];
            $i++;
        }

        return $productList;
    }

    public static function getProductsListByCategory($categoryId = false, $page = false) {

        if ($categoryId) {
            $page = intval($page);

            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = Db::getConnecton();

            $product = array();

            $result = $db->query("SELECT id, name, price, image, is_new, code, description FROM product"
                    . " WHERE status = '1' "
                    . "AND category_id = '$categoryId'"
                    . "  ORDER BY id ASC "
                    . ' LIMIT ' . self::SHOW_BY_DEFAULT
                    . ' OFFSET ' . $offset);

            $i = 0;

            while ($row = $result->fetch()) {
                $product[$i]['id'] = $row['id'];
                $product[$i]['name'] = $row['name'];
                $product[$i]['image'] = $row['image'];
                $product[$i]['price'] = $row['price'];
                $product[$i]['is_new'] = $row['is_new'];
                $product[$i]['code'] = $row['code'];
                $product[$i]['description'] = $row['description'];
                $i++;
            }

            return $product;
        }
    }

    public static function getProdactById($id) {

        // Соединение с БД
        $db = Db::getConnecton();
        // Текст запроса к БД
        $sql = 'SELECT * FROM product WHERE id = :id';
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполнение коменды
        $result->execute();
        // Получение и возврат результатов
        return $result->fetch();
    }

    public static function getTotalProductInCategory($categoryId) {


        $db = DB::getConnecton();
        $result = $db->query('SELECT count(id) AS count FROM product WHERE status = "1"'
                . ' AND category_id = "' . $categoryId . '" ');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }

    public static function getProductByIds($idArray) {

        $products = array();

        $db = Db::getConnecton();

        $idsString = implode(',', $idArray);

        $sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";

        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;

        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['code'] = $row['code'];
            $i++;
        }

        return $products;
    }

    /**
     * Возвращает список товаров
     * @return array <p>Массив с товарами</p>
     */
    public static function getProductsList() {
        // Соединение с БД
        $db = Db::getConnecton();
        // Получение и возврат результатов
        $result = $db->query('SELECT id, name, price, code FROM product ORDER BY id ASC');
        $productsList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['code'] = $row['code'];
            $productsList[$i]['price'] = $row['price'];
            $i++;
        }
        return $productsList;
    }

    /**
     * Удаляет товар с указанным id
     * @param integer $id <p>id товара</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteProductById($id) {
        
        //delete all photo
        foreach (self::getAllImage($id) as $photo)
            unlink($_SERVER['DOCUMENT_ROOT'] . $photo);
        
        // Соединение с БД
        $db = Db::getConnecton();
        // Текст запроса к БД
        $sql = 'DELETE FROM product WHERE id = :id';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Редактирует товар с заданным id
     * @param integer $id <p>id товара</p>
     * @param array $options <p>Массив с информацей о товаре</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateProductById($id, $options) {

        // Соединение с БД
        $db = Db::getConnecton();
        // Текст запроса к БД
        $sql = "UPDATE product
            SET
                name = :name,
                code = :code,
                price = :price,
                category_id = :category_id,
                brand = :brand,
                avallability = :avallability,
                description = :description,
                is_new = :is_new,
                is_recommend = :is_recommend,
                status = :status
            WHERE id = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
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
        return $result->execute();
    }

    /**
     * Добавляет новый товар
     * @param array $options <p>Массив с информацией о товаре</p>
     * @return integer <p>id добавленной в таблицу записи</p>
     */
    public static function createProduct($options) {
        // Соединение с БД
        $db = Db::getConnecton();
        // Текст запроса к БД
        $sql = 'INSERT INTO product '
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

    /**
     * Возвращает текстое пояснение наличия товара:<br/>
     * <i>0 - Под заказ, 1 - В наличии</i>
     * @param integer $availability <p>Статус</p>
     * @return string <p>Текстовое пояснение</p>
     */
    public static function getAvailabilityText($availability) {
        switch ($availability) {
            case '1':
                return 'В наличии';
                break;
            case '0':
                return 'Под заказ';
                break;
        }
    }

    /**
     * Возвращает путь к изображению
     * @param integer $id
     * @return string <p>Путь к изображению</p>
     */
    public static function getImage($id) {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';
        // Путь к папке с товарами
        $path = '/template/upload/images/products/';
        // Путь к изображению товара
        $pathToProductImage = $path . $id . '-1.jpg';
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToProductImage;
        }
        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }

    public static function getAllImage($id) {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';
        // Путь к папке с товарами
        $path = '/template/upload/images/products/';
        // Путь к изображению товара
        $pathToProductImage = $path . $id;

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage . "-1.jpg")) {

            for ($i = 0; $i <= 6; $i++) {

                if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage . "-" . $i . ".jpg")) {

                    $allImage[$i] = $path . $id . "-" . $i . ".jpg";
                }
            }
            return $allImage;
        }
        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }

    public static function deleteAllPhoto($id) {
        $path = '/template/upload/images/products/';
        //var_dump($id);
        //die();
        // Путь к изображению товара
        //if (isset($_POST['submit']))
        foreach ($id as $photo)
            echo $photo;
        die();
        unlink($photo);
    }

    public static function getProductByRecomended() {

        // Соединение с БД
        $db = Db::getConnecton();
        // Получение и возврат результатов
        $result = $db->query('SELECT id, name, price, code FROM product WHERE is_recommend = 1');
        $productsList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['code'] = $row['code'];
            $productsList[$i]['price'] = $row['price'];
            $i++;
        }
        return $productsList;
    }

    public static function getRating($product_id) {

        $db = Db::getConnecton();

        $result = $db->query("SELECT rating FROM comments WHERE product_id LIKE $product_id AND public = 1");

        $i = 0;
        $rating = 0;

        while ($row = $result->fetch()) {
            $rating += $row['rating'];
            $i++;
        }
        if ($i == 0) {
            $rating = 0;
        } else {
            $rating = ceil($rating / $i);
        }
        return $rating;
    }

}
