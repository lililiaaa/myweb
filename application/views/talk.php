<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Miss婷的评论页</title>

    <script type="text/javascript" src="../assets/talk/js/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" href="../assets/talk/css/talk.css">
    <script src="../assets/talk/js/jq.snow.js"></script>
    <!--下面是调用方法和参数说明-->
    <script>
        $(function(){
            $.fn.snow({
                minSize: 5,		//雪花的最小尺寸
                maxSize: 40, 	//雪花的最大尺寸
                newOn: 100		//雪花出现的频率 这个数值越小雪花越多
            });
        });

    </script>
</head>
<body style="background:#3B3B3B url(../assets/talk/img/bg2.jpg) no-repeat;background-position: 80% 90%; background-size: cover;background-attachment:fixed;">
<div class="body">
    <div class="title">
        <h1>Review &nbsp;Area</h1>

    </div>
    <div class="bg">
        <img src="../assets/talk/img/dog.png" class="dog" alt="">
        <div class="content">
            <div class="write">
                <img src="../assets/talk/img/w1.png" alt="">
                <img src="../assets/talk/img/w2.png" alt="">
                <div class="login">
                    <text>登录</text>
                </div>
                <form action="">
                    <textarea type="text" class="input" value="" style="overflow-y:hidden;" >这里输入评论哦~~~	</textarea>
                </form>
                <div class="post">提交</div>
            </div>
            <div class="review">
                <div class="hang">
                    <div class="photo"><img src="../images/001/header.jpg" alt=""></div>
                    <div class="text"><h3>lililiaaa</h3><text>加油噢噢噢噢噢噢噢噢！</text></div>
                </div>
                <div class="hang">
                    <div class="photo"><img src="../images/001/header.jpg" alt=""></div>
                    <div class="text"><h3>lililiaaa</h3><text>加油噢噢噢噢噢噢噢噢！</text></div>
                </div>
                <div class="hang">
                    <div class="photo"><img src="../images/001/header.jpg" alt=""></div>
                    <div class="text"><h3>lililiaaa</h3><text>加油噢噢噢噢噢噢噢噢！</text></div>
                </div>
            </div>
        </div>

    </div>
</div>

</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/11/4
 * Time: 18:23
 */