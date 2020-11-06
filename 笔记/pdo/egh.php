<?php
  $name = "'or 1=1 #'";
  $pwd = "111";
  try{
      $pdo = new PDO("mysql:host=localhost;dbname=db_chengjixin",'root','root');  //创建PDO对象
      $sql = "select * from user where name=? and pwd=?";
      $stmt = $pdo->prepare($sql);      //准备一条sql语句
      $rst = $stmt->execute([$name,$pwd]);          //执行语句
      var_dump($stmt);
      foreach($stmt as $row){
          var_dump($row);
      }
  }catch(PDOException $e){
    var_dump($e->getMessage());
}
?>

