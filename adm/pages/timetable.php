<?php
session_start();
include_once '../cms/connect.php' ;

$sql_member = $mysqli->query("SELECT * FROM timetable WHERE trash = '0' AND trainer = '".$_SESSION['email']."'");
$row = $sql_member->fetch_array();
print_r($row);exit;
?>
<?php 
    include '../require/header.php' ;
?>
<script>document.getElementsByTagName("html")[0].className += " js";</script>
<link rel="stylesheet" href="assets/css/style.css">
<?php 
    include '../require/top.php' ;
?>
        
<?php 
    include '../require/menu.php' ;
?>

<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
               <div class="card">
                    <h5 class="card-header"><a href="new-time.php" class="btn btn-rounded btn-danger">Add new</a></h5>
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
                                        if ($sql_plan->num_rows > 0){
                                            while ($row_page = $sql_plan->fetch_array(MYSQLI_ASSOC)){        

                    if($row_page['day']=='monday'){
                      echo '<li class="cd-schedule__event"><a data-start="'.$row_page['from'].'" data-end="'.$row_page['to'].'" data-content="event-abs-circuit" data-event="event-1" >
                      <em class="cd-schedule__name">'.$row_page['member'].'</em>
                    </a></li>';
                    }
                }
                                        }
            ?>
          </ul>
        </li>
  
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Tuesday</span></div>
  
          <ul>
          <?php
                                        if ($sql_plan->num_rows > 0){
                                            while ($row_page = $sql_plan->fetch_array(MYSQLI_ASSOC)){        

                    if($row_page['day']=='tuesday'){
                      echo '<li class="cd-schedule__event"><a data-start="'.$row_page['from'].'" data-end="'.$row_page['to'].'" data-content="event-abs-circuit" data-event="event-1" >
                      <em class="cd-schedule__name">'.$row_page['member'].'</em>
                    </a></li>';
                    }
                }
                                        }
            ?>
          </ul>
        </li>
  
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Wednesday</span></div>
  
          <ul>
          <?php
                                        if ($sql_plan->num_rows > 0){
                                            while ($row_page = $sql_plan->fetch_array(MYSQLI_ASSOC)){        
                for($i=0;$i<2;$i++){
                  
                    if($row_page[$i]['day']=='wednesday'){
                      echo '<li class="cd-schedule__event"><a data-start="'.$row_page['from'].'" data-end="'.$row_page['to'].'" data-content="event-abs-circuit" data-event="event-1" >
                      <em class="cd-schedule__name">'.$row_page['member'].'</em>
                    </a></li>';
                    }
                    }
                }
                                        }
            ?>
          </ul>
        </li>
  
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Thursday</span></div>
  
          <ul>
          <?php
                                        if ($sql_plan->num_rows > 0){
                                            while ($row_page = $sql_plan->fetch_array(MYSQLI_ASSOC)){        

                    if($row_page['day']=='thursday'){
                      echo '<li class="cd-schedule__event"><a data-start="'.$row_page['from'].'" data-end="'.$row_page['to'].'" data-content="event-abs-circuit" data-event="event-1" >
                      <em class="cd-schedule__name">'.$row_page['member'].'</em>
                    </a></li>';
                    }
                }
                                        }
            ?>
          </ul>
        </li>
  
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Friday</span></div>
  
          <ul>
          <?php
                                        if ($sql_plan->num_rows > 0){
                                            while ($row_page = $sql_plan->fetch_array(MYSQLI_ASSOC)){        

                    if($row_page['day']=='friday'){
                      echo '<li class="cd-schedule__event"><a data-start="'.$row_page['from'].'" data-end="'.$row_page['to'].'" data-content="event-abs-circuit" data-event="event-1" >
                      <em class="cd-schedule__name">'.$row_page['member'].'</em>
                    </a></li>';
                    }
                }
                                        }
            ?>
          </ul>
        </li>
      </ul>
    </div>
  
    <div class="cd-schedule-modal">
      <header class="cd-schedule-modal__header">
        <div class="cd-schedule-modal__content">
          <span class="cd-schedule-modal__date"></span>
          <h3 class="cd-schedule-modal__name"></h3>
        </div>
  
        <div class="cd-schedule-modal__header-bg"></div>
      </header>
  
      <div class="cd-schedule-modal__body">
        <div class="cd-schedule-modal__event-info"></div>
        <div class="cd-schedule-modal__body-bg"></div>
      </div>
  
      <a href="#0" class="cd-schedule-modal__close text-replace">Close</a>
    </div>
  
    <div class="cd-schedule__cover-layer"></div>
  </div>
</div>
            </div>
</div>

<script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="assets/js/main.js"></script>

<?php 
    include '../require/footer.php' ;
?>