<?php

include_once './components/header.php';      
include_once '../controller/controller.php';
$controller = new Controller();

$emailErr = $passwordErr = "";
$name = "";
$email = "";
$password = "";

if(isset($_POST['register'])) {
    
    if(empty($_POST['name'])) {
        $emailErr = "Ievadi vardu!";
    } 
   
    if(empty($_POST['email'])) {
        $emailErr = "Ievadi epastu!";
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Nepareizs formats";
    }

    if(empty($_POST['password'])) {
        $passwordErr = "Ievadi paroli!";
    } else if (strlen($_POST['password']) < 8) {
            $passwordErr = "Vismaz 8 rakstz";
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

}

$conn = $controller->getConn();
$stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
$hashed = password_hash($password, PASSWORD_DEFAULT);
$stmt->bind_param("sss", $name, $email, $hashed);
$stmt->execute();
$stmt->close();
$conn->close();


?>

    <div class="container">
        <section class="main-form">
            <h2>Register</h2>
            <form action="" method="POST">
                <div class="input-group">
                    <label for="name" >Enter your name</label>
                    <input type="text" name="name" value="" class="form">                  
                </div>
                <div class="input-group">
                    <label for="email" >Enter email</label>
                    <input type="text" name="email" value="" class="form">
                </div>
                <div class="input-group">
                    <label for="password" >Enter password</label>
                    <input type="password" name="password" value="" class="form">     
                </div>
                <button type="submit" name="register">Sign up</button>
                <a href="login" class="registration_link">Already have an account? Log in</a>
            </form>
        </section>
    </div>

</body>
</html>