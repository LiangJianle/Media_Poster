<!doctype html>
<html>
<head>

    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

    <meta charset="utf-8" />

    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />

    <!-- Use title if it's in the page YAML frontmatter -->
    <title>视频发布管理系统</title>

    <link href="<?php echo base_url(); ?>resource/stylesheets/application.css" media="screen" rel="stylesheet" type="text/css" />

    <!--[if lt IE 9]>
    <script src="<?php echo base_url(); ?>resource/javascripts/vendor/html5shiv.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>resource/javascripts/vendor/excanvas.js" type="text/javascript"></script>
    <![endif]-->

    <script src="<?php echo base_url(); ?>resource/javascripts/application.js" type="text/javascript"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>


<style type="text/css">
    body{
        font-family: "微软雅黑";
    }
    </style>
<body>

<?php $this->load->view("admin_top_bar");?>
<div class="sidebar-background">
    <div class="primary-sidebar-background"></div>
</div>

<div class="primary-sidebar">
    <?php $this->load->view("admin_sidebar");?>
</div>
<div class="main-content">
    <?php $this->load->view($include);?>
</div>

</body>
</html>
