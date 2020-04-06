<?php
    session_start();
    $search['student_name'] = '';
    $search['school_name'] = '';
    $search['class'] = '';
if(!isset($_SESSION['id'])){
    header('Location:index.php');
}
$message = "";
require "../vendor/autoload.php";
use App\classes\Login;

if (isset($_GET['logout'])){
    $login = new Login();
    $login->adminLogout();
}
use App\classes\Payment;
if(isset($_POST['btn'])){
    $message = Payment::paymentInfo($_POST);
}
if (isset($_POST['search_btn'])){
    $search_text = $_POST['search_text'];
    $search_query = Payment::searchValue($search_text);
    $search = mysqli_fetch_assoc($search_query);
    }
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    <link href="../assets/admin/dashboard/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="dashboard.php">Admission Students <span class="sr-only">(current)</span></a></li>
                <li><a href="manage_students.php">Manage Students</a></li>
                <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">View Students <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="class_eight.php?a=b&class=8">Class 8</a></li>
                            <li><a href="class_nine.php?a=b&class=9">Class 9</a></li>
                            <li><a href="class_ten.php?a=b&class=10">Class 10</a></li>
                            <li><a href="class_eleven.php?a=b&class=11">Class 11</a></li>
                            <li><a href="class_twelve.php?a=b&class=12">Class 12</a></li>
                        </ul>
                    </li>
                </ul>
                <li><a href="payment.php">Payments</a></li>
                <li><a href="payment_status.php">All Payments</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name'];?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="?logout=logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container">
    <div class="col-sm-8 col-sm-offset-2">

        <h1 class="text-center text-success"><?php echo $message?></h1>
        <div class="well">

            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label right"><input type="text" name="search_text" class="form-control" placeholder="Search"></label>
                    <div class="col-sm-8">
                        <input type="submit" name="search_btn" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Students Name</label>
                    <div class="col-sm-8">
                        <input type="text" name="student_name" value="<?php echo $search['student_name'];?>" class="form-control" id="inputEmail3" placeholder="Students Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">School/College Name</label>
                    <div class="col-sm-8">
                        <input type="text" name="school_name" value="<?php echo $search['school_name'];?>" class="form-control" id="inputEmail3" placeholder="Students Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Class</label>
                    <div class="col-sm-8">
                        <input type="text" name="class" value="<?php echo $search['class'];?>" class="form-control" id="inputEmail3" placeholder="Class">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Month/Course</label>
                    <div class="col-sm-8">
                        <input type="text" name="month" class="form-control" id="inputEmail3" placeholder="Students Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Taka</label>
                    <div class="col-sm-8">
                        <input type="text" name="taka" class="form-control" id="inputEmail3" placeholder="Students Name">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <button type="submit" name="btn" class="btn btn-success btn-block">Print</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../assets/admin/dashboard/js/bootstrap.min.js"></script>
</body>
</html>