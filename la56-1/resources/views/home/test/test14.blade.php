<html>
<form action="" method="post" enctype="multipart/form-data">
    <p>
        姓名: <input type="text" name="name" placeholder="请输入姓名">
    </p>
    <p>
        年龄: <input type="text" name="age" placeholder="请输入年龄">
    </p>
    <p>
        邮箱: <input type="email" name="email" placeholder="请输入邮箱">
    </p>
    <p>
        头像: <input type="file" name="avatar">
    </p>
    {{csrf_field()}}
    <p>
        <input type="submit" value="提交">
    </p>
</form>
</html>