<?php

class ProductController {

    public function actionView($productId) {

        $categores = array();
        $categores = Category::getCategoriesList();

        if (Product::getProdactById($productId)){
            $product = Product::getProdactById($productId);
        } else {
            header("Location /");
        }
        $comments = Comment::showComment($productId);
        $rating = Product::getRating($productId);

        require_once (ROOT . '/views/product/view.php');
        return TRUE;
    }

}
