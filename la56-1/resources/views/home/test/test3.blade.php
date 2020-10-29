<?php
date_default_timezone_set("Asia/Shanghai");
echo 'test3 blade';
?>
现在是: {{$date}},今天是星期{{$day}}
一年之后的事件是: {{date('Y-m-d H:i:s',$time)}}