<?php
  //新建表
      $dsn = "mysql:host=localhost;dbname=db_chengjixin";
      $pdo = new PDO($dsn,'root','root');  //创建PDO对象
      $sql = "CREATE TABLE IF NOT EXISTS user2(
              `id` int unsigned not null primary key auto_increment,
              `name` varchar(32) not null,
              `pwd` varchar(32) not null);";
      $rst = $pdo->query($sql);
      var_dump($rst);
?>