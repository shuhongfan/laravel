<html>
  <form action="/r5" method="post">
      {{csrf_field()}}
      用户名<input type="text" name="user"><br />
      <input type="submit" name="bt1" value="submit">
  </form>
</html>