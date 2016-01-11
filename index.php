<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SQLI TEST Platform</title>

    <!-- Bootstrap core CSS -->
    <script src="js/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/SQLIMain.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link rel="stylesheet" href="css/default.min.css">
    <script src="css/highlight.min.js"></script>



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" id="menu-toggle" href="#">SQL Injection Testing Platform</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Attacking Methods</a></li>
                <li><a href="?page=about">About</a></li>
                <li><a href="?page=setup-config">Set Database Credentials</a></li>
                <li><a href="?page=setup-database">Initialize Database</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    SQLI Techniques
                </a>
            </li>
            <li>
                <a href="?page=VulnerableLogin">Login Bypass</a>
            </li>
            <li>
                <a href="?page=Union_Query">Union Query</a>
            </li>
            <li>
                <a href="#">test 3</a>
            </li>
            <li>
                <a href="#">test 4</a>
            </li>
            <li>
                <a href="#">test 5</a>
            </li>

        </ul>
    </div>
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <?php

                    if(isset($_GET["page"]))
                        $page = $_GET["page"];
                    else
                        $page = "home";

                    if(!@include_once($_SERVER["DOCUMENT_ROOT"] .'/includes/'. $page . '.php'))
                        include_once($_SERVER["DOCUMENT_ROOT"] .'/includes/home.php');

                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/bootstrap.min.js"></script>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>
</html>
