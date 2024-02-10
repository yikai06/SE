<?php
session_start();
include_once '../cms/connect.php' ;





if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if (isset($_POST['submit'])) {
    $name = $_POST['member'];
    $day = $_POST['day'];
    $from = $_POST['from'];
    $end = $_POST['to'];
    


    $stmt = $mysqli->prepare("INSERT INTO timetable (`day`, `from`, `to`, `member`, `trainer`, `trash`) VALUES (?, ?, ?, ?, ?, '0')");
$stmt->bind_param("sssss", $day, $from, $end, $name, $_SESSION['email']);
$stmt->execute();
$stmt->close();

    header('Location: timetable.php');
    exit ;
}
}
$sql = "SELECT * FROM meet WHERE trash = '0' AND trainer = '".$_SESSION['email']."'";

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

<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Add new timeslot</h2>
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
                                    <form method="POST" action="">
                                    <div class="form-group row"><label class="col-12 col-sm-3 col-form-label text-sm-right">Member</label><div class="col-12 col-sm-8 col-lg-6"><select class="form-control" name="member" id="day0">
                                    <?php
                                        if ($sql_plan->num_rows > 0){
                                            while ($row_page = $sql_plan->fetch_array(MYSQLI_ASSOC)){        
                                                ?>
                                    <option value="<?=$row_page['member'];?>"><?=$row_page['member'];?></option>
                                    <?php 
                                            }
                                        }
                                    ?>
        </select></div></div>
                                        
                                        
                                        
                                        <div class="form-group row"><label class="col-12 col-sm-3 col-form-label text-sm-right">Day of the week</label><div class="col-12 col-sm-8 col-lg-6"><select class="form-control" name="day" id="day0">
            <option value="monday">Monday</option>
            <option value="tuesday">Tuesday</option>
            <option value="wednesday">Wednesday</option>
            <option value="thursday">Thursday</option>
            <option value="friday">Friday</option>
        </select></div></div>

<div class="form-group row"><label class="col-12 col-sm-3 col-form-label text-sm-right">Start From</label><div class="col-12 col-sm-8 col-lg-6"><input type="time" class="form-control" name="from" id="time0" min="09:00" max="18:00" required=""></div></div>

<div class="form-group row"><label class="col-12 col-sm-3 col-form-label text-sm-right">End</label><div class="col-12 col-sm-8 col-lg-6"><input type="time" class="form-control" name="to" id="time0" min="09:00" max="18:00" required=""></div></div>
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