<!DOCTYPE html>
<?php
    include '../database/connect.php';
    session_start();
    
    if (!(isset($_SESSION['admin_id']) && isset($_SESSION['username']))) {
        header("location:../../DashboardAuthentication/Login UI v2/html/AdminLogin.php");
    }
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <link rel="icon" href="buceils-logo.png" type="image/png">
    <link rel="stylesheet" href="../CSS/bootstrap.css">
    <link rel="stylesheet" href="../CSS/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="assets/js/countdown.js"></script>
    <title>BUCEILS Voting System</title>
</head>

<body>
    <nav>
        <input id="nav-toggle" type="checkbox">
        <div class="logo">
            <h2>BUCEILS HS</h2>
            <h3>ONLINE VOTING SYSTEM</h3>
        </div>
        <label for="btn" class="icon"><span class="fa fa-bars"></span></label>
        <input type="checkbox" id="btn">
        <ul>
            <li>
                <label for="btn-1" class="show">ACCOUNTS</label>
                <a href="#">ACCOUNTS</a>
                <input type="checkbox" id="btn-1">
                <ul>
                    <li><a href="#">Students</a></li>
                    <li><a href="#">Admin</a></li>
                </ul>
            </li>
            <li>
                <label for="btn-2" class="show">ELECTION</label>
                <a href="#">ELECTION</a>
                <input type="checkbox" id="btn-2">
                <ul>
                    <li><a href="#">Archive</a></li>
                    <li><a href="#">Vote Status</a></li>
                    <li><a href="#">Vote Result</a>
                        <ul>
                            <li><a href="#">Make Report</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Configuration</a>
                    
                </ul>
            </li>
            <li>
            <label for="btn-2" class="show">CANDIDATES</label>
            <a href="../LandingPage/LandingPageV1.0.php">CANDIDATES</a>
        </li>
        <li>
                <label for="btn-4" class="show">LOGS</label>
                <a href="#">LOGS</a>
                <input type="checkbox" id="btn-4">
                <ul>
                    <li><a href="#">Access Log</a></li>
                    <li><a href="#">Activity Log</a></li>
                    <li><a href="#">Vote Summary</a></li>
                </ul>
            </li>
            <li>
                 <label for="btn-4" class="show">MESSAGES</label>
                 <a href="#">MESSAGES</a>
             </li>
            <li>
                <label for="btn-5" class="show">Admin Name</label>
                <a class="user" href="#"><img class="user-profile" src="../IMG/user.png"></a>
                <input type="checkbox" id="btn-5">
                <ul>
                    <li><a class="username" href="#"><?php echo $_SESSION['admin_fname']." ".$_SESSION['admin_lname']; ?></a></li>
                    <li class="logout">
                        <span class="fa fa-sign-out"></span><a href="../database/Logout.php">LOGOUT</a></span>
                    </li>
                </ul>
            </li>
        </ul>
        <!--end of list-->
    </nav>
    
    <section>
        <!--Left Content-->
        <article>
            <div class="logo-container">
                <img class="logos" src="BU-LOGO.png">
                <img class="logos" src="BUHSLOGO.png">
                <img class="logos" src="SSGLOGO.png">
            </div>

            <h1>ONLINE VOTING SYSTEM</h1>
            <p>Candidate Information Management</p>
        </article>
    </section>

    <div class="CM_container" id=CM>
    <div class = "CM_Choice">
            <ul>
                <li><h2>What would you like to manage?</h2></li>
                <a class = "Landing_left" href="../Admin/position.php">POSITION</a>
                <a class = "Landing_right" href="../Admin/candidate.php">CANDIDATES</a>
                <li>
            </ul>
                </div>
        <p class="elec-guide-txt">DESCRIPTION OF WHAT YOU CAN DO IN BOTH CHOICES
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>

    </div>

    <div class="footer">
        <p class="footer-txt">BS COMPUTER SCIENCE 3A © 2021</p>
    </div>

    <script>
        $('.icon').click(function () {
            $('span').toggleClass("cancel");
        });
    </script>
</body>

</html>
