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
        <div class="row"></div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header"><a href="new-member.php" class="btn btn-rounded btn-danger">Export Excel</a></h5>
                                <div class="card-body">
                                    <form class="needs-validation" novalidate>
                                        <div class="row">
                                            
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom02">Trainer</label>
                                                <input type="text" class="form-control" id="validationCustom02" placeholder="Trainer Username" required>
                                            </div>
                                            <br/>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom02">Date Type</label>
                                                 <select class="form-control" id="validationCustom02" required>
                                                        <option value="" selected disabled>Select Date Type</option>
                                                        <option value="option1">Year</option>
                                                        <option value="option2">Month</option>
                                                        <option value="option3">Daily</option>
                                                 </select>
                                            </div>
                                            <br/>
                                            
                                            
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button class="btn btn-primary" type="submit">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

            <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            
                                <h5 class="card-header">Listing</h5>
                                <div class="card-body">
                                    <table class="table table-bordered">
    <thead>
        <tr>
            <th rowspan="2">Trainer</th>
            <th colspan="2" class="text-center">Yearly</th>
            <th rowspan="2">Total</th>
            <th rowspan="2">Operating</th>
        </tr>
        <tr>
            
            <th>2023</th>
            <th>2024</th>
            
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="row">Cindy</td>
            <td>3</td>
            <td>4</td>
            <td>7</td>
            <td>
                <a href="#"><i class="fas fa-edit"></i></a>
                <a href="#"><i class="fas fa-trash"></i></a>
                <a href="#"><i class="fas fa-print"></i></a>
            </td>
        </tr>
    </tbody>
</table>

                                </div>
                            </div>
                        
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic table  -->
                    <!-- ============================================================== -->
                </div>
    </div>
</div>

<?php 
    include '../require/footer.php' ;
?>
