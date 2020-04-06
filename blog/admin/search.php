<?php
session_start();
require_once '../vendor/autoload.php';
use App\classes\Admission;
use App\Classes\Login;
$queryInfo = Admission::getAllStudentsInfo();
if(!isset($_SESSION['name'])){
    header('Location: index.php');
}
if(isset($_GET['logout'])){
    Login::logout();
}
if(isset($_GET['d'])){
    $id = $_GET['id'];
    Admission::deleteStudentsInfo($id);
}
if(isset($_POST['search_btn'])){
    $search_text = $_POST['search_text'];
    $query_result = Admission::searchStudents($search_text);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>School Management</title>
    <link href="../assets/admin/dashboard/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/admin/dashboard/css/bootstrap-theme.css" rel="stylesheet">

    <link href="../assets/admin/dashboard/css/bootstrap-theme.min.css" rel="stylesheet">
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
                <li><a href="payments.php">Payments</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name'];?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="?logout=logout">Logout</a></li>
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
                    <?php $x = 1;?>
                    <?php while ($queryResult = mysqli_fetch_assoc($queryInfo)){?>

                        <tr>
                            <td><?php echo $x++;?></td>
                            <td><?php echo $queryResult['student_name'];?></td>
                            <td><?php echo $queryResult['father_name'];?></td>
                            <td><?php echo $queryResult['mother_name'];?></td>
                            <td><?php echo $queryResult['present_address'];?></td>
                            <td><?php echo $queryResult['contact_guardian'];?></td>
                            <td><?php echo $queryResult['contact_student'];?></td>
                            <td><?php echo $queryResult['school_name'];?></td>
                            <td><?php echo $queryResult['class'];?></td>
                            <td><?php echo $queryResult['shift'];?></td>
                            <td><?php echo $queryResult['amount'];?></td>
                            <td>
                                <a href="edit_students.php?id=<?php echo $queryResult['id'];?>" class="btn btn-info btn-xs" title="Edit Student Info"><span class="glyphicon glyphicon-edit"></span</a>
                                <a href="?d=d&id=<?php echo $queryResult['id'];?>" onclick="return confirm('Are you sure delete this!')" class="btn btn-danger btn-xs" title="Delete Student red"><span class="glyphicon glyphicon-trash"></span</a>
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
                    <?php $x = 1;?>
                    <?php while ($queryResult = mysqli_fetch_assoc($queryInfo)){?>

                        <tr>
                            <td><?php echo $x++;?></td>
                            <td><?php echo $queryResult['student_name'];?></td>
                            <td><?php echo $queryResult['father_name'];?></td>
                            <td><?php echo $queryResult['mother_name'];?></td>
                            <td><?php echo $queryResult['present_address'];?></td>
                            <td><?php echo $queryResult['contact_guardian'];?></td>
                            <td><?php echo $queryResult['contact_student'];?></td>
                            <td><?php echo $queryResult['school_name'];?></td>
                            <td><?php echo $queryResult['class'];?></td>
                            <td><?php echo $queryResult['shift'];?></td>
                            <td><?php echo $queryResult['amount'];?></td>
                            <td>
                                <a href="edit_students.php?id=<?php echo $queryResult['id'];?>" class="btn btn-info btn-xs" title="Edit Student Info"><span class="glyphicon glyphicon-edit"></span</a>
                                <a href="?d=d&id=<?php echo $queryResult['id'];?>" onclick="return confirm('Are you sure delete this!')" class="btn btn-danger btn-xs" title="Delete Student red"><span class="glyphicon glyphicon-trash"></span</a>
                            </td>
                        </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
<?php } ?>

<script>
    function myFunction() {
        alert("Are you sure delete this!");
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../assets/admin/dashboard/js/bootstrap.min.js"></script>
</body>
</html>