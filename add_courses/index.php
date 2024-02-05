<?php
    include_once("../core.php");
    include "../form/index.php";
    $update = false;
    $course = "";
    $department = "";
    $programme = "";
    $about = "";
  if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];

    $sql = "SELECT * FROM couses WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($update == true) {
        # code...
        $row = mysqli_fetch_assoc($result);
        $course = $row['course'];
        $department = $row['department'];
        $programme = $row['programmes'];
        $about = $row['about'];
    }
  }

  //update
  if (isset($_POST['btn_update'])) {
    $hidden = $_POST['hidden'];
    $course = $_POST['couse'];
    $department = $_POST['department'];
    $programme = $_POST['programmes'];
    $about = $_POST['about'];

    $sql = "UPDATE couses SET `course` = ?, `department` = ?, `programmes` = ?, `about` = ? WHERE id = $hidden";
    $stm = $conn->prepare($sql);
    $stm->bind_param("ssss", $course, $department, $programme, $about);
    $res = $stm->execute();
    // <!-- // $res = $stmt->get_result; -->
    if ($res === true) {
        echo"<h3 class='text-light text-center'>Updating Successfully</h3>";
    }else{
        echo"fail to adding course".$conn->error;
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
        <title>Adding Course - FCE</title>
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
                                    <?php
                                        if ($update === true) {?>
                                             <div class="card-header"><h3 class="text-center font-weight-light my-4">Update School Course</h3></div>
                                            <?php
                                        }else{ ?>
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add School Course</h3></div>
                                   <?php }?>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="hidden" name="hidden" value="<?=$id?>">
                                                        <input class="form-control" name="couse" value="<?=$course; ?>" required  id="inputFirstName" type="text" placeholder="" />
                                                        <label for="inputFirstName">Course</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="department" value="<?=$department; ?>" required id="inputLastName" type="text" placeholder="" />
                                                        <label for="inputLastName">Department</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="programmes" value="<?=$programme; ?>" required id="inputLastName" type="text" placeholder=""/>
                                                <label for="inputEmail">Programmes</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="about" value="<?=$about; ?>"  id="inputLastName" type="text" placeholder="" />
                                                <label for="inputEmail">About</label>
                                            </div>
                                           
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <?php
                                                        if ($update == true): ?>
                                                            
                                                            <button name="btn_update" class="btn btn-success btn-block">Update</button>
                                                        <?php else:
                                                    ?>
                                                    <button name="btn_course" class="btn btn-success btn-block">Add</button>
                                                    <?php endif ?>
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
