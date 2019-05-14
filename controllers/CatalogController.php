<?php


class CatalogController
{

    public function actionIndex()
    {
        $categores = array();
        $categores = Category::getCategoriesList();

        $latestProduct = array();
        $latestProduct = Product::getLatestProduct(9);
        
        //$total = Product::getTotalProduct();
        //$pagination = new Pagination($total, $page, "9", 'page-');

        
        require_once(ROOT . '/views/catalog/index.php');

        return TRUE;
    }

    public function actionCategory($categoryId, $page)
    {

        $categores = array();
        $categores = Category::getCategoriesList();

        $categoryProduct = array();
        $categoryProduct = Product::getProductsListByCategory($categoryId, $page);

        $total = Product::getTotalProductInCategory($categoryId);

        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/catalog/category.php');

        return TRUE;
    }

}
