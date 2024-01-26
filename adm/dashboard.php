<?php 
    include 'require/header.php' ;
?>

        <?php 
            include 'require/top.php' ;
        ?>
        
        <?php 
            include 'require/menu.php' ;
        ?>
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
 
           
    <?php 
        include 'require/footer.php' ;
    ?>
