<?php 
    include 'require/header.php' ;
?>

<?php 
    include 'require/top.php' ;
?>
        
<?php 
    include 'require/menu3.php' ;
?>

<form>
                                            <div class="form-group">
                                                <label for="inputText3" class="col-form-label">Input Text</label>
                                                <input id="inputText3" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">Email address</label>
                                                <input id="inputEmail" type="email" placeholder="name@example.com" class="form-control">
                                                <p>We'll never share your email with anyone else.</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText4" class="col-form-label">Number Input</label>
                                                <input id="inputText4" type="number" class="form-control" placeholder="Numbers">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword">Password</label>
                                                <input id="inputPassword" type="password" placeholder="Password" class="form-control">
                                            </div>
                                            <div class="custom-file mb-3">
                                                <input type="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">File Input</label>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Example textarea</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            </div>
                                        </form>

<?php 
    include 'require/footer.php' ;
?>