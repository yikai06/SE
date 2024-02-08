<?php
    session_start();
    include_once '../cms/connect.php' ;

    $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));
    $time = $date->format('Y-m-d H:i:s');

    if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
        if (isset($_POST['submit'])) {
	    $name = $_POST['name'];
	    $duration = $_POST['duration'];
	    $detail = $_POST['detail'];
        $current_time = time();
        $image = $current_time.'-'.($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], "../../image/class/" . $image);


        $mysqli->query("INSERT INTO $class (name, create_time, status, image, duration, detail) VALUES ('".$name."','".$time."','active','".$image."','".$duration."','".$detail."')");

        $page = $mysqli->insert_id;
                  
        header('Location: class.php');
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
                            <h2 class="pageheader-title">Add new class</h2>
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
                                    <form  data-parsley-validate="" novalidate=""  method="POST" action="" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Class Name</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" placeholder="Class Name" name="name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Duration</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" name="duration" placeholder="Duration" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Detail</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                            
                                                <textarea placeholder="Enter details" name="detail" class="form-control"></textarea>
                                            
                                            </div>
                                        </div>
                                        
                                        
                                       <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Class Image</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                 <input type="file" class="form-control-file" id="classImage" name="image">
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