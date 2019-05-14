<?php

class NewsController {

    public function actionIndex($page) {

        $newsList = array();

        $newsList = News::getNewsList($page);

        $total = News::getTotalPublicNews();

        $pagination = new Pagination($total, $page, News::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/news/index.php');
        return true;
    }

    public function actionView($id) {

        if ($id) {
            $newsItem = News::getNewsItemById($id);
        }
        require_once(ROOT . '/views/news/view.php');
        return true;
    }

}
