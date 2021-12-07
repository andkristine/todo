<!-- <?php


// $emailErr = $passwordErr = "";

// if(isset($_POST['register'])) {
    

//     // user enters his/hers name here. Does not really matter, what he/she enters here, because name is used only in FE - to grret him/ her
//     if(empty($_POST['name'])) {
//         $emailErr = "Ievadi vardu!";
//      } 
   
    
//     if(empty($_POST['email'])) {
//         $emailErr = "Ievadi epastu!";
//     } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
//             $emailErr = "Nepareizs formats";
//     }



//     if(empty($_POST['password'])) {
//         $passwordErr = "Ievadi paroli!";
//     } else if (strlen($_POST['password']) < 8) {
//             $passwordErr = "Vismaz 8 rakstz";
//     }
// }

// include_once 'controller.php';
// $controller = new Controller();
// $conn = $controller->getConn();

// $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");

// include_once '../view/register.php';

// $name = $_POST['name'];
// $email = $_POST['email'];
// $password = $_POST['password'];

// $hashed = password_hash($password, PASSWORD_DEFAULT);
// $stmt->bind_param("sss", $name, $email, $hashed);

// $stmt->execute();

// echo "Izdevās";

// $stmt->close();
// $conn->close();




?> -->

































<!-- 
    <?php

    // include_once './components/header.php';


?>




    <div class="container">
        <section class="main-form">
            <h2>Reģistrēties</h2>
            <form action="" method="POST">
                <div class="input-group">
                    <label for="Test" >Ievadi savu epastu</label>
                    <input type="text" name="email" value="<?php ?>">
                    <span class="error"><?php /*echo $emailErr; */?></span>
                   
                </div>
                <div class="input-group">
                    <label for="Test" >Ievadi paroli</label>
                    <input type="password" name="password" value="">
                    <span class="error"> <?php /*echo $passwordErr; */?></span>
                  
                </div>
                <button type="submit" name="register">Reģistreties</button>
                <a href="./login">Esi reģistrējies? Pieslēdzies</a>
            </form>
        </section>
    </div>

<?php

    // include_once './components/footer.php';


?> -->