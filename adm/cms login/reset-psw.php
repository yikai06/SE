<?php session_start() ;
include('db.php');
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="styles.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <style>
         .strength{
  width: 25%;
  display: inline-block;
  position: relative;
  height: 100%;
  bottom: 5px;
}

 #strength-bar{
  background-color: #dcdcdc;
  height: 10px;
  position: relative;
}

    </style>
    <title>Login Form</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Password Reset Form</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reset Your Password</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="login">

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" oninput="strengthChecker()" class="form-control" name="password" required autofocus>
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </div>
                                
                            </div>
                                <div id="strength-bar"></div>
                                <p id="message"></p>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Reset" name="reset">
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function() {
        if (password.type === "password") {
            password.type = 'text';
        } else {
            password.type = 'password';
        }
        this.classList.toggle('bi-eye');
    });

    let parameters = {
        count: false,
        letters: false,
        numbers: false,
        special: false
    };

    let strengthBar = document.getElementById("strength-bar");
    let msg = document.getElementById("message");

    function strengthChecker() {
        let password = document.getElementById("password").value;

        parameters.letters = (/[A-Za-z]+/.test(password)) ? true : false;
        parameters.numbers = (/[0-9]+/.test(password)) ? true : false;
        parameters.special = (/[!\"$%&/()=?@~`\\.\';:+=^*_-]+/.test(password)) ? true : false;
        parameters.count = (password.length > 7) ? true : false;

        let barLength = Object.values(parameters).filter(value => value);

        strengthBar.innerHTML = "";
        for (let i in barLength) {
            let span = document.createElement("span");
            span.classList.add("strength");
            strengthBar.appendChild(span);
        }

        let spanRef = document.getElementsByClassName("strength");
        for (let i = 0; i < spanRef.length; i++) {
            switch (spanRef.length - 1) {
                case 0:
                    spanRef[i].style.background = "red";
                    msg.textContent = "Your password is very weak";
                    msg.style.color = "#7d2ae8";
                    break;
                case 1:
                    spanRef[i].style.background = "#ff691f";
                    msg.textContent = "Your password is weak";
                    msg.style.color = "#7d2ae8";
                    break;
                case 2:
                    spanRef[i].style.background = "#ffda36";
                    msg.textContent = "Your password is good";
                    msg.style.color = "#7d2ae8";
                    break;
                case 3:
                    spanRef[i].style.background = "#0be881";
                    msg.textContent = "Your password is strong";
                    msg.style.color = "#7d2ae8";
                    break;
            }
        }
    }
</script>
</body>
</html>
<?php
    if(isset($_POST["reset"])){
        $psw = $_POST["password"];

        $token = $_SESSION['token'];
        $Email = $_SESSION['email'];

        $hash = $psw;

        $sql = "SELECT * FROM customer WHERE cus_email=:email";
$query = $dbh->prepare($sql);
$query->bindParam(':email', $Email, PDO::PARAM_STR);
$query->execute();

if ($query->rowCount() > 0) {
    $new_pass = $hash;
    $updateQuery = "UPDATE customer SET cus_password=:new_pass WHERE cus_email=:email";
    $updateStmt = $dbh->prepare($updateQuery);
    $updateStmt->bindParam(':new_pass', $new_pass, PDO::PARAM_STR);
    $updateStmt->bindParam(':email', $Email, PDO::PARAM_STR);
    $updateStmt->execute();
    
    ?>
    <script>
        window.location.replace("reg&login.php");
        alert("<?php echo "Your password has been successfully reset"; ?>");
    </script>
    <?php
} else {
            ?>
            <script>
                alert("<?php echo "Please try again"?>");
            </script>
            <?php
        }
    }

?>
<!-- Existing HTML code -->

<!-- Place the scripts after the HTML content -->


