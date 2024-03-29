<?php
    session_start();
    include_once '../cms/connect.php' ;
    $page = $_GET['id'];
    $type = $_GET['type'];

    $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));
    $time = $date->format('Y-m-d H:i:s');
     
    $sql = $mysqli->query("SELECT * FROM $class WHERE trash = '0' AND id = '".$page."'");
    $sql_plan = $sql->fetch_assoc();

    if($type == "del") {
        $sql_member = $mysqli->query("SELECT * FROM $class WHERE trash = '0' AND id = '".$page."'");
        $row = $sql_member->fetch_assoc();
    ?>
        <script>
            var confirmDelete = confirm("Do you want to delete <?=$row['name'];?> class?");
    
            if (confirmDelete) {
                
                alert("Class deleted successfully!");
                
                
                <?php
                $mysqli->query("UPDATE $class SET trash = '1' WHERE id = '".$page."'");

                ?>
            } else {
                
                alert("Deletion canceled. Class not deleted.");
                
            }
        </script>
    <?php
        header('Location: class.php');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
	        $duration = $_POST['duration'];
	        $detail = $_POST['detail'];
            $status = $_POST['status'];
            $current_time = time();
            $image2 = $_FILES["image"]["name"];


        $sql = '';
		if($name != $sql_plan['name']){
			$sql .= "name   = '".$name."',";
		}
        if($duration != $sql_plan['duration']){
			$sql .= "duration   = '".$duration."',";
		}
        if($detail != $sql_plan['detail']){
			$sql .= "detail  = '".$detail."',";
		}
        if($status != $sql_plan['status']){
			$sql .= "status  = '".$status."',";
		}
        if($image2 != ''){
            $image = $current_time.'-'.($_FILES["image"]["name"]);
			move_uploaded_file($_FILES["image"]["tmp_name"], "../../image/class/" . $image);
			$sql .= "image   = '".$image."',";
		}
        $mysqli->query("UPDATE $class SET 
							".$sql."
                            create_time = '".$time."'
						    WHERE id = '".$page."'" ); 
        ?>
        <script>
        alert("Class detail update successful.");
        {
        window.location.href = "class-edit.php?id=<?php echo htmlentities($page); ?>";
        };
    </script>
<?php       
    }
}

$sql = "SELECT * FROM $class WHERE trash = '0' AND id = '".$page."'";

$sql_plan = $mysqli->query($sql);
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
                            <h2 class="pageheader-title">Class detail</h2>
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
                                    <form data-parsley-validate="" novalidate="" method="POST" action="" enctype="multipart/form-data">
                                    <?php
                                        if ($sql_plan->num_rows > 0){
                                            while ($row_page = $sql_plan->fetch_array(MYSQLI_ASSOC)){        
                                                ?>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Class Name</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" placeholder="Class Name" value="<?=$row_page['name'];?>" name="name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Duration</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" value="<?=$row_page['duration'];?>" name="duration" placeholder="Duration" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Detail</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                            
                                                <textarea placeholder="Enter details" name="detail" class="form-control"><?=$row_page['detail'];?></textarea>
                                            
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Status</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                 <select class="form-control" id="validationCustom02" name="status" required>
                                                       <?php
                                                            if($row_page['status'] == 'ACTIVE'){
                                                                echo'
                                                            <option value="ACTIVE">Active</option>
                                                            <option value="HIDE">Hide</option>
                                                            ';
                                                            }else{
                                                                echo'
                                                                <option value="HIDE">Hide</option>
                                                                <option value="ACTIVE">Active</option>
                                                            ';
                                                            }
                                                            
                                                       ?>
                                                 </select>
                                            </div>
                                        </div>
                                        
                                       <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Class Image</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                 <input type="file" class="form-control-file" id="classImage" name="image">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Class Image</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                 <img src="<?=$pathss;?>image/class/<?=$row_page['image'];?>" id="previewImage" style="max-width: 100%; max-height: 200px; margin-top: 10px;">
                                            </div>
                                        </div>
                                        <?php
                                                        }
                                                    }
                                        ?>
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