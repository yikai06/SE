<?php
session_start();
include_once '../cms/connect.php' ;
include_once '../cms/function.php' ;
$page = $_GET['id'];
$sql = "SELECT * FROM $class WHERE trash = '0' AND id ='".$page."'";
$sql_plan = $mysqli->query($sql);
$sql_member = $mysqli->query("SELECT * FROM $class WHERE trash = '0' AND id = '".$page."'");
$row = $sql_member->fetch_assoc();
$x = json_decode($row['day'], true);
$l = $row['count'];
?>
<?php include '../require/header.php'; ?>
<?php include '../require/top.php'; ?>
<?php include '../require/menu.php'; ?>
<script>document.getElementsByTagName("html")[0].className += " js";</script>
<link rel="stylesheet" href="assets/css/style.css">
<div class="dashboard-wrapper" style="min-height: 0 !important;">
  <div class="container-fluid dashboard-content mt-4">
  <?php
                            if ($sql_plan->num_rows > 0) {
                                while ($row_page = $sql_plan->fetch_array(MYSQLI_ASSOC)) {
                                  echo'
    <h2 class="pageheader-title">'.$row_page['name'].'</h2>
    <hr>
    <div class="row">
      <!-- Picture Section -->
      <div class="col-md-6">
        <img src="'.$pathss.'image/class/'.$row_page['image'].'" class="img-fluid rounded" alt="Picture">
      </div>
      <!-- Description Section -->
      <div class="col-md-6">
        <h5 class="card-title">Coach</h5>
        <p class="card-text">'.$row_page['coach'].'</p>
        <br/>
        <h5 class="card-title">Duration</h5>
        <p class="card-text">'.$row_page['duration'].' minutes</p>
        <br/>
        <h5 class="card-title">Description</h5>
        <p class="card-text">'.$row_page['detail'].'</p>
      </div>
    </div>
                               '; }
                              }
                            ?>
  </div>
</div>
<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
               <div class="card">
                <div class="cd-schedule cd-schedule--loading margin-top-lg margin-bottom-lg js-cd-schedule">
    <div class="cd-schedule__timeline">

										
      <ul>
        <li><span>09:00</span></li>
        <li><span>09:30</span></li>
        <li><span>10:00</span></li>
        <li><span>10:30</span></li>
        <li><span>11:00</span></li>
        <li><span>11:30</span></li>
        <li><span>12:00</span></li>
        <li><span>12:30</span></li>
        <li><span>13:00</span></li>
        <li><span>13:30</span></li>
        <li><span>14:00</span></li>
        <li><span>14:30</span></li>
        <li><span>15:00</span></li>
        <li><span>15:30</span></li>
        <li><span>16:00</span></li>
        <li><span>16:30</span></li>
        <li><span>17:00</span></li>
        <li><span>17:30</span></li>
        <li><span>18:00</span></li>
      </ul>
    </div> <!-- .cd-schedule__timeline -->

    <div class="cd-schedule__events">
      <ul>

        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Monday</span></div>
  
          <ul>
          
          <?php
                for ($y = 0; $y < $l; $y++) {
                    if($x[$y]['day']=='monday'){
                      echo '<li class="cd-schedule__event"><a data-start="'.$x[$y]['time'].'" data-end="'.$x[$y]['end'].'" data-content="event-abs-circuit" data-event="event-1">
                      <em class="cd-schedule__name">'.$row['name'].'</em>
                    </a></li>';
                    }
                }
            ?>
            
          </ul>
        </li>
  
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Tuesday</span></div>
  
          <ul>
          
          <?php
                for ($y = 0; $y < $l; $y++) {
                    if($x[$y]['day']=='tuesday'){
                      echo '<li class="cd-schedule__event"><a data-start="'.$x[$y]['time'].'" data-end="'.$x[$y]['end'].'" data-content="event-abs-circuit" data-event="event-1" >
                      <em class="cd-schedule__name">'.$row['name'].'</em>
                    </a></li>';
                    }
                }
            ?>
            
          </ul>
        </li>
  
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Wednesday</span></div>
  
          <ul>
          
          <?php
                for ($y = 0; $y < $l; $y++) {
                    if($x[$y]['day']=='wednesday'){
                      echo '<li class="cd-schedule__event"><a data-start="'.$x[$y]['time'].'" data-end="'.$x[$y]['end'].'" data-content="event-abs-circuit" data-event="event-1" >
                      <em class="cd-schedule__name">'.$row['name'].'</em>
                    </a></li>';
                    }
                }
            ?>
            
          </ul>
        </li>
  
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Thursday</span></div>
  
          <ul>
          
          <?php
                for ($y = 0; $y < $l; $y++) {
                    if($x[$y]['day']=='thursday'){
                      echo '<li class="cd-schedule__event"><a data-start="'.$x[$y]['time'].'" data-end="'.$x[$y]['end'].'" data-content="event-abs-circuit" data-event="event-1" >
                      <em class="cd-schedule__name">'.$row['name'].'</em>
                    </a></li>';
                    }
                }
            ?>
            
          </ul>
        </li>
  
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Friday</span></div>
  
          <ul>
          
          <?php
                for ($y = 0; $y < $l; $y++) {
                    if($x[$y]['day']=='friday'){
                      echo '<li class="cd-schedule__event"><a data-start="'.$x[$y]['time'].'" data-end="'.$x[$y]['end'].'" data-content="event-abs-circuit" data-event="event-1" >
                      <em class="cd-schedule__name">'.$row['name'].'</em>
                    </a></li>';
                    }
                }
            ?>
            
          </ul>
        </li>
      </ul>
    </div>
 
   
  
    <div class="cd-schedule-modal">
      
    </div>
  
    <div class="cd-schedule__cover-layer"></div>
  </div>
</div>
            </div>
</div>

<script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="assets/js/main.js"></script>
<?php include '../require/footer.php'; ?>