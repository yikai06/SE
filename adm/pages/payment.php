<?php
    session_start();
    include_once '../cms/connect.php' ;

    $sql = "SELECT * FROM $payment WHERE trash != '1' ";

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
        <div class="row"></div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header"><a href="new-member.php" class="btn btn-rounded btn-danger">Export Excel</a></h5>
                                <div class="card-body">
                                    <form class="needs-validation" novalidate>
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom01">Invoice Number</label>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder="Invoice Number" value="Mark" required>
                                                
                                            </div>
                                            <br/>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom02">Member</label>
                                                <input type="text" class="form-control" id="validationCustom02" placeholder="Member Username" value="Otto" required>
                                            </div>
                                            <br/>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom02">Date From</label>
                                                <input type="date" name="search_date_from" value="" class="form-control" placeholder="Search Date">
                                            </div>
                                            <br/>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom02">Date To</label>
                                                <input type="date" name="search_date_from" value="" class="form-control" placeholder="Search Date">
                                            </div>
                                            <br/>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <label for="validationCustom02">Payment Method</label>
                                            <div class="col-sm-6">
                                                <div class="custom-controls-stacked">
                                                    <label class="custom-control custom-checkbox">
                                                        <input id="ck1" name="ck1" type="checkbox" data-parsley-multiple="groups" value="bar" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" class="custom-control-input"><span class="custom-control-label">Cash</span>
                                                    </label>
                                                    <label class="custom-control custom-checkbox">
                                                        <input id="ck2" name="ck2" type="checkbox" data-parsley-multiple="groups" value="bar2" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" class="custom-control-input"><span class="custom-control-label">Online Transfer</span>
                                                    </label>
                                                </div>
                                            </div>
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
                            
                                <h5 class="card-header">Payment Listing</h5>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">#Invoice Number</th>
                                                <th scope="col">Paid Date</th>
                                                <th scope="col">Member</th>
                                                <th scope="col">Subcribe Plan</th>
                                                <th scope="col">Payment Method</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Operating</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                                    if ($sql_plan->num_rows > 0){
                                                        while ($row_page = $sql_plan->fetch_array(MYSQLI_ASSOC)){
                                                            
                                                echo'
                                            <tr>
                                                <th scope="row">PY00'.$row_page['id'].'</th>
                                                <td>'.$row_page['paid_time'].'</td>';
                                                $sql_member = $mysqli->query("SELECT * FROM $member WHERE trash != '1' AND payment = '".$row_page['id']."'");
    
                                                $row = $sql_member->fetch_assoc();
                                                echo'
                                                <td>'.$row['username'].'
                                                <br>'.$row['email'].'
                                                <br>'.$row['phone'].'
                                                </td>';
                                                $sql_plan2 = $mysqli->query("SELECT * FROM $plan WHERE trash != '1' AND id = '".$row_page['plan']."'");
    
                                                $rowp = $sql_plan2->fetch_assoc();
                                                echo'
                                                <td>'.$rowp['name'].'</td>
                                                <td>'.$row_page['payment_method'].'</td>
                                                <td>MYR '.$rowp['price'].'</td>
                                                <td>
                                                    
                                                    <a href="#"><i class="fas fa-trash"></i></a>
                                                    <a href="#"><i class="fas fa-print"></i></a>
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