
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">>
<head>
    <meta charset="utf-8">
    <title>login</title>
    <base href="<?php echo site_url(); ?>">
    <script type="text/javascript" src="assets/talk/js/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" href="assets/talk/css/talk.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap-fileinput/4.4.2/css/fileinput.min.css">
    <script src="https://cdn.bootcss.com/bootstrap-fileinput/4.4.2/js/fileinput.min.js "></script>
    <script src="https://cdn.bootcss.com/bootstrap-fileinput/4.4.2/js/locales/zh.js "></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        html{
            height: 100%;
        }
        body{
            height: 100%;
            display: flex;
            justify-content: center;
        }
        .reg-bg{
            margin-top: 10%;
        }
        .regbgbg a{
            height: 80px;
            width: 80px;
            padding: 10px 5px;
            font-size: 25px;
        }
    </style>
</head>

<body>

    <div class="reg-bg ">

        <div class="regbgbg">
            <a href="welcome/login" class="login-icon" id="reg">
                登录
            </a>
            <form  id="frm_reg" action="welcome/do_reg" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">用户名</label>
                    <input type="text" class="form-control" id="username" name='username' placeholder="Name">
                    <span id="name_msg" style='font-size:15px;'class="help-block" >输入用户名</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">密码</label>
                    <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password">
                    <span id="password_msg" style='font-size:15px;'class="help-block">至少四位</span>
                </div>
                <div class="form-group">
                    <label >头像</label>
                    <input id="myFile" type="file" name="img" multiple class="file-loading">
                    <p class="help-block" style='font-size:15px;' id='img_msg'>请上传头像照片.</p>
                </div>

                <button type="submit"  class=" button" id="submit">注册</button>
            </form>
        </div>
    </div>
    <script>



$(function () {
    //0.初始化fileinput
    var oFileInput = new FileInput();
    oFileInput.Init("myFile", "/afterSale/uplode/photo");
});

var FileInput = function () {
    var oFile = new Object();

    //初始化fileinput控件（第一次初始化）
    oFile.Init = function (ctrlName, uploadUrl) {
        var control = $('#' + ctrlName);

        //初始化上传控件的样式
        control.fileinput({
            language: 'zh', //设置语言
            uploadUrl: uploadUrl, //上传的地址
            allowedFileExtensions: ['jpg', 'gif', 'png'],//接收的文件后缀
            //showUploadedThumbs:false,
            // uploadClass: 'hidden',
            showUpload: false, //是否显示上传按钮
            showCaption: false,//是否显示标题
            browseClass: "btn btn-info", //按钮样式
            dropZoneEnabled: false,//是否显示拖拽区域
            //minImageWidth: 150, //图片的最小宽度
            //minImageHeight: 150,//图片的最小高度
            //maxImageWidth: 150,//图片的最大宽度
            //maxImageHeight: 150,//图片的最大高度
            maxFileSize: 2048,//单位为kb，如果为0表示不限制文件大小
            maxFileCount: 1, //表示允许同时上传的最大文件个数
            minFileCount: 1,
            enctype: 'multipart/form-data',
            validateInitialCount: true,
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            msgFilesTooMany: "选择上传的文件数量({n}) 超过允许的最大数值{m}！",
            fileActionSettings : {
                showUpload: false,
                //showRemove: false
                showZoom:false
            }
        });

        //导入文件上传完成之后的事件
        $("#myFile").on("fileuploaded", function (event, data, previewId, index) {
            alert(data.response.code);
            // $("#divControl").hide();
        });
    }
    return oFile;
};
$('#reg').on('click',function () {
    $('.body').css('opacity','0.2')
    $('.reg-bg').show()
    $('.login-bg').hide()
})
$('#login-icon').on('click',function () {
    $('.body').css('opacity','0.2')
    $('.login-bg').show()
})
$('.wrong').on('click',function () {
    $('.body').css('opacity','1')
    $('.login-bg').hide()
    $('.reg-bg').hide()
    console.log(22)
})

var opts = {
    bSubmit: true,
    aSubmit:true
};
$('#username').on('blur',function () {
    var value=$(this).val();
    $.get('welcome/check_name',{ 'uname':value},function (data) {

        if(data=='success'){
            $('#name_msg').html('用户名已存在').css('color','red');
            opts.bSubmit=false;
        }else{
            $('#name_msg').html('');
            opts.bSubmit=true;
        }
    },'text')
})

$('#pwd').on('keyup',function () {
    if(this.value.length < 4){
        $('#password_msg').css('color','red');
        opts.bSubmit=false;
    }else{
        $('#password_msg').html('');
        opts.bSubmit=true;
    }
})
$('#frm_login').on('submit',function () {
    if($('#f_name').val() == ''){
        $('#f_name_msg').html('请输入用户名!').css('color','red');
        opts.aSubmit = false;
    }else{
        $('#f_name_msg').html('');
        opts.aSubmit=true;
    }
    if($('#f_pwd').val() == ''){
        $('#f_pwd_msg').html('请输入密码!').css('color','red');
        opts.aSubmit = false;
    }else{
        $('#f_pwd_msg').html('');
        opts.aSubmit=true;
    }
    return opts.aSubmit;
})

$('#frm_reg').on('submit',function () {

    if($('#username').val() == ''){
        $('#name_msg').html('请输入用户名!').css('color','red');
        opts.bSubmit = false;
    }else{
        $('#name_msg').html('')
        opts.bSubmit=true;
    }
    if($('#pwd').val() == ''){
        $('#password_msg').html('请输入密码!').css('color','red');
        opts.bSubmit = false;
    }else{
        $('#password_msg').html('')
        opts.bSubmit=true;
    }
    if($('#myFile').val() == ''){
        $('#img_msg').html('请选择头像!').css('color','red');
        opts.bSubmit = false;
    }else{
        $('#imgmsg').html('')
        opts.bSubmit=true;
    }
    return opts.bSubmit;


})

    </script>
</body>
</html>
