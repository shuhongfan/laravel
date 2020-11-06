<?php
  //查询1  fetch获得表记录
      $dsn = "mysql:host=localhost;dbname=db_chengjixin";
      $pdo = new PDO($dsn,'root','root');  //创建PDO对象
      $sql = "select * from user";
      $stmt = $pdo->query($sql);
      foreach($stmt as $row){
          foreach($row as $k => $v){
              echo $k.'--'.$v.'  ';
          }
          echo "<br />";
      }
      $one = $stmt->fetch();  //由于前面有循环遍历，所以此处得不到记录
      var_dump($one);
      echo $one['name']."<br />";
      echo $one[1];
?>

