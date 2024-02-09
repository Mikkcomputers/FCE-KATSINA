<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Staff</title>
    <script src="../../sweetalert2/sweetalert2/dist/sweetalert2.all.js"></script>
</head>
<body>
    
</body>
</html>
<?php
    include_once("../server/index.php");
    include_once("../core.php");
    // echo $_SESSION['admin'];

    if (isset($_POST['btn_staff']) && isset($_FILES['image'])){
        $errors = array();
        $name = $_POST['name'];
        $position = $_POST['position'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $about = $_POST['about'];

                
        $image_name = $_FILES['image']['name'];
        $image_type = $_FILES['image']['type'];
        $image_size = $_FILES['image']['size'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_error = $_FILES['image']['error'];


        //Validation
        if($image_size>20000000){
            $em = "You can only upload an image lessthan 2MB";
        }elseif($image_error!=0){
            $em = "There is an Error !";
        }
        $ext = pathinfo($image_name, PATHINFO_EXTENSION);
        $ext_lc = strtolower($ext);
        $allowed_ext = array('jpg', 'png', 'jepg', 'gif');
        $new_image_name = uniqid('IMG-', true).".".$ext_lc;

        if(!in_array($ext_lc, $allowed_ext)){
            $em = "Unsupported file uploaded";
        }
        // include "../uploads/";
        move_uploaded_file($image_tmp, './uploads/'.$new_image_name);

        $sql = "INSERT INTO `staff`(`name`, `position`, `phone`, `email`, `about`, `image`)VALUES(?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $name, $position, $phone, $email, $about, $new_image_name);
        $res = $stmt->execute();
        if ($res === true) {
            // include "../uploads";
            // echo"adding successfully";
            echo"  <script>
            swal.fire('Done','Adding Staff Successfully','success')
            // .then(
            //     function(res){
            //         if(true){
            //             window.location='../login.php'
            //         }
            //     }
            // )
        </script>
    ";
        }else{
           
            // echo"adding staff fail...".$conn->error;
            echo"  <script>
            swal.fire('Error','Adding Staff Fail...','error')
            // .then(
            //     function(res){
            //         if(true){
            //             window.location='../login.php'
            //         }
            //     }
            // )
        </script>
    ".$conn->error;
    echo $em;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Adding Staffs - FCE</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body style="background-color: #f1f1f1;">
        <!-- <a href=""></a> -->
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add School Staff</h3></div>
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="name" required  id="inputFirstName" type="text" placeholder="staff Name" />
                                                        <label for="inputFirstName">Staff Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="position" required id="inputLastName" type="text" placeholder="position" />
                                                        <label for="inputLastName">Position</label>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="phone" id="inputPassword" required type="number" placeholder="phone number" />
                                                        <label for="inputPassword">Phone Number</label>
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 ">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="email" id="inputPasswordConfirm" type="email" placeholder="email addree" />
                                                        <label for="inputPasswordConfirm">Email Address</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 ">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="about" id="inputPasswordConfirm" type="text" placeholder="about" />
                                                    <label for="inputPasswordConfirm">About</label>
                                                </div>
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="image" id="inputPasswordConfirm" aria-describedby="fileHelpId" type="file" placeholder="upload image" />
                                                    <label for="inputPasswordConfirm">Upload Image</label>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <button name="btn_staff" class="btn btn-success btn-block">Add</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="../dashboard">Back to Dashboard</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; FCE KATISNA</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
