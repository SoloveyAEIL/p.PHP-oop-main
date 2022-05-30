<?php

class SiteController
{

    // для главной страницы
    public function actionIndex()
    {

        // список последних товаров
        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(10);

        // список категорий
        $categories = array();
        $categories = Category::getCategoriesList();

        // подключаем вид
        require_once(ROOT.'/views/site/index.php');
        return true;
    }

    // стр. контакты
    public function actionContact()
    {

        $userEmail = false;
        $userText = false;
        $result = false;

        if (isset($_POST['submit'])) {
            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];

            $errors = false;

            // валидация полей
            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }

            if ($errors == false) {
                $adminEmail = 'aeilsolovey@gmail.com';
                $message = "Текст: {$userText}. От {$userEmail}";
                $subject = 'php.opp.main';
                $result = mail($adminEmail, $subject, $message);
                
                $result = true;
            }
        }

        require_once(ROOT.'/views/site/contact.php');
        return true;
    }

}