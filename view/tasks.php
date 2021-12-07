<?php 

include_once './components/header.php';
include_once './components/navigation.php';
include_once '../controller/controller.php';

session_start();
$id = $_SESSION['id'];
$controller = new Controller();
if(isset($_POST['logout'])) {
    session_destroy();
    header('Location: login.php');
}

?> 
          
          
    <a class="newTask" href="new-task.php">New Task</a>
        
    
    <div class="container">
        <!-- <h1>Tasks</h1> -->
    <table class="table">
        <!-- <div>
            <a href="new-task.php"><button type="button">Create a task!</button></a>
        </div> -->
        <thead>
            <?php
            $rows = $controller->fetchEntries($id);
            if(!empty($rows)) 
            {
            ?>
            <tr>
                <th><h2>ID</h2></th>
                <th><h2>Text</h2></th>
                <th><h2>Date created</h2></th>
            </tr>
            <?php
            }
            ?>
        </thead>
        <tbody>
            <?php
            $rows = $controller->fetchEntries($id);
            if(!empty($rows)) 
            {
                $taskId = 0;
                foreach($rows as $row) {
                    $taskId += 1;
                    ?>
                    <tr>
                        
                        <td><?php echo $taskId; ?></td>
                        <td><?php echo $row['text']?></td>
                        <td><?php echo $row['created_at']?></td>
                        <td>
                            <a class="deleteBtn" href="../controller/delete.php?id=<?php echo $row['id']?>">Delete</a>
                        </td>
                        <!-- <td>
                            <a class="deleteBtn" href="../controller/edit.php?id=<?php echo $row['id']?>">Edit</a>
                        </td> -->
                    </tr>
                    <?php 
                        }
                    } else { ?>
                        
                        <h2 class="noTasks">You have no tasks planned. Let's go and add something!</h2>
                   
                   
                    <?php
                    }
            ?>
        </tbody>
    </table>
</div>


<?php

    include_once './components/footer.php';


?>