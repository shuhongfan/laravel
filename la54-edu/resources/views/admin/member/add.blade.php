<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="/favicon.ico" >
    <link rel="Shortcut Icon" href="/favicon.ico" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/admin/lib/html5shiv.js"></script>
    <script type="text/javascript" src="/admin/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <!--/meta 作为公共模版分离出去-->

{{--    引入webuploader--}}
    <link rel="stylesheet" href="/statics/webuploader-0.1.5/webuploader.css">

    <title>添加用户 - H-ui.admin v3.1</title>
    <meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
    <form action="" method="post" class="form form-horizontal" id="form-member-add">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户名：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="username" name="username">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="radio-box">
                    <input name="gender" type="radio" id="gender-1" value="1" checked>
                    <label for="gender-1">男</label>
                </div>
                <div class="radio-box">
                    <input type="radio" id="gender-2" name="gender" value="2">
                    <label for="gender-2">女</label>
                </div>
                <div class="radio-box">
                    <input type="radio" id="gender-3" name="gender" value="3">
                    <label for="gender-3">保密</label>
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="mobile" name="mobile">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" placeholder="@" name="email" id="email">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">头像：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <!--webuploader dom结构部分-->
                <div id="uploader-demo">
                    <!--用来存放item-->
                    <div id="fileList" class="uploader-list">
{{--                        添加隐藏域用于添加avatar地址--}}
                        <input type="hidden" name="avatar">
                    </div>
                    <div id="filePicker">选择图片</div>
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>所属地区：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <span class="select-box" style="width: 110px">
                    <select class="select" size="1" name="country_id">
                        <option value="" selected>请选择国家</option>
                        @foreach($county as $val)
                            <option value="{{$val->id}}">{{$val->area}}</option>
                        @endforeach
                    </select>
				</span>
                <span class="select-box" style="width: 110px">
                    <select class="select" size="1" name="province_id">
                        <option value="" selected>请选择省份/州</option>
                    </select>
				</span>
                <span class="select-box" style="width: 110px">
                    <select class="select" size="1" name="city_id">
                        <option value="" selected>请选择城市</option>
                    </select>
				</span>
                <span class="select-box" style="width: 110px">
                    <select class="select" size="1" name="county_id">
                        <option value="" selected>请选择县区</option>
                    </select>
				</span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>账号类型：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="radio-box">
                    <input name="type" type="radio" id="type-1" value="1" checked>
                    <label for="type-1">学生</label>
                </div>
                <div class="radio-box">
                    <input type="radio" id="type-2" name="type" value="2">
                    <label for="type-2">老师</label>
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>账号状态：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="radio-box">
                    <input name="status" type="radio" id="status-1" value="1">
                    <label for="status-1">禁用</label>
                </div>
                <div class="radio-box">
                    <input type="radio" id="status-2" name="status" value="2" checked>
                    <label for="status-2">启用</label>
                </div>
            </div>
        </div>
        {{csrf_field()}}
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
{{--webuploader--}}
<script src="/statics/webuploader-0.1.5/webuploader.min.js"></script>
<script src="/statics/avatar.js"></script>
<script type="text/javascript">
    $(function(){
        // 选择国家加载省份
        $('select[name=country_id]').change(function () {
            var id=$(this).val();
            $.get('/admin/member/getareabyid',{
                id: id
            },function (data) {
                var str=''
                $.each(data,function (index,el) {
                    // console.log(el)
                    str+='<option value="'+el.id+'">'+el.area+'</option>'
                })
                $('select[name=province_id]').find('option:gt(0)').remove()
                $('select[name=city_id]').find('option:gt(0)').remove()
                $('select[name=county_id]').find('option:gt(0)').remove()
                $('select[name=province_id]').append(str)
            },'json');
        })
        // 选择省份 列出州
        $('select[name=province_id]').change(function () {
            var id=$(this).val();
            $.get('/admin/member/getareabyid',{
                id: id
            },function (data) {
                var str=''
                $.each(data,function (index,el) {
                    // console.log(el)
                    str+='<option value="'+el.id+'">'+el.area+'</option>'
                })
                $('select[name=city_id]').find('option:gt(0)').remove()
                $('select[name=county_id]').find('option:gt(0)').remove()
                $('select[name=city_id]').append(str)
            },'json');
        })
        $('select[name=city_id]').change(function () {
            var id=$(this).val();
            $.get('/admin/member/getareabyid',{
                id: id
            },function (data) {
                var str=''
                $.each(data,function (index,el) {
                    // console.log(el)
                    str+='<option value="'+el.id+'">'+el.area+'</option>'
                })
                $('select[name=county_id]').find('option:gt(0)').remove()
                $('select[name=county_id]').append(str)
            },'json');
        })
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        $("#form-member-add").validate({
            rules:{
                username:{
                    required:true,
                    minlength:2,
                    maxlength:16
                },
                gender:{
                    required:true,
                },
                mobile:{
                    required:true,
                    isMobile:true,
                },
                email:{
                    required:true,
                    email:true,
                }
            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){
                $(form).ajaxSubmit({
                    type: 'post',
                    url: "/admin/member/add" ,
                    success: function(data){
                        if (data == '1'){
                            layer.msg('添加成功!',{icon:1,time:1000},function (){
                                var index = parent.layer.getFrameIndex(window.name);
                                // parent.$('.btn-refresh').click();
                                parent.window.location=parent.window.location
                                parent.layer.close(index);
                            });
                        } else {
                            layer.msg('error!',{icon:1,time:1000});
                        }
                    },
                    error: function(XmlHttpRequest, textStatus, errorThrown){
                        layer.msg('error!',{icon:1,time:1000});
                    }
                });
            }
        });
    });
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>