<?php
    session_start();
    $message = '';
    require_once '../vendor/autoload.php';
    use App\classes\Admission;
    $id = $_GET['id'];
    $queryInfo = Admission::getStudentInfoById($id);
    $queryResult = mysqli_fetch_assoc($queryInfo);
    if(isset($_POST['btn'])){
        $message = Admission::updateStudentsInfo($_POST, $id);
    }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>School Management</title>
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
            <form class="navbar-form navbar-right" action="" method="POST">
                <div class="form-group">
                    <input type="text" name="search_text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default" name="search_btn">Submit</button>
            </form>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container">
    <div class="container">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="well">
                <h2 style="color: green; text-align: center"><?php echo $message;?></h2>
                <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Students Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="student_name" value="<?php echo $queryResult['student_name'];?>" class="form-control" id="inputEmail3" placeholder="Students Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Father's Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="father_name" value="<?php echo $queryResult['father_name'];?>" class="form-control" id="inputEmail3" placeholder="Father's Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Mother Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="mother_name" value="<?php echo $queryResult['mother_name'];?>" class="form-control" id="inputEmail3" placeholder="Mother Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Present Address</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="present_address" rows="6"><?php echo $queryResult['present_address'];?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Contact Number of Guardian</label>
                        <div class="col-sm-8">
                            <input type="number" name="contact_guardian" value="<?php echo $queryResult['contact_guardian'];?>" class="form-control" id="inputEmail3" placeholder="Contact Number of Guardian">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Contatc number of Student</label>
                        <div class="col-sm-8">
                            <input type="number" name="contact_student" value="<?php echo $queryResult['contact_student'];?>" class="form-control" id="inputEmail3" placeholder="Contatc number of Student">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label">School Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="school_name" value="<?php echo $queryResult['school_name'];?>" class="form-control" id="inputPassword3" placeholder="School Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label">Class</label>
                        <div class="col-sm-8">
                            <input type="text" name="class" value="<?php echo $queryResult['class'];?>" class="form-control" id="inputPassword3" placeholder="Class">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label">Shift</label>
                        <div class="col-sm-8">
                            <input type="text" name="shift" value="<?php echo $queryResult['shift'];?>" class="form-control" id="inputPassword3" placeholder="shift">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="amount" class="col-sm-4 control-label">Total Amount</label>
                        <div class="col-sm-8">
                            <input type="text" name="amount" value="<?php echo $queryResult['amount'];?>" class="form-control" id="amount" placeholder="amount">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="photo" class="col-sm-4 control-label">Photo</label>
                        <div class="col-sm-8">
                            <input type="file" name="image" class="form-control" id="photo" placeholder="photo" accept="image/*">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <button type="submit" name="btn" class="btn btn-success btn-block">Update </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../assets/admin/dashboard/js/bootstrap.min.js"></script>
</body>
</html>