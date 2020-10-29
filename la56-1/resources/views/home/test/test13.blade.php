<html>
<form action="" method="post">
    <p>
        姓名: <input type="text" name="name">
    </p>
    <p>
        年龄: <input type="text" name="age">
    </p>
    <p>
        邮箱: <input type="email" name="email">
    </p>
    <p>
        验证码: <input type="text" name="captcha"> <img src="{{captcha_src()}}" alt="">
        {{captcha_img()}}
    </p>
    {{csrf_field()}}
    <p>
        <input type="submit" value="提交">
    </p>
</form>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</html>