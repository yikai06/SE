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
  <div class="container-fluid  dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- end pageheader -->
    <!-- ============================================================== -->
    <div class="container px-4 py-5" id="custom-cards">
      <h2 class="pageheader-title">Class Listings</h2>
      <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Classes</a></li>
			<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Class Listings</a></li>
          </ol>
        </nav>
      </div>
      <!-- Change the card images-->
      <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
        <div class="col">
          <a href="member-class-details.php">
            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg"
              style="background-image: url('unsplash-photo-1.jpg');height: auto !important;">
              <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Karate</h3>
                <ul class="d-flex list-unstyled mt-auto">
                  <li class="d-flex align-items-center me-3">
                    <svg class="bi me-2" width="1em" height="1em">
                      <use xlink:href="#geo-fill"></use>
                    </svg>
                    <small class="text-dark">Karate emphasizes disciplined training, self-defense, and the development
                      of physical and mental strength.
                    </small>
                  </li>
                </ul>
              </div>
            </div>
          </a>
        </div>

        <div class="col">
          <a href="member-class-details.php">
            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg"
              style="background-image: url('unsplash-photo-2.jpg');height: auto !important;">
              <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Tai Chi</h3>
                <ul class="d-flex list-unstyled mt-auto">
                  <li class="d-flex align-items-center me-3">
                    <svg class="bi me-2" width="1em" height="1em">
                      <use xlink:href="#geo-fill"></use>
                    </svg>
                    <small class="text-dark">Tai Chi involves slow, flowing movements, deep breathing, and a focus on
                      internal energy.</small>
                  </li>
                </ul>
              </div>
            </div>
          </a>
        </div>

        <div class="col">
          <a href="member-class-details.php">
            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg"
              style="background-image: url('unsplash-photo-3.jpg');height: auto !important;">
              <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Yoga Class</h3>
                <ul class="d-flex list-unstyled mt-auto">
                  <li class="d-flex align-items-center me-3">
                    <svg class="bi me-2" width="1em" height="1em">
                      <use xlink:href="#geo-fill"></use>
                    </svg>
                    <small class="text-dark">Yoga aims to achieve balance and harmony in the body, mind, and spirit. It
                      promotes flexibility, and relaxation.</small>
                  </li>
                </ul>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- end basic table  -->
    <!-- ============================================================== -->
  </div>

  <?php
  include '../require/footer.php';
  ?>