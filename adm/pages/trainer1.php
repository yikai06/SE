<?php
session_start();
include_once '../cms/connect.php' ;
$sql = "SELECT * FROM $trainer WHERE trash = '0'";
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
<style>
.wrapper{
	margin： 10px auto
	padding: 0 10%;
	padding-bottom: 10px;
	text-transform: capitalize;
}
h1{
	color: black;
	font-size:45px;
	text-align: center;
	padding-bottom:15px;
	<!-- text-shadow: 0 15px 10px rgba(0,0,0,0.2);-->	
}
.container{
	display: grid;
	gap: 20px;
	grid-template-columns: repeat(auto-fit, minmax(270px,1fr));
}
.box{
	padding: 20px;
	text-align: center;
	border-radius: 5px;
	background: #fff;
	box-shadow: 0px 5px 10px rgba(0,0,0,0.2);
}
.box img{
	height: 150px;
	padding-right: 30px;
}
div.details{
	 text-align: center;
}
div.details h3{
	color: #444;
	padding： 10px 0；
	font-size: 20px;
}
ul.t-details{
	color: #777;
	font-size: 14px;
	text-align: left;
	line-height:1.6;
	display: inline-block;
}
.btn{
	color: #fff;
	border: none;
	outline: none:
	font-size: 17px;
	margin-top: 10px;
	padding: 8px 15px;
	background: #333;
	border-radius: 5px;
	display: inline-block;
	text-decoration： none;
}
.btn:hover{
	Letter-spacing:1px;
}
.btn:hover{
	transform: scale(1.03);
	color: #fff;
}

</style>

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
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <?php
                            if ($sql_plan->num_rows > 0) {
                                while ($row_page = $sql_plan->fetch_array(MYSQLI_ASSOC)) {
									?>
				<div class="wrapper">
					<h1>Trainers</h1>
					<div class="container">
						<div class="box">
							<img src="<?=$pathss;?>image/trainer/<?=$row_page['image'];?>">
							<div class="details">
								<h3><?=$row_page['username'];?></h3>
								<ul class="t-details">
									<li>Phone Number : +60 <?=$row_page['username'];?></li>
									<li><?=$row_page['age'];?> years of experience</li>

								</ul>
							</div>
							<a href="trainer-detail1.php?id=<?=$row_page['id'];?>" class="btn">View details</a>
						</div>
						
					</div>
				</div>
				<?php
								}
							}
							?>
		</div>
</div>

<?php 
        include '../require/footer.php' ;
?>