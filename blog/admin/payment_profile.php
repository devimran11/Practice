<?php
require '../vendor/autoload.php';
use App\classes\Payment;
$id = $_GET['id'];
$joinQuery = Payment::getPaymentProfile($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Profile</title>
    <link href="../assets/admin/dashboard/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="col-sm-12">
        <h1 class="text-center text-success"></h1>
        <div class="panel panel-default">
            <div class="panel-heading panel-title text-center text-">
                <h1>Payments Information</h1>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Serial No.</th>
                        <th>Student_ID</th>
                        <th>Students Name</th>
                        <th>School/College Name</th>
                        <th>Class</th>
                        <th>Payment Time</th>
                        <th>Month</th>
                        <th>Taka</th>
                        <th>Total Amount</th>
                    </tr>
                    <?php
                    $i = 1;
                    while ($paymentResult = mysqli_fetch_assoc($joinQuery)){?>
                        <tr>
                            <td><?php echo $i++?></td>
                            <td><?php echo $paymentResult['students_id'];?></td>
                            <td><?php echo $paymentResult['students_name'];?></td>
                            <td><?php echo $paymentResult['school_name'];?></td>
                            <td><?php echo $paymentResult['class'];?></td>
                            <td><?php echo $paymentResult['payment_time'];?></td>
                            <td><?php echo $paymentResult['month'];?></td>
                            <td><?php echo $paymentResult['taka'];?></td>
                            <td><?php echo $paymentResult['amount'];?></td>
                        </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../assets/admin/dashboard/js/bootstrap.min.js"></script>
</body>
</html>