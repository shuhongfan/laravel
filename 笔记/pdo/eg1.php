<?php
  //连接数据库
  try{
      $dsn = "mysql:host=localhost;dbname=db_chengjixin";
      $user = 'root';
      $pwd = 'root';
      $pdo = new PDO($dsn,$user,$pwd);  //创建PDO对象
      var_dump($pdo);
  }catch(PDOException $e){
      var_dump($e->getMessage());
  }
?>