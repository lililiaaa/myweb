
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
        .login-bg{
            display: block;
        }
        .bgbg{
            margin-top: 20%;
        }
    </style>
</head>

<body>
<div class="login-bg">
    <div class="bgbg">
        <a href="welcome/reg" class="login-icon" id="reg" >
            注册
        </a>
        <form class="content" id="frm_login" action="welcome/check_login" method="POST">
            <div><h3>用户名:</h3> <input type="text" name="f_name" id="f_name">  <span id="f_name_msg" style='font-size:15px;'class="help-block" >输入用户名</span> </div>
            <div><h3>密码:</h3><input type="password" name="f_pwd" id="f_pwd"> <span id="f_pwd_msg" style='font-size:15px;'class="help-block" >输入密码</span></div>
            <button type="submit"  class=" button" >登录</button>
        </form>
    </div>

</div>

<script>






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
        if(data='false'){
            alert('输入错误')
        }
    })

    $('#frm_reg').on('submit',function (data) {

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
