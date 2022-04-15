<?php

// массив, который содержит в себе пути. Сост.из запроса в адресн.строке > строку 
return array(
    // товар
    'product/([0-9]+)' => 'product/view/$1',            //  actionView > ProductController
    // каталог
    'catalog' => 'catalog/index',                       //  actionIndex > CatalogController
    // категория товаров
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',       //  actionCategory > CatalogController
    'category/([0-9]+)' => 'catalog/category/$1',       //  actionCategory > CatalogController
    // пользователь
    'user/register' => 'user/register',                  //  actionRegister >  UserController
    'user/login' => 'user/login',                      //  actionLogin >  UserController
    'user/logout' => 'user/logout',                      //  actionLogout >  UserController
    // кабинет
    'cabinet/edit' => 'cabinet/edit',                   //  actionEdit > CabinetController
    'cabinet' => 'cabinet/index',                       //  actionIndex > CabinetController
    // стартовая
    '' => 'site/index',                                 //  actionIndex > SiteController
);