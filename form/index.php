<?php
include_once("../server/index.php");
    session_start();

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
                $_SESSION['admin'] = $username;
                header("location: ../dashboard");
            }else{
                header("location: ../login.php");
            }
         }
    }
    login($conn);


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
                echo"adding course successfully";
            }else{
                echo"fail to adding course".$conn->error;
            }
        }
    }
    courses($conn);
    
?>