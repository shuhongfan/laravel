<?php
  //exec插入多个记录，获得最后插入记录的id号
      $dsn = "mysql:host=localhost;dbname=db_chengjixin";
      $pdo = new PDO($dsn,'root','root');  //创建PDO对象
      $sql = "insert into `user`(`name`,`pwd`) values
             ('aaa','111'),
             ('bbb','222')";
      $smst = $pdo->exec($sql);
      var_dump($smst);  //返回结果就是插入成功的记录数
      echo $pdo->lastInsertId();  //最后一次插入记录的id,也可能不是最后一个记录
?>