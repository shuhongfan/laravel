<html>
@foreach($errors->all() as $error)
    <li>{{$error}}</li>
@endforeach

<form action="/yan" method="post">
    {{csrf_field()}}
    用户名： <input type="text" name="user">{{$errors->first('user')}}<br/>
    年龄： <input type="text" name="age">{{$errors->first('age')}}<br/>
    <input type="submit" name="bt1" value="submit">
</form>
</html>
