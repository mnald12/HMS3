<?php
    include 'backend/connection.php';
    $rooms = [];
    $roomsQuerry = "SELECT * FROM rooms";
    $roomsResults = $conn->query($roomsQuerry);
    while($row = $roomsResults->fetch_assoc()){
        $rooms[] = $row; 
    }
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <?php include './model/header.php' ?>
    <style>
    .conts{
        width: 190px;
        position: relative;
        height: auto;
        overflow: visible;
        transition: 0.75s;
    }
    .tip1{
        display: none;
        position: absolute;
        left: -240px;
        top: -5px;
        max-width: 220px;
        height: auto;
        padding: 10px;
        background: darkblue;
        color: white;
        border-radius: 6px;
        transition: 0.75s;
        word-wrap: break-word !important;
    }
    .tip1::before{
        content: '';
        width: 10px;
        height: 10px;
        background: darkblue;
        position: absolute;
        right: -5px;
        top: 20px;
        transform: rotate(45deg);
    }
    .b1:hover ~ .tip1{
        display: block;
        transition: 0.75s;
    }
    .tip2{
        display: none;
        position: absolute;
        right: -240px;
        top: -5px;
        max-width: 220px;
        height: auto;
        padding: 10px;
        background: darkblue;
        color: white;
        border-radius: 6px;
        transition: 0.75s;
        word-wrap: break-word !important;
    }
    .tip2::before{
        content: '';
        width: 10px;
        height: 10px;
        background: darkblue;
        position: absolute;
        left: -5px;
        top: 20px;
        transform: rotate(45deg);
    }
    .b2:hover ~ .tip2{
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
                              <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                              <li class="breadcrumb-item active" aria-current="page">Rooms</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Rooms</h1> 
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <?php foreach( $rooms as $row): ?>
                    <div class="card">
                        <div class="card-body">
                            <form action="backend/save_rooms.php" method="post" enctype="multipart/form-data">
                                <input type="text" name="id" value="<?= $row['id'] ?>" hidden>
                                <div class="row">
                                    <div class="col-lg-4 col-xlg-3 col-md-5">
                                        <img src="../img/<?= $row['images'] ?>" class="img-fluid"/>
                                        <input type="file" name="file1" class="form-control mt-1">
                                    </div>
                                    <div class="col-lg-8 col-xlg-9 col-md-7">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="col-md-12">Name</label>
                                                    <input type="text" value="<?= $row['name'] ?>"
                                                    class="form-control form-control-line" name="name">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="col-md-12">Price</label>
                                                    <input type="number" value="<?= $row['price'] ?>"
                                                    class="form-control form-control-line" name="price">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="col-md-12">Bed</label>
                                                    <input type="text" value="<?= $row['bed'] ?>"
                                                    class="form-control form-control-line" name="bed">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="col-md-12">Bath</label>
                                                    <input type="text" value="<?= $row['bath'] ?>"
                                                    class="form-control form-control-line" name="bath">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="col-md-12">Wifi</label>
                                                    <input type="text" value="<?= $row['wifi'] ?>"
                                                    class="form-control form-control-line" name="wifi">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="col-md-12">Description</label>
                                                    <div class="col-md-12">
                                                        <textarea class="form-control" style="height: 60px" name="text" id=""><?= $row['text'] ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="conts">
                                                <button class="b1 btn btn-success text-white">Update</button>
                                                <a type="button" href="room.php?rname=<?= $row['name'] ?>" class="b2 btn btn-primary text-white">View Rooms</a>
                                                <div class="tip1">When clicked, it will save all of your changes.</div>
                                                <div class="tip2">Allows you to view the list of rooms in <?= $row['name'] ?>.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <br>
                <?php endforeach ?>
            </div>

            <?php include './model/footer.php' ?>
        </div>
    </div>
    <?php include './model/scripts.php' ?>
</body>
</html>