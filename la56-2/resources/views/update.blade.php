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
修改数据
<form action="/update/{{$data->id}}" method="post">
    {{csrf_field()}}
    ID: {{$data->id}}

    修改用户名：<input type="text" name="user" value="{{$data->user}}" ><br>
    修改密码：<input type="text" name="password" value="{{$data->password}}" ><br>

    修改性别：<input type="radio" name="sex" value="1" @if(in_array('1',explode(',',$data->sex))) checked="checked" @endif> 男
          <input type="radio" name="sex" value="2"  @if(in_array('2',explode(',',$data->sex))) checked="checked" @endif> 女
          <input type="radio" name="sex" value="3"  @if(in_array('3',explode(',',$data->sex))) checked="checked" @endif> 保密<br>

    修改爱好:<input type="checkbox" name="hobby[]" value="阅读" @if(in_array('阅读',explode(',',$data->hobby))) checked="checked" @endif/>阅读
         <input type="checkbox" name="hobby[]" value="篮球" @if(in_array('篮球',explode(',',$data->hobby))) checked="checked" @endif/>篮球
         <input type="checkbox" name="hobby[]" value="旅游" @if(in_array('旅游',explode(',',$data->hobby))) checked="checked" @endif/>旅游<br>

    <input type="submit" value="提交">
</form>
</html>
