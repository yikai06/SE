<?php
include '../cms/connect.php';
session_start();

if (isset($_POST['login'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($email[0] != "@" && $email[1] != "@") {
      $sql = "SELECT * FROM role WHERE email='$email' AND password='$password' AND trash != '1'";
  
      $c = mysqli_query($mysqli, $sql);
      $s = mysqli_fetch_assoc($c);
      if (mysqli_num_rows($c) > 0) {
          $_SESSION["email"] = $s['email'];
          $_SESSION["status"] = $s['status'];
          mysqli_close($mysqli);
          ?>
          <script>
              window.location.href = "../dashboard.php";
          </script>
          <?php
      } else {
        $error = 'Invalid username or password';
    }
  }
  
  if ($email[0] == "@" && $email[1] != "@") {
    $email=substr($email,1);
    //print_r($email);exit;
    $sql = "SELECT * FROM coursemanager WHERE email='$email' AND password='$password'";

    $c = mysqli_query($mysqli, $sql);
    $s = mysqli_fetch_assoc($c);
    if (mysqli_num_rows($c) > 0) {
        $_SESSION["id"] = $s['id'];
        $_SESSION["name"] = $s['name'];
        $_SESSION["email"] = $s['email'];
        $_SESSION["status"] = 'course';
        mysqli_close($mysqli);
        ?>
        <script>
            window.location.href = "../dashboard.php";
        </script>
        <?php
    } else {
      $error = 'Invalid username or password';
    }
  }

  if ($email[0] == "@" && $email[1] == "@") {
    $email=substr($email,2);
   // print_r($email);exit;
    $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";

    $c = mysqli_query($mysqli, $sql);
    $s = mysqli_fetch_assoc($c);
    if (mysqli_num_rows($c) > 0) {
        $_SESSION["id"] = $s['id'];
        $_SESSION["name"] = $s['name'];
        $_SESSION["email"] = $s['email'];
        $_SESSION["status"] = 'admin';
        mysqli_close($mysqli);
        ?>
        <script>
            window.location.href = "../dashboard.php";
        </script>
        <?php
    } else {
      $error = 'Invalid username or password';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Login or Sign Up</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="scriptx.js"></script>
   </head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
        <div class="front">
        <img src="images/gym.jpg" alt="">
        <div class="text">
          <span class="text-1">Discover the Adventure in <br> Fitness with Every Step</span>
          <span class="text-2">"Welcome to Our Fitness Family"</span>
        </div>
      </div>
      <div class="back">
        <img src="images/gymroom.jpg" alt="">
        <div class="text">
          <span class="text-1">Building Strength, <br> One Member at a Time </span>
          <span class="text-2">"Join Our Fitness Family Today!"</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
          <form action="" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type= "text" placeholder= "Enter your email"  name= "email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" name="password" class="password">
                <i class='bx bx-hide eye-icon'></i>
              </div><?php if (isset($error)) { echo $error; } ?>
              <div class="text"><a href="recover_psw.php">Forgot Password?</a></div>
              <div class="button input-box">
                <input type="submit" value="Submit" name="login">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Sign Up Now</label></div>
            </div>
        </form>
      </div>
        <div class="signup-form">
          <div class="title">Sign Up</div>
        <form method="POST" action="reg.php" id="reg">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Enter your full name"  name ="name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Enter your username" name="username" id="username" required>
              </div>
              <span id="usernameError"></span>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your email"  name="email" id="email" onBlur="checkAvailability()" required>
              </div>
              <span id="user-availability-status" style="font-size:12px;"></span> 
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" id="password" oninput="strengthChecker()" placeholder="Enter your password" class="password" name="password" required>
                <i class='bx bx-hide eye-icon'></i>
              </div>
              <div id="strength-bar"></div>
              <p id="message"></p>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" id="confirm" oninput="strengthChecke()" placeholder="Comfirm your password" class="password" name="confirm" required>
                <i class='bx bx-hide eye-icon'></i>
              </div>
              <div id="streng-bar"></div>
              <p id="messages"></p>
              <div class="button input-box">
                <input type="submit"  value="Sumbit" name="submit">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Log In Now</label></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>

  <script src="script.js"></script>
  <script>
    const form = document.querySelector('#reg');
form.addEventListener('submit', function(event) {
  let password = document.getElementById("password").value;
  let confirm = document.getElementById("confirm").value;
  let msg = document.getElementById("message");

  if (password !== confirm) {
    event.preventDefault();
    alert("Passwords do not match. Please make sure the passwords match.");
  }
  else if (msg.textContent !== "Your password is strong"){
    event.preventDefault();
    alert("Password must be strong");
  }
});
    </script>
</body>
</html>