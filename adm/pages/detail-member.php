<?php
session_start();
include_once '../cms/connect.php' ;
$page = $_GET['id'];
$sql_member = $mysqli->query("SELECT * FROM $member WHERE trash = '0' AND id = '".$page."'");
$row = $sql_member->fetch_assoc();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
		$mtime = $_POST['mtime'];;

		$mysqli->query("UPDATE meet SET 
                        time = '" . $mtime . "'
                        WHERE member = '" . $row['email'] . "'");
        $sql_member2 = $mysqli->query("SELECT * FROM meet WHERE member = '" . $row['email'] . "'");
        $row2 = $sql_member2->fetch_assoc();
                        require "../mail/phpmailer/PHPMailerAutoload.php";
                        $mail = new PHPMailer;
                        
                        // h-hotel account
                        $sender_email = 'sweatlab671@gmail.com';
                        $sender_password = 'fyxkkscircmsaozg';
                        $receiver_email = $row['email'];
                        $mail->isSMTP();
                        $mail->Host='smtp.gmail.com';
                        $mail->Port=587;
                        $mail->SMTPAuth=true;
                        $mail->SMTPSecure='tls';
                        
                        $mail->Username = $sender_email;
                        $mail->Password = $sender_password;
                        
                        $mail->setFrom($sender_email);
                        $mail->addAddress($receiver_email);
                        
                        // HTML body
                        $mail->isHTML(true);
                        $mail->Subject="Recover your password";
                        $mail->Body = '
                        <html>
<head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 600px;
        margin: 20px auto;
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1, p {
        margin: 0;
    }
    .meeting-details {
        margin-top: 20px;
    }
    .meeting-details p {
        margin-bottom: 10px;
    }
    .button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }
    .button:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>

<div class="container">
    <h1>Meeting Invitation</h1>
    <p>Hello  ' . htmlentities($row['username']) . ',</p>
    <p>You are invited to attend a meeting. Details are provided below:</p>
    <div class="meeting-details">
        <p><strong>Date:</strong>' . htmlentities($row2['time']) . '</p>
        <p><strong>Meeting Link:</strong> <a href="https://meet.google.com/zfc-eowz-xhn">https://meet.google.com/zfc-eowz-xhn</a></p>
    </div>
    <p>Please make sure to join the meeting on time. If you have any questions, feel free to contact us.</p>
    <a href="https://meet.google.com/zfc-eowz-xhn" class="button">Join Meeting</a>
</div>

</body>
</html>';
                        
                        // Send the email
                        $mail->send();
        
		?>
		<script>
            alert('Already Send the meeting link to member.');
            window.location.href = '../dashboard.php';
        </script>
		<?php
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
    include '../require/menu.php' ;
?>
<style>
    .password-input-container {
        position: relative;
    }

    .toggle-password {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
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
                            <h2 class="pageheader-title">Member Form </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Member</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Member Detail</li>
                                    </ol>
                                </nav>
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
                                    <form  method="post" action="">
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Username</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required=""  value="<?=$row['username'];?>" placeholder="Username" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Email</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required=""  placeholder="name@example.com" value="<?=$row['email'];?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Phone Number</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                            <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">+60</span></span>
                                                    <input type="text" placeholder="Phone number" value="<?=$row['phone'];?>" class="form-control" disabled>
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Meet Time</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="datetime-local"  name="mtime">
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                                <button type="submit" name="submit" class="btn btn-space btn-primary">Approval</button>
                                               
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

<?php 
    include '../require/footer.php' ;
?>