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
        <div class="row"></div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header"><a href="new-class.php" class="btn btn-rounded btn-danger">Add new</a></h5>
                                <div class="card-body">
                                    <form class="needs-validation" novalidate>
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom01">Name</label>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder="Class Name" required>
                                                
                                            </div>
                                            <br/>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom02">Status</label>
                                                 <select class="form-control" id="validationCustom02" required>
                                                        
                                                        <option value="option1">Active</option>
                                                        <option value="option2">Hide</option>
                                                       
                                                 </select>
                                            </div>
                                            
                                            
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
                            
                                <h5 class="card-header">Class Listing</h5>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Class Code</th>
                                                <th scope="col">Class Name</th>
                                                <th scope="col">Created Date</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Operating</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">CL001</th>
                                                <td>Yoga</td>
                                                <td>2024-01-08 11:55:24</td>
                                                <td>ACTIVE</td>
                                                <td>
                                                    <a href="class-edit.php"><i class="fas fa-edit"></i></a>
                                                    <a href="#"><i class="fas fa-trash"></i></a>
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