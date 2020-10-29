// 图片上传demo
jQuery(function () {
    var $ = jQuery,
        $list = $('#fileList'),
        // 优化retina, 在retina下这个值是2
        ratio = window.devicePixelRatio || 1,
        // Web Uploader实例
        uploader;
    // 初始化Web Uploader
    uploader = WebUploader.create({
        // 添加自己需要的参数
        // 在外部任何文件中都不能使用模板引擎的写法
        formData: {
            _token: $('input[name=_token]').val()
        },
        // 自动上传。
        auto: true,
        // swf文件路径
        swf: '/statics/webuploader-0.1.5/Uploader.swf',
        // 文件接收服务端。
        server: '/admin/uploader/webuploader',
        // 七牛云存储
        // server: '/admin/uploader/qiniu',
        // 选择文件的按钮。可选。
        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
        pick: '#filePicker',
        // 只允许选择文件，可选。
        // accept: {
        //     title: 'Images',
        //     extensions: 'xls,xlsx,csv',
        //     mimeTypes: 'image/*'
        // }
    });
    // 文件上传过程中创建进度条实时显示。
    uploader.on('uploadProgress', function (file, percentage) {
        var $li = $('#' + file.id),
            $percent = $li.find('.progress span');
        // 避免重复创建
        if (!$percent.length) {
            $percent = $('<p class="progress"><span></span></p>')
                .appendTo($li)
                .find('span');
        }
        $percent.css('width', percentage * 100 + '%');
    });
    // 文件上传成功，给item添加成功class, 用样式标记上传成功。 接收返回值response
    uploader.on('uploadSuccess', function (file,response) {
        $('#' + file.id).addClass('upload-state-done');
        console.log(response)
        // 写入隐藏域地址
        $('input[name=excelpath]').val(response.path)
    });
    // 文件上传失败，现实上传出错。
    uploader.on('uploadError', function (file) {
        var $li = $('#' + file.id),
            $error = $li.find('div.error');
        // 避免重复创建
        if (!$error.length) {
            $error = $('<div class="error"></div>').appendTo($li);
        }
        $error.text('上传失败');
    });
    // 完成上传完了，成功或者失败，先删除进度条。
    uploader.on('uploadComplete', function (file) {
        $('#' + file.id).find('.progress').remove();
    });
});