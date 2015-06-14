<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Welcome to Test CodeIgniter</title>

        <style type="text/css">

            ::selection{ background-color: #E13300; color: white; }
            ::moz-selection{ background-color: #E13300; color: white; }
            ::webkit-selection{ background-color: #E13300; color: white; }

            body {
                background-color: #fff;
                margin: 40px;
                font: 13px/20px normal Helvetica, Arial, sans-serif;
                color: #4F5155;
            }

            a {
                color: #003399;
                background-color: transparent;
                font-weight: normal;
            }

            h1 {
                color: #444;
                background-color: transparent;
                border-bottom: 1px solid #D0D0D0;
                font-size: 19px;
                font-weight: normal;
                margin: 0 0 14px 0;
                padding: 14px 15px 10px 15px;
            }

            code {
                font-family: Consolas, Monaco, Courier New, Courier, monospace;
                font-size: 12px;
                background-color: #f9f9f9;
                border: 1px solid #D0D0D0;
                color: #002166;
                display: block;
                margin: 14px 0 14px 0;
                padding: 12px 10px 12px 10px;
            }
            
            /* for datepicker in fancybox */
            .ui-tooltip{
                z-index: 9999999;
            }
        </style>
<!--        <script src="<?php echo base_url(); ?>assets/js/jquery-1.7.js"></script>-->
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">
        <script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/default.css">
        
        <!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
        
        <!-- get introduce bootstrap -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/bootstrap.min.css">
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">-->
        <!-- Optional theme -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/bootstrap-theme.min.css">
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">-->
        <!-- Latest compiled and minified JavaScript -->
        <script src="<?php echo base_url();?>assets/bootstrap/bootstrap.min.js"></script>
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>-->
        <!-- boogstrap integration ended -->
        
        <script type="text/javascript">
            function reset_form(){
                $('.log').each(function(){
                    $(this).val(null);
                });
                $('.reg').each(function(){
                    $(this).val(null);
                });
            }
            setTimeout(function(){
                $("#sessmsg").html("");
            },3000);
        </script>
    </head>
    <body>
        <?php
        if(!$noheader){
            $uid = $this->session->userdata('id');
            $uname = $this->session->userdata('username');
            if($uid){ ?>
                <script type="text/javascript">
                    var siteurl = '<?php echo $siteurl;?>';
                </script>
                <div class="page-header col-md-12 row fixed">
                    <div class="col-md-10 text-center h2">
                        WELCOME to <?php echo PROJECT_NAME;?>
                    </div>
                    <div class="pull-right dropdown ">
                        <div class="row dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="true">
                            <a href="#">Welcome <?php echo ucwords($uname); ?> 
                            <span class="caret"></span>
                            </a>
                        </div>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenuDivider">
                            <li role="presentation" class="dropdown-header">
                                <a href='<?php echo $siteurl; ?>login/registrationform'>Edit Profile</a>
                            </li>
                            <li role="presentation" class="dropdown-header">
                                <a href='<?php echo $siteurl; ?>login/changepassword'>Change Password</a>
                            </li>
                            <li role="presentation" class="dropdown-header">
                                <a href='<?php echo $siteurl; ?>login/logout'>Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                    <br/><br/>
                    
        <?php }else{
                ?>
                <h2>Welcome to Test CodeIgniter</h2>
        <?php }}?>
        <div id="sessmsg" class="red col-sm-12"><?php if($msg) echo $msg;?></div>
        <div class="container col-md-12">
            <div class="col-md-2 panel panel-default">
                Left Panel
            </div>
            <div id="container" class="col-md-10 panel panel-default">