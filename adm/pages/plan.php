<?php
    session_start();
    include_once '../cms/connect.php' ;

    $sql = "SELECT * FROM $plan WHERE trash != '1' ";

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
        <div class="row"></div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header"><a href="new-plan.php" class="btn btn-rounded btn-danger">Add new</a></h5>
                                <div class="card-body">
                                    <form class="needs-validation" novalidate>
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom01">Name</label>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder="Task Name" required>
                                                
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
                            
                                <h5 class="card-header">Plan Listing</h5>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Plan Code</th>
                                                <th scope="col">Plan Name</th>
                                                <th scope="col">Created Date</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Operating</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                                    if ($sql_plan->num_rows > 0){
                                                        while ($row_page = $sql_plan->fetch_array(MYSQLI_ASSOC)){
                                                            
                                                echo'
                                            <tr>
                                                <th scope="row">PL00'.$row_page['id'].'</th>
                                                <td>'.$row_page['name'].'</td>
                                                <td>'.$row_page['create_time'].'</td>
                                                <td>'.$row_page['status'].'</td>
                                                <td>
                                                    <a href="edit-plan.php?type=&id='.$row_page['id'].'"><i class="fas fa-edit"></i></a>
                                                    <a href="edit-plan.php?type=del&id='.$row_page['id'].'"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            ';
                                            }
                                                }
                                        ?>   
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