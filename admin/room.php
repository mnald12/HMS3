<?php
    include 'backend/connection.php';
    $rname = mysqli_real_escape_string($conn, $_GET['rname']);
    $rooms = [];
    $roomsQuerry = "SELECT * FROM room where room_type = '$rname' ";
    $roomsResults = $conn->query($roomsQuerry);
    while($row = $roomsResults->fetch_assoc()){
        $rooms[] = $row; 
    }
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <?php include './model/header.php' ?>
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
                              <li class="breadcrumb-item active" aria-current="page"><a class="link" href="rooms.php">Room</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Room Lists</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold"><?= $rname ?> Room Lists</h1> 
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="row g-2">
                        <?php foreach( $rooms as $row): ?>
                            <div class="col-lg-2">
                            <div class="rounded-3 bg-info" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#r<?= $row['id'] ?>">
                                <div class="card-body text-white row justify-content-center">
                                    Room <?= $row['room_number'] ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                        <div class="col-lg-2">
                            <div class="rounded-3 bg-primary" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#add">
                                <div class="card-body text-white row justify-content-center">
                                    Add New Room
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include './model/footer.php' ?>
        </div>
    </div>
    <?php foreach( $rooms as $row): ?>
        <div class="modal fade" id="r<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLabel">
                        Room #<?= nl2br($row['room_number']) ?>  Schedule
                        </h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php
                            $rn = $row['room_number'];
                            $schedules = [];
                            $sched = "SELECT * FROM schedule Where room_number = '$rn' ";
                            $schedule = $conn->query($sched);
                            while($row = $schedule->fetch_assoc()){
                                $schedules[] = $row; 
                            }
                        ?>
                        <p><b><?= count($schedules) > 0 ? '' : 'No Schedule' ?></b></p>
                        <?php foreach( $schedules as $scheds): ?>
                            <p><b><?= $scheds['check_in'] ?> - <?= $scheds['check_out'] ?></b></p>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
        

    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">
                        Add a Room
                    </h2>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="backend/add_room.php" method="post">
                        <label for="">Room Number</label>
                        <input type="text" name="type" value="<?= $rname ?>" hidden>
                        <input type="text" name="rnumber" class="form-control" required>
                        <br>
                        <button class="btn btn-success">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include './model/scripts.php' ?>
</body>
</html>