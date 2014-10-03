<!doctype html>
<html>
<head>

    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0"/>

    <meta charset="utf-8"/>

    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>

    <!-- Use title if it's in the page YAML frontmatter -->
    <title>NFC视频管理</title>

    <link href="<?php echo base_url(); ?>resource/stylesheets/application.css" media="screen" rel="stylesheet"
          type="text/css"/>

    <!--[if lt IE 9]>
    <script src="<?php echo base_url(); ?>resource/javascripts/vendor/html5shiv.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>resource/javascripts/vendor/excanvas.js" type="text/javascript"></script>
    <![endif]-->

    <script src="<?php echo base_url(); ?>resource/javascripts/application.js" type="text/javascript"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<style type="text/css">
    body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
    }

    .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
        -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
        box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
    }

    .form-signin .form-signin-heading,
    .form-signin .checkbox {
        margin-bottom: 10px;
    }

    .form-signin input[type="text"],
    .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
    }

</style>
<style type="text/css">
    body {
        font-family: "微软雅黑";
    }
</style>
<body>
<div class="container">

    <?php echo validation_errors(); ?>



    <form class="form-signin" action="<?php echo base_url("verifylogin"); ?>"  method="post" accept-charset="utf-8" >
        <h2 class="form-signin-heading">登陆</h2>
        <input type="text" class="input-block-level" placeholder="用户名"  name="username" >
        <input type="password" class="input-block-level" placeholder="密码"  name="password">
        <button class="btn btn-large btn-primary" type="submit">登陆</button>
    </form>

</div>
<!-- /container -->


</body>
</html>
