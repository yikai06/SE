<?php
    session_start();
    include_once '../cms/connect.php' ;

    $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));
    $time = $date->format('Y-m-d H:i:s');

    if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
        if (isset($_POST['submit'])) {
	    $name = $_POST['name'];
	    $email = $_POST['email'];
	    $phone = $_POST['phone'];
        $password = $_POST['password'];
        $secret_password = md5($password);
        $ic = $_POST['ic'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        


        $mysqli->query("INSERT INTO $trainer (username,firstname,lastname,email,phone,password,ic,create_time,trash) VALUES ('".$name."','".$fname."','".$lname."','".$email."','".$phone."','".$secret_password."','".$ic."','".$time."','0')");
        $page = $mysqli->insert_id;
        $query = "INSERT INTO role (email,status,trash) VALUES ('".$email."','trainer','0')";
		
        if ($mysqli->query($query)) {
            
            $pages = $mysqli->insert_id;
            
        }
                  
        header('Location: trainer.php');
		exit ;
    }
}

?>
<?php 
    include '../require/header.php' ;
?>
<?php 
    include '../require/top.php' ;
?>
<?php 
    include '../require/menu.php' ;
?>
<style>
    .password-input-container {
        position: relative;
    }

    .toggle-password {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
    }

</style>
<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Trainer Form </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Trainer</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Trainer Form</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
             
                    
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- valifation types -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                               
                                <div class="card-body">
                                    <form data-parsley-validate="" novalidate="" method="POST" action="">
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Username</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" placeholder="Username" class="form-control" name="name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Email</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" data-parsley-minlength="6" placeholder="name@example.com" class="form-control" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Phone Number</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                            <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">+60</span></span>
                                                    <input type="text" placeholder="Phone number" class="form-control" name="phone">
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">IC</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required=""  placeholder="IC Number" class="form-control" name="ic">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">First Name</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" placeholder="First Name" class="form-control" name="fname">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Last Name</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" placeholder="Last Name" class="form-control" name="lname">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Password</label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                <div class="password-input-container">
                                                    <input id="inputPassword" type="password" placeholder="Password" class="form-control" name="password">
                                                    <i class='fas fa-eye-slash toggle-password'></i>
                                                </div>
                                                </div>    
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Comfirm Password</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                            <div class="password-input-container">
                                                    <input id="inputPassword" type="password" placeholder="Comfirm Password" class="form-control">
                                                    <i class='fas fa-eye-slash toggle-password'></i>
                                            </div>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                                <button name="submit" type="submit" class="btn btn-space btn-primary">Submit</button>
                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end valifation types -->
                        <!-- ============================================================== -->
                    </div>
</div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const eyeIcon = document.querySelector(".toggle-password");
        const passwordInput = document.getElementById("inputPassword");

        eyeIcon.addEventListener("click", function() {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            }
        });
    });
</script>
<?php 
    include '../require/footer.php' ;
?>