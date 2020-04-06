
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admission Students</title>
    <link href="../assets/admin/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="container">
            <div class="col-sm-8 col-sm-offset-2">
                <h1 class="text-center text-success"></h1>
                <div class="well">

                    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Students Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="student_name" class="form-control" id="inputEmail3" placeholder="Students Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Father's Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="father_name" class="form-control" id="inputEmail3" placeholder="Father's Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Mother Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="mother_name" class="form-control" id="inputEmail3" placeholder="Mother Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Present Address</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="present_address" rows="6"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Contact Number of Guardian</label>
                            <div class="col-sm-8">
                                <input type="number" name="contact_guardian" class="form-control" id="inputEmail3" placeholder="Contact Number of Guardian">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Contatc number of Student</label>
                            <div class="col-sm-8">
                                <input type="number" name="contact_student" class="form-control" id="inputEmail3" placeholder="Contatc number of Student">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">School Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="school_name" class="form-control" id="inputPassword3" placeholder="School Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Class</label>
                            <div class="col-sm-8">
                                <input type="text" name="class" class="form-control" id="inputPassword3" placeholder="Class">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Shift</label>
                            <div class="col-sm-8">
                                <input type="text" name="shift" class="form-control" id="inputPassword3" placeholder="shift">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="amount" class="col-sm-4 control-label">Total Amount</label>
                            <div class="col-sm-8">
                                <input type="text" name="amount" class="form-control" id="amount" placeholder="amount">
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
                                <button type="submit" name="btn" class="btn btn-success btn-block">Save Product Info</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../assets/admin/js/bootstrap.min.js"></script>
</body>
</html>