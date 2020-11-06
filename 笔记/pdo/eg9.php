<?php
  //删除记录
      $dsn = "mysql:host=localhost;dbname=db_chengjixin";
      $pdo = new PDO($dsn,'root','root');  //创建PDO对象
      $sql = "delete from user1 where `name` = 'xxx'";
      $rst = $pdo->exec($sql);
      var_dump($rst);
?>