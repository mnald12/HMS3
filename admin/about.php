<?php
    include 'backend/connection.php';
    $aboutQuerry = "SELECT * FROM about";
    $aboutResult = $conn->query($aboutQuerry);
    $about = $aboutResult->fetch_assoc();
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
        right: -130px;
        top: 0;
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
        left: -5px;
        top: 13px;
        transform: rotate(45deg);
    }
    .b1:hover ~ .tip1{
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
                              <li class="breadcrumb-item active" aria-current="page">About</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">About</h1> 
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <form method="post" action="backend/save_about.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-3">
                            <img src="../img/<?= $about['image1'] ?>" class="img-fluid"/>
                            <input type="file" name="file1" class="form-control mt-1">
                        </div>
                        <div class="col-lg-3">
                            <img src="../img/<?= $about['image2'] ?>" class="img-fluid"/>
                            <input type="file" name="file2" class="form-control mt-1">
                        </div>
                        <div class="col-lg-3">
                            <img src="../img/<?= $about['image3'] ?>" class="img-fluid"/>
                            <input type="file" name="file3" class="form-control mt-1">
                        </div>
                        <div class="col-lg-3">
                            <img src="../img/<?= $about['image4'] ?>" class="img-fluid"/>
                            <input type="file" name="file4" class="form-control mt-1">
                        </div>
                        <div class="col-lg-12 mt-2">
                            <div class="form-group">
                                <label class="col-md-12">Title</label>
                                <div class="col-md-12">
                                    <input type="text" name="title" value="<?= $about['title'] ?>"
                                        class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Text</label>
                                <div class="col-md-12">
                                    <textarea class="form-control" style="height: 100px" name="text" id=""><?= $about['text'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 conts">
                                    <button class="b1 btn btn-success text-white">Update</button>
                                    <div class="tip1">When clicked, it will save all of your changes.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <?php include './model/footer.php' ?>
        </div>
    </div>
    <?php include './model/scripts.php' ?>
</body>
</html>