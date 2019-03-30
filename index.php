<link rel="stylesheet" href="head.css" type="text/css">
<div class="header">
    <a href="#default" class="logo">Student Portfolio</a>
    <div class="header-right">
        
         <a class="active" href="index.php">Login</a>
         <a href="register.php">Register</a>
         <a href="https://www.iitbhilai.ac.in/">About</a>
     </div>
</div>



<link rel="stylesheet" href="main.css">

<?php
    session_start(); 
    
    $_SESSION['message'] = '';
    //$mysqli = new mysqli('localhost', 'root', '', 'students');
    
    
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        //$pass = md5($password);
        
        $connect = mysqli_connect("localhost", "root", "","students");
      
        $query = "SELECT * FROM students WHERE email LIKE '%{$email}%' AND password LIKE '%{$password}%' " ;
        $result = mysqli_query($connect, $query);
        // if id exist 
        // show data in inputs
        $c = 0;
        if(mysqli_num_rows($result) > 0)
        {
            while ($row = mysqli_fetch_array($result))
            {
                $c++;
                $username = $row[username];
                $_SESSION['username'] = $row[username];
                $_SESSION['avatar'] = $row[avatar];
                $_SESSION['achievement'] = $row[achievement];
                $_SESSION['pr1'] = $row[pr1];
                $_SESSION['pr2'] = $row[pr2];
                $_SESSION['pr3'] = $row[pr3];
                $_SESSION['pr4'] = $row[pr4];
                $_SESSION['pr5'] = $row[pr5];
                $_SESSION['ex1'] = $row[ex1];
                $_SESSION['ex2'] = $row[ex2];
                $_SESSION['skills'] = $row[skills];
            
                $_SESSION['message'] = "Hello $username !!!" ;
                header("location: profile.php");
            }  
        }
    
        // if the id not exist
        // show a message and clear inputs
        else 
        {
            $_SESSION['message'] = "Please enter correct email or password!";
        }
        
    }
    
    
?>

<div class="body-content">
  <div class="module">
    <h1>Login to your account!</h1>
    <form class="form" action="index.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <input type="email" placeholder="Email" name="email" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="submit" value="Login" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>
