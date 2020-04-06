<?php
require '../vendor/autoload.php';
use App\classes\Admission;
$id = $_GET['id'];
$queryInfo = Admission::getStudentInfoById($id);
$queryResult = mysqli_fetch_assoc($queryInfo);
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Imran Profile</title>
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="all" /> -->
    <link rel="stylesheet" type="text/css" href="../assets/admin/dashboard/css/style2.css" media="all" />
    <link href="../assets/admin/dashboard/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<section id="header">
    <div class="container">
        <div class="images">
            <div class="row">
                <div class="col-md-12">
                    <div class="header">
                        <h2 style="color:#0e3875;padding:30px;text-align:center;font-family: Georgia, serif;">RBC ACADEMY<br/>RIPON BIOLOGY COUNCILING<br/><p style="font-size:20px;margin-top:10px;">HAQUE MONJIL(1ST Floor) SCIENCE COLLEGE OPPOSITE,WEST TEJTURI BAZAR,</p> <p> FRAMGATE, DHAKA-1216,Bangladesh</p><p><a href="http://www.rbcacademy.com" style="color:#0e3875;">www.rbcacademy.com, </a>Email:riponbiswas143@gmail.com</p></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="dashboard.php">Admission Students <span class="sr-only">(current)</span></a></li>
                    <li class=""><a href="payment_profile.php?id=<?php echo $queryResult['id'];?>">Payments Status</a></li>
                    <li class=""><a href="#">Result Status </a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>
<section id="profile">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="left-profile">
                    <img src="<?php echo $queryResult['image'];?>" height="150" width="150" alt="image" />
                    <div class="content">
                        <h2 contenteditable="true"></h2>
                        <h4></h4>
                    </div>
                </div>

                <div class="Details">

                    <h4>Presonal information</h4>
                    <p><span style="font-weight: 900;">Name:</span> <?php echo $queryResult['student_name'];?></p>
                    <p><span style="font-weight: 900;">School:</span> <?php echo $queryResult['school_name'];?></p>
                    <p><span style="font-weight: 900;">Class:</span> <?php echo $queryResult['class'];?></p>
                    <p><span style="font-weight: 900;">Contact Number: </span><?php echo $queryResult['contact_student'];?></p>
                </div>
            </div>
        </div>
    </div>

</section>
<div class="container">
    <footer><p>&copy; RBC Academy reserved 2019</p></footer>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../assets/admin/dashboard/js/bootstrap.min.js"></script>

</body>
</html>