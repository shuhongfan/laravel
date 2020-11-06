<?php
  //query方法pdo, foreach遍历$stmt,多重遍历
      $dsn = "mysql:host=localhost;dbname=db_chengjixin";
      $pdo = new PDO($dsn,'root','root');  //创建PDO对象
      $sql = "select * from tb_info"; //sql语句
      $stmt = $pdo->query($sql);        // statement对象
      //var_dump($stmt);
      foreach($stmt as $row){
          foreach($row as $k => $v ){
              echo $k.'--'.$v."  ";
          }
          echo "<br />";
      }
?>