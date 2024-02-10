<?php
session_start();
include_once 'cms/connect.php' ;
include 'require/header.php' ;
include 'require/top.php' ;
include 'require/menu.php' ;
$page = $_SESSION['email'];
$sql_member = $mysqli->query("SELECT * FROM meet WHERE trash = '0' AND trainer = '".$page."'");
$row = $sql_member->fetch_assoc();
$sql_member2 = $mysqli->query("SELECT * FROM $member WHERE trash = '0' AND email = '".$row['member']."'");
$row2 = $sql_member2->fetch_assoc();
if($_SESSION["status"] == 'admin'){

echo'
       <div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                        
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Create Date</th>
                                                <th>Status</th>
                                                <th>Operating</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>123456789</td>
                                                
                                                <td>2011/04/25</td>
                                                <td>Pending</td>
                                                <td>
                                                    <a href="pages/trainer-detail.php"><i class="fas fa-edit"></i></a>
                                                    <a href="#"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Garrett Winters</td>
                                                <td>Accountant</td>
                                                <td>123456789</td>
                                               
                                                <td>2011/07/25</td>
                                                <td>Pending</td>
                                                <td>
                                                    <a href="#"><i class="fas fa-edit"></i></a>
                                                    <a href="#"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                
                                                <th>Create Date</th>
                                                <th>Status</th>
                                                <th>Operating</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic table  -->
                    <!-- ============================================================== -->
                </div>
';
}elseif($_SESSION["status"] == 'course'){
    echo '';
}elseif($_SESSION["status"] == 'trainer'){
    echo '
    <div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                        
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Create Date</th>
                                                <th>Status</th>
                                                <th>Operating</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>'.$row2['username'].'</td>
                                                <td>'.$row['member'].'</td>
                                                <td>'.$row2['phone'].'</td>
                                                
                                                <td>'.$row['time'].'</td>
                                                <td>Pending</td>
                                                <td>
                                                    <a href="pages/detail-member.php?id='.$row2['id'].'"><i class="fas fa-edit"></i></a>
                                                    
                                                </td>
                                            </tr>
                                            
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                
                                                <th>Create Date</th>
                                                <th>Status</th>
                                                <th>Operating</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic table  -->
                    <!-- ============================================================== -->
                </div>

    ';
}else{
    echo '
    <div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content mt-4">
	
	<h2 class="pageheader-title border-bottom pb-3">Dashboard </h2>
        <div class="row justify-content-center"> <!-- Centering all content horizontally -->
            <div class="col-md-6 mb-4">
                <ul class="list-group shadow">
                    <li class="list-group-item">
                        <h2 class="text-center">Attendance count</h2>
                        <ul class="list-group">
                            <li class="list-group-item text-center">
                                <h1 class="mb-0"><span class="text-danger font-weight-bold">50 DAYS</span></h1>
								<p>SINCE LAST COMPLETED GOAL</p>
							</li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="col-md-6 mb-4">
                <ul class="list-group shadow">
                    <li class="list-group-item">
                        <h2 class="text-center">Daily Progress</h2>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated"
                                        style="width: 75%">75%</div>
                                </div>
                            </li>
							<p class="text-center mt-4"><span class="energetic-slogan fw-bold text-uppercase text-danger">"SweatLab: Where Sweat Leads to Victory"</p>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="col-md-6 mb-4">
                <ul class="list-group shadow">
                    <li class="list-group-item">
                        <h2 class="text-center">Workout Task</h2>
						<ul class="list-group">
                            <li class="list-group-item">
								<ol class="text-center">
									<li>Jumping Jack x10</li>
									<li>Push Up x10</li>
								</ol>
							</li>
						</ul>
                    </li>
                </ul>
            </div>

            <div class="col-md-6 mb-4">
                <ul class="list-group shadow">
                    <li class="list-group-item">
                        <h2 class="text-center">BMR/BMI Calculator</h2>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="mb-2 row">
                                    <label for="age" class="col-sm-2 col-form-label">Age</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="age">
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label for="height" class="col-sm-2 col-form-label">Height(cm)</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="height">
                                    </div>
                                </div>
								
								<div class="mb-2 row">
									<label for="weight" class="col-sm-2 col-form-label">Weight(kg)</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" id="weight">
									</div>
								</div>
								
								<div class="mb-2 row">
									<label for="gender" class="col-sm-2 col-form-label">Gender</label>
									<div class="col-12 col-sm-8 col-lg-6">
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" name="gender" value="male" checked="" class="custom-control-input"><span class="custom-control-label">Male</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" name="gender" value="female" class="custom-control-input"><span class="custom-control-label">Female</span>
										</label>
									</div>
								</div>

                                <button type="button" class="btn btn-primary mx-auto d-block" onclick="calculateBMRBMI()">Calculate BMR/BMI</button> <!-- Centering the button -->
                                <div class="result text-center"><br>
                                    <p>BMI: 20 kg/m<sup>2</sup></p>
                                    <p>BMR: 1634 Calories/Day</p>
                                    <p>Status: Normal</p>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
    ';
}
           
?>
<script>
    function calculateBMRBMI() {
        // Placeholder function for BMR/BMI calculation
        // You can implement the actual calculation here and update the result in the 'result' div.
    }
</script>




<?php include 'require/footer.php' ;?>

