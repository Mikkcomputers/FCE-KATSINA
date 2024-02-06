<?php
    include_once("../core.php");
    include_once("../form/index.php");

    $update = false;
    $infor = "";

    if (isset($_GET['edit'])) {
        $update = true;
        $id = $_GET['edit'];

        $sql = "SELECT * FROM register_infor WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($update === true) {
            $infor = $row['infor'];
        }
    }

    //update
    if (isset($_POST['btn_update'])) {
        $hidden = $_POST['hidden'];
        $infor = $_POST['reg'];

        $sql = "UPDATE register_infor SET `infor` = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $infor, $hidden);
        $res = $stmt->execute();
        if ($res === true) {
            echo"<h3 class='text-center text-success'>Updating successfully</h3>";
        }else{
            echo"Updating fail..".$conn->error;
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
        <title>Adding How to Registeration - FCE</title>
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
                                        if ($update === true) { ?>
                                            
                                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Updating Registration Details</h3></div>
                                        <?php }else{ ?>
                                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Add How to Registration in this college</h3></div>
                                        <?php }
                                        ?>
                                        
                                    <div class="card-body">
                                        <form action="" method="post">
                                           
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="hidden" name="hidden" value="<?=$id ?>">
                                                        <input class="form-control" name="reg" value="<?=$infor ?>" id="inputPassword" required type="text" placeholder="Create a password" />
                                                        <label for="inputPassword">Add Registration Details</label>
                                                        <!-- <textarea name="" class="form" id="" cols="30" rows="10"></textarea> -->
                                                    </div>
                                                </div>
                                           
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <?php
                                                        if ($update === true) { ?>
                                                            
                                                            <button name="btn_update" class="btn btn-success btn-block">Update</button>
                                                        <?php }else{ ?>

                                                            <button name="btn_infor" class="btn btn-success btn-block">Add</button>
                                                        <?php }
                                                    ?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="../dashboard/">Back to Dashboard</a></div>
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
