<?php
  try{
      $pdo = new PDO("mysql:host=localhost;dbname=db_chengjixin",'root','root');  //创建PDO对象
      $sql = "select name,pwd from user";
      $stmt = $pdo->prepare($sql);      //准备一条sql语句
      $stmt->bindColumn(1,$username);
      $stmt->bindColumn(2,$mima);
      $stmt->execute();
      while($row =  $stmt->fetch(PDO::FETCH_BOUND)){
         echo $username,$mima,"<br >";
      }
  }catch(PDOException $e){
    var_dump($e->getMessage());
}
?>

