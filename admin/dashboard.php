<?php
    include 'backend/connection.php';

    $rooms = [];
    $roomsQuerry = "SELECT * FROM rooms";
    $roomsResults = $conn->query($roomsQuerry);
    while($row = $roomsResults->fetch_assoc()){
        $rooms[] = $row; 
    }

    $q1 = "SELECT * FROM bookings Where status = 'Pending' ";
    $r1 = $conn->query($q1);
    $r1s = $r1->num_rows;
    $q2 = "SELECT * FROM bookings Where status = 'Booked' ";
    $r2 = $conn->query($q2);
    $r2s = $r2->num_rows;
    $q3 = "SELECT * FROM bookings Where status = 'Checked In' ";
    $r3 = $conn->query($q3);
    $r3s = $r3->num_rows;
    $q4 = "SELECT * FROM bookings Where status = 'Checked Out' ";
    $r4 = $conn->query($q4);
    $r4s = $r4->num_rows;
    $q5 = "SELECT * FROM bookings Where status = 'Rejected' ";
    $r5 = $conn->query($q5);
    $r5s = $r5->num_rows;
    

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <?php include './model/header.php' ?>
    <style>
        .btn{
            cursor: default !important;
        }
    </style>
</head>
<body>
    <?php include './model/loader.php' ?>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <?php include './model/sidebar.php' ?>
        <div class="page-wrapper">

            <div class="page-breadcrumb pt-1 pb-1">
                <div class="row align-items-center">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                              <li class="breadcrumb-item"><a href="dashboard.php" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Dashboard</h1> 
                    </div>
                </div>
            </div>

            <div class="container-fluid">
            <div class="col-lg-12">
                    <div class="row">
                        <?php foreach( $rooms as $row): ?>
                            <?php
                                $name = $row['name'];
                                $query = "SELECT * FROM room WHERE room_type = '$name' ";
                                $result = $conn->query($query);
                                $total = $result->num_rows;
                            ?>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="btn btn-primary btn-circle d-flex align-items-center">
                                                <i class="mdi mdi-hospital-building fs-4" ></i>
                                            </span>
                                            <div class="ms-3">
                                                <h5 class="mb-0 fw-bold"><?= $row['name'] ?></h5>
                                                <span class="text-muted fs-6"><?= $total ?> Hotel Rooms</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <span class="btn btn-warning btn-circle d-flex align-items-center">
                                            <i class="mdi mdi-book fs-4 text-white" ></i>
                                        </span>
                                        <div class="ms-3">
                                            <h5 class="mb-0 fw-bold">Booking</h5>
                                            <span class="text-muted fs-6"><?= $r1s ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <span class="btn btn-info btn-circle d-flex align-items-center">
                                            <i class="mdi mdi-book-variant fs-4" ></i>
                                        </span>
                                        <div class="ms-3">
                                            <h5 class="mb-0 fw-bold">Booked</h5>
                                            <span class="text-muted fs-6"><?= $r2s ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <span class="btn btn-success btn-circle d-flex align-items-center">
                                            <i class="mdi mdi-bookmark-check fs-4 text-white" ></i>
                                        </span>
                                        <div class="ms-3">
                                            <h5 class="mb-0 fw-bold">Checked In</h5>
                                            <span class="text-muted fs-6"><?= $r3s ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <span class="btn btn-danger btn-circle d-flex align-items-center">
                                            <i class="mdi mdi-bookmark-remove fs-4 text-white" ></i>
                                        </span>
                                        <div class="ms-3">
                                            <h5 class="mb-0 fw-bold">Checked Out</h5>
                                            <span class="text-muted fs-6"><?= $r4s ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <span class="btn btn-danger btn-circle d-flex align-items-center">
                                            <i class="mdi mdi-delete-empty fs-4 text-white" ></i>
                                        </span>
                                        <div class="ms-3">
                                            <h5 class="mb-0 fw-bold">Rejected</h5>
                                            <span class="text-muted fs-6"><?= $r5s ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include './model/footer.php' ?>
        </div>
    </div>
    <?php include './model/scripts.php' ?>
</body>
</html>