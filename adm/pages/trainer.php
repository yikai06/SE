<?php
    session_start();
    include_once '../cms/connect.php' ;

    $sql = "SELECT * FROM $trainer WHERE trash != '1' ";

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
                            <h2 class="pageheader-title">Trainer Listings</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Trainer</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Trainer Listings</li>
                                    </ol>
                                </nav>
                            </div>
                            <br/>
                            <a href="new-member.php" class="btn btn-rounded btn-danger">Add new</a>
                        </div>
                    </div>
                </div>
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
                                                <th>Age</th>
                                                <th>Create Date</th>
                                                <th>Operating</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                                    if ($sql_plan->num_rows > 0){
                                                        while ($row_page = $sql_plan->fetch_array(MYSQLI_ASSOC)){
                                                            
                                                echo'
                                                           
                                                
                                            <tr>
                                                <td>'.$row_page['username'].'</td>
                                                <td>'.$row_page['email'].'</td>
                                                <td>+60 '.$row_page['phone'].'</td>
                                                <td>'.$row_page['age'].'</td>
                                                <td>'.$row_page['create_time'].'</td>
                                                <td>
                                                    <a href="edit-trainer.php?id='.$row_page['id'].'"><i class="fas fa-edit"></i></a>
                                                    <a href="edit-trainer.php?type=del&id='.$row_page['id'].'"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            ';
                                            }
                                                    }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Age</th>
                                                <th>Create Date</th>
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

<?php 
        include '../require/footer.php' ;
?>