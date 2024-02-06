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
                header("location: ../login.php");
            }else{
                header("location: ../register.php");
                // echo"register faillllll...".$conn->error;
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
                echo"<h3 class='text-light text-center'>Adding Course Successfully</h3>";
            }else{
                echo"fail to adding course".$conn->error;
            }
        }
    }
    courses($conn);

    //adding staffs
    function staffs($conn) {
        if (isset($_POST['btn_staff'])) {
            $name = $_POST['name'];
            $position = $_POST['position'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $about = $_POST['about'];

            $sql = "INSERT INTO staff(`name`, `position`, `phone`, `email`, `about`)VALUES(?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $name, $position, $phone, $email, $about);
            $res = $stmt->execute();
            if ($res === true) {
                echo"adding successfully";
            }else{
                echo"adding staff fail...".$conn->error;
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
                echo"adding schedule successfully";
            }else{
                echo"adding shedule fail...".$conn->error;
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
                echo"<h3 class='text-center text-success'>Adding payment details successfully</h3>";
            }else{
                echo"adding payment details fail...".$conn->error;
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
                echo"<h3 class='text-center text-success'>adding successfully</h3>";
            }else{
                echo"adding fail..".$conn->error;
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