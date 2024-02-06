<?php
    // include_once("../core.php");
    include_once("../form/index.php");
    // echo $_SESSION['admin'];
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
    <body class="bg-success">
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
                                                    <input class="form-control" name="image" id="inputPasswordConfirm" type="file" placeholder="upload image" />
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
