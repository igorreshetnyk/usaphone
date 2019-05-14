<?php

return array(
    'product/([0-9]+)' => 'product/view/$1', // action view
    'catalog' => 'catalog/index', //action index in Catalog controller

    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'category/([0-9]+)' => 'catalog/category/$1/',
    
    'news/view/([0-9]+)' => 'news/view/$1',
    'news/page-([0-9]+)' => 'news/index/$1',

    'comment/viewForm' => 'comment/viewForm',
    'comment/add' => 'comment/add',

    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
    'cart/checkout' => 'cart/checkout',
    'cart/delete/([0-9]+)' => 'cart/delete/$1',
    'cart' => 'cart/index',


    'cabinet/setup' => 'cabinet/setup',
    'cabinet' => 'cabinet/index',


    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'user/authVk' => 'user/authVk',

    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order' => 'adminOrder/index',

    'admin/comment/delete/([0-9]+)' => 'adminComment/delete/$1',
    'admin/comment/edit/([0-9]+)' => 'adminComment/edit/$1',
    'admin/comment/last' => 'adminComment/lastComments',
    'admin/comment' => 'adminComment/getNewComment',


    'admin/category/create' => 'adminCategory/create',
    'admin/category/update' => 'adminCategory/update',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',


    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/create' => 'adminProduct/create',
    'admin/product' => 'adminProduct/index',
    'admin' => 'admin/index',

    'order/list' => 'order/list',
    'order/view/([0-9]+)' => 'order/view/$1',


    'about' => 'site/about',

    'payment' => 'site/payment',

    'contact' => 'site/contact',


    '' => 'site/index' // action index in SiteController

);
