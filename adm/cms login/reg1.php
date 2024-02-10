<?php
include 'db.php';

if(!empty($_POST["email"])) {
	$email= $_POST["email"];
	if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

		echo "error : You did not enter a valid email.";
	}elseif (strpos($email, '@gmail.com') === false) {
        echo "<span style='color:red'> Email pattern must include '@.gmail.com'.</span>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
    }
	else {
		$sql ="SELECT cus_email FROM customer WHERE cus_email =:email";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':email', $email, PDO::PARAM_STR);
        $query-> execute();
        $results = $query -> fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
if($query -> rowCount() > 0)
{
echo "<span style='color:red'> Email already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	echo "<span style='color:green'> Email available for Registration .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}

?>
