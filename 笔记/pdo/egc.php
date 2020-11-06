<?php
  //查询1  fetch获得表记录
      $dsn = "mysql:host=localhost;dbname=db_chengjixin";
      $pdo = new PDO($dsn,'root','root');  //创建PDO对象
      $sql = "select * from user";
      $stmt = $pdo->query($sql);
      $data[] = $stmt->fetch();
      $data[] = $stmt->fetch();
      $data[] = $stmt->fetch();
      $data[] = $stmt->fetch();
      var_dump($data);
?>

