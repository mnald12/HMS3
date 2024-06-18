<?php
    include 'backend/connection.php';
    $bookings = [];
    $bookingQuerry = "SELECT * FROM bookings Where status = 'Booked' Order By id desc";
    $bookingResults = $conn->query($bookingQuerry);
    while($row = $bookingResults->fetch_assoc()){
        $bookings[] = $row; 
    }
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <?php include './model/header.php' ?>
    <style>
        table, .dataTables_wrapper{
            overflow: visible !important; 
        }
        .conts{
            position: relative;
            height: auto;
            overflow: visible;
            transition: 0.75s;
        }
        .tipm{
            display: none;
            position: absolute;
            left: -406px;
            top: 0;
            max-width: 400px;
            height: auto;
            padding: 10px;
            background: darkblue;
            color: white;
            border-radius: 6px;
            transition: 0.75s;
            word-wrap: break-word !important;
            z-index: 999;
        }
        .tipm::before{
            content: '';
            width: 10px;
            height: 10px;
            background: darkblue;
            position: absolute;
            right: -5px;
            top: 16px;
            transform: rotate(45deg);
        }
        .a1:hover ~ .tipm{
            display: block;
            transition: 0.75s;
        }
        .tipm2{
            display: none;
            position: absolute;
            left: -325px;
            top: 0;
            max-width: 400px;
            height: auto;
            padding: 10px;
            background: darkblue;
            color: white;
            border-radius: 6px;
            transition: 0.75s;
            word-wrap: break-word !important;
            z-index: 999;
        }
        .tipm2::before{
            content: '';
            width: 10px;
            height: 10px;
            background: darkblue;
            position: absolute;
            right: -5px;
            top: 16px;
            transform: rotate(45deg);
        }
        .a2:hover ~ .tipm2{
            display: block;
            transition: 0.75s;
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
                              <li class="breadcrumb-item active" aria-current="page">Booked</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Booked</h1> 
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th scope="col"><b>Name</b></th>
                                        <th scope="col"><b>Room</b></th>
                                        <th scope="col"><b>Check In</b></th>
                                        <th scope="col"><b>Check Out</b></th>
                                        <th scope="col"><b>Room No.</b></th>
                                        <th scope="col"><b>Action</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach( $bookings as $row): ?>
                                        <tr>
                                            <td><?= $row['first_name'] ." " .$row['last_name'] ?></td>
                                            <td><?= $row['room'] ?></td>
                                            <td><?= $row['check_in'] ?></td>
                                            <td><?= $row['check_out'] ?></td>
                                            <td><?= $row['room_number'] ?></td>
                                            <td class="conts">
                                                <a class="a1" href="backend/checkin.php?id=<?= $row['id'] ?>"><span class="badge bg-success">Check In</span></a>
                                                <a class="a2" href="backend/delete.php?id=<?= $row['id'] ?>&loc=booked"><span class="badge bg-danger"><i class="mdi mdi-delete-forever"></i></span></a>
                                                <div class="tipm">When clicked. This row will be moved in checked-in page and will be recognized as a checked-in individual.</div>
                                                <div class="tipm2">When clicked. this will be deleted and will be removed in this list. once deleted it cannot be recovered</div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
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