<?php
  //sql注入操作成功！
  echo "<pre>";
  $name = "'or 1=1 #'";
  $pwd = "111";
  try{
      $pdo = new PDO("mysql:host=localhost;dbname=db_chengjixin",'root','root');  //创建PDO对象
      $sql = "select * from user where name = '{$name}' and pwd = '{$pwd}'";
      $stmt = $pdo->prepare($sql);      //准备一条sql语句
      $rst = $stmt->execute();          //执行语句
      //var_dump($rst);
      //var_dump($stmt);
      if ($rst)
          $data = $stmt->fetchall();
      print_r($data);
      var_dump($sql);
  }catch(PDOException $e){
    var_dump($e->getMessage());
}
?>

