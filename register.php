<link rel="stylesheet" href="head.css" type="text/css">
<div class="header">
  <a href="#default" class="logo">Student Portfolio</a>
  <div class="header-right">
    <a href="index.php">Login</a>
    <a class="active" href="register.php">Register</a>
    <a href="https://www.iitbhilai.ac.in/">About</a>
  </div>
</div>

<?php
    session_start();
    $_SESSION['message'] = '';
    $mysqli = new mysqli('localhost', 'root', '', 'students');
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //passwords should match
        if($_POST['password'] == $_POST['confirmpassword'])
        {
            //print_r($_FILES); die;
            
            $username = $mysqli->real_escape_string($_POST['username']);
            $email = $mysqli->real_escape_string($_POST['email']);
            $password = md5($_POST['password']);
            $avatar_path = $mysqli->real_escape_string('images/'.$_FILES['avatar']['name']);
            $achievement = $mysqli->real_escape_string($_POST['achievement']);
            $pr1 = $mysqli->real_escape_string($_POST['pr1']);
            $pr2 = $mysqli->real_escape_string($_POST['pr2']);
            $pr3 = $mysqli->real_escape_string($_POST['pr3']);
            $pr4 = $mysqli->real_escape_string($_POST['pr4']);
            $pr5 = $mysqli->real_escape_string($_POST['pr5']);
            $ex1 = $mysqli->real_escape_string($_POST['ex1']);
            $ex2 = $mysqli->real_escape_string($_POST['ex2']);
            $skills = $mysqli->real_escape_string($_POST['skills']);
            //match same file type image
            if(preg_match("!image!", $_FILES['avatar']['type']))
            {
                if(copy($_FILES['avatar']['tmp_name'], $avatar_path))
                {
                    $_SESSION['username'] = $username;
                    $_SESSION['avatar'] = $avatar_path;
                    $_SESSION['achievement'] = $achievement;
                    $_SESSION['pr1'] = $pr1;
                    $_SESSION['pr2'] = $pr2;
                    $_SESSION['pr3'] = $pr3;
                    $_SESSION['pr4'] = $pr4;
                    $_SESSION['pr5'] = $pr5;
                    $_SESSION['ex1'] = $ex1;
                    $_SESSION['ex2'] = $ex2;
                    $_SESSION['skills'] = $skills;
                    
                    $sql = "INSERT INTO students (username, email, password, avatar, achievement, pr1, pr2, pr3, pr4, pr5, ex1, ex2, skills) "
                            . "VALUES ('$username', '$email', '$password', '$avatar_path', '$achievement', '$pr1', '$pr2', '$pr3', '$pr4', '$pr5', '$ex1', '$ex2', '$skills')";
                    
                    //if query is successful, redirect to welcome.php page
                    if($mysqli->query($sql) === true)
                    {
                        $_SESSION['message'] = "Registration successful! Added $username to the database" ;
                        header("location: welcome.php");
                    }
                    else
                    {
                        $_SESSION['message'] = "User could not be added to the database!";
                    }
                    
                }
                else
                {
                    $_SESSION['message'] = "File upload failed!";
                }
            }
            else
            {
                $_SESSION['message'] = "Please upload gif, jpg, png images!";
            }
            
        }
        else
        {
            $_SESSION['message'] = "Two passwords do not match!";
        }
    }
    
?>

<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="main.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Create an account</h1>
    <form class="form" action="register.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
      <input type="text" placeholder="Student Name" name="username" required />
      <input type="email" placeholder="Email" name="email" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
      <div class="avatar"><label>Select your Portfolio Avatar: </label><input type="file" name="avatar" accept="image/*" required /></div>
      <br/><hr><br/>
      <b>Achievements</b><br/>
      <textarea name="achievement" rows="7" cols="30">
            Write about your Achievements
      </textarea>
      <br/><hr><br/>
      <b>Projects</b><br/>
      <ul>
      <li><input type="text" placeholder="Project 1" name="pr1" />
      <li><input type="text" placeholder="Project 2" name="pr2" />
      <li><input type="text" placeholder="Project 3" name="pr3" />
      <li><input type="text" placeholder="Project 4" name="pr4" />
      <li><input type="text" placeholder="Project 5" name="pr5" />
      </ul>
      <br/><hr><br/>
      <b>Experience</b><br/>
      <ul>
      <li><input type="text" placeholder="Experience 1" name="ex1" />
      <li><input type="text" placeholder="Experience 2" name="ex2" />
      </ul>
      <br/><hr><br/>
      <b>Skills</b><br/>
      <input type="text" placeholder="Write your skills" name="skills" />
      <br/><hr><br/>
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
      <br/><br/><br/><hr><br/><br/><br/>
    </form>
  </div>
</div>