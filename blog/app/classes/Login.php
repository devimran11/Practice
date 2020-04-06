<?php
/**
 * Created by PhpStorm.
 * User: imran
 * Date: 3/25/2020
 * Time: 7:15 PM
 */
namespace App\Classes;
class Login
{
    public function adminLoginCheck($data){
        $link = Database::db_connection();
        $email = $data['email'];
        $password = md5($data['password']);
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        if(mysqli_query($link, $sql)){
            $queryInfo = mysqli_query($link, $sql);
            $queryResult = mysqli_fetch_assoc($queryInfo);
            if($queryResult){
                session_start();
                $_SESSION['id'] = $queryResult['id'];
                $_SESSION['name'] = $queryResult['name'];
               header('Location: dashboard.php');
            }else{
                $message = "Username And Password Not Match";
                return $message;
            }
        }else{
            die("Query Problem".mysqli_error($link));
        }
    }
    public function logout(){
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        header('Location: index.php');
    }
}