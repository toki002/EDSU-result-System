<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS 1/student.css">
    <title>Result</title>
</head>
<body>
    <center><img src="../project/images/FB_IMG_16844088631444242-removebg-preview.png" alt=""  width="150px" height="150px"></center>
   <center> <h1>Edo State University Report </h1></center>
   <?php
        include("init.php");

        if(!isset($_GET['class']))
            $class=null;
        else
            $class=$_GET['class'];
        $rn=$_GET['rn'];

        // validation
        if (empty($class) or empty($rn) or preg_match("/[a-z]/i",$rn)) {
            if(empty($class))
                echo '<p class="error">Please select your class</p>';
            if(empty($rn))
                echo '<p class="error">Please enter your roll number</p>';
            if(preg_match("/[a-z]/i",$rn))
                echo '<p class="error">Please enter valid roll number</p>';
            exit();
        }

        $name_sql=mysqli_query($conn,"SELECT `name` FROM `students` WHERE `rno`='$rn' and `class_name`='$class'");
        while($row = mysqli_fetch_assoc($name_sql))
        {
        $name = $row['name'];
        }
        $result_sql=mysqli_query($conn,"SELECT `course1`, `course2`, `course3`, `course4`, `course5` FROM `courses` WHERE `rno`='$rn' and `class`='$class'");
        while($row = mysqli_fetch_assoc($result_sql))
        {
            $course1 = $row['course1'];
            $course2 = $row['course2'];
            $course3 = $row['course3'];
            $course4 = $row['course4'];
            $course5 = $row['course5'];
        }

        $result_sql=mysqli_query($conn,"SELECT `p1`, `p2`, `p3`, `p4`, `p5`, `marks`, `percentage` FROM `result` WHERE `rno`='$rn' and `class`='$class'");
        while($row = mysqli_fetch_assoc($result_sql))
        {
            $p1 = $row['p1'];
            $p2 = $row['p2'];
            $p3 = $row['p3'];
            $p4 = $row['p4'];
            $p5 = $row['p5'];
            $mark = $row['marks'];
            $percentage = $row['percentage'];
        }
        if(mysqli_num_rows($result_sql)==0){
            echo "no result";
            exit();
        }
    ?>

    <div class="container">
        <div class="details">
            <span>Name:</span> <?php echo $name ?> <br>
            <span>Class:</span> <?php echo $class; ?> <br>
            <span>Roll No:</span> <?php echo $rn; ?> <br>
        </div>

        <div class="main">
            <div class="s1">
                <p>Subjects</p>
                <?php echo '<p>'.$course1.'</p>';?>
                <?php echo '<p>'.$course2.'</p>';?>
                <?php echo '<p>'.$course3.'</p>';?>
                <?php echo '<p>'.$course4.'</p>';?>
                <?php echo '<p>'.$course5.'</p>';?>
            </div>
            <div class="s2">
                <p>Marks</p>
                <?php echo '<p>'.$p1.'</p>';?>
                <?php echo '<p>'.$p2.'</p>';?>
                <?php echo '<p>'.$p3.'</p>';?>
                <?php echo '<p>'.$p4.'</p>';?>
                <?php echo '<p>'.$p5.'</p>';?>
            </div>
        </div>

        <div class="result">
            <?php echo '<p>Total Marks:&nbsp'.$mark.'</p>';?>
            <?php echo '<p>Percentage:&nbsp'.$percentage.'%</p>';?>
        </div>

        <div class="button">
            <button onclick="window.print()">Print Result</button>
        </div>
    </div>
    </body>