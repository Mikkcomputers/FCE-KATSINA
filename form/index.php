<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fce katsina</title>
    <script src="../../sweetalert2/sweetalert2/dist/sweetalert2.all.js"></script>
</head>
<body>
    
</body>
</html>
<?php
define("HOST","localhost");
define("USER","root");
define("PASS","");
define("DB_NAME","fce");
    // include "./server/connection.php";
    $conn = new mysqli(HOST,USER,PASS,DB_NAME);

//register function
    function register($conn){
        if (isset($_POST['btn_reg'])) {
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];

            $sql = "INSERT INTO `admin`(`fullname`,`username`,`phone`,`email`,`password`)VALUES(?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss",$fullname, $username,$phone, $email, $password);
            $res = $stmt->execute();
            if ($res) {
                // header("location: ../login.php");
                echo"  <script>
                swal.fire('Done','Thank You For Create an Account','success')
                .then(
                    function(res){
                        if(true){
                            window.location='../login.php'
                        }
                    }
                )
            </script>
        ";
            }else{
               
                echo"  <script>
                swal.fire('Error','Create an Account Fail...','error')
                .then(
                    function(res){
                        if(true){
                            window.location='../register.php'
                        }
                    }
                )
            </script>
        ".$conn->error;
            }
        }
    }
    register($conn);

    // login function
    function login($conn) {
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
                // session_start();
                $_SESSION['admin'] = $username;
                header("location: ../main/dashboard");
            }else{
                header("location: ../login.php").$conn->error;
            }
         }
    }
    // login($conn);
