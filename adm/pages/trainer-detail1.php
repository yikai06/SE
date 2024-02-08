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
h1{
	justify-content:center;
	text-align:center;
	margin-bottom:35px;
}
.container {
  display: flex;
  justify-content: space-around;
  padding: 10px;
  margin-top:-20px;
}

.trainer {
  border: 2px solid black;
  padding: 40px;
  text-align: center;
  flex-basis: 60%;
  background-color: white;
  color: black;
  display: flex;
  flex-direction: column;
}
.trainer h3{
	padding-top:20px;
}

.trainer-info img {
  width: 35%;
  height: 85%;
  border-radius: 8px;
  margin-right: 20px;
  float: left;
}
.trainer-info {
  text-align: left;
}
.trainer-info h3,
.trainer-info p {
  margin: 0; <!-- Remove default margin -->
}
div.detail-1{
	margin-top:-25px;
}
div.detail-1 p,
ul.t-details{
	color: #777;
	font-size: 16px;
	text-align: left;
	line-height:1.6;
	display: inline-block;
	margin-top:-10px;
	margin-bottom:20px;
}
.content {
  text-align: left; <!-- Align the content to the left -->
}
.book-now {
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
	margin-left: 250px;
}
.book-now:hover{
	Letter-spacing:1px;
}
.book-now:hover{
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
                            <h2 class="pageheader-title">Trainer Details </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Trainer</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Trainer Details</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
				<h1>Trainer Details</h1>
				<div class="container">
					<div class="trainer">
						
						<div class="trainer-info">
						<img src="/SE-main/images/Person/Personicon.png">
						<h3>Nicholas PERSONAL TRAINER</h3>
						&nbsp;
						<p><strong>NASM-Certified Personal Trainer (NASM-CPT)</strong></p>	
						</div>
		
					<div class="content">
						<div class="detail-1">
							<h3>Specialities：</h3>
								<ul class="t-details">
									<li>Weight management</li>
									<li>Body Toning</li>
									<li>Functional Training</li>
									<li>Educating in healthy lifestyle change</li>
								</ul>
						</div>
						<div class="detail-1">
							<h3>Experience：</h3>
								<ul class="t-details">
									<li>8 years of expertise in functional fitness and corrective exercise.</li>
									<li>Successfully worked with clients spanning various fitness levels, including beginners and advanced athletes.</li>
								</ul>
						</div>
						<div class="detail-1">
							<h3>Qualifications:</h3>
								<ul class="t-details">
									<li>Level 3 personal training</li>
									<li>First aid</li>
									<li>Nutritionist</li>
								</ul>
						</div>
						<div class="detail-1">
							<h3>Nicholas said:</h3>
								<p>"Empowering clients through education, personalized training and a focus on long-term health. I believe in creating sustainable habits that lead to lasting fitness transformation."</p>
						</div>
						<button class="book-now">Book Now</button>			
					</div>	
				</div>
			</div>
</div>
</div>
<?php 
    include '../require/footer.php' ;
?>