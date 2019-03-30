<link rel="stylesheet" href="head.css" type="text/css">
<div class="header">
    <a href="#default" class="logo">Student Portfolio</a>
    <div class="header-right">
         <a href="index.php">Login</a>
         <a href="register.php">Register</a>
         <a href="https://www.iitbhilai.ac.in/">About</a>
     </div>
</div>



<link rel="stylesheet" href="main.css">

<?php session_start(); ?>

<div class="body content">
    <div class="welcome">
        <div class="alert alert-success"><?= $_SESSION['message'] ?></div>
        <span class="user"><img src='<?= $_SESSION['avatar'] ?>' width='50' height='50'></span>
        <br/>
        Welcome <span class="user"><?= $_SESSION['username'] ?></span>
        <br/><br/>
        <hr noshade>
        <br/><br/>
        <b>Achievements</b><br/>
        <span class="user"><?= $_SESSION['achievement'] ?></span>
        <br/><br/>
        <b>Projects</b><br/>
        <ul>
        <li><span class="user"><?= $_SESSION['pr1'] ?></span>
        <li><span class="user"><?= $_SESSION['pr2'] ?></span>
        <li><span class="user"><?= $_SESSION['pr3'] ?></span>
        <li><span class="user"><?= $_SESSION['pr4'] ?></span>
        <li><span class="user"><?= $_SESSION['pr5'] ?></span>
        </ul>
        <br/>
        <b>Experience</b><br/>
        <ul>
        <li><span class="user"><?= $_SESSION['ex1'] ?></span>
        <li><span class="user"><?= $_SESSION['ex2'] ?></span>
        </ul>
        <br/>
        <b>Skills</b><br/>
        <span class="user"><?= $_SESSION['skills'] ?></span>
        <br/><br/>
        
        <?php
        
        $mysqli = new mysqli('localhost', 'root', '', 'students');
        $sql = 'SELECT username, avatar FROM students';
        $result = $mysqli->query($sql); //result = mysqli_result object
        
        ?>
        <br/>
        <hr>
        <br/>
        <div id="registered">
            <span>Other registered students</span>
            <?php
            while($row = $result->fetch_assoc())
            {
                echo "<div class='userlist'><span>$row[username]</span><br />";
                echo "<img src='$row[avatar]'></div>";
            }
            ?>
  
        </div>
