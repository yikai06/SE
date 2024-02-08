<?php 
    include '../require/header.php';
?>
<?php 
    include '../require/top.php';
?>
<?php 
    include '../require/menu4.php';
?>

<div class="dashboard-wrapper">
    <div class="container-fluid">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-10">
                <div class="dashboard-content p-4">
                    <h2 class="pageheader-title">Payment Listings</h2>
                    <div class="page-breadcrumb mb-4">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Payment</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Payment List</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card shadow"> <!-- Adding the shadow class here -->
                                <h5 class="card-header">Payment Lists</h5>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">#Invoice Number</th>
												<th scope="col">Member ID</th>
												<th scope="col">Plan ID</th>
                                                <th scope="col">Subscription Plan</th>
												<th scope="col">Start Date</th>
                                                <th scope="col">Payment Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">SF12345</th>
												<td>12345</td>
												<td>S12345</td>
                                                <td>Normal</td>
												<td>2024-01-08 11:55:24</td>
                                                <td>RM290</td>
                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    include '../require/footer.php';
?>
