<?php

include_once 'controller.php';
session_start();




$id = $_REQUEST['id'];


$controller = new Controller();
$delete = $controller->deleteEntry($id);

if($delete) {
    echo "You successfully deleted the task";
    header('Location: ../view/tasks.php');
}