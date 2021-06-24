<?php


class Validate
{
    public static function checkUserName($username)
    {
        $pattern = "/^[A-Za-z]{6,}$/";
        if (!preg_match($pattern,$username)){
            session_start();
            $_SESSION['username']="Username is not available";
        }
    }

    public static function checkEmail($email)
    {
        $pattern = "/^[A-Za-z0-9]*@[A-Za-z0-9]\.[A-Za-z0-9]$/";
        if (!preg_match($pattern,$email)){
            session_start();
            $_SESSION['email']="Email is not available";
        }
    }

    public static function checkPassword($password)
    {
        $pattern = "/[A-Za-z0-9]{8,}/";
        if (!preg_match($pattern,$password)){
            session_start();
            $_SESSION['password']="Password is not available";
        }
    }

}