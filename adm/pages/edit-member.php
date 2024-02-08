<?php
    session_start();
    include_once '../cms/connect.php' ;
    $page = $_GET['id'];
    $type = $_GET['type'];

    $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));
    $time = $date->format('Y-m-d H:i:s');
     
    $sql = $mysqli->query("SELECT * FROM $member WHERE trash = '0' AND id = '".$page."'");
    $sql_plan = $sql->fetch_assoc();

    if($type == "del") {
        $sql_member = $mysqli->query("SELECT * FROM $member WHERE trash = '0' AND id = '".$page."'");
        $row = $sql_member->fetch_assoc();
    ?>
        <script>
            var confirmDelete = confirm("Do you want to delete <?=$row['email'];?> member?");
    
            if (confirmDelete) {
                
                alert("Member deleted successfully!");
                
                
                <?php
                $mysqli->query("UPDATE $member SET trash = '1' WHERE id = '".$page."'");
                $mysqli->query("UPDATE role SET trash = '1' WHERE email = '".$row['email']."'");
                ?>
            } else {
                
                alert("Deletion canceled. Member not deleted.");
            }
        </script>
    <?php
        header('Location: member.php');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
        if (isset($_POST['submit'])) {
	    $name = $_POST['name'];
	    $email = $_POST['email'];
	    $phone = $_POST['phone'];
        $first = $_POST['fname'];
        $last = $_POST['lname'];
        $age = $_POST['age'];
        $method = $_POST['payment_method'];

        $sql = '';
		if($name != $sql_plan['username']){
			$sql .= "username   = '".$name."',";
		}
        if($email != $sql_plan['email']){
			$sql .= "email   = '".$email."',";
		}
        if($phone != $sql_plan['phone']){
			$sql .= "phone  = '".$phone."',";
		}
        if($first != $sql_plan['fullname']){
			$sql .= "fullname   = '".$first."',";
		}
        if($last != $sql_plan['lastname']){
			$sql .= "lastname   = '".$last."',";
		}
        if($age != $sql_plan['age']){
			$sql .= "age   = '".$age."',";
		}
        if($method != $sql_plan['gender']){
			$sql .= "gender   = '".$method."',";
		}
        $mysqli->query("UPDATE $member SET 
							".$sql."
                            create_time = '".$time."'
						    WHERE id = '".$page."'" ); 
        ?>
        <script>
        alert("Member detail update successful.");
        {
        window.location.href = "edit-member.php?id=<?php echo htmlentities($page); ?>";
        };
    </script>
<?php       
    }
}

$sql = "SELECT * FROM $member WHERE trash = '0' AND id = '".$page."'";

$sql_plan = $mysqli->query($sql);
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
                            <h2 class="pageheader-title">Member Form </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Member</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Member Form</li>
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
                                    <?php
                                                    if ($sql_plan->num_rows > 0){
                                                        while ($row_page = $sql_plan->fetch_array(MYSQLI_ASSOC)){
                                                            
                                                
                                                           
                                                ?>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Username</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" value="<?=$row_page['username'];?>" placeholder="Username" class="form-control" name="name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Email</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" placeholder="name@example.com" value="<?=$row_page['email'];?>" class="form-control" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Phone Number</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                            <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">+60</span></span>
                                                    <input type="text" placeholder="Phone number" value="<?=$row_page['phone'];?>" class="form-control" name="phone">
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">First Name</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" value="<?=$row_page['fullname'];?>" placeholder="First Name" class="form-control" name="fname">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Last Name</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" value="<?=$row_page['lastname'];?>" placeholder="Last Name" class="form-control" name="lname">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Age</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" placeholder="age" value="<?=$row_page['age'];?>" class="form-control" name="age">
                                            </div>
                                        </div>
                                        
                                       <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Gender</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <label class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="payment_method" value="male" <?php echo ($row_page['gender'] == "male") ? 'checked' : ''; ?> class="custom-control-input"><span class="custom-control-label">Male</span>
                                                </label>
                                                <label class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="payment_method" value="female" <?php echo ($row_page['gender'] == "female") ? 'checked' : ''; ?>  class="custom-control-input"><span class="custom-control-label">Female</span>
                                                </label>
                                            </div>
                                        </div>
                                        <?php
                                                        }
                                                    }
                                        ?>
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

<?php 
    include '../require/footer.php' ;
?>