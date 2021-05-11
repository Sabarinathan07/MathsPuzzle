<?php
require_once '../../includes/DbOperations.php';
// var_dump($_POST);
// echo "Works";
   $puzzle_id  = $_POST['puzzle_id'];
   $score = $_POST['score'];

   // echo "works";
   // echo $puzzle_id;
   // echo $score;

   
   //$conn = mysqli_connect("localhost","root","","puzzle");

   // $stmt = $this->conn->prepare("INSERT INTO `user`(`id`, `name`, `email`, `password`) VALUES (NULL, ?, ?, ?)");
   // $stmt->bind_param("sss",$name,$email,$password);
   $db = new DbOperations();

   $db -> updateScore($puzzle_id,$score);

  
?>