// include "";
//reset password
    function resett($conn) {
        if (isset($_POST['btn-reset'])) {
           $email = $_POST['email'];

           $sql = "SELECT * FROM `admin` WHERE `email` = ?";
           $stmt = $conn->prepare($sql);
           $stmt->bind_param("s", $email);
           $res = $stmt->execute();
           $res = $stmt->get_result();
           $count = $res->num_rows;
           if ($count>0) {
            echo"<h3 class='text-success text-center'>Correct Password</h3>";
            header("location: ./update_password");
            
        }else{
               echo"<h3 class=' text-center'>In Correct Password</h3>";
               header("location: ./password.php").$conn->error;
           }
        }
   }
   function update($conn){
    if (isset($_POST['btn_update'])) {
        
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        if ($password != $cpassword) {
               echo"  <script>
                swal.fire('Error','Is not Desame ','error')
                .then(
                    function(res){
                        if(true){
                            window.location='../update_password'
                        }
                    }
                )
            </script>
        ";
            
        }
        

        $sql = "UPDATE `admin` SET `password` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $password);
        $res = $stmt->execute();
        if ($res) {
            // header("location: ../login.php");
            echo"  <script>
            swal.fire('Done','Thank You For For Update Password','success')
            .then(
                function(res){
                    if(true){
                        window.location='../login.php'
                    }
                }
            )
        </script>
    ";
        }else{
            // header("location: ../register.php");
            echo"  <script>
            swal.fire('Information','Password Can not Update '<br>' Pleased Register again','infor')
            .then(
                function(res){
                    if(true){
                        window.location='../register.php'
                    }
                }
            )
        </script>
    ".$conn->error;
            
        }
    }
}

    //adding courses
    function courses($conn) {
        if (isset($_POST['btn_course'])) {
            $course = $_POST['couse'];
            $department = $_POST['department'];
            $programme = $_POST['programmes'];
            $about = $_POST['about'];

            $sql = "INSERT INTO couses(`course`, `department`, `programmes`, `about`)VALUES(?,?,?,?)";
            $stm = $conn->prepare($sql);
            $stm->bind_param("ssss", $course, $department, $programme, $about);
            $res = $stm->execute();
            // <!-- // $res = $stmt->get_result; -->
            if ($res === true) {
                echo"  <script>
                swal.fire('Done','Adding Course Successfully','success')
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
                // echo"fail to adding course".$conn->error;
                echo"  <script>
                swal.fire('Done','fail to adding course','success')
                // .then(
                //     function(res){
                //         if(true){
                //             window.location='../login.php'
                //         }
                //     }
                // )
            </script>
        ".$conn->error;
            }
        }
    }
    courses($conn);

    //adding staffs
    function staffs($conn) {
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
            move_uploaded_file($image_tmp, '../uploads/'.$new_image_name);

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
    }
    staffs($conn);

    //adding schedule
    function schedule($conn) {
        if (isset($_POST['btn_schedule'])) {
            $title = $_POST['title'];
            $distribution = $_POST['distribution'];
            $date = $_POST['date'];
            $time = $_POST['time'];

            $sql = "INSERT INTO schedule(`title`,`distribution`,`date`,`time`)VALUES(?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss",$title, $distribution, $date, $time);
            $res = $stmt->execute();

            if ($res === true) {
                // echo"adding schedule successfully";
                echo"  <script>
                swal.fire('Done','Adding Schedule Successfully','success')
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
                // echo"adding shedule fail...".$conn->error;
                echo"  <script>
                swal.fire('Error','Adding Schedule Fail.. ','error')
                // .then(
                //     function(res){
                //         if(true){
                //             window.location='../login.php'
                //         }
                //     }
                // )
            </script>
        ".$conn->error;
            }
        }
    }
    schedule($conn);

    //adding payment
    function payment($conn) {
        if (isset($_POST['btn_pay'])) {
            $infor = $_POST['infor'];

            $sql = "INSERT INTO payment_infor(`infor`)VALUES(?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s",$infor);
            $res = $stmt->execute();

            if ($res === true) {
                // echo"<h3 class='text-center text-success'>Adding payment details successfully</h3>";
                echo"  <script>
                swal.fire('Done','Payment Details Added Successfully','success')
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
                // echo"adding payment details fail...".$conn->error;
                echo"  <script>
                swal.fire('Error','Adding Fail.... ','Error')
                // .then(
                //     function(res){
                //         if(true){
                //             window.location='../login.php'
                //         }
                //     }
                // )
            </script>
        ".$conn->error;
            }
        }
    }
    payment($conn);

    //registeration information
    function register_infor($conn) {
        if (isset($_POST['btn_infor'])) {
            $infor = $_POST['reg'];

            $sql = "INSERT INTO register_infor(`infor`)VALUES(?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $infor);
            $res = $stmt->execute();
            if ($res === true) {
                // echo"<h3 class='text-center text-success'>adding successfully</h3>";
                echo"  <script>
                swal.fire('Done','Adding  Successfully','success')
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
                // echo"adding fail..".$conn->error;
                echo"  <script>
                swal.fire('Error','Adding Fail...','error')
                // .then(
                //     function(res){
                //         if(true){
                //             window.location='../login.php'
                //         }
                //     }
                // )
            </script>
        ".$conn->error;
            }
        }
    }
    register_infor($conn);

    //fetch form courses table
    function query1($conn) {
        $sql = "SELECT * FROM couses";
        $res = $conn->query($sql);
        if ($res->num_rows>0) {
            return $res->fetch_all(MYSQLI_ASSOC);
        } else{
            return [];
        }
    }
    // fetch staffs table
    function query2($conn) {
        $sql = "SELECT * FROM staff";
        $res = $conn->query($sql);
        if ($res->num_rows>0) {
            return $res->fetch_all(MYSQLI_ASSOC);
        } else{
            return [];
        }
    }
    //fetch schedule table 
    function query3($conn) {
        $sql = "SELECT * FROM schedule";
        $res = $conn->query($sql);
        if ($res->num_rows>0) {
            return $res->fetch_all(MYSQLI_ASSOC);
        } else{
            return [];
        }
    }

    //fetch registration details table
    function query4($conn) {
        $sql = "SELECT * FROM register_infor";
        $res = $conn->query($sql);
        if ($res->num_rows>0) {
            return $res->fetch_all(MYSQLI_ASSOC);
        } else{
            return [];
        }
    }
    //fetch payment table
    function query5($conn) {
        $sql = "SELECT * FROM payment_infor";
        $res = $conn->query($sql);
        if ($res->num_rows>0) {
            return $res->fetch_all(MYSQLI_ASSOC);
        } else{
            return [];
        }
    }




?>