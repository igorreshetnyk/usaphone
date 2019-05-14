<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Usaphone</title>

        <!-- Bootstrap Core CSS -->
        <link href="/template/css/bootstrap.css" rel="stylesheet">
        <!--<script src="https://use.fontawesome.com/eb11dfe16a.js"></script>-->
        <!-- jQuery -->
        <script src="/template/js/jquery.js"></script>


<!--        <script type="text/javascript">
            VK.init({apiId: 5817369});
        </script>-->


        <!-- Bootstrap Core JavaScript -->
        <script src="/template/js/bootstrap.min.js"></script>

        <!-- Custom CSS -->
        <link href="/template/css/shop-homepage.css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Главная</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">

                        <li>
                            <a href="/news/page-1">Новости</a>
                        </li>
                        <li>
                            <a href="/catalog">Каталог</a>
                        </li>
                        <li>
                            <a href="/payment">Оплата и доставка</a>
                        </li>
                        <li>
                            <a href="/about">Про нас</a>
                        </li>
                        <li>
                            <a href="/contact">Контакты</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav li-right">
                        <?php if (User::isGuest()): ?>
                            <li><a href="/user/login">Вход<i class="fa fa-sign-in fa-lg" aria-hidden="true"></i></a></li>
                        <?php else: ?>
                            <li><a href="/cabinet"><?php echo $_SESSION['user_name']; ?>
                                    <i class="fa fa-user-o fa-lg" aria-hidden="true"></i></a></li>
                            <li><a href="/user/logout">Выход <i class="fa fa-sign-out fa-lg" aria-hidden="true"></i></a></li>
                        <?php endif;?>
                        <li><a href="/cart"><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i>
                                <span id="cart_count">(<?php echo Cart::countItems(); ?>)</span></a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>