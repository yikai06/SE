<?php 
    include '../require/header.php' ;
?>
<?php 
    include '../require/top2.php' ;
?>
<?php 
    include '../require/menu3.php' ;
?>

<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Member Detail </h2>
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
                                    <form id="validationform" data-parsley-validate="" novalidate="">
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Username</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" placeholder="Username" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Email</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" data-parsley-minlength="6" placeholder="name@example.com" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Phone Number</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                            <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">+60</span></span>
                                                    <input type="text" placeholder="Phone number" class="form-control">
                                            </div>
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
                    
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Goals Settings</h5>
                                <div class="card-body">
                                    <form id="form" data-parsley-validate="" novalidate="">
                                        <div class="form-group row">
                                            <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">Task Name</label>
                                            <div class="col-9 col-lg-10">
                                                <select class="form-control" id="validationCustom02" required>
                                                        
                                                        <option value="option1">Choose</option>
                                                        <option value="option2">Yoga</option>
                                                       
                                                 </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword2" class="col-3 col-lg-2 col-form-label text-right">Units</label>
                                            <div class="col-9 col-lg-10">
                                                <select class="form-control" id="validationCustom02" required>
                                                        
                                                        <option value="option1">Choose</option>
                                                        <option value="option2">x5</option>
                                                        <option value="option3">x10</option>
                                                        <option value="option4">x15</option>
                                                 </select>
                                            </div>
                                        </div>
                                        
                                        <div class="row pt-2 pt-sm-5 mt-1">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                <label class="be-checkbox custom-control custom-checkbox">
                                                   
                                                </label>
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    
                                                    <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                            
                            <section class="card card-fluid">
    <h5 class="card-header drag-handle">Task Listing</h5>
    <ul class="sortable-lists list-group list-group-flush list-group-bordered" id="items">
        <li class="list-group-item align-items-center drag-handle" style="display: flex; justify-content: space-between; align-items: center;">
            <span class="drag-indicator"></span>
            <img src="<?=$path1; ?>" id="previewImage" style="width: 100px; height: 100px; margin-right: 15px;">
            <div style="flex-grow: 1; text-align: center;">Sit-ups x5</div>
            <div class="btn-group" style="margin-left: auto;">
                <button class="btn btn-sm btn-outline-light"><i class="fas fa-check"></i></button>
                <button class="btn btn-sm btn-outline-light">
                    <i class="far fa-trash-alt"></i>
                </button>
            </div>
        </li>
    </ul>
</section>

                            
                            </div>

                        </div>
                    </div>
</div>
</div>

<?php 
    include '../require/footer.php' ;
?>