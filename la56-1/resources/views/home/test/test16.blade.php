<html>
<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<input type="button" value="点我" id="btn">
<script>
    $(function (){
        $('#btn').click(function (){
            $.get('/shf17',function (data){
                console.log(data)
            },'json')
        })
    })
</script>
</html>