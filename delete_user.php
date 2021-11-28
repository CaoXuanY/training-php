<?php
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    var_dump($id);
    //Get first number
    $start = substr($id, 0, 5);

    //Get last number
    $end = substr($id, -5);

    //Replace first number with null
    $id = str_replace($start, "", $id);

    //Replace last number with null
    $id = str_replace($end, "", $id);
   // var_dump($id); die;
   //so sánh 2 mã token:fix lỗi csrf
   if($_GET['token'] == $_SESSION['token']){
         $userModel->deleteUserById($id);//Delete existing user
  }

}
header('location: list_users.php');
?>