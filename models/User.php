<?php

class User
{

    // регистрация пользователя
    public static function register($name, $email, $password)
    {

        $db = Db::getConnection();
        $sql = 'INSERT INTO user (name, email, password) VALUES (:name, :email, :password)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function checkName($name){

        if (strlen($name) >= 3) {
            return true;
        }
        return false;
    }

    public static function checkPassword($password)
    {

        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    public static function checkEmail($email)
    {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    // проверка email в БД
    public static function checkEmailExists($email)
    {

        $db = Db::getConnection();
        $sql = 'SELECT count(*) FROM user WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }

    // проверка пользователя по БД
    public static function checkUserData($email, $password)
    {

        $db =Db::getConnection();
        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();

        if ($user) {
            return $user['id'];
        }
        return false;

    }

    // запоминание пользователя
    public static function auth($userId)
    {
        // session_start();
        $_SESSION['user'] = $userId;
    }

    // проверка арторизованности пользователя
    public static function checkLogged()
    {
        // session_start();
        // если сессия есть -- возвращаем идентификатор пользователя
        if ( isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header('Location: /user/login');
    }

    // гость ли пользователь?!
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    // получение инфо о пользователе из БД (для actionIndex > Cabinet)
    public static function getUserById($id)
    {

        if ($id) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM user WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            // указ.что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();
        }
    }

    // редактирование данных пользователя
    public static function edit($id, $name, $password)
    {

        $db = Db::getConnection();
        $sql = 'UPDATE user SET name = :name, password = :password WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        $result->execute();
    }

}