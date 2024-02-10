<?php 
include 'db.php';
session_start();
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql='INSERT INTO customer (cus_name, cus_username, cus_email, cus_password) VALUES (:name, :username, :email, :password)';
    $query = $dbh->prepare($sql);
    $query->bindParam(':name',$name,PDO::PARAM_STR);
    $query->bindParam(':username',$username,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':password',$password,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
    {
        $sql_p = "INSERT INTO payment (customer) VALUES (:customer)";
        $stmt_p = $dbh->prepare($sql_p);
        $stmt_p->bindParam(':customer', $email,PDO::PARAM_STR);
        $stmt_p->execute();
        $sql_c = "INSERT INTO category (email) VALUES (:email)";
        $stmt_c = $dbh->prepare($sql_c);
        $stmt_c->bindParam(':email', $email,PDO::PARAM_STR);
        $stmt_c->execute();
        ?>
    <script>
        alert("Register successful now you will redirected to login page");
    </script>
    <?php
        $_SESSION['cus_email'] = $email;
        header("Location: reg&login.php");
        exit();
    }
    else 
    {
    $error="Something went wrong. Please try again";
    }
    
    }
?>

