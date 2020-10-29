<html>
<form action="{{route('test7')}}" method="post">
    姓名:
    <input type="text" name="name" placeholder="请输入姓名">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    {{csrf_field()}}
    <input type="submit" value="提交">
</form>
</html>