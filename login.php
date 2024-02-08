<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - FCE KATSINA</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="../sweetalert2/sweetalert2/dist/sweetalert2.all.js"></script>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body style="background-color: #f1f1f1;">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <?php
                                        // login function
                                                include "./server/index.php";
                                                // function login($conn) {
                                                    if (isset($_POST['btn_login'])) {
                                                    $username = $_POST['username'];
                                                    $password = $_POST['password'];

                                                    $sql = "SELECT * FROM `admin` WHERE `username` = ? AND `password` = ?";
                                                    $stmt = $conn->prepare($sql);
                                                    $stmt->bind_param("ss", $username, $password);
                                                    $res = $stmt->execute();
                                                    $res = $stmt->get_result();
                                                    $count = $res->num_rows;
                                                    if ($count>0) {
                                                        session_start();
                                                        $_SESSION['admin'] = $username;
                                                        echo"
                                                            <script>
                                                                swal.fire('Done','Thank You For Login','success')
                                                                .then(
                                                                    function(res){
                                                                        if(true){
                                                                            window.location='../main/dashboard'
                                                                        }
                                                                    }
                                                                )
                                                            </script>
                                                        ";
                                                    }else{
                                                        echo"<script>
                                                            swal.fire('Invalid','In Correct Username or Password','error')
                                                        </script>".$conn->error;
                                                    }
                                                    }
                                            // }
                                            // login($conn);
                                        ?>
                                        <form action="" method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" required name="username" type="text" placeholder="name@example.com" />
                                                <label for="inputEmail">User Name</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="password" id="inputPassword" required type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.php">Forgot Password?</a>
                                                <button name="btn_login" class="btn btn-success" >Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
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
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
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
