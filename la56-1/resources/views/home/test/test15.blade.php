<html>
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
<style>
  table td,th {
    border: 1px solid #e5e5e5;
    padding: 8px;
  }
  .table{
    width: 100%;
    margin-left: 20%;
  }
</style>
  <table border="1">
    <thead>
      <tr>
        <th>id</th>
        <th>名字</th>
        <th>年龄</th>
        <th>邮箱</th>
        <th>头像</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $key=>$val)
        <tr>
          <td>{{$val->id}}</td>
          <td>{{$val->name}}</td>
          <td>{{$val->age}}</td>
          <td>{{$val->email}}</td>
          <td><img src="{{$val->avatar}}" alt=""></td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $data->links() }}

</html>