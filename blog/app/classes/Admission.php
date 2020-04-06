<?php
/**
 * Created by PhpStorm.
 * User: imran
 * Date: 3/26/2020
 * Time: 11:17 AM
 */

namespace App\classes;


class Admission
{
    public function saveStudentImage() {
        $directory = '../assets/admin/images/images';
        $targetFile = $directory . $_FILES['image']['name'];
        $check = getimagesize($_FILES['image']['tmp_name']);
        if ($check) {
            if (file_exists($targetFile)) {
                echo 'Already this image exists. please try another one';
            } else {
                if ($_FILES['image']['size'] > 512400) {
                    echo 'File size is too large. Please use 5 MB';
                } else {
                    $filetype = pathinfo($targetFile, PATHINFO_EXTENSION);
                    if ($filetype = 'jpg' || $filetype = 'png') {
                        move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
                        return $targetFile;
                    } else {
                        echo 'File type not valid. Please upload jpg or png file';
                    }
                }
            }
        }
    }
    public function saveStudentsInfo($data){
        $link = Database::db_connection();
        $targetFile = Admission::saveStudentImage();
        $sql = "INSERT INTO students(student_name, father_name, mother_name, present_address, contact_guardian, contact_student, school_name, class, shift, amount, image)VALUES('$data[student_name]','$data[father_name]','$data[mother_name]','$data[present_address]','$data[contact_guardian]','$data[contact_student]','$data[school_name]', '$data[class]', '$data[shift]', '$data[amount]', '$targetFile')";
        if(mysqli_query($link, $sql)){
            $message = "Students Info Save Successfully";
            return $message;
        }else{
            die("Query Problem".mysqli_error($link));
        }
    }
    public function getAllStudentsInfo(){
        $link = Database::db_connection();
        $sql = "SELECT * FROM students";
        if(mysqli_query($link, $sql)){
            $getAll = mysqli_query($link, $sql);
            return $getAll;
        }else{
            die("Query Problem".mysqli_error($link));
        }
    }
    public function getStudentInfoById($id){
        $link = Database::db_connection();
        $sql = "SELECT * FROM students WHERE id = '$id'";
        if(mysqli_query($link, $sql)){
            $queryInfo = mysqli_query($link, $sql);
            return $queryInfo;
        }else{
            die("Query Problem".mysqli_error($link));
        }
    }
    public function updateStudentsInfo($data, $id){
        $link = Database::db_connection();
        $targetFile = Admission::saveStudentImage();
        $sql = "UPDATE students SET student_name = '$data[student_name]', father_name = '$data[father_name]', mother_name = '$data[mother_name]', present_address = '$data[present_address]', contact_guardian = '$data[contact_guardian]', contact_student = '$data[contact_student]', school_name = '$data[school_name]', class = '$data[class]', shift = '$data[shift]',amount = '$data[amount]', image = '$targetFile' WHERE id = '$id'";
        if(mysqli_query($link, $sql)){
            $message = "Students Update Successfully";
            return $message;
        }else{
            die("Query Problem".mysqli_error($link));
        }
    }
    public function deleteStudentsInfo($id){
        $link = Database::db_connection();
        $sql = "DELETE FROM students WHERE id = '$id'";
        if(mysqli_query($link, $sql)){
            header('Location: manage_students.php');
        }else{
            die("Query Problem".mysqli_error($link));
        }
    }
    public function searchStudents($search_text){
        if($search_text){
            $link = Database::db_connection();
            $sql = "SELECT * FROM students WHERE student_name LIKE '%$search_text%' ";
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
    public function getStudentForClass($class){
        $link = Database::db_connection();
        $sql = "SELECT * FROM students WHERE class = '$class'";
        if(mysqli_query($link, $sql)){
            $classInfo = mysqli_query($link, $sql);
            return $classInfo;
        }else{
            die("Query Problem".mysqli_error($link));
        }
    }
}