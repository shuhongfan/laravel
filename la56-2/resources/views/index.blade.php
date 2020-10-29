<html>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
添加数据
<form action="/add" method="post">
    {{csrf_field()}}
    用户名：<input type="text" name="user"><br>
    密码：<input type="password" name="password"><br>
    性别：<input type="radio" name="sex" value="1"> 男
          <input type="radio" name="sex" value="2"> 女
          <input type="radio" name="sex" value="3"> 保密<br>
    爱好:<input type="checkbox" name="hobby[]" value="阅读"/>阅读
        <input type="checkbox" name="hobby[]" value="篮球"/>篮球
        <input type="checkbox" name="hobby[]" value="旅游"/>旅游<br>
        <input type="submit" value="提交">
</form>
<table border="2">
    <th>id：</th>
    <th>用户名：</th>
    <th>密码：</th>
    <th>性别：</th>
    <th>爱好：</th>
    <td>删除</td>
    <td>修改</td>
    @foreach($data as $val)
        <tr>
            <td>{{$val->id}}</td>
            <td>{{$val->user}}</td>
            <td>{{$val->password}}</td>
            <td>
                @if($val->sex==1)
                    男
                    @elseif($val->sex==2)
                    女
                    @else
                    保密
                @endif
            </td>
            <td>{{$val->hobby}}</td>
            <td><a href="/del/{{$val->id}}">删除{{$val->id}}</a></td>
            <td><a href="/update/{{$val->id}}">修改{{$val->id}}</a></td>
        </tr>
    @endforeach
</table>

</html>
