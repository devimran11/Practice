<?php
/**
 * Created by PhpStorm.
 * User: imran
 * Date: 3/28/2020
 * Time: 1:30 PM
 */

namespace App\classes;

use App\Classes\Database;
class Payment
{
    public function paymentInfo($data){
        $link = Database::db_connection();
        $sql = "INSERT INTO payments (students_id, students_name, school_name, class, month, taka) VALUES ('$data[search_text]','$data[student_name]','$data[school_name]', '$data[class]','$data[month]','$data[taka]')";
        if(mysqli_query($link, $sql)){
            $message = "Payment Complete";
            return $message;
        }else{
            die("Query Problem".mysqli_error($link));
        }
    }
    public function getAllPaymentInfo(){
        $link = Database::db_connection();
        $sql = "SELECT * FROM payments";
        if(mysqli_query($link, $sql)){
            $paymentInfo = mysqli_query($link, $sql);
            return $paymentInfo;
        }else{
            die("Query Problem".mysqli_error($link));
        }
    }
    public function searchValue($search_text){
        if($search_text){
            $link = Database::db_connection();
            $sql = "SELECT * FROM students WHERE id LIKE '$search_text%' ";
            if(mysqli_query($link, $sql)){
                $search_query = mysqli_query($link, $sql);
                return $search_query;
            }else{
                die('Query Problem'.mysqli_error($link));
            }
        }else{
            die('No result');
        }
    }
    public function getPaymentProfile($id){
        $link = Database::db_connection();
        $sql = "SELECT p.*, s.amount FROM payments as p, students as s WHERE p.students_id = s.id AND students_id = '$id'";
//        $sql = "SELECT payments.taka, payments.payment_time, students.student_name from payments
//            left join students ON payments.students_id = students.id where payments.students_id = " . $id;
        if (mysqli_query($link, $sql)){
            $joinQuery = mysqli_query($link, $sql);
            return $joinQuery;
        }else{
            die("Query Problem".mysqli_error($link));
        }
    }
//    public function calculationEveryDayData(){
//        $link = Database::db_connection();
//        $sql = "";
//    }
}