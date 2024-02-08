<?php
    session_start();
    include_once '../cms/connect.php' ;
    $page = $_GET['id'];
    $type = $_GET['type'];

    $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));
    $time = $date->format('Y-m-d H:i:s');
     
    $sql = $mysqli->query("SELECT * FROM $plan WHERE trash = '0' AND id = '".$page."'");
    $sql_plan = $sql->fetch_assoc();

    if($type == "del") {
        $sql_member = $mysqli->query("SELECT * FROM $plan WHERE trash = '0' AND id = '".$page."'");
        $row = $sql_member->fetch_assoc();
    ?>
        <script>
            var confirmDelete = confirm("Do you want to delete <?=$row['name'];?> plan?");
    
            if (confirmDelete) {
                
                alert("Class deleted successfully!");
                
                
                <?php
                $mysqli->query("UPDATE $plan SET trash = '1' WHERE id = '".$page."'");

                ?>
            } else {
                
                alert("Deletion canceled. Plan not deleted.");
                
            }
        </script>
    <?php
        header('Location: plan.php');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $status = $_POST['status'];

        $sql = '';
		if($name != $sql_plan['name']){
			$sql .= "name   = '".$name."',";
		}
        if($status != $sql_plan['status']){
			$sql .= "status  = '".$status."',";
		}
        if($price != $sql_plan['price']){
			$sql .= "price  = '".$price."',";
		}
        $mysqli->query("UPDATE $plan SET 
							".$sql."
                            create_time = '".$time."'
						    WHERE id = '".$page."'" ); 
        ?>
        <script>
        alert("Task detail update successful.");
        {
        window.location.href = "edit-plan.php?id=<?php echo htmlentities($page); ?>";
        };
    </script>
<?php       
    }
}

$sql = "SELECT * FROM $plan WHERE trash = '0' AND id = '".$page."'";

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
                            <h2 class="pageheader-title">Plan Detail</h2>
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
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Subcription Plan Name</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" value="<?=$row_page['name'];?>" placeholder="Plan Name" class="form-control" name="name">
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
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Price</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                            <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">MYR</span></span>
                                                    <input type="text" placeholder="Price" class="form-control" name="price" value="<?=$row_page['price'];?>">
                                            </div>
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