<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./CSS 1/home.css">
    <link rel="stylesheet" href="./CSS 1/form.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../hello/CSS 1/responsive.css">
    <title>Add Class</title>
</head>
<body style="background-color: black;">
        
    <div class="title">
        <a href="dashboard.php"><img src="./images/logo1.png" alt="" class="logo"></a>
        <span class="heading">Admin Dashboard</span>
        <a href="logout.php" style="color: white"><span class="fa fa-sign-out fa-2x">Logout</span></a>
    </div>

    <div class="nav">
        <ul>
            <li class="dropdown" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn">Classes &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="1">
                    <a href="add_classes.php">Add Class</a>
                    <a href="manage_classes.php">Manage Class</a>
                    <a href="courses.php">Manage Courses</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn">Students &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="2">
                    <a href="add_students.php">Add Students</a>
                    <a href="manage_students.php">Manage Students</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn">Results &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="3">
                    <a href="add_results.php">Add Results</a>
                    <a href="manage_results.php">Manage Results</a>
                </div>
            </li>
        </ul>
    </div>

    <div class="main">
        <form action="" method="post">
            <fieldset>
                <legend>Add Course</legend>
                <input type="text" name="class" placeholder="Class Name">
                <input type="text" name="rno" placeholder="Roll NO">
                <input type="text" name="course1" placeholder="Course 1">
                <input type="text" name="course2" placeholder="Course 2">
                <input type="text" name="course3" placeholder="Course 3">
                <input type="text" name="course4" placeholder="Course 4">
                <input type="text" name="course5" placeholder="Course 5">
                <input type="submit" value="Submit">
            </fieldset>        
        </form>
    </div>

    <div class="footer">
        
    </div>
</body>
</html>

<?php 
	include('init.php');
    include('session.php');

    if (isset($_POST['class'],$_POST['rno'],$_POST['course1'],$_POST['course2'],$_POST['course3'],$_POST['course4'],$_POST['course5'])) {
        $class=$_POST["class"];
        $rn=$_POST["rno"];
        $course1=$_POST["course1"];
        $course2=$_POST["course2"];
        $course3=$_POST["course3"];
        $course4=$_POST["course4"];
        $course5=$_POST["course5"];

        // validation
        if (empty($class) or empty($rn) or preg_match("/[a-z]/i",$rn)) {
            if(empty($class))
                echo '<p class="error">Please enter class</p>';
            if(empty($rn))
                echo '<p class="error">Please enter class id</p>';
            if(preg_match("/[a-z]/i",$rn))
                echo '<p class="error">Please enter valid class id</p>';
            exit();
        }

        $sql = "INSERT INTO `courses` (`class`, `rno`, `course1`, `course2`, `course3`, `course4`, `course5`) VALUES ('$class', '$rn', '$course1', '$course2', '$course3', '$course4', '$course5')";
        $result=mysqli_query($conn,$sql);
        
        if (!$result) {
            echo '<script language="javascript">';
            echo 'alert("Invalid class name or class id")';
            echo '</script>';
        } else{
            echo '<script language="javascript">';
            echo 'alert("Successful)';
            echo '</script>';
        }
    }

?>