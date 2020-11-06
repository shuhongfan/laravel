<?php
  $name = "aaa";
  $pwd = "111";
  try{
      $pdo = new PDO("mysql:host=localhost;dbname=db_chengjixin",'root','root');  //创建PDO对象
      $sql = "select * from user where name=? and pwd=?";
      $stmt = $pdo->prepare($sql);      //准备一条sql语句
      $stmt->bindParam(1,$name);  //第二个参数必须是变量
      $stmt->bindParam(2,$pwd,PDO::PARAM_STR);  //pwd类型是字符串，默认也是字符串
      //$stmt->bindValue(2,$pwd);
      //$stmt->bindValue(1,$name);
      $stmt->execute();
      foreach($stmt as $row){
          var_dump($row);
      }
      echo $stmt->rowCount();
      echo "<br />";
      $stmt->bindValue(2,$pwd);
      $stmt->bindValue(1,$name);
      $stmt->execute();
      foreach($stmt as $row){
          var_dump($row);
      }
  }catch(PDOException $e){
    var_dump($e->getMessage());
}
?>

