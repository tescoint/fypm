<?php
session_start();
ob_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
require 'db.php';



?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ASSIGN - STUDENT | FYPM</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">FYPM</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <!-- <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li> -->
                       <!--  <li class="divider"></li> -->
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       <!--  <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        <!-- </li> --> 
                        <li>
                            <a href="assign.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="list.php"><i class="fa fa-table fa-fw"></i> View Assigned Students And Topics</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Assign Topic To Students</h1>
                    </div>
                    <?php
                    if(isset($_REQUEST['submit'])){
                        $student_name = mysqli_real_escape_string($dbc,$_REQUEST['student_name']);
                        $student_matric = mysqli_real_escape_string($dbc,$_REQUEST['student_matric']);
                        $student_department = mysqli_real_escape_string($dbc,$_REQUEST['student_department']);
                        $session = mysqli_real_escape_string($dbc,$_REQUEST['session']);
                        $topic = mysqli_real_escape_string($dbc,$_REQUEST['topic']);
                        $year = date('Y-m-d  H:i:s');
                        $lecturer_username = $_SESSION['username'];
                        if(!empty($student_name)){
                        $query = "INSERT INTO topics (student_name,student_matric,student_department,session,topic,year,lecturer_username) VALUES ('$student_name','$student_matric','$student_department','$session','$topic','$year','$lecturer_username') ";
                    }
                        $run_query = mysqli_query($dbc,$query);
                        if($run_query){
                            echo "<p class='text-success'>Topic Assigned to $student_name successfully.</p>";
                        }else{
                            echo "<p class='text-danger'>An Error occured when trying to assign topic to $student_name.</p>";
                        }

                    }


                    ?>

                    <form role="form" action="" method="POST">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="student_name" required="" >
                            <p class="help-block">Enter THe name for the student here</p>
                        </div>
                        <div class="form-group">
                            <label>Matric Number</label>
                            <input class="form-control" name="student_matric" required="">
                            <p class="help-block">Enter THe matric number for the student here</p>
                        </div>

                         <div class="form-group">
                                            <label>Department</label>
                                            <select class="form-control" name="student_department" required="">
                                                <option value="Computer And Information Sciences">Computer And Information Sciences</option>
                                                <option value="Mathematics">Mathematics</option>
                                                <option value="Human Kinetics">Human Kinetics</option>
                                                <option value="Health Education">Health Education</option>
                                                <option value="English">English</option>
                                            </select>
                                        </div>
                            <div class="form-group">
                                            <label>Session</label>
                                            <select class="form-control" name="session" required="">
                                                <option value="2013/2014">2013/2014</option>
                                                <option value="2014/2015">2014/2015</option>
                                                <option value="2015/2016">2015/2016</option>
                                                <option value="2016/2017">2016/2017</option>
                                                <option value="2017/2018">2017/2018</option>
                                            </select>
                                        </div>
                            <div class="form-group">
                            <label>Topic</label>
                            <input class="form-control" name="topic" required="">
                            <p class="help-block">Enter THe topic assigned to the student here</p>
                        </div>
                        <input name="submit" type="submit" value="Assign" class="btn btn-lg btn-success btn-block" >
                        </form>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
