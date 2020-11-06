<?php
  //预处理
      $dsn = "mysql:host=localhost;dbname=db_chengjixin";
      $pdo = new PDO($dsn,'root','root');  //创建PDO对象
      $sql = "select * from user";
      $stmt = $pdo->prepare($sql);      //准备一条sql语句
      $rst = $stmt->execute();          //执行语句
      //var_dump($rst);
      //var_dump($stmt);
      if ($rst)
          $data = $stmt->fetchall();
      var_dump($data);
?>

