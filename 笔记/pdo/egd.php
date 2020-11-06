<?php
  //查询1  fetch获得表记录
//fetch()  默认的索引和关联
//fetch(PDO::FETCH_ASSOC)  关联数组
//fetch(PDO::FETCH_NUM)    索引数组
//fetch(PDO::FETCH_BOTH)   索引和关联
      $dsn = "mysql:host=localhost;dbname=db_chengjixin";
      $pdo = new PDO($dsn,'root','root');  //创建PDO对象
      $sql = "select * from user where `id` = 3";
      $stmt = $pdo->query($sql);
      if ($stmt){
          while($row = $stmt->fetch(PDO::FETCH_NUM)){
              $data[] = $row;
          }
      }
      var_dump($data);
?>

