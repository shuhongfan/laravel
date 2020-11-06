<?php
  //query插入一个记录
      $dsn = "mysql:host=localhost;dbname=db_chengjixin";
      $pdo = new PDO($dsn,'root','root');  //创建PDO对象
      $sql = "insert into `user`(`name`,`pwd`) values('guanyu','654321')";
      $smst = $pdo->query($sql);
      var_dump($smst);  //返回结果就是插入成功的记录数
?>