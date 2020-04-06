<?php
require '../vendor/autoload.php';
session_start();
if(!isset($_SESSION['id'])){
    header('Location:index.php');
}
use App\classes\Login;

if (isset($_GET['logout'])){
    $login = new Login();
    $login->adminLogout();
}

use App\classes\Admission;
$students = new Admission();
$query_result = $students->getAllStudentsInfo();
if(isset($_GET['p'])){
    $id = $_GET['id'];
    $students->deleteStudentsInfo($id);
}
if(isset($_POST['search_btn'])){
    $search_text = $_POST['search_text'];
    $query_result = $students->searchStudents($search_text);
}
?>

<!DOCTYPE html>
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
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="dashboard.php">Addmission Students <span class="sr-only">(current)</span></a></li>
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
                <li class=""><a href="payment.php">Payments</a></li>
                <li><a href="payment_status.php">All Payments</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name'];?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="text-center"><a href="?logout=logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-right" action="" method="POST">
                <div class="form-group">
                    <input type="text" name="search_text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default" name="search_btn">Submit</button>
            </form>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<?php if(isset($query_result)) { ?>
    <div class="col-sm-12">
        <h1 class="text-center text-success"></h1>
        <div class="panel panel-default">
            <div class="panel-heading panel-title text-center text-">
                <h1>All Students Information Goes Here</h1>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Students ID</th>
                        <th>Students Name</th>
                        <th>Father's Name</th>
                        <th>Mother Name</th>
                        <th>Present Address</th>
                        <th>C.N. of Guardian</th>
                        <th>C.N. of Student</th>
                        <th>School Name</th>
                        <th>Class</th>
                        <th>Shift</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $i = 1;
                    while ($students_info = mysqli_fetch_assoc($query_result)){?>
                        <tr>
                            <td><?php echo $i++?></td>
                            <td>
                                <a href="profile.php?id=<?php echo $students_info['id'];?>"><?php echo $students_info['student_name'];?></a>
                            </td>
                            <td><?php echo $students_info['father_name'];?></td>
                            <td><?php echo $students_info['mother_name'];?></td>
                            <td><?php echo $students_info['present_address'];?></td>
                            <td><?php echo $students_info['contact_guardian'];?></td>
                            <td><?php echo $students_info['contact_student'];?></td>
                            <td><?php echo $students_info['school_name'];?></td>
                            <td><?php echo $students_info['class'];?></td>
                            <td><?php echo $students_info['shift'];?></td>
                            <td><?php echo $students_info['amount'];?></td>
                            <td>
                                <a href="edit_students.php?id=<?php echo $students_info['id'];?>" class="btn btn-info btn-xs" title="Edit Student Info">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="?p=r&id=<?php echo $students_info['id'];?>" onclick="return confirm('Are you sure delete this!')" class="btn btn-danger btn-xs" title="Delete Students Info">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="col-sm-12">
        <h1 class="text-center text-success"></h1>
        <div class="panel panel-default">
            <div class="panel-heading panel-title text-center text-">
                <h1>All Students Information Goes Here</h1>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Students ID</th>
                        <th>Students Name</th>
                        <th>Father's Name</th>
                        <th>Mother Name</th>
                        <th>Present Address</th>
                        <th>C.N. of Guardian</th>
                        <th>C.N. of Student</th>
                        <th>School Name</th>
                        <th>Class</th>
                        <th>Shift</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $i = 1;
                    while ($students_info = mysqli_fetch_assoc($query_result)){?>
                        <tr>
                            <td><?php echo $i++?></td>
                            <td>
                                <a href="profile.php?id=<?php echo $students_info['id'];?>"><?php echo $students_info['student_name'];?></a>
                            </td>
                            <td><?php echo $students_info['father_name'];?></td>
                            <td><?php echo $students_info['mother_name'];?></td>
                            <td><?php echo $students_info['present_address'];?></td>
                            <td><?php echo $students_info['contact_guardian'];?></td>
                            <td><?php echo $students_info['contact_student'];?></td>
                            <td><?php echo $students_info['school_name'];?></td>
                            <td><?php echo $students_info['class'];?></td>
                            <td><?php echo $students_info['shift'];?></td>
                            <td><?php echo $students_info['amount'];?></td>
                            <td>
                                <a href="edit_students.php?id=<?php echo $students_info['id'];?>" class="btn btn-info btn-xs" title="Edit Student Info">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="?p=r&id=<?php echo $students_info['id'];?>" onclick="return confirm('Are you sure delete this!')" class="btn btn-danger btn-xs" title="Delete Students Info">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
<?php } ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../assets/admin/dashboard/js/bootstrap.min.js"></script>
</body>
</html>