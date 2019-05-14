<?php

/**
 * Description of AdminProductController
 *
 * @author igor
 */
class AdminProductController extends AdminBase {

    public function actionIndex() {

        self::checkAdmin();

        $productsList = Product::getProductsList();

        require_once(ROOT . '/views/admin/admin_product/index.php');
        return TRUE;
    }

    public function actionDelete($id) {
        // Проверка доступа
        self::checkAdmin();
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем товар
            Product::deleteProductById($id);
            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/product");
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin/admin_product/delete.php');
        return true;
    }

    /**
     * Action для страницы "Добавить товар"
     */
    public function actionCreate() {
        // Проверка доступа
        self::checkAdmin();
        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['avallability'] = $_POST['avallability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommend'] = $_POST['is_recommend'];
            $options['status'] = $_POST['status'];
            // Флаг ошибок в форме
            $errors = false;
            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните поля';
            }
            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новый товар
                $id = Product::createProduct($options);
                // Если запись добавлена
                if ($id) {
                    if (is_uploaded_file($_FILES[1]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        for ($i = 0; $i <= count($_FILES); $i++) {
                            move_uploaded_file($_FILES[$i]["tmp_name"], $_SERVER['DOCUMENT_ROOT']
                                    . "template/upload/images/products/{$id}-{$i}.jpg");
                        }
                    }
                };
                // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: /admin/product");
            }
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin/admin_product/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать товар"
     */
    public function actionUpdate($id) {
        // Проверка доступа
        self::checkAdmin();
        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();
        // Получаем данные о конкретном заказе
        $product = Product::getProdactById($id);
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['avallability'] = $_POST['avallability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommend'] = $_POST['is_recommend'];
            $options['status'] = $_POST['status'];
            // Сохраняем изменения


            if (Product::updateProductById($id, $options)) {

                // Если запись сохранена
                // Проверим, загружалось ли через форму изображение

                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                    for ($i = 0; $i <= count($_FILES); $i++) {
                        move_uploaded_file($_FILES[$i]["tmp_name"], $_SERVER['DOCUMENT_ROOT']
                                . "template/upload/images/products/{$id}-{$i}.jpg");
                    }
                
            }
            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/product");
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin/admin_product/update.php');
        return true;
    }

}
