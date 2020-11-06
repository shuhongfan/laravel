<?php
  //获得错误信息
      $dsn = "mysql:host=localhost;dbname=db_chengjixin";
      $pdo = new PDO($dsn,'root','root');  //创建PDO对象
      $sql = "delete from user1 where `name` = 'xxx'";  // user1表不存在
      $rst = $pdo->exec($sql);
      if ($rst === false){
          echo $pdo->errorCode()."<br />";   //  42S02  表示数据表不存在
          //print_r($pdo->errorInfo());
          echo $pdo->errorInfo()[2];
      }
?>