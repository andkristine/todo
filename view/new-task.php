<?php 

include_once './components/header.php';
include_once './components/navigation.php'; 
session_start();

$id = $_SESSION['id'];
$email = $_SESSION['email'];

include_once '../controller/controller.php';
$controller = new Controller();

$user_id = $id;
// $todoText = "";

$textErr = "";

if(isset($_POST['logout'])) {
    session_destroy();
    header('Location: logout.php');
}

if(isset($_POST['textBtn'])) {

    $todoText = $_POST['todoText'];
    header('Location: tasks.php');

}

$conn = $controller->getConn();
$stmt = $conn->prepare("INSERT INTO entries (user_id, text) VALUES (?, ?)");
$stmt->bind_param("ss", $user_id, $todoText);
$stmt->execute();
$conn->close();

?> 

    <div class="container">
    <h1>Create a task!</h1>
    <form action="" method="post" class="newTaskInput">
        <label for="todoText">Enter task here:</label><br>
        <input type="text" id="todoText" name="todoText" class="taskHere" placeholder="Let's plan something!"><br>
        <input type="submit" name="textBtn" id="textBtn" class="textBtn" value="Submit">
    </form>

    
</div>
<script src="../js/app.js"></script>


<?php

    include_once './components/footer.php';


?>