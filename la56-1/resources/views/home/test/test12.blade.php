<html>
<form action="/shf8" method="post">
    <p>
        姓名: <input type="text" name="name">
    </p>
    <p>
        年龄: <input type="text" name="age">
    </p>
    <p>
        邮箱: <input type="email" name="email">
    </p>
    {{csrf_field()}}
    <p>
        <input type="submit" value="提交">
    </p>
</form>
</html>