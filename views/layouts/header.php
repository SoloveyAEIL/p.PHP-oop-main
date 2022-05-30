<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link href="/template/css/style.css" rel="stylesheet";>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
</head>

<body>
    <header id="header">    <!--header-->

        <div class="header_top">   <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa-phone"></i>+375 29 666 00 02</a></li>
                                <li><a href="#"><i class="fa-envelope"></i>aeilsolovey@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fab fa-facebook-f"></i>@</a></li>
                                <li><a href="#"><i class="fa fa-3x fa-google-plus-square"></i>@</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>  <!--/header_top-->

        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="/"><img src="/template/images/home/logo.png" alt="" />LOGO</a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-shopping-cart"></i> Корзина
                                <span id="cart-count">(<?php echo Cart::countItems(); ?>)</span></a></li>
                            <?php if (User::isGuest()): ?>
                                <li><a href="/user/login/"><i class="fa fa-lock"></i> Вход</a></li>
                                <li><a href="/user/register/"><i class="fa fa-lock"></i> Регистрация</a></li>

                            <?php else: ?>
                                <li><a href="/cabinet/"><i class="fa fa-user"></i> Аккаунт</a></li>
                                <li><a href="/user/logout/"><i class="fa fa-unlock"></i> Выход</a></li>
                            <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->

        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="/">Главная</a></li>
                                <li class="dropdown"><a href="#">Магазин<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="#">Каталог товаров</a></li>
                                        <li><a href="#">Корзина</a></li> 
                                    </ul>
                                </li>
                                <li><a href="#">О магазине</a></li>
                                <li><a href="#">Контакты</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <hr>
        </div><!--/header-bottom-->
