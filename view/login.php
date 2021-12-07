<?php


    include_once './components/header.php'; 
    include_once '../controller/controller.php';

    $controller = new Controller();
    $conn = $controller->getConn();

    $email = "";
    $pw = "";

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $pw = $_POST['pw'];
        $selectPassword = "SELECT password FROM users WHERE email = '$email'";
        $selectId = "SELECT id FROM users WHERE email = '$email'";
        $result = $conn->query($selectPassword);
        $idResult = $conn->query($selectId);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pass = $row['password'];
                if (password_verify($pw, $pass)) {
                    session_start();
                    $_SESSION['email'] = $email;
                    header('Location: tasks.php');
                } else {
                    echo "Wrong password";
                }
            }
        }  else {
            echo "No such account";
        }
        if ($idResult->num_rows > 0) {
            while ($row = $idResult->fetch_assoc()) {
                $_SESSION['id'] = $row['id'];  
            }
        }  
    }


?>


    

    <div class="container">
        <section class="main-form">
            <!-- <h2>Log in</h2> -->
            <form action="" method="POST">
                <div class="input-group">
                    <label for="email">Enter email</label>
                    <input type="text" name="email" value="" class="form">
                    <!-- <span class="error"></span> -->
                   
                </div>
                <div class="input-group">
                    <label for="password" >Enter password</label>
                    <input type="password" name="pw" value="" class="form">
                    <!-- <span class="error"></span> -->
                  
                </div>
                <button type="submit" name="login">Log in</button>
                <a href="register" class="registration_link">Don't have an account? Sign up</a>
            </form>
        </section>
    </div>

<?php

    include_once './components/footer.php';


?>