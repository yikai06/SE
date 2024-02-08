<?php
    session_start();
    include_once '../cms/connect.php' ;

    $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));
    $time = $date->format('Y-m-d H:i:s');

    if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
        if (isset($_POST['submit'])) {
	    $name = $_POST['name'];
        $price = $_POST['price'];
        


        $mysqli->query("INSERT INTO $plan (name, create_time, status, price, trash) VALUES ('".$name."','".$time."','active','".$price."','0')");

        $page = $mysqli->insert_id;
                  
        header('Location: plan.php');
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
    include '../require/menu2.php' ;
?>

<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Add new plan</h2>
                            <div class="page-breadcrumb">
                                
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
                                    <form  data-parsley-validate="" novalidate="" method="POST" action="">
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Subcription Plan Name</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" placeholder="Plan Name" class="form-control" name="name">
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Price</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                            <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">MYR</span></span>
                                                    <input type="text" placeholder="Price" class="form-control" name="price">
                                            </div>
                                            </div>
                                        </div>

                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                                <button type="submit" name="submit" class="btn btn-space btn-primary">Submit</button>
                                                
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