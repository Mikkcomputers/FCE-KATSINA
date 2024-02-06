<?php
    include_once("../core.php");
    include_once("../form/index.php");

    $update = false;
    $title = "";
    $distribution = "";
    $date = "";
    $time = "";
if(isset($_GET['edit'])){
    $update = true;
    $id = $_GET['edit'];

    $sql = "SELECT * FROM `schedule` WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

        if ($update == true) {
        
            $title = $row['title'];
            $distribution = $row['distribution'];
            $date = $row['date'];
            $time = $row['time'];
        }
}

//update schedule

if (isset($_POST['btn_update'])) {
    $hidden = $_POST['hidden'];
    $title = $_POST['title'];
    $distribution = $_POST['distribution'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $sql = "UPDATE schedule SET`title` = ?,`distribution` = ?,`date` = ?,`time` = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi",$title, $distribution, $date, $time, $id);
    $res = $stmt->execute();

    if ($res === true) {
        echo"<h3 class='text-center text-success'>Updating schedule successfully</h3>";
    }else{
        echo"Updating shedule fail...".$conn->error;
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
        <title>Adding Schedule - FCE</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body style="background-color: #f1f1f1;">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <?php
                                        if ($update === true): ?>
                                            
                                            <div class="card-header"><h3 class="text-center font-weight-light my-4 text-success">Updating School Schedule</h3></div>
                                        <?php else: ?>
                                            <div class="card-header"><h3 class="text-center font-weight-light my-4 text-success">Add School Schedule</h3></div>
                                        <?php endif; ?>
                                    <div class="card-body">
                                        <form action="" method="post">
                                        <div class="form-floating mb-3">
                                            <input type="hidden" name="hidden" value="<?=$id ?>">
                                                <input class="form-control" name="title" value="<?=$title ?>"  required id="inputEmail" type="text" placeholder="Adding Schedule" />
                                                <label for="inputEmail">Title</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="distribution" value="<?=$distribution ?>" id="inputPassword" required type="text" placeholder="add comment" />
                                                        <label for="inputPassword">Distribution</label>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="date" value="<?=$date ?>" required  id="inputFirstName" type="date" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="time" value="<?=$time ?>" required id="inputLastName" type="time" placeholder="Enter your last name" />
                                                        <label for="inputLastName">Time</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <?php
                                                    if ($update === true){ ?>
                                                        <button name="btn_update" class="btn btn-success btn-block">Update</button>
                                                    <?php 
                                                    }else{
                                                        ?>
                                                        <button name="btn_schedule" class="btn btn-success btn-block">Add</button>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="../dashboard" class="text-success">Back to Dashboard</a></div>
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
                            <div class="text-muted  text-success">Copyright &copy; FCE KATISNA</div>
                            <div>
                                <a class=" text-success" href="#">Privacy Policy</a>
                                &middot;
                                <a class=" text-success" href="#">Terms &amp; Conditions</a>
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
