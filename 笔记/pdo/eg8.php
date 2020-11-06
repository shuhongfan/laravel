<?php
  //exec修改记录
      $dsn = "mysql:host=localhost;dbname=db_chengjixin";
      $pdo = new PDO($dsn,'root','root');  //创建PDO对象
      $sql = "update user set name='xxx',pwd='yyy' where `id` = 1";
      $rst = $pdo->exec($sql);
      var_dump($rst);
?>