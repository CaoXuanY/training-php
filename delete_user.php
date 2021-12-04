<?php
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;
if (!empty($_GET['id'])) {
     if($_GET['token'] == $_SESSION['token']){//kiểm tra token
          $id = $_GET['id'];
          //var_dump($id);die();
           $userModel->deleteUserById($id);//Delete existing use
     }
}
header('location: list_users.php');
?>