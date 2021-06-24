<?php


class DataUser
{
    public static string $path = 'dataUser.json';

    public static function loadData()
    {
        $dataJson = file_get_contents(self::$path);
        $data = json_decode($dataJson);
        return self::convertUser($data);

    }

    public static function saveData($data)
    {
        $dataJson = json_encode($data);
        file_put_contents(self::$path, $dataJson);
    }

    public static function convertUser($data)
    {
        $users = [];
        foreach ($data as $item) {
            $user = new User( $item->username, $item->email, $item->password);
            array_push($users, $user);
        }
        return $users;
    }

    public static function addUser($user)
    {
        $users = self::loadData();
        array_push($users, $user);
        self::saveData($users);
    }

    public static function checkLog($user)
    {
        $users = self::loadData();
        foreach ($users as $item) {
            if ($user->username == $item->username && $user->password == $item->password) {
                return true;
            }
        }
        return false;
    }

    public static function login($username,$email, $password)
    {
        $user = new User($username, $email, $password);
        if (self::checkLog($user)) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['email']= $email;
            $_SESSION['password'] = $password;
            header("location:/demo-json-sort-regex/login/olympic/index.php");
        } else {
            echo "Invalid userName";
        }
    }
}