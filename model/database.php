<?php
  $dsn="mysql:host=localhost;dbname=assignment_tracker";
  $username="root";
  try{
    $db=new PDO($dsn,$username);//PHP data object
    //provides efficient way to excess database
    //support multiple db drivers make it easy to switch between db systems

  }
  catch(PDOException $e){
    $error="Database Error:";
    $error.=$e->getMessage();
    include('view/error.php');
    exit();


  }

  