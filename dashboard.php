<?php
session_start();
if(!isset($_SESSION['session_username'])){
    header("location:login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>YamJellyJoy Admin</title>
    <link rel="stylesheet" href="css/styledash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <h1><span class="lab la-accusoft"></span> Yam Jelly Joy</h1>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="" class="active"><span class="las la-igloo"></span>
                        <span>Dashboard</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-users"></span>
                        <span>Customers</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-shopping-bag"></span>
                        <span>Orders</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-clipboard-list"></span>
                        <span>Inventory</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-receipt"></span>
                        <span>Transaction</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h1>
                <label for="">
                    <span class="las la-bars"></span>
                </label>

                Dashboard
            </h1>

            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here" />
            </div>

            <div class="user-wrapper">
                <img src="img/user.jpg" width="40px" height="40px" alt="">
            <div>
            <h4>John Doe</h4>
            <small>Super admin</small>
            </div>
            </div>
        </header>

        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>54</h1>
                        <span>Customers</span>
                    </div>
                <div>
                <span class="las la-users"></span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <h1>79</h1>
                    <span>Projects</span>
                </div>
                <div>
                    <span class="las la-clipboard"></span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <h1>124</h1>
                    <span>Orders</span>
                </div>
                <div>
                    <span class="las la-shopping-bag"></span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <h1>200k</h1>
                    <span>Income</span>
                </div>
                <div>
                    <span class="las la-receipt"></span>
                </div>
            </div>
            </div>

            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h2>Recent Orders</h2>

                            <button>See all <span class="las la-arrow-right">
                            </span></button>
                        </div>

                        <div class="card-body">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td>Customer</td>
                                        <td>Quantity</td>
                                        <td>Status</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Hana</td>
                                        <td>2</td>
                                        <td>
                                            <span class="status purple"></span>
                                            On progress
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Brian</td>
                                        <td>5</td>
                                        <td>
                                            <span class="status pink"></span>
                                            Done
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Injil</td>
                                        <td>10</td>
                                        <td>
                                            <span class="status orange"></span>
                                            Done
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="customers">
    <div class="card">
        <div class="card-header">
            <h2>New customer</h2>
            <button>See all <span class="las la-arrow-right"></span></button>
        </div>

        <div class="card-body">
            <div class="customer">
                <img src="img/user.png" width="40px" height="40px" alt="">
                <div>
                    <h4>Indri</h4>
                    <small>Kost Belakang JTE</small>
                </div>
                <div>
                    <span class="las la-user-circle"></span>
                    <span class="las la-user-comment"></span>
                    <span class="las la-user-phone"></span>
                </div>
            </div>

            <div class="customer">
                <img src="img/user.png" width="40px" height="40px" alt="">
                <div>
                    <h4>Kerren</h4>
                    <small>Ujung Dunia</small>
                </div>
                <div>
                    <span class="las la-user-circle"></span>
                    <span class="las la-user-comment"></span>
                    <span class="las la-user-phone"></span>
                </div>
            </div>

            <div class="customer">
                <img src="img/user.png" width="40px" height="40px" alt="">
                <div>
                    <h4>Syellen</h4>
                    <small>Kost Kopi Kenangan Bahu</small>
                </div>
                <div>
                    <span class="las la-user-circle"></span>
                    <span class="las la-user-comment"></span>
                    <span class="las la-user-phone"></span>
                </div>
            </div>
        </div>
    </div>
</div>
        </main>
    </div>
</body>
</html>
