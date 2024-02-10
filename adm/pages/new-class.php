<?php
    session_start();
    include_once '../cms/connect.php' ;
    include_once '../cms/function.php' ;

    $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));
    $time = $date->format('Y-m-d H:i:s');

    if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
        if (isset($_POST['submit'])) {
	    $name = $_POST['name'];
	    $duration = $_POST['duration'];
	    $detail = $_POST['detail'];
        $coach = $_POST['coach'];
        $current_time = time();
        $image = $current_time.'-'.($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], "../../image/class/" . $image);
        $i= $_POST["count"];
        $data = array();
    for($y=0;$y<$i;$y++){
        $day = $_POST["day"][$y]; 
        $time1 = $_POST["time"][$y];
        $x = array(
            "day" => $day,
            "sort" => $y+1,
            "time" => $time1, 
            "trash" => '0'
        );
        $data[] = $x;
    }
    //print_r($data);exit;
    $data = jsonEncodeDecode('encode', $data) ;

        $mysqli->query("INSERT INTO $class (name, create_time, status, image, duration, detail, day, coach,count) VALUES ('".$name."','".$time."','active','".$image."','".$duration."','".$detail."','".$data."','".$coach."','".$i."')");

        $page = $mysqli->insert_id;
                  
        header('Location: class.php');
		exit ;
    }
}

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
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Add new class</h2>
                            <div class="page-breadcrumb">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
             
                    
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- valifation types -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                               
                                <div class="card-body">
                                    <form  data-parsley-validate="" novalidate=""  method="POST" action="" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Class Name</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" placeholder="Class Name" name="name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Duration</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" name="duration" placeholder="Duration" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Detail</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                            <textarea name="detail" id="editor1" rows="10" cols="80">
            					        </textarea>
                                        
                                            </div>
                                        </div>
                                        
                                        
                                       <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Class Image</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                 <input type="file" class="form-control-file" id="classImage" name="image">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Coach</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required=""  name="coach" placeholder="Coach Name" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Count</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" id="count" name="count" placeholder="count" class="form-control">
                                            </div>
                                        </div>

                                        <div id="dynamicFields"></div>

                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                                <button type="submit" name="submit" class="btn btn-space btn-primary">Submit</button>
                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end valifation types -->
                        <!-- ============================================================== -->
                    </div>
</div>
</div>
<script>
document.getElementById('count').addEventListener('input', function() {
    var count = parseInt(this.value);
    var dynamicFields = document.getElementById('dynamicFields');
    
    // Clear previous dynamic fields
    dynamicFields.innerHTML = '';
    
    // Create and display fields based on count
    for (var i = 0; i < count; i++) {
        var dayLabel = document.createElement('label');
        dayLabel.setAttribute('class', 'col-12 col-sm-3 col-form-label text-sm-right');
        dayLabel.textContent = 'Day of the week';
        
        var dayDiv = document.createElement('div');
        dayDiv.setAttribute('class', 'col-12 col-sm-8 col-lg-6');
        
        var daySelect = document.createElement('select');
        daySelect.setAttribute('class', 'form-control');
        daySelect.setAttribute('name', 'day[]');
        daySelect.setAttribute('id', 'day' + i);
        daySelect.innerHTML = `
            <option value="monday">Monday</option>
            <option value="tuesday">Tuesday</option>
            <option value="wednesday">Wednesday</option>
            <option value="thursday">Thursday</option>
            <option value="friday">Friday</option>
        `;
        
        var timeLabel = document.createElement('label');
        timeLabel.setAttribute('class', 'col-12 col-sm-3 col-form-label text-sm-right');
        timeLabel.textContent = 'Start From';
        
        var timeDiv = document.createElement('div');
        timeDiv.setAttribute('class', 'col-12 col-sm-8 col-lg-6');
        
        var timeInput = document.createElement('input');
        timeInput.setAttribute('type', 'time');
        timeInput.setAttribute('class', 'form-control');
        timeInput.setAttribute('name', 'time[]');
        timeInput.setAttribute('id', 'time' + i);
        timeInput.setAttribute('min', '08:00');
        timeInput.setAttribute('max', '18:00');
        timeInput.setAttribute('required', '');
        
        dayDiv.appendChild(daySelect);
        timeDiv.appendChild(timeInput);
        
        var divFormGroup1 = document.createElement('div');
        divFormGroup1.setAttribute('class', 'form-group row');
        divFormGroup1.appendChild(dayLabel);
        divFormGroup1.appendChild(dayDiv);
        
        var divFormGroup2 = document.createElement('div');
        divFormGroup2.setAttribute('class', 'form-group row');
        divFormGroup2.appendChild(timeLabel);
        divFormGroup2.appendChild(timeDiv);
        
        dynamicFields.appendChild(divFormGroup1);
        dynamicFields.appendChild(divFormGroup2);
    }
});
</script>

<script src="../ckeditor/ckeditor.js"></script>
<script>
                CKEDITOR.replace( 'detail' );
</script>
<?php 
    include '../require/footer.php' ;
?>