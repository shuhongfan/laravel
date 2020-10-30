<html>
<script type="text/javascript">
    window.onload=function () {
        document.getElementsByName('user')[0].value="{{old('user')}}";
        document.getElementsByName('password')[0].value="{{old('password')}}";
    }
</script>
<form action="/yan2" method="post">
    {{csrf_field()}}
    用户名： <input type="text" name="user">{{$errors->first('user')}}<br/>
    密码： <input type="password" name="password">{{$errors->first('password')}}<br/>
    <input type="submit" name="bt1" value="submit">
</form>
</html>
