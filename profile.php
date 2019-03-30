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


    <div style="margin-left:45px; margin-right:45px; width:100%; position:relative;">
        <br/><br/>
        <span class="user"><img src='<?= $_SESSION['avatar'] ?>' width='50' height='50' align="left"></span>
        <br/>
        <H2> &ensp; Welcome <span class="user"><?= $_SESSION['username'] ?></span> !!!</H2>
        <br/><br/>
        <hr noshade>
        <br/>
        <b><H1>Achievements</H1></b>
        <span class="user"><?= $_SESSION['achievement'] ?></span>
        <br/><br/><hr>
        <b><H1>Projects</H1></b>
        <ul>
        <li><span class="user"><?= $_SESSION['pr1'] ?></span>
        <li><span class="user"><?= $_SESSION['pr2'] ?></span>
        <li><span class="user"><?= $_SESSION['pr3'] ?></span>
        <li><span class="user"><?= $_SESSION['pr4'] ?></span>
        <li><span class="user"><?= $_SESSION['pr5'] ?></span>
        </ul>
        <br/><hr>
        <b><H1>Experience</H1></b>
        <ul>
        <li><span class="user"><?= $_SESSION['ex1'] ?></span>
        <li><span class="user"><?= $_SESSION['ex2'] ?></span>
        </ul>
        <br/><hr>
        <b><H1>Skills</H1></b>
        <span class="user"><?= $_SESSION['skills'] ?></span>
        <br/>
        
        <?php
        
        $mysqli = new mysqli('localhost', 'root', '', 'students');
        $sql = 'SELECT username, avatar FROM students';
        $result = $mysqli->query($sql); //result = mysqli_result object
        
        ?>
        <br/>
        <hr>
        <br/>
        <div id="registered">
            <span><H1>Other registered students</H1></span>
            <?php
            while($row = $result->fetch_assoc())
            {
                echo "<div class='userlist'><span>$row[username]</span><br />";
                echo "<img src='$row[avatar]'></div>";
            }
            ?>
  
        </div>
        
    </div>
