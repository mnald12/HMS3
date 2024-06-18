<?php
    if(!isset($_SESSION['id'])&&!isset($_SESSION['username'])){
        header('location: ../admin/index.php');
     }
    include './backend/connection.php';
    $userQuerry = "SELECT * FROM user";
    $userResult = $conn->query($userQuerry);
    $user = $userResult->fetch_assoc();
?>
<style>
    .dropdown-menu{
        position: relative;
        height: auto;
        overflow: visible;
        transition: 0.75s;
    }
    .tips{
        display: none;
        position: absolute;
        left: -240px;
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
    .tips::before{
        content: '';
        width: 10px;
        height: 10px;
        background: darkblue;
        position: absolute;
        right: -5px;
        top: 20px;
        transform: rotate(45deg);
    }
    .ddi1:hover ~ .tips{
        display: block;
        transition: 0.75s;
    }
    .tips2{
        display: none;
        position: absolute;
        left: -240px;
        top: 44px;
        max-width: 220px;
        height: auto;
        padding: 10px;
        background: darkblue;
        color: white;
        border-radius: 6px;
        transition: 0.75s;
        word-wrap: break-word !important;
    }
    .tips2::before{
        content: '';
        width: 10px;
        height: 10px;
        background: darkblue;
        position: absolute;
        right: -5px;
        top: 20px;
        transform: rotate(45deg);
    }
    .ddi2:hover ~ .tips2{
        display: block;
        transition: 0.75s;
    }
    .sidebar-item{
        position: relative;
        overflow: visible;
        transition: 0.75s;
    }
    .instruction{
        display: none;
        position: absolute;
        right: -107%;
        top: 0;
        width: auto;
        max-width: 220px;
        height: auto;
        padding: 10px;
        background: darkblue;
        color: white;
        border-radius: 6px;
        transition: 0.75s;
    }
    .instruction::before{
        content: '';
        width: 10px;
        height: 10px;
        background: darkblue;
        position: absolute;
        left: -5px;
        top: 20px;
        transform: rotate(45deg);
    }
    .sidebar-item:hover .instruction{
        display: block;
        transition: 0.75s;
    }
    .instruction-last{
        display: none;
        position: absolute;
        right: -107%;
        bottom: 0;
        width: auto;
        max-width: 220px;
        height: auto;
        padding: 10px;
        background: darkblue;
        color: white;
        border-radius: 6px;
        transition: 0.75s;
    }
    .instruction-last::before{
        content: '';
        width: 10px;
        height: 10px;
        background: darkblue;
        position: absolute;
        left: -5px;
        bottom: 20px;
        transform: rotate(45deg);
    }
    .sidebar-item:hover .instruction-last{
        display: block;
        transition: 0.75s;
    }
</style>
<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header" data-logobg="skin6">
            <a class="navbar-brand" href="dashboard.php">
                <span class="logo-text">
                    <b>AMATEL</b>
                </span>
            </a>
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="#"><i
                    class="mdi mdi-menu"></i></a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav float-start me-auto">
            </ul>
            <ul class="navbar-nav float-end">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../img/<?= $user['avatar'] ?>" alt="user" class="rounded-circle" width="31">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item ddi1" href="profile.php"><i class="ti-user m-r-5 m-l-5"></i>My Profile </a>
                        <p class="tips">Allows you to manage your profile such as changing username and changing password</p>
                        <a class="dropdown-item ddi2" href="./backend/logout.php"><i class="ti-wallet m-r-5 m-l-5"></i>Logout</a>
                        <p class="tips2">Allows you to logout and terminate all of your sessions</p>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<aside class="left-sidebar" data-sidebarbg="skin6">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="dashboard.php" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                    <div class="instruction">
                        Allows you see real-time information on total number of rooms, total number of peple who wants to book, total number of people who already booked, total number of people who already checked-in and checked-out, and total number of people who have been rejected.
                    </div>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="booking.php" aria-expanded="false">
                        <i class="mdi mdi-book"></i><span class="hide-menu">Booking</span>
                    </a>
                    <div class="instruction">
                        Allows you to see a list of those who want to make hotel reservations in your hotels
                    </div>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="booked.php" aria-expanded="false">
                        <i class="mdi mdi-book-variant"></i><span class="hide-menu">Booked</span>
                    </a>
                    <div class="instruction">
                        Allows you to see a list of those who already make hotel reservations in your hotels
                    </div>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="checkedin.php" aria-expanded="false">
                        <i class="mdi mdi-bookmark-check"></i><span class="hide-menu">Checked In</span>
                    </a>
                    <div class="instruction">
                        Allows you to see a list of those who already checked-in in your hotels
                    </div>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="checkedout.php" aria-expanded="false">
                        <i class="mdi mdi-bookmark-remove"></i><span class="hide-menu">Checked Out</span>
                    </a>
                    <div class="instruction">
                        Allows you to see a list of those who already checked-out in your hotels
                    </div>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="rejected.php" aria-expanded="false">
                        <i class="mdi mdi-delete-empty"></i><span class="hide-menu">Rejected</span>
                    </a>
                    <div class="instruction">
                        Allows you to see a list of those who have been rejected
                    </div>
                </li>
                <hr>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="rooms.php" aria-expanded="false">
                        <i class="mdi mdi-hospital-building"></i><span class="hide-menu">Rooms</span>
                    </a>
                    <div class="instruction">
                        Allows you to manage the types of rooms in in your hotel. such as changing the photos and editing the text
                    </div>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="home.php" aria-expanded="false">
                        <i class="mdi mdi-home"></i><span class="hide-menu">Home</span>
                    </a>
                    <div class="instruction">
                        Allows you to manage the contents of the homepage. such as changing the photos and editing the text
                    </div>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="about.php" aria-expanded="false">
                        <i class="mdi mdi-information-outline"></i><span class="hide-menu">About</span>
                    </a>
                    <div class="instruction">
                        Allows you to manage the contents of the about page. such as changing the photos and editing the text
                    </div>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="services.php" aria-expanded="false">
                        <i class="mdi mdi-ticket-account"></i><span class="hide-menu">Services</span>
                    </a>
                    <div class="instruction">
                        Allows you to manage the contents of the services page. such as changing the photos and editing the text
                    </div>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="contacts.php" aria-expanded="false">
                        <i class="mdi mdi-phone"></i><span class="hide-menu">Contacts</span>
                    </a>
                    <div class="instruction-last">
                        Allows you to manage the contents of the contact page. such as changing the address, email, and contact number 
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</aside>