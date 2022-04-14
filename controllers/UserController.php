<?php

class UserController
{

    public function actionRegister()
    {
        $name = false;
        $email = false;
        $password = false;
        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            // Валидация полей
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 3-х символов';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }
            
            if ($errors == false) {
                // Регистрируем пользователя
                $result = User::register($name, $email, $password);
            }
        }

        require_once(ROOT.'/views/user/register.php');
        return true;
    }

    // логин
    public function actionLogin()
    {

        $email = false;
        $password = false;

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть менее 6-ти символов';
            }

            // проверка, существ. ли пользователь
            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                $errors[] = "Неверные данные для входа на сайт";
            } else {
                // запоминаем пользователя (сессия)
                User::auth($userId);
                // перенаправляем пользователя в закрытую часть.
                header('Location: /cabinet/');
            }
        }
        
        require_once (ROOT.'/views/user/login.php');
        return true;
    }

    // удаление данных о польхователе (выход из сессии)
    public function actionLogout()
    {
        session_start();
        unset($_SESSION['user']);
        header('Location: /');
    }


}