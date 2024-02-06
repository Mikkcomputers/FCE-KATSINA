<?php
    include_once("../core.php")
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PAYMENT DETAILS - FCE KATSINA</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-success" >
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">FCE KATSINA & ATC</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <p class="text-cente" style="color: white; padding: 7px;">FEDERAL COLLEGE OF EDUCATION KATSINA AND (ATC)</h2>
                <!-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div> -->
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i><?=$_SESSION['admin']; ?></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <!-- <li><a class="dropdown-item" href="#!">Activity Log</a></li> -->
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu bg-success" >
                        <div class="nav ">
                            <!-- <div class="sb-sidenav-menu-heading">Core</div> -->
                            <a class="nav-link" href="../dashboard/">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="../course/">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Courses
                            </a>
                            <a class="nav-link" href="../staffs/">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                STAFFS
                            </a>
                            <a class="nav-link" href="../schedule/">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                SCHEDULE
                            </a>
                            <a class="nav-link" href="./">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                PAYMENT DETAILS
                            </a>
                            <a class="nav-link" href="../register_infor/">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                REGISTER INFO
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Add
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../add_courses/">Course</a>
                                    <a class="nav-link" href="../add_staff/">Staffs</a>
                                    <a class="nav-link" href="../add_schedule/">Schedule</a>
                                    <a class="nav-link" href="../add_register/">Registration Infor</a>
                                    <a class="nav-link" href="../add_payment/">Payment Details</a>
                                </nav>
                            </div>
                       
                        </div>
                    </div>
                    <div class="sb-sidenav-footer bg-dark">
                        <div class="small">Logged in as: <?=$_SESSION['admin']; ?></div>
                       <i>FCE KATSINA</i>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">PAYMENT DETAILS</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">This is all about School Payment</li>
                        </ol>
                        <div class="row">
                           
                            <div class=" col-md-12 text-center">
                                <div class="card bg-success text-cente text-white mb-4">
                                    <div class="card-body text-cente">Payment</div>
                                    <div class="card-footer d-flex align-items-center justify-content-center">
                                        <!-- <a class="small text-white stretched-link" href="#">View Details</a>   <i class="fas fa-angle-right"></i>   -->
                                        <!-- <div class="small text-white text-cente">25</div> -->
                                    </div>
                                </div>
                            </div>
                
                        </div>
              
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table "></i>
                                Payment Information
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Schedule</th>
                                            <th>Comment</th>
                                            <th>Action</th>
                                        
                                        </tr>
                                    </thead>
                                
                                    <tbody >
                                        <?php
                                        $sn = 1;
                                        include_once("../form/index.php");
                                        $dat = query5($conn);
                                        foreach ($dat as $key => $data):
                                            
                                        
                                        ?>
                                        <tr>
                                            <td><?=$sn++?></td>
                                            <td><?=$data['infor']; ?></td>
                                            <td><?=$data['about']; ?></td>
                                            <td><a class="btn btn-success" href="../add_payment/?edit=<?=$data['id']; ?>"><i class="fa fa-edit "></i></a></td> 
                                        </tr>
                                        <?php endforeach ?>
                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; <a href="#">FCE KATSINA</a> 
                                <script>
                                    document.write(Date())
                                </script>
                            </div>
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
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
